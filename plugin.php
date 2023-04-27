<?php
/**
 * Plugin Name: Fonts API BC Layer Test Plugin
 * Plugin URI: https://github.com/wordpress/gutenberg
 * Description: Tests the Fonts API BC Layer by using deprecated functionality.
 * Requires at least: 6.2
 * Requires PHP: 5.6
 * Version: 1.0.0
 * Author: Gutenberg Team
 */
namespace FontsAPI_BCLayer_Tester;

add_action( 'after_setup_theme', __NAMESPACE__ . '\init' );
function init() {
	if ( ! function_exists( 'wp_register_webfont_provider' ) || ! function_exists( 'wp_register_webfonts' ) ) {
		return;
	}

	require_once __DIR__ . '/provider.php';
	wp_register_webfont_provider( 'bc-layer', '\FontsAPI_BCLayer_Tester\Provider' );

	$url   = plugin_dir_url( __FILE__ );
	$fonts = array(
		array(
			'provider'    => 'bc-layer',
			'font-family' => 'Poppins',
			'font-weight' => '400',
			'font-style'  => 'normal',
			'src'         => $url . 'assets/fonts/Poppins/Poppins-Regular.ttf',
		),
		array(
			'provider'    => 'bc-layer',
			'font-family' => 'Poppins',
			'font-weight' => '100 900',
			'font-style'  => 'italic',
			'src'         => $url . 'assets/fonts/Poppins/Poppins-Italic.ttf',
		),
	);

	wp_register_webfonts( $fonts );
	wp_enqueue_webfonts( array( 'poppins' ) );
}
