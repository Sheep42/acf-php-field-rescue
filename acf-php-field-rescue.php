<?php
/**
 * Plugin Name: ACF PHP Field Rescue
 * Author: Dan Shedd
 * Author URI: https://dshedd.com/
 * Description: Need to sync ACF fields from a php export? This plugin will package them up into a json import for you.
 */

add_action( 'admin_init', function() {

	if( function_exists( 'acf_get_local_field_groups') && function_exists( 'acf_get_fields' ) ) {
	
		// Get an array of all field groups
		$field_groups = acf_get_local_field_groups();
		
		if( !empty( $field_groups ) ) {
	
			foreach( $field_groups as &$field_group ) {
				
				$fields = acf_get_fields( $field_group );
				$field_group['fields'] = $fields;
				
			}
			
			$json = json_encode( $field_groups, JSON_PRETTY_PRINT );
			file_put_contents( ABSPATH . apply_filters( 'acf_field_sync_output', '/wp-content/uploads/acf.json' ), $json );
		
		}
	
	}

});