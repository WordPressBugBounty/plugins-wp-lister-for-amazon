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

	/**
	 * Initialize the converter with optional profile and product type
	 *
	 * @param \WPLA_AmazonProfile|null $profile The Amazon profile instance
	 * @param string|null $product_type The product type identifier
	 */
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

	/**
	 * Set the Amazon profile instance
	 *
	 * @param \WPLA_AmazonProfile $profile The Amazon profile instance
	 * @return $this For method chaining
	 */
	public function setProfile( $profile ) {
		$this->profile = $profile;
		return $this;
	}

	/**
	 * Get the current Amazon profile instance
	 *
	 * @return \WPLA_AmazonProfile The Amazon profile instance
	 */
	public function getProfile() {
		return $this->profile;
	}

	/**
	 * Set the product type identifier
	 *
	 * @param string $product_type The product type identifier
	 * @return $this For method chaining
	 */
	public function setProductType( $product_type ) {
		$this->product_type = $product_type;
		return $this;
	}

	/**
	 * Get the current product type identifier
	 *
	 * @return string|null The product type identifier
	 */
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

	/**
	 * Convert an entire profile from old format to new product type format and save it
	 *
	 * @return \WPLA_AmazonProfile The converted and updated profile
	 */
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

				// Apply unit conversion for unit fields
				if ( strpos( $key, '_unit_of_measure' ) !== false ) {
					$value = $this->convertUnit( $value );
				}

				$fields[ $new_key ] = $value;
			} else {
				$unmapped[ $key ] = $value;
			}
			unset( $fields[ $key ] );
		}
		
		// Handle ASIN conversion after all fields are processed
		$this->handleAsinConversion( $fields );
		
		$fields['__unmapped']   = $unmapped;
		$fields['__old_fields'] = $old_fields;

		return $fields;
	}

	/**
	 * Get the field mapping array from CSV file
	 * Downloads the mapping file if it doesn't exist locally
	 *
	 * @return array Associative array mapping old field names to new field names
	 */
	public function getMap() {
		if ( !$this->mapFileExists() ) {
			$this->downloadMapFile();
		}

		return $this->loadMapFile();
	}

	/**
	 * Get the marketplace ID for a given feed template
	 *
	 * @param int $tpl_id The feed template ID
	 * @return string|null The marketplace ID or null if not found
	 */
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
	 * 
	 * @return array Associative array with template IDs as keys and arrays of product IDs as values
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
	 * 
	 * @param int $tpl_id The feed template ID to search for
	 * @return array Array of product IDs using the specified template
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

	/**
	 * Set the marketplace ID on the profile based on the associated feed template
	 * 
	 * @return void
	 */
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
	 * Extract and return the product type from the profile's feed_product_type field
	 * Removes the field from the profile fields after extraction
	 *
	 * @return string|null The product type in uppercase, or null if not found
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

	/**
	 * Replace the last occurrence of a string in the given string
	 *
	 * @param string $search The string to search for
	 * @param string $replace The replacement string
	 * @param string $str The string to search in
	 * @return string The modified string
	 */
	private function replaceLastString( $search , $replace , $str ) {
	    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
	        $search_length  = strlen( $search );
	        $str    = substr_replace( $str , $replace , $pos , $search_length );
	    }
		return $str;
	}

	/**
	 * Download the field mapping CSV file from the remote server
	 * 
	 * @todo Add a routine to check for CSV updates
	 * @return bool True if download and file move was successful, false otherwise
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

	/**
	 * Check if the mapping CSV file exists locally
	 *
	 * @return bool True if the file exists, false otherwise
	 */
	private function mapFileExists() {
		return file_exists( $this->file_path );
	}

	/**
	 * Load and parse the mapping CSV file into an associative array
	 * 
	 * @return array Associative array mapping old field names to new field names
	 */
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
		$csv[ 'fulfillment_latency' ]               = 'fulfillment_availability[0][lead_time_to_ship_max_days]';
		$csv[ 'standard_price' ]                    = 'purchasable_offer[0][our_price][0][schedule][0][value_with_tax]';
		$csv[ 'sale_price' ]                        = 'purchasable_offer[0][discounted_price][0][schedule][0][value_with_tax]';
		$csv[ 'sale_from_date' ]                    = 'purchasable_offer[0][discounted_price][0][schedule][0][start_at]';
		$csv[ 'sale_end_date' ]                     = 'purchasable_offer[0][discounted_price][0][schedule][0][end_at]';
		$csv[ 'package_height_unit_of_measure' ]    = 'item_package_dimensions[0][height][unit]';
		$csv[ 'package_width_unit_of_measure' ]     = 'item_package_dimensions[0][width][unit]';
		$csv[ 'package_length_unit_of_measure' ]    = 'item_package_dimensions[0][length][unit]';
		$csv[ 'package_weight_unit_of_measure' ]    = 'item_weight[0][unit]';

		// remove the header
		array_shift($csv);

		return apply_filters( 'wpla_product_type_converter_map', $csv );
	}

	/**
	 * Convert a JSON path from the API schema to a form field name
	 * 
	 * @param string $path The JSON path (e.g., '/attributes/purchasable_offer/0/our_price')
	 * @return string The converted field name (e.g., 'purchasable_offer[0][our_price]')
	 */
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

	/**
	 * Convert old unit values to new unit values
	 * 
	 * @param string $old_unit The old unit value
	 * @return string The new unit value
	 */
	private function convertUnit( $old_unit ) {
		$unit_mapping = [
			// Length/Distance units (old => new)
			'Angstrom'                  => 'angstrom',
			'Mils'                      => 'mils',
			'Yards'                     => 'yards', 
			'Picometer'                 => 'picometer',
			'Miles'                     => 'miles',
			'DM'                        => 'decimeters',
			'MM'                        => 'millimeters',
			'M'                         => 'meters',
			'IN'                        => 'inches',
			'FT'                        => 'feet',
			'CM'                        => 'centimeters',
			'Hundredths-Inches'         => 'hundredths_inches',
			'Nanometer'                 => 'nanometer',
			'uM'                        => 'micrometer',
			'Kilometers'                => 'kilometers',
			'Millimeters'               => 'millimeters',
			'Meters'                    => 'meters',
			'Inches'                    => 'inches',
			'Feet'                      => 'feet',
			'Centimeters'               => 'centimeters',
			'Micron'                    => 'micrometer',
			'Decimeters'                => 'decimeters',
			
			// Weight units (old => new)
			'LB'                        => 'pounds',
			'KG'                        => 'kilograms',
			'GR'                        => 'grams',
			'Hundredths Pounds'         => 'hundredths_pounds',
			'MG'                        => 'milligrams',
			'Tons'                      => 'tons',
			'OZ'                        => 'ounces',
		];

		return isset( $unit_mapping[ $old_unit ] ) ? $unit_mapping[ $old_unit ] : strtolower( $old_unit );
	}

	/**
	 * Handle ASIN conversion special case
	 * If external_product_id_type is ASIN, move the external_product_id value to merchant_suggested_asin
	 * 
	 * @param array &$fields Reference to the fields array
	 */
	private function handleAsinConversion( &$fields ) {
		// Check if we have ASIN type and external product ID
		$external_id_type_field  = 'externally_assigned_product_identifier[0][type]';
		$external_id_value_field = 'externally_assigned_product_identifier[0][value]';
		
		if ( isset( $fields[ $external_id_type_field ] ) && 
			 $fields[ $external_id_type_field ] === 'ASIN' && 
			 isset( $fields[ $external_id_value_field ] ) ) {
			
			// Move the ASIN value to merchant_suggested_asin
			$fields['merchant_suggested_asin[0][value]'] = $fields[ $external_id_value_field ];
			
			// Remove the external_product_id fields since ASIN is now in its own field
			unset( $fields[ $external_id_type_field ] );
			unset( $fields[ $external_id_value_field ] );
		}
	}

	/**
	 * Get the local file path for the mapping CSV file
	 *
	 * @return string The full path to the mapping file
	 */
	private function getFilePath() {
		$upload_dir   = wp_upload_dir();
		$basedir_name = 'wp-lister/';
		return $upload_dir['basedir'].'/'.$basedir_name .'product-types-map.csv';
	}

	/**
	 * Transform nested arrays into flat form field names
	 * 
	 * This method converts nested array structures back into the flat field names
	 * that the form expects. For example:
	 * ['purchasable_offer' => [0 => ['our_price' => ['schedule' => [0 => ['value_with_tax' => '[product_price]']]]]]]
	 * becomes:
	 * ['purchasable_offer[0][our_price][schedule][0][value_with_tax]' => '[product_price]']
	 *
	 * @param array $data The nested array data
	 * @param string $prefix Current field prefix for recursion
	 * @return array Flattened array with form field names as keys
	 */
	public function flattenNestedArrayToFormFields( $data, $prefix = '' ) {
		$flattened = [];
		
		if ( !is_array( $data ) ) {
			return [ $prefix => $data ];
		}
		
		foreach ( $data as $key => $value ) {
			$current_key = $prefix === '' ? $key : $prefix . '[' . $key . ']';
			
			if ( is_array( $value ) && !empty( $value ) ) {
				// Recursively flatten nested arrays
				$nested_flattened = $this->flattenNestedArrayToFormFields( $value, $current_key );
				$flattened = array_merge( $flattened, $nested_flattened );
			} else {
				// This is a leaf value
				$flattened[ $current_key ] = $value;
			}
		}
		
		return $flattened;
	}

	/**
	 * Transform flat form field names into nested arrays
	 * 
	 * This method converts flat field names back into nested array structures.
	 * For example:
	 * ['purchasable_offer[0][our_price][schedule][0][value_with_tax]' => '[product_price]']
	 * becomes:
	 * ['purchasable_offer' => [0 => ['our_price' => ['schedule' => [0 => ['value_with_tax' => '[product_price]']]]]]]
	 *
	 * @param array $data The flat array data with form field names as keys
	 * @return array Nested array structure
	 */
	public function expandFormFieldsToNestedArray( $data ) {
		$nested = [];
		
		foreach ( $data as $field_name => $value ) {
			$this->setNestedValue( $nested, $field_name, $value );
		}
		
		return $nested;
	}

	/**
	 * Set a value in a nested array using a field name path
	 * 
	 * @param array &$array The array to modify (passed by reference)
	 * @param string $field_name The field name path (e.g., 'purchasable_offer[0][our_price]')
	 * @param mixed $value The value to set
	 */
	private function setNestedValue( &$array, $field_name, $value ) {
		// Parse the field name to extract the path components
		$path = $this->parseFieldNamePath( $field_name );
		
		// Navigate through the nested array, creating structure as needed
		$current = &$array;
		foreach ( $path as $key ) {
			if ( !isset( $current[ $key ] ) ) {
				$current[ $key ] = [];
			}
			$current = &$current[ $key ];
		}
		
		// Set the final value
		$current = $value;
	}

	/**
	 * Parse a field name path into its components
	 * 
	 * @param string $field_name The field name (e.g., 'purchasable_offer[0][our_price][schedule][0][value_with_tax]')
	 * @return array Array of path components
	 */
	private function parseFieldNamePath( $field_name ) {
		$path = [];
		
		// Split on brackets to get the main field and sub-fields
		if ( preg_match('/^([^\[]+)(.*)$/', $field_name, $matches) ) {
			$path[] = $matches[1]; // Main field name
			
			// Extract all bracketed components
			if ( !empty( $matches[2] ) ) {
				preg_match_all('/\[([^\]]+)\]/', $matches[2], $bracket_matches);
				foreach ( $bracket_matches[1] as $component ) {
					// Convert numeric strings to integers for array indices
					$path[] = is_numeric( $component ) ? (int)$component : $component;
				}
			}
		}
		
		return $path;
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