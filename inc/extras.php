<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package whimsy
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function whimsy_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'whimsy_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function whimsy_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'whimsy_body_classes' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function whimsy_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}
add_action( 'wp', 'whimsy_setup_author' );


/**
 * Load theme-specific extensions.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function whimsy_load_extensions() {
    
    require_if_theme_supports( 'whimsy-hooks', get_template_directory_uri() . '/inc/hooks.php' );
    
    require_if_theme_supports( 'whimsy-custom-header', get_template_directory_uri() . '/inc/custom-header.php' );
    
    require_if_theme_supports( 'whimsy-template-tags', get_template_directory_uri() . '/inc/template-tags.php' );
    
    require_if_theme_supports( 'whimsy-extras', get_template_directory_uri() . '/inc/extras.php' );
    
    require_if_theme_supports( 'whimsy-customizer', get_template_directory_uri() . '/inc/customizer.php' );
    
    require_if_theme_supports( 'whimsy-widgets', get_template_directory_uri() . '/inc/widgets.php' );
    
    require_if_theme_supports( 'whimsy-plugins', get_template_directory_uri() . '/inc/plugins.php' );
    
    require_if_theme_supports( 'whimsy-jetpack', get_template_directory_uri() . '/inc/plugins/jetpack.php' );
    
    require_if_theme_supports( 'whimsy-woocommerce', get_template_directory_uri() . '/inc/plugins/woocommerce.php' );
    
    require_if_theme_supports( 'whimsy-edd', get_template_directory_uri() . '/inc/plugins/edd.php' );

}

/* Include custom Whimsy extensions. */
add_action( 'after_setup_theme', 'whimsy_load_extensions', 15 );