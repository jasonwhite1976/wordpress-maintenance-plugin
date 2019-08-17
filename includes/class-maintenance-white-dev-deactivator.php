<?php

/**
 * Fired during plugin deactivation
 *
 * @link       www.whitedev.co.uk
 * @since      1.0.0
 *
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/includes
 * @author     Jason White <jason@whitedev.co.uk>
 */
class Maintenance_White_Dev_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		/* 
		* Making WPDB as global
		* to access database information.
		*/
		global $wpdb;

		/* 
		* @var $table_name 
		* name of table to be dropped
		* prefixed with $wpdb->prefix from the database
		*/
		$table_name = $wpdb->prefix . 'test';

		// drop the table from the database.
		$wpdb->query( "DROP TABLE IF EXISTS $table_name" );

		////

		// Get Saved page id.
		$saved_page_id = get_option( 'toptal_save_saved_page_id' );

		// Check if the saved page id exists.
		if ( $saved_page_id ) {

			// Delete saved page.
			wp_delete_post( $saved_page_id, true );

			// Delete saved page id record in the database.
			delete_option( 'toptal_save_saved_page_id' );

		}

	}

}
