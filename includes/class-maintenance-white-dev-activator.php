<?php

/**
 * Fired during plugin activation
 *
 * @link       www.whitedev.co.uk
 * @since      1.0.0
 *
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/includes
 * @author     Jason White <jason@whitedev.co.uk>
 */
class Maintenance_White_Dev_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'test';

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			views smallint(5) NOT NULL,
			clicks smallint(5) NOT NULL,
			UNIQUE KEY id (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		////

		// Saved Page Arguments
		$saved_page_args = array(
			'post_title'   => __( 'Saved', 'toptal-save' ),
			'post_content' => '[toptal-saved]',
			'post_status'  => 'publish',
			'post_type'    => 'page'
		);
		// Insert the page and get its id.
		$saved_page_id = wp_insert_post( $saved_page_args );
		
		// Save page id to the database.
		add_option( 'toptal_save_saved_page_id', $saved_page_id );

	}

}
