<?php
/**
 * Constants
 */
// This site is an INN Member
if ( ! defined( 'INN_MEMBER' ) ) {
        define( 'INN_MEMBER', true );
}
// This site is hosted by INN
if ( ! defined( 'INN_HOSTED' ) ) {
        define( 'INN_HOSTED', true );
}

/**
 * Include compiled style.css
 */
function nmindepth_stylesheet() {
	wp_dequeue_style( 'largo-child-styles' );

	$suffix = (LARGO_DEBUG)? '' : '.min';

	wp_enqueue_style( 'nmindepth', get_stylesheet_directory_uri().'/css/nmindepth' . $suffix . '.css' );
	wp_dequeue_style( 'homepage-slider' );
	wp_dequeue_style( 'homepage-slider-css' );

}
add_action( 'wp_enqueue_scripts', 'nmindepth_stylesheet', 999 );

// load custom homepage
require_once( get_stylesheet_directory() . '/homepages/homepage.php' );