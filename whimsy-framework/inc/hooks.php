<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Whimsy Framework Hooks
 *
 * Defines all hooks available in the Whimsy Framework.
 *
 * whimsy_body_start
 * whimsy_header_before
 * whimsy_header_after
 * whimsy_header_inside_before
 * whimsy_header_inside_after
 * whimsy_nav_before
 * whimsy_nav_after
 * whimsy_nav_inside_before
 * whimsy_nav_inside_after
 *
 * whimsy_content_before
 * whimsy_content_after
 * whimsy_main_before
 * whimsy_main_after
 * whimsy_main_inside_before
 * whimsy_main_inside_after
 * whimsy_page_before
 * whimsy_page_after
 * whimsy_post_before
 * whimsy_post_after
 * whimsy_post_meta_before
 * whimsy_post_meta_after
 * whimsy_post_footer_before
 * whimsy_post_footer_after
 *
 * whimsy_sidebar_before
 * whimsy_sidebar_inside_before
 * whimsy_sidebar_inside_after
 * whimsy_sidebar_after
 * whimsy_sidebar_inside_widget_before
 * whimsy_sidebar_inside_widget_after
 * 
 * whimsy_footer_before
 * whimsy_footer_after
 * whimsy_footer_inside_before
 * whimsy_footer_inside_after
 * whimsy_body_end
 *
 */

// header.php
function whimsy_body_start() 					{ whimsy_do_atomic( 'whimsy_body_start' ); }
function whimsy_header_before() 				{ whimsy_do_atomic( 'whimsy_header_before' ); }
function whimsy_header_after() 					{ whimsy_do_atomic( 'whimsy_header_after' ); }
function whimsy_header_inside_before()			{ whimsy_do_atomic( 'whimsy_header_inside_before' ); }
function whimsy_header_inside_after()			{ whimsy_do_atomic( 'whimsy_header_inside_after' ); }
function whimsy_nav_before() 					{ whimsy_do_atomic( 'whimsy_nav_before' ); }
function whimsy_nav_after() 					{ whimsy_do_atomic( 'whimsy_nav_after' ); }
function whimsy_nav_inside_before() 			{ whimsy_do_atomic( 'whimsy_nav_inside_before' ); }
function whimsy_nav_inside_after() 				{ whimsy_do_atomic( 'whimsy_nav_inside_after' ); }

// Content
function whimsy_content_before() 				{ whimsy_do_atomic( 'whimsy_content_before' ); }
function whimsy_content_after() 				{ whimsy_do_atomic( 'whimsy_content_after' ); }
function whimsy_main_before() 					{ whimsy_do_atomic( 'whimsy_main_before' ); }
function whimsy_main_after() 					{ whimsy_do_atomic( 'whimsy_main_after' ); }
function whimsy_main_inside_before() 			{ whimsy_do_atomic( 'whimsy_main_inside_before' ); }
function whimsy_main_inside_after() 			{ whimsy_do_atomic( 'whimsy_main_inside_after' ); }
function whimsy_page_before() 					{ whimsy_do_atomic( 'whimsy_page_before' ); }
function whimsy_page_after() 					{ whimsy_do_atomic( 'whimsy_page_after' ); }
function whimsy_post_before() 					{ whimsy_do_atomic( 'whimsy_post_before' ); }
function whimsy_post_after() 					{ whimsy_do_atomic( 'whimsy_post_after' ); }
function whimsy_post_meta_before() 				{ whimsy_do_atomic( 'whimsy_post_meta_before' ); }
function whimsy_post_meta_after() 				{ whimsy_do_atomic( 'whimsy_post_meta_after' ); }
function whimsy_post_footer_before() 			{ whimsy_do_atomic( 'whimsy_post_footer_before' ); }
function whimsy_post_footer_after() 			{ whimsy_do_atomic( 'whimsy_post_footer_after' ); }

// Sidebar
function whimsy_sidebar_before() 				{ whimsy_do_atomic( 'whimsy_sidebar_before' ); }
function whimsy_sidebar_inside_before() 		{ whimsy_do_atomic( 'whimsy_sidebar_inside_before' ); }
function whimsy_sidebar_inside_after() 			{ whimsy_do_atomic( 'whimsy_sidebar_inside_after' ); }
function whimsy_sidebar_after() 				{ whimsy_do_atomic( 'whimsy_sidebar_after' ); }
function whimsy_sidebar_inside_widget_before() 	{ whimsy_do_atomic( 'whimsy_sidebar_inside_widget_before' ); }
function whimsy_sidebar_inside_widget_after() 	{ whimsy_do_atomic( 'whimsy_sidebar_inside_widget_after' ); }

// footer.php
function whimsy_footer_before() 				{ whimsy_do_atomic( 'whimsy_footer_before' ); }
function whimsy_footer_after() 					{ whimsy_do_atomic( 'whimsy_footer_after' ); }
function whimsy_footer_inside_before() 			{ whimsy_do_atomic( 'whimsy_footer_inside_before' ); }
function whimsy_footer_inside_after() 			{ whimsy_do_atomic( 'whimsy_footer_inside_after' ); }
function whimsy_body_end() 						{ whimsy_do_atomic( 'whimsy_body_end' ); }

if ( ! function_exists( 'whimsy_do_atomic' ) ) {
/**
 * Adds contextual action hooks to the theme.  This allows users to easily add context-based content without having to know how to use WordPress conditional tags.  The theme handles the logic.
 *
 * An example of a basic hook would be 'whimsy_header'.  The do_atomic() function extends that to give extra hooks such as 'whimsy_singular_header', 'whimsy_singular-post_header', and 'whimsy_singular-post-ID_header'.
 *
 * @author Justin Tadlock <justin@justintadlock.com>
 * @author Ptah Dunbar <pt@ptahd.com>
 * @link   http://ptahdunbar.com/wordpress/smarter-hooks-context-sensitive-hooks
 *
 */
function whimsy_do_atomic( $tag = '', $arg = '' ) {
	if ( empty( $tag ) )
		return false;
	/* Get the args passed into the function and remove $tag. */
	$args = func_get_args();
	array_splice( $args, 0, 1 );
	/* Do actions on the basic hook. */
	do_action_ref_array( $tag, $args );
	/* Loop through context array and fire actions on a contextual scale. */
	foreach ( (array) whimsy_get_context() as $context )
		do_action_ref_array( "{$context}_{$tag}", $args );
} // End whimsy_do_atomic
}

if ( ! function_exists( 'whimsy_apply_atomic' ) ) {
/**
 * Adds contextual filter hooks to the theme.  This allows users to easily filter context-based content without having to know how to use WordPress conditional tags.  The theme handles the logic.
 *
 * An example of a basic hook would be 'whimsy_entry_meta'.  The apply_atomic() function extends that to give extra hooks such as 'whimsy_singular_entry_meta', 'whimsy_singular-post_entry_meta', and 'whimsy_singular-post-ID_entry_meta'.
 *
 * @author Justin Tadlock <justin@justintadlock.com>
 * @since  1.2.0
 * @access public
 * @param  string $tag     Usually the location of the hook but defines what the base hook is.
 * @param  mixed  $value   The value on which the filters hooked to $tag are applied on.
 * @param  mixed  $var,... Additional variables passed to the functions hooked to $tag.
 * @return mixed  $value   The value after it has been filtered.
 */
function whimsy_apply_atomic( $tag = '', $value = '' ) {
	if ( empty( $tag ) )
		return false;
	/* Get the args passed into the function and remove $tag. */
	$args = func_get_args();
	array_splice( $args, 0, 1 );
	/* Apply filters on the basic hook. */
	$value = $args[0] = apply_filters_ref_array( $tag, $args );
	/* Loop through context array and apply filters on a contextual scale. */
	foreach ( (array) whimsy_get_context() as $context )
		$value = $args[0] = apply_filters_ref_array( "{$context}_{$tag}", $args );
	/* Return the final value once all filters have been applied. */
	return $value;
} // End whimsy_apply_atomic
}

if ( ! function_exists( 'whimsy_get_context' ) ) {

/**
 * Main contextual function. This allows code to be used more than once without running 
 * hundreds of conditional checks within the theme.
 * @author Justin Tadlock <justin@justintadlock.com>
 * @since  1.2.0
 */
function whimsy_get_context() {

	global $whimsy;

	if ( ! is_object( $whimsy ) ) {
		$whimsy = new stdClass;
	}
	
	/* If $whimsy->context has been set, don't run through the conditionals again. Just return the variable. */
	if ( isset( $whimsy->context ) )
		return apply_filters( 'whimsy_context', $whimsy->context );
	
	/* Set some variables for use within the function. */
	$whimsy->context = array();
	$object = get_queried_object();
	$object_id = get_queried_object_id();
	
	/* Front page of the site. */
	if ( is_front_page() )
		$whimsy->context[] = 'home';
	
	/* Blog page. */
	if ( is_home() ) {
		$whimsy->context[] = 'blog';
	}
	
	/* Singular views. */
	elseif ( is_singular() ) {
		$whimsy->context[] = 'singular';
		$whimsy->context[] = "singular-{$object->post_type}";
		$whimsy->context[] = "singular-{$object->post_type}-{$object_id}";
	}
	
	/* Archive views. */
	elseif ( is_archive() ) {
		$whimsy->context[] = 'archive';
		/* Post type archives. */
		if ( is_post_type_archive() ) {
			$post_type = get_post_type_object( get_query_var( 'post_type' ) );
			$whimsy->context[] = "archive-{$post_type->name}";
		}
		/* Taxonomy archives. */
		if ( is_tax() || is_category() || is_tag() ) {
			$whimsy->context[] = 'taxonomy';
			$whimsy->context[] = "taxonomy-{$object->taxonomy}";
			$slug = ( ( 'post_format' == $object->taxonomy ) ? str_replace( 'post-format-', '', $object->slug ) : $object->slug );
			$whimsy->context[] = "taxonomy-{$object->taxonomy}-" . sanitize_html_class( $slug, $object->term_id );
		}
		/* User/author archives. */
		if ( is_author() ) {
			$user_id = get_query_var( 'author' );
			$whimsy->context[] = 'user';
			$whimsy->context[] = 'user-' . sanitize_html_class( get_the_author_meta( 'user_nicename', $user_id ), $user_id );
		}
		/* Date archives. */
		if ( is_date() ) {
			$whimsy->context[] = 'date';
			if ( is_year() )
				$whimsy->context[] = 'year';
			if ( is_month() )
				$whimsy->context[] = 'month';
			if ( get_query_var( 'w' ) )
				$whimsy->context[] = 'week';
			if ( is_day() )
				$whimsy->context[] = 'day';
		}
		/* Time archives. */
		if ( is_time() ) {
			$whimsy->context[] = 'time';
			if ( get_query_var( 'hour' ) )
				$whimsy->context[] = 'hour';
			if ( get_query_var( 'minute' ) )
				$whimsy->context[] = 'minute';
		}
	}
	/* Search results. */
	elseif ( is_search() ) {
		$whimsy->context[] = 'search';
	}
	/* Error 404 pages. */
	elseif ( is_404() ) {
		$whimsy->context[] = 'error-404';
	}
	return array_map( 'esc_attr', apply_filters( 'whimsy_context', array_unique( $whimsy->context ) ) );
} // End whimsy_get_context
}
