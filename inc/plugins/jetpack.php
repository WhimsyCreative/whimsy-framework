<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package whimsy
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function whimsy_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container' => 'main',
		'footer'    => false,
	) );
}
add_action( 'after_setup_theme', 'whimsy_jetpack_setup' );
