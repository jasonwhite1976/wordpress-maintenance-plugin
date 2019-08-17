<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.whitedev.co.uk
 * @since             1.0.0
 * @package           Maintenance_White_Dev
 *
 * @wordpress-plugin
 * Plugin Name:       Coming Soon & Maintenance Mode - White Dev
 * Plugin URI:        
 * Description:       Show a 'coming soon' or 'maintenance mode' landing page for your website. Alter text, backgrounds and show a launch-date countdown.
 * Version:           1.0.0
 * Author:            White Dev
 * Author URI:        www.whitedev.co.uk
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       maintenance-white-dev
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MAINTENANCE_WHITE_DEV_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-maintenance-white-dev-activator.php
 */
function activate_maintenance_white_dev() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-white-dev-activator.php';
	Maintenance_White_Dev_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-maintenance-white-dev-deactivator.php
 */
function deactivate_maintenance_white_dev() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-white-dev-deactivator.php';
	Maintenance_White_Dev_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_maintenance_white_dev' );
register_deactivation_hook( __FILE__, 'deactivate_maintenance_white_dev' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-maintenance-white-dev.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_maintenance_white_dev() {

	$plugin = new Maintenance_White_Dev();
	$plugin->run();

}
run_maintenance_white_dev();