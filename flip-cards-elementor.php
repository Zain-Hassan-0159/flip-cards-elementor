<?php

/**
 * Plugin Name:       Flip Cards Addon
 * Description:       Flip Cards Addon for Elemenor is created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hz-widgets
*/

if(!defined('ABSPATH')){
exit;
}

function hz_el_category( $elements_manager ) {

	$elements_manager->add_category(
		'hz-el-widgets',
		[
			'title' => esc_html__( 'Custom Widgets', 'hz-widgets' ),
			'icon' => 'fa fa-plug',
		]
	);

}
add_action( 'elementor/elements/categories_registered', 'hz_el_category' );


function register_hz_flip_card_widget( $widgets_manager ) {
	require_once( __DIR__ . '/inc/flip-cards.php' );
	$widgets_manager->register( new \hz_Flip_Cards );
}
add_action( 'elementor/widgets/register', 'register_hz_flip_card_widget' );

function hz_register_dependencies_scripts() {
	wp_register_style( 'flip-cards', plugins_url( 'inc/assets/css/flip-cards.css', __FILE__ ));

	/* Scripts */
	wp_register_script( 'flip-cards', plugins_url( 'inc/assets/js/flip-cards.js', __FILE__ ));

}
add_action( 'wp_enqueue_scripts', 'hz_register_dependencies_scripts' );





