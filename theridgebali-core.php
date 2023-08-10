<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ardika.id
 * @since             1.0.0
 * @package           Theridgebali_Core
 *
 * @wordpress-plugin
 * Plugin Name:       The Ridge Bali Core Plugin
 * Plugin URI:        https://ardika.id
 * Description:       This Core Plugin for Wordpress Theme The Ridge Bali
 * Version:           1.0.0
 * Author:            Ardika
 * Author URI:        https://ardika.id
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       theridgebali-core
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
define( 'THERIDGEBALI_CORE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-theridgebali-core-activator.php
 */
function activate_theridgebali_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-theridgebali-core-activator.php';
	Theridgebali_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-theridgebali-core-deactivator.php
 */
function deactivate_theridgebali_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-theridgebali-core-deactivator.php';
	Theridgebali_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_theridgebali_core' );
register_deactivation_hook( __FILE__, 'deactivate_theridgebali_core' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-theridgebali-core.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_theridgebali_core() {

	$plugin = new Theridgebali_Core();
	$plugin->run();

}
run_theridgebali_core();
