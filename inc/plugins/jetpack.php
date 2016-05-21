<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package whimsy
 */

function whimsy_jetpack_setup() {
	/**
	 * Add theme support for Infinite Scroll.
	 * See: https://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'type'      => 'click',
		'container' => 'main',
		'render'    => 'whimsy_infinite_scroll_render',
		'footer'    => false,
	) );

	/**
	 * Add theme support for Responsive Videos.
	 * See: https://jetpack.me/support/responsive-videos/
	 */
	add_theme_support( 'jetpack-responsive-videos' );
} // end function whimsy_jetpack_setup
add_action( 'after_setup_theme', 'whimsy_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function whimsy_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function whimsy_infinite_scroll_render