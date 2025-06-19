<?php

namespace WPLab\Amazon\Helper;

use WPLab\Amazon\Core\AmazonProductType;
use WPLab\Amazon\SellingPartnerApi\Model\ProductTypeDefinitionsV20200901\ProductType;

/**
 * Helper class that converts Flat File profile fields to the new Product Types API
 * @todo Add a routine to check for CSV updates
 * @todo Add a tool to update the CSV on demand
 */
class ProfileProductTypeConverter {

	private string $remote_file = 'https://update.wplister.com/wpla/json-mapping.csv';
	private string $file_path;
	private string $file;
	private \WPLA_AmazonProfile $profile;

	private $product_type;

	public function __construct( $profile = null, $product_type = null ) {
		$this->file_path = $this->getFilePath();

		if ( is_null( $profile ) ) {
			$profile = new \WPLA_AmazonProfile();
		}

		if ( !is_null( $product_type ) ) {
			$this->product_type = $product_type;
		}

		$this->profile = $profile;
	}

	public function setProfile( $profile ) {
		$this->profile = $profile;
		return $this;
	}

	public function getProfile() {
		return $this->profile;
	}

	public function setProductType( $product_type ) {
		$this->product_type = $product_type;
		return $this;
	}

	public function getProductType() {
		return $this->product_type;
	}

	/**
	 * Map feed template fields to their appropriate product type properties
	 *
	 * @param \WPLA_AmazonProfile $profile
	 *
	 * @return \WPLA_AmazonProfile
	 */
	public function convertFields() {
		$this->setMarketplaceFromTemplate();

		// assign feed_product_type to the product type profile property
		$product_type = $this->product_type ?? $this->getProductTypeFromProfile();
		$this->profile->product_type = $product_type;
		$this->profile->fields = $this->convertFromArray( maybe_unserialize( $this->profile->fields ) );

		return $this->profile;
	}

	public function convertProfile() {
		// handle double-serialized fields
		$this->profile->fields = maybe_unserialize( $this->profile->fields );
		$this->convertFields();
		$this->profile->profile_name = $this->replaceLastString( '(duplicated)', '(Converted)', $this->profile->profile_name );
		$this->profile->tpl_id = 0;
		$this->profile->update();
		return $this->profile;
	}

	/**
	 * Convert product-level attributes to product type properties
	 *
	 * @param array $fields
	 *
	 * @return array
	 */
	public function convertFromArray( $fields ) {
		$old_fields = [];
		$unmapped   = [];

		if ( !$this->needsConversion( $fields ) ) {
			return $fields;
		}

		// This is for checking if the field names have already been mapped
		$map        = $this->getMap();
		$map_values = array_values( $map );

		foreach ( $fields as $key => $value ) {
			if ( in_array( $key, $map_values ) || strpos( $key, '[marketplace_id]' ) || strpos( $key, '[language_tag]' ) ) {
				// already mapped
				continue;
			}

			if ( isset( $map[ $key ] ) ) {
				// found a matching field name!
				$new_key            = $map[ $key ];
				$old_fields[ $key ] = $value;

				$fields[ $new_key ] = $value;
			} else {
				$unmapped[ $key ] = $value;
			}
			unset( $fields[ $key ] );
		}
		$fields['__unmapped']   = $unmapped;
		$fields['__old_fields'] = $old_fields;

		return $fields;
	}

	public function getMap() {
		if ( !$this->mapFileExists() ) {
			$this->downloadMapFile();
		}

		return $this->loadMapFile();
	}

	public function getFeedTemplateMarketplace( $tpl_id ) {
		global $wpdb;

		return $wpdb->get_var( $wpdb->prepare(
			"SELECT m.marketplace_id
			FROM {$wpdb->prefix}amazon_feed_templates t, {$wpdb->prefix}amazon_markets m
			WHERE t.site_id = m.id
			AND t.id = %d",
			$tpl_id
		) );
	}

	/**
	 * @param $tpl_id
	 *
	 * @return false|AmazonProductType[]
	 */
	public function getRecommendedProductTypeFromTemplate( $tpl_id ) {
		global $wpdb;

		$info = $wpdb->get_row( $wpdb->prepare(
			"SELECT t.title, m.marketplace_id
			FROM {$wpdb->prefix}amazon_feed_templates t, {$wpdb->prefix}amazon_markets m
			WHERE t.site_id = m.id
			AND t.id = %d",
			$tpl_id
		) );

		if ( !$info ) {
			return false;
		}

		if ( in_array( strtolower( $info->title ), ['offer', 'inventoryloader', 'inventory loader'] ) ) {
			$type = new \WPLab\Amazon\Core\AmazonProductType();
			$type
				->setDisplayName( 'PRODUCT')
				->setProductType('PRODUCT');
			return [
				$type
			];
		}

		$account_id = \WPLA_AmazonAccount::getAccountWithMarketplace( $info->marketplace_id );

		if ( !$account_id ) {
			$account_id = get_option( 'wpla_default_account_id', 1 );
		}
		$api = new \WPLA_Amazon_SP_API( $account_id );
		$result = $api->searchDefinitionsProductTypes( [$info->marketplace_id], $info->title );

		if ( \WPLA_Amazon_SP_API::isError( $result ) ) {
			WPLA()->logger->error( 'Error in searchDefinitionsProductTypes. '. $result->ErrorMessage );
			return false;
		}

		$recommendations = [];

		foreach ( $result->getProductTypes() as $item ) {
			$product_type = new AmazonProductType();
			$product_type
				->setDisplayName( $item->getDisplayName() )
				->setProductType( $item->getName() );
			$recommendations[] = $product_type;
		}

		return $recommendations;
	}

	/**
	 * Look for products that use custom feed templates and return them grouped by the template ID
	 * @return array
	 */
	public function getAllProductsUsingFeedTemplates() {
		global $wpdb;

		$rows = $wpdb->get_results("SELECT post_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key = '_wpla_custom_feed_tpl_id' AND meta_value <> ''" );
		$products = [];

		foreach ( $rows as $row ) {
			if ( get_post_meta( $row->post_id, '_wpla_custom_product_type', true ) ) {
				continue;
			}
			$products[ $row->meta_value ][] = $row->post_id;
		}

		return $products;
	}

	/**
	 * Look for products that use a specific custom feed template
	 * @return array
	 */
	public function getProductsUsingFeedTemplate( $tpl_id ) {
		global $wpdb;

		$rows = $wpdb->get_results($wpdb->prepare(
			"SELECT post_id, meta_value 
			FROM {$wpdb->postmeta} 
			WHERE meta_key = '_wpla_custom_feed_tpl_id' 
			AND meta_value = %d", $tpl_id
		) );
		$products = [];

		foreach ( $rows as $row ) {
			if ( get_post_meta( $row->post_id, '_wpla_custom_product_type', true ) ) {
				continue;
			}
			$products[] = $row->post_id;
		}

		return $products;
	}

	private function setMarketplaceFromTemplate() {
		global $wpdb;

		if ( empty( $this->profile->marketplace_id ) && $this->profile->tpl_id ) {
			$marketplace = $wpdb->get_var($wpdb->prepare(
				"SELECT m.marketplace_id
					FROM {$wpdb->prefix}amazon_markets m, {$wpdb->prefix}amazon_feed_templates t
					WHERE m.id = t.site_id
					AND t.id = %d",
				$this->profile->tpl_id) );

			if ( $marketplace ) {
				$this->profile->marketplace_id = $marketplace;
			}
		}
	}

	/**
	 * @param \WPLA_AmazonProfile $profile
	 *
	 * @return \WPLA_AmazonProfile
	 */
	private function getProductTypeFromProfile() {
		$product_type = null;

		// assign feed_product_type to the product type profile property
		if ( empty( $this->profile->product_type ) && isset( $this->profile->fields['feed_product_type'] ) ) {
			$product_type = strtoupper( $this->profile->fields['feed_product_type'] );
			unset( $this->profile->fields['feed_product_type'] );
		}

		return $product_type;
	}

	private function replaceLastString( $search , $replace , $str ) {
	    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
	        $search_length  = strlen( $search );
	        $str    = substr_replace( $str , $replace , $pos , $search_length );
	    }
		return $str;
	}

	/**
	 * @todo Add a routine to check for CSV updates
	 * @return bool
	 */
	private function downloadMapFile() {
		require_once(ABSPATH . 'wp-admin/includes/file.php');
		\WP_Filesystem();
		$filename = download_url( $this->remote_file );

		if ( is_wp_error( $filename ) ) {
			return false;
		}

		return rename( $filename, $this->file_path );
	}

	private function mapFileExists() {
		return file_exists( $this->file_path );
	}

	private function loadMapFile() {
		if ( !$this->mapFileExists() ) {
			return [];
		}

		//$csv = str_getcsv( file_get_contents( $this->file_path ) );

		/*$fp  = fopen( $this->file_path, 'r' );
		$csv = [];
		if ( $fp ) {
			while ( $row = fgetcsv( $fp, '1024' ) ) {
				$old_key = $row[0];
				$new_key = $this->convertPathToFieldname( $row[2] );
				$csv[ $old_key ] = $new_key;
			}

			fclose( $fp );
		}*/

		$fp  = fopen( $this->file_path, 'r' );
		$csv = [];

		if ( $fp ) {
			while ( ! feof( $fp ) ) {
				$line = fgets( $fp );
				if ( $line === false || trim( $line ) === '' ) {
					continue;
				}

				$row = explode( ',', trim( $line ) );

				// Make sure there are at least 3 columns
				if ( count( $row ) >= 3 ) {
					$old_key = $row[0];
					$new_key = $this->convertPathToFieldname( $row[2] );
					$csv[ $old_key ] = $new_key;
				}
			}

			fclose( $fp );
		}

		// add fields that are not in the map file
		$csv[ 'fulfillment_latency' ] = 'fulfillment_availability[0][lead_time_to_ship_max_days]';

		// remove the header
		array_shift($csv);

		return apply_filters( 'wpla_product_type_converter_map', $csv );
	}

	private function convertPathToFieldname( $path ) {
		// remove the /attributes/ prefix
		$path = str_replace( '/attributes/', '', $path );

		$parts  = explode( '/', $path );
		$fields = $parts[0];

		// remove the attribute name;
		array_shift( $parts );

		foreach ( $parts as $part ) {
			$fields .= '['. $part .']';
		}

		return $fields;
	}

	private function getFilePath() {
		$upload_dir   = wp_upload_dir();
		$basedir_name = 'wp-lister/';
		return $upload_dir['basedir'].'/'.$basedir_name .'product-types-map.csv';
	}

	/**
	 * Checks if the given fields/properties need to be converted or mapped
	 *
	 * @param array $fields
	 *
	 * @return bool
	 */
	private function needsConversion( $fields ) {
		// look for the pattern field_name[0][value]. If this pattern is found, then there's no need to convert
		$found = false;

		foreach ( $fields as $field => $value ) {
			if ( strpos( $field, '[0][value]' ) !== false ) {
				$found = true;
				break;
			}
		}

		return !$found;
	}

}