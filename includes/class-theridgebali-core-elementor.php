<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://ardika.id
 * @since      1.0.0
 *
 * @package    Theridgebali_Core
 * @subpackage Theridgebali_Core/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Theridgebali_Core
 * @subpackage Theridgebali_Core/includes
 * @author     Ardika <hai@ardika.id>
 */
function add_theridgebali_core_categories( $elements_manager ) {

    $elements_manager->add_category(
        'ab-theridgebali-category',
        [
            'title' => esc_html__( 'The Ridge Bali Widget', 'theridgebali-core' ),
            'icon' => 'fa fa-plug',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_theridgebali_core_categories' );

function register_theridgebali_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/the-ridge-widget-1.php' );

    $widgets_manager->register( new \Elementor_TheRidgeBali_Widget_1() );
}
add_action( 'elementor/widgets/register', 'register_theridgebali_widget' );

function theridgebali_stylesheets() {
	wp_register_style( 'bootstrap-css', plugins_url( 'public/css/bootstrap.min.css', __FILE__ ) );
	wp_enqueue_style( 'bootstrap-css' );
}
add_action( 'elementor/frontend/after_enqueue_styles', 'theridgebali_stylesheets' );


function theridgebali_scripts() {

	wp_register_script( 'bootstrap-script', plugins_url( 'public/js/bootstrap.bundle.min.js', __FILE__ ) );

	wp_enqueue_script( 'bootstrap-script' );

}
add_action( 'elementor/frontend/after_register_scripts', 'theridgebali_scripts' );