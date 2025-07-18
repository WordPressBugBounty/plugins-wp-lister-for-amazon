<?php

namespace WPLab\Amazon\Helper;

use WPLA_AmazonProfile;

class JsonFeedDataBuilder extends \WPLA_FeedDataBuilder {

	private $schema_cache = [];
	private $profile_cache = [];
	private $languages_cache = [];

	public const OPERATION_UPDATE           = 'UPDATE';
	public const OPERATION_PARTIAL_UPDATE   = 'PARTIAL_UPDATE';
	public const OPERATION_PATCH            = 'PARTIAL_PATCH';
	public const OPERATION_DELETE           = 'DELETE';

	public static function getMarketplaceIdFromTemplateId( $tpl_id ) {
		global $wpdb;

		$sql = "SELECT markets.marketplace_id
				FROM {$wpdb->prefix}amazon_markets markets,
					{$wpdb->prefix}amazon_feed_templates templates
				WHERE templates.id = %d
				AND templates.site_id = markets.id";
		return $wpdb->get_var( $wpdb->prepare($sql, $tpl_id));
	}

	public function buildPriceAndQuantityJson( $items, $account) {
		$data = [
			'header' => [
				'sellerId' => $account->merchant_id,
				'version'   => '2.0'
			],
			'messages' => []
		];

		$columns = $this->getPriceAndQuantityFields();

		$max_feed_size = get_option( 'wpla_max_feed_size', 1000 );
		$msg_id = 0;

		foreach ( $items as $item ) {
			if ( $msg_id >= $max_feed_size ) {
				WPLA()->logger->info( 'max_feed_size reached. Breaking.');
				break;
			}

			// get WooCommerce product data
			$product_id = $item['post_id'];
			$product = wc_get_product( $product_id );

			if ( ! $product ) continue;
			if ( ! $item['sku'] ) continue;

			if ( $product->get_type() == 'variable' ) {
				WPLA_ListingsModel::updateWhere(
					array( 'id' => $item['id'] ),
					array( 'pnq_status' => 0 )
				);
				continue; // skip parent variations in P&Q feed
			}

			// load profile fields
			$profile    = new WPLA_AmazonProfile( $item['profile_id'] );
			//$profile    = $profile->id ? $profile : false;

			$attributes = $this->getAttributes( $item, $profile, $columns );

			// skip empty attributes
			if ( $attributes == '[]' ) {
				continue;
			}

			$msg_id++;
			$message = [
				'messageId'     => $msg_id,
				'sku'           => $item['sku'],
				'operationType' => 'PARTIAL_UPDATE',
				'productType'   => 'PRODUCT',
				'attributes'    => $attributes
			];
			$data['messages'][] = $message;
		}

		if ( empty( $data['messages'] ) ) {
			return false;
		}

		return json_encode( $data );
	}

	/**
	 * Build JSON feed for deleting listings (similar to CSV add-delete column with 'x' value)
	 *
	 * @param array $items
	 * @param \WPLA_AmazonAccount $account
	 * @return string|false
	 */
	public function buildDeleteListingsJson( $items, $account ) {
		$data = [
			'header' => [
				'sellerId' => $account->merchant_id,
				'version'   => '2.0'
			],
			'messages' => []
		];

		$max_feed_size = get_option( 'wpla_max_feed_size', 1000 );
		$msg_id = 0;

		foreach ( $items as $item ) {
			if ( $msg_id >= $max_feed_size ) {
				WPLA()->logger->info( 'max_feed_size reached. Breaking.');
				break;
			}

			// Only process items with trash status
			if ( $item['status'] != 'trash' ) {
				continue;
			}

			if ( ! $item['sku'] ) {
				WPLA()->logger->info('Skipping item without SKU for deletion: ID ' . $item['id']);
				continue;
			}

			$msg_id++;
			$message = [
				'messageId'     => $msg_id,
				'sku'           => $item['sku'],
				'operationType' => self::OPERATION_DELETE
			];
			$data['messages'][] = $message;

			WPLA()->logger->info('Added deletion message for SKU: ' . $item['sku']);
		}

		if ( empty( $data['messages'] ) ) {
			WPLA()->logger->info('No items to delete found in buildDeleteListingsJson()');
			return false;
		}

		WPLA()->logger->info('Built delete feed with ' . count($data['messages']) . ' messages');
		return json_encode( $data );
	}

	/**
	 * Add pending items to a JSON feed. This method will add items until the feed reaches its max feed size limit
	 *
	 * @param array $items
	 * @param \WPLA_AmazonAccount $account
	 * @param string $operation
	 * @param string $product_type
	 * @param array $feed_attributes
	 *
	 * @return void
	 */
	public function addItemsToFeed( $items, $account, $operation = JsonFeedDataBuilder::OPERATION_UPDATE, $product_type = null, $feed_attributes = [], $feed_name = '' ) {
		WPLA()->logger->info('addItemsToFeed() - account id: '.$account->id);

		$current_messages   = [];
		$pending_messages   = $this->getMessagesFromItems( $items, $account, $operation, $product_type, $feed_attributes );
		$max_feed_size      = get_option( 'wpla_max_feed_size', 1000 );
		$msg_id = 0;

		foreach ( $pending_messages as $messages_idx => $message ) {
			$msg_id++;

			$message['messageId'] = $msg_id;
			$current_messages[] = $message;

			unset( $pending_messages[ $messages_idx ] );

			if ( $msg_id >= $max_feed_size ) {
				WPLA()->logger->info( 'max_feed_size reached. Breaking.');
				break;
			}
		}

		if ( empty( $current_messages ) ) {
			return;
		}

		$feed = $this->getAvailableFeed( $account, $product_type, $feed_name );
		$feed_data = json_decode( $feed->data, true );
		$feed_data['messages'] = $current_messages;

		$feed->product_type = $product_type;
		$feed->data = json_encode($feed_data);
		$feed->line_count = count($current_messages);
		$feed->update();
	}

	/**
	 * @param array $listing A listing array from the amazon_listings table
	 * @param WPLA_AmazonProfile $profile
	 * @param array $json_fields Field names to pull values from. If empty, field names will be pulled from the schema
	 *
	 * @return array array of attributes
	 */
	public function getAttributes( $listing, $profile, $json_fields = [] ) {
		$product_id = $listing['post_id'];
		$product    = wc_get_product( $product_id );
		$json_fields= $this->getJsonFields($listing, $profile, $json_fields);

		$product_type   = $this->getListingProductType( $listing, $profile );
		$marketplace_id = $this->getListingMarketplaceId( $listing, $profile );

		//$is_variable_product = $product->is_type(['variable', 'variable-product-part']);

		// Disable pricing modifications from the Price Based on Country plugin
		$this->disableCountryBasedPricing();

		$schema = $this->getSchemaFromCache( $product_type, $marketplace_id );
		
		if ( ! $schema ) {
			return [];
		}

		$language = $this->getLanguageFromCache($marketplace_id, $schema );

		// convert fields for Listing Loader feeds or listings without a profile
		/*if ( $profile->id == 0 || $profile->feed_type == 'ListingLoader' ) {
			WPLA()->logger->info('Using Inventory Loader fields');
			$converter = new ProfileProductTypeConverter();
			$listing_attributes = (array)maybe_unserialize( $listing['attributes'] );
			$listing['attributes'] = $converter->convertFromArray( $listing_attributes );
		}*/

		// apply the product values to the profile fields
		$product_fields = $this->getProductValues( $listing );

		$fields = [];
		foreach ( $json_fields as $key => $field ) {
			$value = $product_fields[ $key ] ?? '';

			// overwrite profile with product values if available
			if ( !empty( $product_fields[ $key ] ) ) {
				$value = $product_fields[ $key ];
			}

			// run text conversions to get the final value
			$value = $this->processFieldValue( $value, $key, $listing, $product, $profile );
			$value = apply_filters( 'wpla_filter_listing_feed_column', $value, $key, $listing, $product, $profile, '' );

			if ( $value ) {
				$value = str_replace( array("\t","\n","\r"), ' ', $value ); // make sure there are no tabs or line breaks in any field

				// Clean any malformed UTF-8 sequences
				if ( is_string($value) ) {
					$value = \WPLA_ListingsModel::convertToUTF8( $value );
				}
			}

			// assign the processed $value back to the $fields array
			$fields[ $key ] = $value;
		}

		// This should probably in the WPLA_Profile class

		// parse the field names (eg. brand[0][value]) to get a multi-dim array of key=>value pairs
		$fields_str = $this->buildQueryString( $fields );
		$fields_arr = [];

		parse_str( $fields_str, $fields_arr );

		$fields_arr = $this->filterEmptyFields( $fields_arr );
		$fields_arr = $this->reindexArrays( $fields_arr );
		$fields_arr = $this->insertMarketData( $fields_arr, $marketplace_id, $language );

		//$fields_arr = ['attributes' => $fields_arr];
		return $fields_arr;
	}

	public function getInventoryLoaderFields() {
		return array(
			'externally_assigned_product_identifier[0][type]'   => 'External Product ID Type',
			'externally_assigned_product_identifier[0][value]'  => 'External Product ID Value',
			'merchant_suggested_asin[0][value]'                 => 'Merchant Suggested ASIN',
			'condition_type[0][value]'                          => 'Offering Condition Type',
			'condition_note[0][value]'                          => 'Offer Condition Note',
			'product_tax_code[0][value]'                        => 'Product Tax Code',
			'merchant_release_date[0][value]'                   => 'Merchant Release Date',
			'main_offer_image_locator[0][media_location]'       => 'Main Image Location',
			'other_offer_image_locator_1[0][media_location]'    => 'Other Image Location',
			'other_offer_image_locator_2[0][media_location]'    => 'Other Image Location',
			'other_offer_image_locator_3[0][media_location]'    => 'Other Image Location',
			'other_offer_image_locator_4[0][media_location]'    => 'Other Image Location',
			'other_offer_image_locator_5[0][media_location]'    => 'Other Image Location',
			'fulfillment_availability[0][fulfillment_channel_code]'     => 'Fulfillment Channel Code',
			'fulfillment_availability[0][quantity]'                     => 'Quantity',
			'fulfillment_availability[0][lead_time_to_ship_max_days]'   => 'Handling Time',
			'fulfillment_availability[0][restock_date]'                 => 'Restock Date',
			'purchasable_offer[0][our_price][0][schedule][0][value_with_tax]'           => 'Price',
			'purchasable_offer[0][discounted_price][0][schedule][0][value_with_tax]'    => 'Sale Price',
			'purchasable_offer[0][discounted_price][0][schedule][0][start_at]'          => 'Sale Start Date',
			'purchasable_offer[0][discounted_price][0][schedule][0][end_at]'            => 'Sale End Date',
			'purchasable_offer[0][minimum_seller_allowed_price][0][schedule][0][value_with_tax]' => 'Minimum Price',
			'purchasable_offer[0][maximum_seller_allowed_price][0][schedule][0][value_with_tax]' => 'Maximum Price',
		);
	}

	public function getPriceAndQuantityFields() {
		return array(
			'purchasable_offer[0][our_price][0][schedule][0][value_with_tax]' => 'Price',
			'purchasable_offer[0][minimum_seller_allowed_price][0][schedule][0][value_with_tax]' => 'Minimum Price',
			'purchasable_offer[0][maximum_seller_allowed_price][0][schedule][0][value_with_tax]' => 'Maximum Price',
			'fulfillment_availability[0][fulfillment_channel_code]' => 'Fulfillment Channel Code',
			'fulfillment_availability[0][quantity]' => 'Quantity',
			'fulfillment_availability[0][lead_time_to_ship_max_days]' => 'Leadtime'
		);
	}

	/**
	 * Get the messages from the items array and build the messages array for the feed data.
	 * This method will also check if the listing can be submitted to Amazon based on the profile settings
	 *
	 * @param array $items
	 * @param \WPLA_AmazonAccount $account
	 * @param string $operation
	 * @param string $product_type
	 * @param array $feed_attributes
	 *
	 * @return array
	 */
	private function getMessagesFromItems( $items, $account, $operation = JsonFeedDataBuilder::OPERATION_UPDATE, $product_type = null, $feed_attributes = [] ) {
		$messages = [];
		$max_feed_size = get_option( 'wpla_max_feed_size', 1000 );
		$lm = new \WPLA_ListingsModel();

		$msg_id = 0;
		foreach ( $items as $item ) {
			WPLA()->logger->info('Building Message for item #'. $item['post_id']);

			$profile = $this->getProfileFromCache( $item['profile_id'] );

			if (! $this->canSubmitListing( $item, $profile ) ) {
				continue;
			}

			// If this item has no ASIN, assume that this is a new listing that needs to be published
			if ( empty( $item['asin'] ) && $item['status'] == \WPLA_ListingsModel::STATUS_PREPARED ) {
				WPLA()->logger->info( 'Item has no ASIN - scheduled this to be submitted as a new listing');
				$lm->enqueueForPublish( $item['id'] );
				continue;
			}

			// Determine operation type based on item status (similar to CSV add-delete column)
			$item_operation = $operation;
			if ( $item['status'] == 'trash' ) {
				$item_operation = self::OPERATION_DELETE;
				WPLA()->logger->info('Item status is trash - setting operation to DELETE');
			}

			// For DELETE operations, we don't need complex attributes
			if ( $item_operation == self::OPERATION_DELETE ) {
				$attributes = [];
			} else {
				$attributes = $this->getAttributes( $item, $profile, $feed_attributes );

				// skip empty attributes for non-delete operations
				if ( $attributes == '[]' ) {
					WPLA()->logger->info('No attributes found for this item. Skipping');
					continue;
				}
			}

			$msg_id++;
			$message = [
				'messageId'     => $msg_id,
				'sku'           => $item['sku'],
				'operationType' => $item_operation,
				//'requirements'  => 'LISTING',
			];

			// Only add productType and attributes for non-delete operations
			if ( $item_operation != self::OPERATION_DELETE ) {
				$message['productType'] = $product_type ?? $this->getListingProductType( $item, $profile );
				$message['attributes'] = $attributes;
			}

			$messages[] = apply_filters( 'wpla_json_builder_message_array', $message, $item, $profile, $attributes );

			WPLA()->logger->info( 'Total messages generated: '. count( $messages ) );

			if ( $msg_id >= $max_feed_size ) {
				WPLA()->logger->info( 'max_feed_size reached. Breaking.');
				break;
			}
		}

		return $messages;
	}

	/**
	 * @param \WPLA_AmazonAccount $account
	 *
	 * @return \WPLA_AmazonFeed
	 */
	private function getAvailableFeed( $account, $product_type, $feed_name = '' ) {
		$feed_name = $feed_name ?: 'Listings Data Feed';
		$existing_feed_id = \WPLA_AmazonFeed::getPendingFeedId( 'JSON_LISTINGS_FEED', $feed_name, $account->id, $product_type );

		if ( ! $existing_feed_id ) {
			// return a new feed
			return $this->createEmptyFeed( $account, $product_type, $feed_name );
		}

		$feed = new \WPLA_AmazonFeed( $existing_feed_id );

		$decoded = json_decode( $feed->getData() );

		if ( $decoded ) {
			if ( isset($decoded->messages) && count( $decoded->messages ) < get_option( 'wpla_max_feed_size', 1000 ) ) {
				return $feed;
			}
		}

		return $this->createEmptyFeed( $account, $product_type, $feed_name );
	}

	private function createEmptyFeed( $account, $product_type = '', $feed_name = 'Listings Data Feed' ) {
		$data = [
			'header' => [
				'sellerId' => $account->merchant_id,
				'version'   => '2.0'
			],
			'messages' => []
		];

		// return a new feed
		$new_feed = new \WPLA_AmazonFeed();
		$new_feed->FeedType             = 'JSON_LISTINGS_FEED';
		$new_feed->product_type         = $product_type;
		$new_feed->template_name        = $feed_name;
		$new_feed->FeedProcessingStatus = 'pending';
		$new_feed->status               = \WPLA_AmazonFeed::STATUS_PENDING;
		$new_feed->account_id           = $account->id;
		$new_feed->data                 = json_encode( $data );
		$new_feed->date_created         = gmdate('Y-m-d H:i:s');
		$new_feed->id = null;
		$new_feed->add();

		return $new_feed;
	}

	private function getProfileFromCache( $profile_id ) {
		if ( isset( $this->profile_cache[ $profile_id ] ) ) {
			return $this->profile_cache[ $profile_id ];
		} else {
			$profile = new WPLA_AmazonProfile( $profile_id );
			$this->profile_cache[ $profile_id ] = $profile;
			return $profile;
		}
	}

	/**
	 * @param string $value
	 * @param string $property
	 * @param object $listing
	 * @param \WC_Product $product
	 * @param WPLA_AmazonProfile $profile
	 *
	 * @return string
	 */
	private function processFieldValue( $value, $property, $listing, $product, $profile ) {
		$product_id      = $product->get_id() ;
		$product_type    = $product->get_type();
		$product_sku     = $product->get_sku();
		$fba_enabled     = $this->isFba( $listing, $profile );

		$profile_details = !empty($profile->details) ? maybe_unserialize( $profile->details ) : array();
		$profile_fields  = !empty($profile->fields) ? maybe_unserialize( $profile->fields ) : array();
		$variations_mode = $profile_details['variations_mode'] ?? 'default';

		// set correct post_id for variations
		// post_id is the child ID and product_id is the parent in case of a variable product
		// $parent_id = $product_id / $child_id = $post_id
		$child_id = $parent_id = $product_id;
		//$parent_id = $product_id;
		if ( $product_type == 'variation' || $product_type == 'product-part-variation' ) {
			// set the $product_id to the parent's ID
			$parent_id = \WPLA_ProductWrapper::getVariationParent( $child_id );
		}

		WPLA()->logger->debug('processFieldValue ('. $property .') #'. $child_id .'/'. $parent_id );

		// process hard-coded values
		switch ( $property ) {

			case 'externally_assigned_product_identifier[0][value]':
				$value = get_post_meta( $child_id, '_amazon_product_id', true );
				break;

			case 'externally_assigned_product_identifier[0]type':
				$value = get_post_meta( $child_id, '_amazon_id_type', true );
				break;

			case 'sku':
				$value = $listing['sku']; // we have to use the item SKU - or feed processing would fail if SKU is different in WooCommerce and WP-Lister
				break;

			case 'purchasable_offer[0][our_price][0][schedule][0][value_with_tax]':
				$value = $this->getRegularPriceValue( $child_id, $parent_id, $listing, $profile );

				###
				# 05/19/23: Only apply the profile value if there's no _amazon_price set in the product #60955
				###
				// Ugh, we've gone full circle now.
				// Revising again because apparently, profile fields need to have the highest priority #20404 #20390
				// So now, the regular price can be overridden by _amazon_price, and that too can be overridden by the profile field
				if ( (!$this->getProductAmazonPrice( $parent_id ) && !$this->getProductAmazonPrice( $child_id ) ) && ! empty( $profile_fields[$property] ) ) {
					$value = $profile_fields[$property];
				}

				$value  = $this->formatPriceDecimal( $value );
				break;

			case 'purchasable_offer[0][discounted_price][0][schedule][0][value_with_tax]':
				$value = $this->getSalePriceValue( $child_id, $parent_id, $listing, $profile );

				// Use profile price if set
				if ( ! empty( $profile_fields[$property] ) ) {
					$value = $profile_fields[$property];
				}

				$value = $this->formatPriceDecimal( $value );
				break;

			case 'purchasable_offer[0][discounted_price][0][schedule][0][start_at]':
				$date = get_post_meta( $product_id, '_sale_price_dates_from', true );
				if ( $date ) $value = date( 'Y-m-d', $date );

				$has_sale_price = $this->withActiveSalePrice( $child_id, $parent_id, $listing, $profile );
				$sale_price = $this->getSalePriceValue( $child_id, $parent_id, $listing, $profile );

				// Use profile value if set
				if ( ! $value && $has_sale_price ) {
					if (! empty( $profile_fields[$property] ) ) {
						$value = $profile_fields[$property];
					}
				}

				// if sale price is intentionally left blank by [---] shortcode, leave sale date blank as well
				if ( ! $sale_price ) {
					$value = '';
				} else {
					// We have a discounted price, so we need a schedule
					if ( ! $value ) {
						// Use consistent start date for both active sales and clearing previous sales
						$value = '2011-01-01';
					}
				}

				break;

			case 'purchasable_offer[0][discounted_price][0][schedule][0][end_at]':
				$date = get_post_meta( $product_id, '_sale_price_dates_to', true );
				if ( $date ) $value = date( 'Y-m-d', $date );

				$has_sale_price = $this->withActiveSalePrice( $child_id, $parent_id, $listing, $profile );
				$sale_price = $this->getSalePriceValue( $child_id, $parent_id, $listing, $profile );

				// Use profile value if set
				if ( ! $value && $has_sale_price ) {
					if (! empty( $profile_fields[$property] ) ) {
						$value = $profile_fields[$property];
					}
				}

				// if sale price is intentionally left blank by [---] shortcode, leave sale date blank as well
				if ( ! $sale_price ) {
					$value = '';
				} else {
					// We have a discounted price, so we need a schedule
					if ( $has_sale_price ) {
						// Active sale: if no end date, use future date
						if ( ! $value ) $value = '2029-12-31';
					} else {
						// No active sale (clearing previous sales): use past date to indicate promotion ended
						if ( ! $value ) $value = '2011-01-01';
					}
				}

				break;

			case 'purchasable_offer[0][minimum_seller_allowed_price][0][schedule][0][value_with_tax]':
				$value = get_post_meta( $product_id, '_amazon_minimum_price', true );

				// Deduct the shipping fee from the min/max prices
				if ( $value && $shipping_fee = get_option( 'wpla_repricing_shipping', false ) ) {
					$value  = $this->formatPriceDecimal( $value );
					$value -= $shipping_fee;
				}

				$value  = $this->formatPriceDecimal( $value );
				break;

			case 'purchasable_offer[0][maximum_seller_allowed_price][0][schedule][0][value_with_tax]':
				$value = get_post_meta( $product_id, '_amazon_maximum_price', true );

				// Deduct the shipping fee from the min/max prices
				if ( $value && $shipping_fee = get_option( 'wpla_repricing_shipping', false ) ) {
					$value  = str_replace( ',', '.', $value ); // covert to a dot decimal character - will get converted to comma later if necessary in self::convertCurrencyFormat()
					$value -= $shipping_fee;
				}

				$value  = $this->formatPriceDecimal( $value );
				break;

			case 'fulfillment_availability[0][fulfillment_channel_code]':
				$value = 'DEFAULT';

				if ( $fba_enabled ) {
					$value = $listing['fba_fcid'];

					// handle FBA only mode - force FBA enabled if set
					$fba_only_mode = get_option( 'wpla_fba_only_mode', 0 );

					// handle FBA on product / variation level
					$fba_overwrite = get_post_meta( $product_id, '_amazon_fba_overwrite', true );

					// with neither FBA only nor FBA overwrite enabled, we need to allow leaving fcid empty so seller fallback can work:
					if ( ! $value && ( $fba_only_mode || $fba_overwrite ) ) {
						$value = get_option( 'wpla_fba_fulfillment_center_id' );
					}

					// But check again for an explicit override because the code above will always return the default FCID
					// in cases where $value is empty and the override is set to FBM #29337
					if ( $fba_overwrite == 'FBM' ) {
						$value = 'DEFAULT';
					}
				}

				break;

			case 'fulfillment_availability[0][quantity]':
				if ( ! $fba_enabled ) {

					if ( ($product_type == 'variation' || $product_type == 'product-part-variation' ) && empty( $parent_id ) ) {
						wpla_show_message('<b>Warning: The parent product for variation #'.$child_id.' (SKU '.$listing['sku'].') does not exist!</b><br>Please remove that item from WP-Lister and check the integrity of your WooCommerce database.','warn');
						$value = '';
					} else {
						$value = '';
						if ( $product_type != 'variable' && $product_type != 'variable-product-part' ) {
							$value = intval( \WPLA_ProductWrapper::getStock( $product ) );
						}
					}

					WPLA()->logger->info( 'Current quantity: '. $value );

					// regard WooCommerce's Out Of Stock Threshold option - if enabled
					if ( $out_of_stock_threshold = get_option( 'woocommerce_notify_no_stock_amount' ) ) {
						if ( $value && 1 == get_option( 'wpla_enable_out_of_stock_threshold' ) ) {
							$value = intval($value) - intval($out_of_stock_threshold);
						}
					}

					WPLA()->logger->info( 'Value after OOS threshold: '. $value );

					if ( $value < 0 ) $value = 0; // amazon doesn't allow negative values

					// allow custom profile value to overwrite WooCommerce quantity
					if ( isset( $profile_fields[$property] ) && ($profile_fields[$property] !== '' || $profile_fields[$property] === 0) ) {
						$value = $profile_fields[$property];
						WPLA()->logger->info( 'Value from profile: '. $value );
					}

					// If the Hide on Amazon checkbox is checked, simply send a stock quantity of 0 to make this unsellable #38320
					if ( get_post_meta( $child_id, '_amazon_is_disabled', true ) ) {
						WPLA()->logger->info( 'Product #'. $child_id .' is hidden/disabled. Setting the stock quantity to 0' );
						$value = 0;
					}
				}
				break;

			case 'fulfillment_availability[0][lead_time_to_ship_max_days]':
				if ( $handling_time = get_post_meta( $child_id, '_amazon_handling_time', true ) ) {
					$value = intval( $handling_time );
				}
				break;

			case 'bullet_point[0][value]':
			case 'bullet_point[1][value]':
			case 'bullet_point[2][value]':
			case 'bullet_point[3][value]':
			case 'bullet_point[4][value]':
			case 'bullet_point[5][value]':
			case 'generic_keyword[0][value]':
			case 'generic_keyword[1][value]':
			case 'generic_keyword[2][value]':
			case 'generic_keyword[3][value]':
			case 'generic_keyword[4][value]':
				$key = $this->getProductMetaKeyFromProperty( $property );

				if ( $key ) {
					$value = get_post_meta( $parent_id, '_amazon_'. $key, true );
				}


				if ( ! empty( $profile_fields[$property] ) ) {
					$value = $profile_fields[$property];
				}

				$value = self::htmlEntityDecode( self::doTranslate( $value, $profile->account_id ) );

				break;

			case 'main_product_image_locator[0][media_location]':
			case 'main_offer_image_locator[0][media_location]':
				// if gallery mode is set to ignore images, skip this process
				if ( get_option( 'wpla_product_gallery_fallback', 'none' ) == 'ignore' ) {
					$value = '';
					break;
				}

				// if offer images are disabled, skip this column
				if ( strstr($property,'offer_image_locator') && get_option( 'wpla_enable_product_offer_images', 0 ) == 0 ) {
					break;
				}

				// check if custom post meta field 'amazon_image_url' exists
				if ( get_post_meta( $child_id, 'amazon_image_url', true ) ) {
					return wpla_encode_image_url( get_post_meta( $child_id, 'amazon_image_url', true ) );
				}

				// $value      = $product->get_image('full');
				$attachment_id = get_post_thumbnail_id( $child_id );
				$image_url     = wp_get_attachment_image_src( $attachment_id, 'full' );
				$value         = is_array( $image_url ) ? $image_url[0] : '';

				WPLA()->logger->info( 'wpla_variation_main_image_fallback: '. get_option('wpla_variation_main_image_fallback','parent') );
				if ( empty($value) && ( $product_type == 'variation' || $product_type == 'product-part-variation' ) && get_option('wpla_variation_main_image_fallback','parent') == 'parent' ) {
					$attachment_id = get_post_thumbnail_id( $product_id );
					$image_url     = wp_get_attachment_image_src( $attachment_id, 'full' );
					$value         = $image_url[0] ?? '';
					WPLA()->logger->info( 'found '. $value .' for '. $product_id );
				}

				// if main image is disabled, use first enabled gallery image
				$disabled_images = array_filter( explode( ',', get_post_meta( $product_id, '_wpla_disabled_gallery_images', true ) ) );

				if ( ! $value || in_array( $attachment_id, $disabled_images ) ) {
					// $gallery_images = $product->get_gallery_attachment_ids();
					$gallery_images = \WPLA_ProductWrapper::getGalleryAttachmentIDs( $product );
					$gallery_images = array_values( array_diff( $gallery_images, $disabled_images ) );
					$gallery_images = apply_filters( 'wpla_product_gallery_attachment_ids', $gallery_images, $product_id );
					if ( isset( $gallery_images[0] ) ) {
						$image_url = wp_get_attachment_image_src( $gallery_images[0], 'full' );
						$value = @$image_url[0];
					}
				}

				// custom amazon image
				// 10/24/23 - Do not use overwrite the variation image even if a custom gallery is found #63403
				if ( empty( $value ) && $product_type != 'variation' ) {
					$custom_images = get_post_meta( $product_id, '_amazon_image_gallery', true );
					if ( !empty( $custom_images ) ) {
						$custom_images = array_filter( array_map( 'trim', explode( ',', $custom_images ) ) );
						$image_url = wp_get_attachment_image_src( $custom_images[ 0 ], 'full' );
						$value = @$image_url[0];
					}
				}

				// custom product level column overwrites WooCommerce image
				if ( ! empty( $profile_fields[$property] ) ) $value = $profile_fields[$property];

				// maybe fall back to parent variation featured image (disable to avoid the same swatch image for all child variations - ticket #6662)
				WPLA()->logger->info( 'variation_main_image for '. $listing['sku'] );
				WPLA()->logger->info( 'product type: '. $product_type );
				WPLA()->logger->info( 'current value: '. $value );

				WPLA()->logger->info( 'new value: '. $value );

				$value = apply_filters( 'wpla_product_main_image_url', $value, $child_id );
				$value = self::convertImageUrl( $value );
				break;


			case 'other_product_image_locator_1[0][media_location]':
			case 'other_product_image_locator_2[0][media_location]':
			case 'other_product_image_locator_3[0][media_location]':
			case 'other_product_image_locator_4[0][media_location]':
			case 'other_product_image_locator_5[0][media_location]':
			case 'other_product_image_locator_6[0][media_location]':
			case 'other_product_image_locator_7[0][media_location]':
			case 'other_product_image_locator_8[0][media_location]':
			case 'other_offer_image_locator_1[0][media_location]':
			case 'other_offer_image_locator_2[0][media_location]':
			case 'other_offer_image_locator_3[0][media_location]':
			case 'other_offer_image_locator_4[0][media_location]':
			case 'other_offer_image_locator_5[0][media_location]':
				// if gallery mode is set to ignore images, skip this process
				if ( get_option( 'wpla_product_gallery_fallback', 'none' ) == 'ignore' ) {
					WPLA()->logger->info( 'product_gallery_fallback is set to ignore. Setting value to ""' );
					$value = '';
					break;
				}

				// if offer images are disabled, skip this column
				if ( strstr($property,'offer_image_locator') && get_option( 'wpla_enable_product_offer_images', 0 ) == 0 ) {
					WPLA()->logger->info( 'product_offer_images disabled. Skipping' );
					break;
				}

				$base_property = $this->getBaseProperty( $property );
				$image_index = substr($base_property, -1);        // skip first image

				WPLA()->logger->info( 'image_index: '. $image_index );

				if ( 'skip' != get_option( 'wpla_product_gallery_first_image' )) {
					$image_index -= 1;	// include first image
					WPLA()->logger->info( 'Skipping first image. New index: '. $image_index);
				}

				// build list of enabled gallery images (attachment_ids)
				$disabled_images = explode( ',', get_post_meta( $product_id, '_wpla_disabled_gallery_images', true ) );
				// $gallery_images = $product->get_gallery_attachment_ids();
				$gallery_images = \WPLA_ProductWrapper::getGalleryAttachmentIDs( $product );
				$gallery_images = array_values( array_diff( $gallery_images, $disabled_images ) );
				$gallery_images = apply_filters( 'wpla_product_gallery_attachment_ids', $gallery_images, $child_id );


				if ( isset( $gallery_images[ $image_index ] ) ) {
					$image_url = wp_get_attachment_image_src( $gallery_images[ $image_index ], 'full' );
					$value = @$image_url[0];
					$value = self::convertImageUrl( $value );
				} else {
					WPLA()->logger->info( 'gallery_images['. $image_index .'] does not exist.' );
				}

				// custom amazon image
				// 10/24/23 - Do not use overwrite the variation image even if a custom gallery is found #63403
				if ( empty( $value ) && $product_type != 'variation' ) {
					$custom_images = get_post_meta( $product_id, '_amazon_image_gallery', true );
					if ( ! empty( $custom_images ) ) {
						// if using custom images, always skip the first image because it is already being used as
						// the listing's primary image
						$base_property = $this->getBaseProperty( $property );
						$image_index = substr( $base_property, - 1 );

						$custom_images = array_filter( array_map( 'trim', explode( ',', $custom_images ) ) );

						if ( ! empty( $custom_images[ $image_index ] ) ) {
							$image_url = wp_get_attachment_image_src( $custom_images[ $image_index ], 'full' );
							$value     = @$image_url[0];
						}
					}
				}

				// custom product level column overwrites WooCommerce image
				if ( ! empty( $profile_fields[$property] ) ) $value = $profile_fields[$property];
				break;

			case 'merchant_suggested_asin[0][value]':
				$value = get_post_meta( $child_id, '_wpla_asin', true );
				
				// Fallback to listing ASIN if _wpla_asin is empty
				if ( empty( $value ) && ! empty( $listing['asin'] ) ) {
					$value = $listing['asin'];
				}
				break;

			case 'condition_type[0][value]':
				$value = get_post_meta( $child_id, '_amazon_condition_type', true );

				// fallback to parent's condition type
				if ( ! $value ) {
					$value = get_post_meta( $parent_id, '_amazon_condition_type', true );
				}

				// if this item was imported but has no product level condition, use original report value
				if ( ! $value && $listing['source'] == 'imported' ) {
					$report_row = json_decode( $item['details'] ?? '', true );
					if ( is_array($report_row) && isset( $report_row['item-condition'] ) ) {
						$value = WPLA_ImportHelper::convertNumericConditionIdToType( $report_row['item-condition'] );
					}
				}

				// New is not a valid value anymore
				if ( $value === 'New' ) {
					$value = 'new_new';
				}

				if ( ! $value && ! isset( $profile_fields[$property] ) ) {
					$value = 'new_new';	// avoid an empty value for Offer feeds without profile
				}
				break;

			case 'condition_note[0][value]':
				$value = get_post_meta( $child_id, '_amazon_condition_note', true );

				// fallback to parent's condition note
				if ( ! $value ) {
					$value = get_post_meta( $parent_id, '_amazon_condition_note', true );
				}

				//$value = self::doTranslate( $value, $profile->account_id );
				// decode charset to prevent getting invalid characters #51609
				$value = self::htmlEntityDecode( self::doTranslate( $value, $profile->account_id ) );
				break;

			case 'parentage_level[0][value]':
				if ( $product_type == 'variable' || $product_type == 'variable-product-part' ) {
					$value = 'parent';
				} elseif ( $product_type == 'variation' || $product_type == 'product-part-variation' ) {
					$value = 'child';
				}

				if ( $variations_mode == 'flat' ) {
					$value = '';
				}
				break;

			case 'child_parent_sku_relationship[0][child_relationship_type]':
				if ( $product_type == 'variation' || $product_type == 'product-part-variation' )
					$value = 'Variation';
				if ( $variations_mode == 'flat' ) $value = '';
				break;

			case 'child_parent_sku_relationship[0][parent_sku]':
				if ( $product_type == 'variation' || $product_type == 'product-part-variation' ) {
					$parent_product = \WPLA_ProductWrapper::getProduct( $parent_id );

					if ( $parent_product ) {
						$value = $parent_product->get_sku();
					}
				}
				if ( $variations_mode == 'flat' ) $value = '';
				break;

			case 'variation_theme[0][name]':
				$value = $listing['vtheme'];

				// handle empty vtheme for legacy items
				if ( empty( $value ) && in_array( $product_type, array( 'variation', 'variable', 'variable-product-part', 'product-part-variation' ) ) ) {
					//$parent_id = $listing['parent_id'] ? $listing['parent_id'] : $listing['post_id'];
					//$value     = \WPLA_ListingsModel::getVariationThemeForPostID( $parent_id );
				}

				if ( $value ) {
					$value = str_replace('-', '/', $value);

					$value = self::convertToEnglishAttributeLabel($value);

					switch ( strtolower( $value ) ) {
						case 'colour':
							$value = 'COLOR';
							break;

						case 'colorsize':
						case 'coloursize':
							$value = 'COLOR/SIZE';
							break;

						case 'colour/size':
						case 'color/size':
							$value = 'COLOR/SIZE';
							break;

						case 'size/colour':
						case 'size/color':
							$value = 'SIZE/COLOR';
							break;

						case 'materialcolor':
							$value = 'COLOR/MATERIAL';
							break;
					}

					if ($variations_mode == 'flat') {
						$value = '';
					}

				}

				if ( ! empty( $profile_fields[$property] ) ) {
					$value = $profile_fields[$property];
				}

				// Set to empty on simple products #19914
				if ( $product->is_type( 'simple' ) ) {
					$value = '[---]';
				}

				// SP-API not requires the VarTheme be uppercase
				if ( $value ) {
					$value = strtoupper( $value );
				}
				break;

			case 'color[0][standardized_values]':
				if ( $product_type == 'variation' || $product_type == 'product-part-variation' ) {
					$color_name = WPLA()->memcache->getColumnValue( $product_sku, 'color_name' );

					if ( ! $color_name ) {
						// try to get the color_name in case it hasn't been processed yet
						$color_name = self::parseProductColumn( 'color_name', $listing, $product, $profile );
					}

					$color_name = strtolower( $color_name );
					$variation_color_map = get_option( 'wpla_variation_color_map', array() );
					if ( $color_name && array_key_exists( $color_name, $variation_color_map ) ) {
						$value = $variation_color_map[ $color_name ];
					} else {
						$value = $color_name;
					}
				}
				break;

			case 'size_map[0][value]':
			case 'size[0][value]':
				if ( $product_type == 'variation' || $product_type == 'product-part-variation' ) {
					$size_name = WPLA()->memcache->getColumnValue( $product_sku, 'size_name' );

					if ( ! $size_name ) {
						// try to get the color_name in case it hasn't been processed yet
						$size_name = self::parseProductColumn( 'size_name', $listing, $product, $profile );
					}

					$size_name = strtolower( $size_name );
					$variation_size_map = get_option( 'wpla_variation_size_map', array() );

					if ( !empty( $variation_size_map ) ) {
						$excluded_markets = get_option( 'wpla_sizemap_excluded_markets', array() );
						$item_market = WPLA()->accounts[ $listing['account_id'] ]->market_code;

						if ( in_array( $item_market, $excluded_markets ) ) {
							WPLA()->logger->info( 'Item is in the excluded markets sizemap array. Skipping mapping.' );
						} else {
							WPLA()->logger->info( 'Mapping size_name: '. $size_name );
							if ( $size_name ) {
								$lowered_size_name = strtolower( $size_name );
								WPLA()->logger->info( 'Lowered size_name'. $lowered_size_name );
								WPLA()->logger->info( 'Size Map'. print_r( $variation_size_map,1 ) );
								if ( array_key_exists( $lowered_size_name, $variation_size_map ) ) {
									$value = $variation_size_map[ $lowered_size_name ];
									WPLA()->logger->info( 'Found value: '. $value );
								}
							}
						}
					}

				}
				break;

			case 'batteries_required[0][value]':
				if ( ! $value && $fba_enabled ) {
					$value = 'FALSE';	// set default value to false for FBA enabled items
				}
				// custom product level column overwrites default value
				if (! empty( $profile_fields[$property] ) ) {
					$value = $profile_fields[$property];
				}
				break;

			case 'supplier_declared_dg_hz_regulation[0][value]':
			case 'supplier_declared_dg_hz_regulation[1][value]':
			case 'supplier_declared_dg_hz_regulation[2][value]':
			case 'supplier_declared_dg_hz_regulation[3][value]':
			case 'supplier_declared_dg_hz_regulation[4][value]':
				if ( ! $value && $fba_enabled ) {
					$value = 'not_applicable';	// set default value to 'not_applicable' for FBA enabled items
				}
				// custom product level column overwrites default value
				if ( ! empty( $profile_fields[$property] ) ) {
					$value = $profile_fields[$property];
				}
				break;

			case 'fulfillment_availability[0][restock_date]':
				WPLA()->logger->info( 'getting restock_date for '. $child_id );
				$value = get_post_meta( $child_id, '_amazon_restock_date', true );
				WPLA()->logger->info( 'found '. $value );

				// fallback to parent's restock date
				if ( ! $value ) {
					$value = get_post_meta( $parent_id, '_amazon_restock_date', true );
				}

				// format the date to YYYY-MM-DD
				if ( $value ) {
					$value = date( 'Y-m-d', strtotime( $value ) );
				}
				break;
		}

		WPLA()->logger->debug( 'value after switch statement: '. $value );

		$value = $this->handleVariationAttributes( $value, $property, $listing, $product, $profile );

		// Force empty value for properties with a [---] value
		if ( '[---]' === $value ) {
			return '';
		}

		// Process shortcodes in product-level values before checking profile fields
		// This ensures shortcodes set at product level (Edit Product → Amazon tab) are processed
		if ( !empty($value) && is_string($value) && strpos($value, '[') !== false ) {
			$value = $this->replaceShortcodes( $value, $property, $listing, $child_id, $profile );
		}

		// parent variations should only have certain columns
		// these three seem to work on Amazon CA / Automotive: item_sku, parent_child, variation_theme
		// but on US and DE, more columns are required:
		// $parent_var_columns = array('item_sku','parent_child','variation_theme'); // CA
		$parent_var_columns = apply_filters( 'wpla_allowed_parent_var_columns', array(
			'sku',
			'parentage_level[0][value]',
			'variation_theme[0][name]',
			'brand[0][value]',
			'item_name[0][value]',
			'department[0][value]',
			'department[1][value]',
			'department[2][value]',
			'department[3][value]',
			'department[4][value]',
			'product_description[0][value]',
			'item_type_keyword[0][value]',
			'item_type_name[0][value]',
			'bullet_point[0][value]',
			'bullet_point[1][value]',
			'bullet_point[2][value]',
			'bullet_point[3][value]',
			'bullet_point[4][value]',
			'special_features[0][value]',
			'special_features[1][value]',
			'special_features[2][value]',
			'special_features[3][value]',
			'special_features[4][value]',
			'main_product_image_locator[0][media_location]',
			'manufacturer[0][value]',
			'manufacturer_minimum_age[0][value]',
			'manufacturer_minimum_unit_of_measure[0][value]',
			'style[0][value]',
			'closure[0][type][value]',
			'lifestyle[0][value]',
			'lifestyle[1][value]',
			'lifestyle[2][value]',
			'lifestyle[3][value]',
			'lifestyle[4][value]',
			'material[0][value]',
			'pattern_type[0][value]',
			'model_year[0][value]',
			'shoe_width[0][unit]',
			'target_audience_keyword[0][value]',
			'target_audience_keyword[1][value]',
			'target_audience_keyword[2][value]',
			'target_audience_keyword[3][value]',
			'target_audience_keyword[4][value]',
			'binding[0][value]',
			'publication_date[0][value]',
			'author[0][value]',
			'part_number[0][value]',
			'ingredients[0][value]',
			'ingredients[1][value]',
			'ingredients[2][value]',
			'ingredients[3][value]',
			'ingredients[4][value]',
			//'update_delete', // added as instructed by AMZ in #34078
			'alcohol_content[0][value]', // added for #34632
			'alcohol_content[0][unit]',
			'unit_count[0][value]',
			'unit_count[0][type][value]', // added unit_count and unit_count_type #37866
			'display[0][type][value]', // added for 40982
			'watch_movement_type[0][value]', // added for 40982
			'target_gender[0][value]', // added for 41962
			'gem_type[0][value]', // added for 42127
			'outer[0][material][value]', // added for 43975
			'recommended_browse_nodes[0][value]',
			'material_composition[0][value]', // added for 47870
			'feed_product_type', // added for 51943
			'country_of_origin[0][value]', // added for 52180
			'age_range_description[0][value]', // added for 52839
			'fabric_type[0][value]', // added for 52839
			'supplier_declared_dg_hz_regulation[0][value]',

		), $property, $listing, $profile );
		if ( ($product_type == 'variable' || $product_type == 'variable-product-part') && ! in_array( $property, $parent_var_columns ) ) {
			$value = '';
		}

		// process profile fields - if not empty
		// Checking only against an empty string because using empty() will return TRUE for 0 values, and we need to be able to submit 0 to Amazon
		if ( !isset( $profile_fields[ $property ] ) || $profile_fields[ $property ] == '' ) {
			return $value;
		}

		// empty shortcode overrides default value
		if ( '[---]' === $profile_fields[$property] )
			return '';

		// use profile value as it is - if $value is still empty (ie. there is no product level value for this column)
		$used_profile_value = false;
		if ( empty($value) && $value !== 0 ) {
			$value = $profile_fields[$property];
			$used_profile_value = true;
		}

		// Only process shortcodes if we used a profile value (product-level shortcodes already processed above)
		if ( $used_profile_value ) {
			$value = $this->replaceShortcodes( $value, $property, $listing, $child_id, $profile );
		}
		$value = $this->handleSizeAttributes( $value, $property, $listing, $profile );

		return $value;
	}

	/**
	 * Get the price value for the product
	 * @param int $product_id
	 * @param int $parent_id
	 * @param string $listing
	 * @param WPLA_AmazonProfile $profile
	 *
	 * @return mixed|string|null
	 */
	private function getRegularPriceValue( $product_id, $parent_id, $listing, $profile ) {
		// send empty price if external_repricer flag is set
		if ( $this->isUsingExternalRepricer( $product_id ) ) {
			return '';
		}

		$product = wc_get_product( $product_id );

		$value = $product->get_regular_price();
		$value = $profile->id ? $profile->processProfilePrice( $value ) : $value;
		$value = apply_filters( 'wpla_filter_product_price', $value, $product_id, $product, $listing, $profile );

		$parent_amazon_price = $this->getProductAmazonPrice( $parent_id );
		$child_amazon_price  = $this->getProductAmazonPrice( $product_id );

		if ( $child_amazon_price > 0 ) {
			$value = $child_amazon_price;
		} elseif ( $parent_id != $product_id && $parent_amazon_price > 0 ) {
			$value = $parent_amazon_price;
		}

		$value = $this->deductShippingFeesFromMinMax( $value, $listing );

		return $value;
	}

	// check if there is an active sale price (different from the standard price) for current row / SKU
	private function withActiveSalePrice( $product_id, $parent_id, $listing, $profile ) {

		// check if there is a sale price for this row
		$sale_price = $this->getSalePriceValue( $product_id, $parent_id, $listing, $profile );
		if ( ! $sale_price ) {
			return false;
		}

		// if there is a sale price, check if it's different from the standard price
		if ( $sale_price == $this->getRegularPriceValue( $product_id, $parent_id, $listing, $profile ) ) {
			return false;
		}

		// yes, there is a sale price
		return true;
	} // withActiveSalePrice()

	private function getSalePriceValue( $product_id, $parent_id, $listing, $profile ) {
		if ( $this->isUsingExternalRepricer( $product_id ) ) {
			return '';
		}

		$product = wc_get_product( $product_id );

		$value = $product->get_sale_price();
		$value = $profile->id ? $profile->processProfilePrice( $value ) : $value;
		$value = apply_filters( 'wpla_filter_sale_price', $value, $product_id, $product, $listing, $profile );
		$value = $value ? number_format($value,2, null, '' ) : $value;

		// make sure sale_price is not higher than standard_price / price - Amazon might silently ignore price updates otherwise
		$standard_price = $this->getRegularPriceValue( $product_id, $parent_id, $listing, $profile );
		if ( $standard_price && ( $value > $standard_price ) ) {
			$value = '';
		}

		// if no sale price is set, send regular price with sale end date in the past to remove previously sent sale prices
		if ( empty($value) ) {
			$value = $standard_price;
		}

		// if sale price is disabled, use standard price here
		if ( get_option( 'wpla_disable_sale_price', 0 ) ) {
			$value = $standard_price;
		}

		// Deduct the shipping fee from the min/max prices
		$value = $this->deductShippingFeesFromMinMax( $value, $listing );

		return $value;
	}

	/**
	 * Get the custom amazon price from the product
	 *
	 * @param int $product_id
	 *
	 * @return mixed
	 */
	private function getProductAmazonPrice( $product_id ) {
		return get_post_meta( $product_id, '_amazon_price', true );
	}

	/**
	 * Convert the property name to the field name stored in the postmeta table (bullet_point[0][value] to bullet_point1)
	 *
	 * @param string $property
	 *
	 * @return string|FALSE
	 */
	private function getProductMetaKeyFromProperty( $property ) {
		$map = [
			'bullet_point[0][value]' => 'bullet_point1',
			'bullet_point[1][value]' => 'bullet_point2',
			'bullet_point[2][value]' => 'bullet_point3',
			'bullet_point[3][value]' => 'bullet_point4',
			'bullet_point[4][value]' => 'bullet_point5',
			'generic_keyword[0][value]' => 'generic_keywords1',
			'generic_keyword[1][value]' => 'generic_keywords2',
			'generic_keyword[2][value]' => 'generic_keywords3',
			'generic_keyword[3][value]' => 'generic_keywords4',
			'generic_keyword[4][value]' => 'generic_keywords5',
		];

		return $map[ $property ] ?? false;
	}

	private function formatPriceDecimal( $price ) {
		if (is_numeric( $price )) {
			// Format the value so it has the correct decimal character #51029
			$price = str_replace( ',', '.', $price ); // covert to a dot decimal character - will get converted to comma later if necessary in self::convertCurrencyFormat()
			$price = number_format( floatval( $price ), 2, null, '' );
		}

		return $price;
	}

	private function disableCountryBasedPricing() {
		// Stop the Price Based on Country plugin from modifying these prices #55996
		add_filter( 'wc_price_based_country_stop_pricing', function() {
			return true; // True to do not load the frontend pricing.
		});
	}

	private function isUsingExternalRepricer( $product_id ) {
		// send empty price if external_repricer flag is set
		$x_repricer = get_post_meta( $product_id, '_amazon_external_repricer', true );
		$y_repricer = get_option( 'wpla_external_repricer_mode', false );

		if ( $x_repricer || $y_repricer ) {
			return true;
		}

		return false;
	}

	private function deductShippingFeesFromMinMax( $price, $listing ) {
		// Deduct the shipping fee from the min/max prices
		if ( $price && $shipping_fee = get_option( 'wpla_repricing_shipping', false ) ) {
			$price -= $shipping_fee;

			// remove the shipping fee from the min/max prices
			$listing['min_price'] -= $shipping_fee;
			$listing['max_price'] -= $shipping_fee;
		}

		// Format the value so it has the correct decimal character #51029
		$price = str_replace( ',', '.', $price ); // covert to a dot decimal character - will get converted to comma later if necessary in self::convertCurrencyFormat()
		$price = number_format( floatval( $price ), 2, null, '' );

		// make sure price stays within min/max boundaries - prevent Amazon from throwing price alert / validation error (would make listing inactive)
		if ( $listing['min_price'] > 0 ) {
			$price = max( $price, $listing['min_price'] );
		}

		if ( $listing['max_price'] > 0 ) {
			$price = min( $price, $listing['max_price'] );
		}

		return $price;
	}

	/**
	 * Get property values from the product level
	 *
	 * @param array $listing
	 * @param WPLA_AmazonProfile $profile
	 * @return void
	 */
	private function getProductValues( $listing ) {
		$product_id     = $listing['post_id'];

		WPLA()->logger->debug('getProductValues for '.$listing['sku'].' - ID '.$product_id);

		// set correct variation_id for variations
		$wc_product = wc_get_product( $product_id );
		$product_type = $wc_product->get_type();
		$variation_id = $product_id;

		if ( $product_type == 'variation' || $product_type == 'product-part-variation' ) {
			// set the $product_id to the parent's ID
			$product_id = \WPLA_ProductWrapper::getVariationParent( $variation_id );
		}

		// get custom parent product level feed properties - and merge with profile columns
		$product_level_properties = $this->getProductCustomProperties( $product_id );

		return $product_level_properties;
	}

	/**
	 * @param array $listing
	 * @param WPLA_AmazonProfile $profile
	 *
	 * @return string
	 */
	public function getListingProductType( $listing, $profile ) {
		$product_id = $listing['parent_id'] ?: $listing['post_id'];

		// load the product type from the product
		$product_type = get_post_meta( $product_id, '_wpla_custom_product_type', true );

		if ( !$product_type && $profile->id ) {
			$product_type   = $profile->product_type;
		}

		// If there's still no product type at this point, use the generic PRODUCT product type and
		// assume that this is ListingLoader or PnQ feed type
		if ( !$product_type ) {
			$product_type = 'PRODUCT';
		}

		return $product_type;
	}

	/**
	 * @param array $listing
	 * @param WPLA_AmazonProfile $profile
	 *
	 * @return string
	 */
	private function getListingMarketplaceId( $listing, $profile ) {
		$marketplace_id = $profile->marketplace_id;

		if ( !$profile->id ) {
			$product_id = $listing['parent_id'] ?: $listing['post_id'];

			// load the marketplace from the product
			$marketplace_id = get_post_meta( $product_id, '_wpla_custom_marketplace_id', true );
		}

		if ( empty( $marketplace_id ) ) {
			// pull from the listing account
			$marketplace_id = WPLA()->accounts[ $listing['account_id'] ]->marketplace_id;
		}

		return $marketplace_id;
	}

	/**
	 * @param array $listing
	 * @param WPLA_AmazonProfile $profile
	 *
	 * @return bool
	 */
	private function isFba( $listing, $profile ) {
		$fba_enabled = false;

		$product_id     = $listing['parent_id'] ?: $listing['post_id'];
		$profile_fields = $profile->id ? maybe_unserialize( $profile->fields )  : array();

		// handle FBA mode / fallback
		if ( get_option( 'wpla_fba_enabled', 0 ) ) {
			if ( get_option('wpla_fba_enable_fallback') == 1 ) {
				// fallback enabled
				// if there is no FBA qty, FBA will be disabled
				$fba_enabled = $listing['fba_quantity'] > 0; // if there is FBA qty, always enable FBA
			} else {
				// fallback disabled
				$fba_enabled = $listing['fba_fcid'] && ( $listing['fba_fcid'] != 'DEFAULT' ) ; // regard fba_fcid column - ignore stock
			}
		}

		// if fulfillment_center_id / fulfillment-center-id is forced to AMAZON_NA / AMAZON_EU in the listing profile,
		// make sure to set $fba_enabled to regard this overwrite in ListingLoader feeds as well
		if ( ! empty( $profile_fields['fulfillment_center_id'] ) ) {
			$fba_enabled = ! ( $profile_fields['fulfillment_center_id'] == 'DEFAULT' || $profile_fields['fulfillment_center_id'] == '[---]' );
		}
		if ( ! empty( $profile_fields['fulfillment-center-id'] ) ) {
			$fba_enabled = ! ( $profile_fields['fulfillment-center-id'] == 'DEFAULT' || $profile_fields['fulfillment-center-id'] == '[---]' );
		}

		// handle FBA only mode - force FBA enabled if set
		// FBA needs to be enabled as well #29966
		$fba_only_mode = get_option( 'wpla_fba_only_mode', 0 );
		if ( get_option( 'wpla_fba_enabled', 0 ) && $fba_only_mode ) $fba_enabled = true;

		// handle FBA on product / variation level
		$fba_overwrite = get_post_meta( $product_id, '_amazon_fba_overwrite', true );
		if ( $fba_overwrite == 'FBA' ) {
			$fba_enabled = true;
		} elseif ( $fba_overwrite == 'FBM' ) {
			$fba_enabled = false;
		}

		return $fba_enabled;
	}

	/**
	 * @param WC_Product $product
	 * @return array
	 */
	private function getProductCustomProperties( $product_id ) {
		$custom_props = get_post_meta( $product_id, '_wpla_custom_feed_columns', true );

		if ( empty( $custom_props ) || !is_array( $custom_props ) ) {
			$custom_props = [];
		}

		$converter = new ProfileProductTypeConverter();
		return $converter->convertFromArray( $custom_props );
	}

	/**
	 * Get the Product Type schema from cache
	 * @param string $product_type
	 * @param string $marketplace_id
	 *
	 * @return object
	 */
	private function getSchemaFromCache( $product_type, $marketplace_id ) {
		$key = $product_type .'_'. $marketplace_id;

		if ( isset( $this->schema_cache[ $key ] ) ) {
			return $this->schema_cache[ $key ];
		}

		$types_mdl  = new \WPLab\Amazon\Models\AmazonProductTypesModel();
		$type_obj   = $types_mdl->getDefinitionsProductType( $product_type, $marketplace_id, true );
		
		if ( ! $type_obj ) {
			return null;
		}
		
		$schema     = json_decode( $type_obj->getSchema(), true );

		$this->schema_cache[ $key ] = $schema;

		return $schema;
	}

	/**
	 * Run some basic check to see if this listing can be submitted to Amazon
	 *
	 * @param array $item
	 * @param WPLA_AmazonProfile $profile
	 *
	 * @return bool
	 */
	public function canSubmitListing( $item, $profile ) {
		WPLA()->logger->info('canSubmitListing() - id: '.$item['post_id']);

		// get WooCommerce product data
		$product_id      = $item['post_id'];
		$product         = wc_get_product( $product_id );
		$profile_details = maybe_unserialize( $profile->details );

		if ( ! $product || !$item['sku'] || !$product->exists() ) {
			WPLA()->logger->info( $product_id .': Cannot submit a listing without a WC Product or an SKU' );
			return false;
		}

		WPLA()->logger->info('processing item '.$item['sku'].' - ID '.$product_id);

		// Skip listing parent variables if profile variations mode is FLAT #53534
		if ( is_array($profile_details) && $profile_details['variations_mode'] == 'flat' && $product->is_type( 'variable' ) ) {
			WPLA()->logger->debug('flat variations mode. skipping variable (parent)');
			return false;
		}

		if ( apply_filters( 'wpla_filter_skip_listing_feed_item', false, $item, $product, $profile ) === true ) {
			WPLA()->logger->info('Skipping adding listing to the feed - wpla_filter_skip_listing_feed_item returned TRUE');
			return false;
		}

		return true;
	}

	private function replaceShortcodes( $value, $property, $listing, $product_id, $profile ) {
		// use profile value as it is - if $value is still empty (ie. there is no product level value for this column)
		if ( $value === null || $value === '' ) {
			//$profile_fields  = $profile ? maybe_unserialize( $profile->fields )  : array();
			$profile_fields = !empty($profile->fields) ? maybe_unserialize($profile->fields) : array();
			$value = $profile_fields[ $property ] ?? '';
		}

		// If value is an array, process each element recursively
		if (is_array($value)) {
			foreach ($value as $k => $v) {
				$value[$k] = $this->replaceShortcodes($v, $property, $listing, $product_id, $profile);
			}
			return $value;
		}

		// Now $value is a string, so process shortcodes
		$product = wc_get_product( $listing['post_id'] );
		if ( preg_match_all( '/\[([^\]]+)\]/', $value, $matches ) ) {
			foreach ($matches[0] as $placeholder) {
				wpla_logger_start_timer('parseProfileShortcode');
				$value = self::parseProfileShortcode( $value, $placeholder, $listing, $product, $product_id, $profile );
				wpla_logger_end_timer('parseProfileShortcode');
			}
		}
		WPLA()->logger->debug( 'value after parseProfileShortcode: '. $value );

		return $value;
	}

	private function handleVariationAttributes( $value, $property, $listing, $product, $profile ) {
		// handle variation attribute values / attribute columns
		if ( in_array( $product->get_type(), array('variation','variable', 'variable-product-part', 'product-part-variation') ) ) {

			if ( substr( $property, 0, 6 ) == 'color[' || substr( $property, 0, 5 ) == 'size[' ) {
				wpla_logger_start_timer('parseVariationAttributeColumn');
				$value = self::parseVariationAttributeColumn( $value, $property, $listing, $product, $profile );
				wpla_logger_end_timer('parseVariationAttributeColumn');
			}
		}

		WPLA()->logger->debug( 'value after parseVariationAttributeColumn: '. $value );
		return $value;
	}

	private function handleSizeAttributes( $value, $property, $listing, $profile ) {
		/**
		 * Handle size columns and their size map conversions
		 */
		if ( $value ) {
			$custom_size_map = get_option( 'wpla_custom_size_map', array() );
			WPLA()->logger->info( 'Handling size columns: '. print_r( $property, true ) );
			//if ( isset( $profile_fields[$column] ) && ! empty( $profile_fields[$column] ) ) $value = $profile_fields[$column];
			WPLA()->logger->info( 'Current value: '. print_r($value, true) );

			if ( !empty( $custom_size_map[ $property ] ) ) {
				WPLA()->logger->info( 'Found size map for column' );

				$excluded_markets = get_option( 'wpla_sizemap_excluded_markets', array() );
				$item_market = WPLA()->accounts[ $listing['account_id'] ]->market_code;

				if ( in_array( $item_market, $excluded_markets ) ) {
					WPLA()->logger->info( 'Item is in the excluded markets sizemap array. Skipping mapping.' );
				} else {
					if ( array_key_exists( $value, $custom_size_map[ $property ] ) ) {
						$value = $custom_size_map[ $property ][ $value ];
						WPLA()->logger->info( 'Found replacement for value. New value: '. $value );
					}
				}
			}
		}

		return $value;
	}

	/**
	 * Remove empty fields. Empty fields are fields that have no properties or only have a marketplace_id and/or language_tag sub-property
	 * @param array $fields
	 *
	 * @return array
	 */
	private function filterEmptyFields($array) {
		foreach ($array as $key => $value) {
			if (is_array($value)) {
				// Recursively filter nested arrays
				$array[$key] = $this->filterEmptyFields($value);

				if ( $array[ $key ] == [] ) {
					unset( $array[ $key ] );
				} else {
					// Check if the remaining array contains only 'marketplace_id' and/or 'language_tag' and an empty value
					if ( array_diff_key($array[$key], ['marketplace_id' => '', 'language_tag' => '']) === []) {
						unset($array[$key]);
					}
				}
			} elseif ( $value == "" && !in_array( $key, ['marketplace_id', 'language_tag'] ) ) {
				unset( $array[ $key ] );
			}
		}
		return $array;
	}

	/**
	 * This fixes bullet_point and similar arrays from having gaps like [0,1,4] to [0,1,2]
	 * 
	 * @param array $array
	 * @return array
	 */
	private function reindexArrays( $array ) {
		// Arrays that should be converted from associative to indexed
		$arrays_to_reindex = [
			'bullet_point',
			'generic_keyword', 
			'special_features',
			'department',
			'lifestyle',
			'target_audience_keyword',
			'ingredients',
			'other_product_image_locator',
			'other_offer_image_locator'
		];
		
		foreach ( $array as $key => $value ) {
			if ( is_array( $value ) && in_array( $key, $arrays_to_reindex ) ) {
				// Check if this is an array with numeric keys (string or int)
				$keys = array_keys( $value );
				$has_numeric_keys = !empty( $keys ) && array_reduce( $keys, function( $carry, $k ) {
					return $carry && is_numeric( $k );
				}, true );
				
				if ( $has_numeric_keys ) {
					// Build a new indexed array
					$indexed_array = [];
					foreach ( $value as $item ) {
						$indexed_array[] = $item;
					}
					$array[ $key ] = $indexed_array;
				}
			}
		}
		
		return $array;
	}

	/**
	 * Recursively insert marketplace_id and language_tag values
	 * @param $fields
	 * @param $marketplace
	 * @param $language
	 *
	 * @return mixed
	 */
	private function insertMarketData( $fields, $marketplace, $language ) {
		foreach ( $fields as $key => $value ) {
			if ( is_array( $value ) ) {
				if ( isset( $value['marketplace_id'] ) ) {
					$value['marketplace_id'] = $marketplace;
				}

				if ( isset( $value['language_tag'] ) ) {
					$value['language_tag'] = $language;
				}
				$fields[ $key ] = $this->insertMarketData( $value, $marketplace, $language );
			}
		}

		return $fields;
	}

	private function buildQueryString( $fields ) {
		$str = '';

		if ( $fields ) {
			foreach ( $fields as $key => $value ) {
				if (is_array($value)) {
					foreach ($value as $v) {
						$str .= $key . '[]=' . urlencode($v) . '&';
					}
				} else {
					$str .= $key . '=' . urlencode($value) . '&';
				}
			}
			$str = rtrim( $str, '&' );
		}

		return $str;
	}

	/**
	 * Returns the basename of the property without its array structure (e.g. model_name[0][value] will be returned as model_name)
	 * @param string $property
	 *
	 * @return string
	 */
	private function getBaseProperty( $property ) {
		parse_str( $property, $parts );
		return array_key_first($parts);
	}

	/**
	 * @param array $listing
	 * @param WPLA_AmazonProfile $profile
	 * @param array $json_fields
	 *
	 * @return array
	 */

	private function getJsonFields( $listing, $profile, $json_fields = [] ) {
		if ( !empty( $json_fields ) ) {
			return $json_fields;
		}

		if ( !$profile->id ) {
			WPLA()->logger->info('no profile found, falling back to ListingLoader');
			$json_fields = $this->getInventoryLoaderFields();
		} else {
			$product_type = $this->getListingProductType( $listing, $profile );
			$marketplace_id = $this->getListingMarketplaceId( $listing, $profile );

			if ( !$product_type || !$marketplace_id ) {
				// this is not a valid request
				return '[]';
			}

			// Disable pricing modifications from the Price Based on Country plugin
			$this->disableCountryBasedPricing();

			$schema      = $this->getSchemaFromCache( $product_type, $marketplace_id );
			
			if ( ! $schema ) {
				return [];
			}
			
			$form_gen    = new AmazonSchemaFormGenerator( $schema );
			$json_fields = $form_gen->getFields();
		}

		return $json_fields;
	}

	private function getLanguageFromCache( $marketplace_id, $schema = null ) {
		if ( isset( $this->language_cache[ $marketplace_id ] ) ) {
			return $this->language_cache[ $marketplace_id ];
		}

		if ( $schema && !isset( $languages[ $marketplace_id ] ) ) {
			$this->languages_cache[ $marketplace_id ] = $schema['$defs']['language_tag']['default'];
			return $this->languages_cache[ $marketplace_id ];
		}

		return '';
	}

	public static function parseVariationAttributeColumn( $value, $column, $item, $product, $profile ) {
		$profile_fields  = $profile ? maybe_unserialize( $profile->fields )  : array();

		// skip if this is not an actual attribute column (like size_name or color_name)
		if ( in_array( $column, array( 'item_name', 'external_product_id_type', 'feed_product_type', 'brand_name' ) ) ) return $value;

		// Skip overriding the variation attribute if there's a profile value for it #55702
		if ( !empty( $profile_fields[ $column ] ) && apply_filters( 'wpla_override_variation_attribute_with_profile', false, $item, $column, $value, $profile ) ) {
			return $value;
		}

		// adjust some incompatible vtheme values
		$vtheme = $item['vtheme'];
		$vtheme = str_replace( 'Name', '', $vtheme ); 							// ColorName -> Color
		$vtheme = strtolower($vtheme) == 'sizecolor' ? 'Size-Color' : $vtheme; 	// sizecolor -> Size-Color
		$vtheme = strtolower($vtheme) == 'colorsize' ? 'Color-Size' : $vtheme; 	// colorsize -> Color-Size

		$vtheme_array   = explode( '-', $vtheme );
		$col_slug       = str_replace('_name', '', $column);
		$col_slug       = str_replace('_type', '', $col_slug);
		$attribute_name = false;

		// filter attributes used in variation-theme - maybe this should be moved to parseProductColumn() above...
		foreach ($vtheme_array as $vtheme_attribute) {
			$vtheme_attribute = self::convertToEnglishAttributeLabel( $vtheme_attribute );
			if ( strstr( $col_slug, strtolower($vtheme_attribute) ) !== false )
				$attribute_name = $vtheme_attribute;
		}
		if ( ! $attribute_name ) return $value;

		// parent product should have empty attributes
		if ( $product->get_type() == 'variable' || $product->get_type() == 'variable-product-part' ) return '';

		// find variation
		// $variations = WPLA_ProductWrapper::getVariations( $product->id );
		$parent_id = \WPLA_ProductWrapper::getVariationParent( wpla_get_product_meta( $product, 'id' ) );
		$variations = WPLA()->memcache->getProductVariations( $parent_id );

		foreach ($variations as $var) {
			if ( $var['sku'] == $item['sku'] ) {
				// find attribute value
				foreach ( $var['variation_attributes'] as $attribute_label => $attribute_value ) {
					$translated_label = self::convertToEnglishAttributeLabel( $attribute_label );
					if ( $translated_label == $attribute_name ) {
						// $value = utf8_decode( $attribute_value ); // Amazon is supposed to use UTF, but de facto accepts only ISO-8859-1/15
						$value = $attribute_value;
					}
				}
				// // find attribute value - doesn't work for non-english attributes
				// if ( isset( $var['variation_attributes'][$attribute_name] ) ) {
				// 	$value = $var['variation_attributes'][$attribute_name];
				// }
			}
		}

		return $value;
	} // parseVariationAttributeColumn()

}