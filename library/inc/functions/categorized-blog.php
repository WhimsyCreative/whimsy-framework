<?php
/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
if ( ! function_exists( 'whimsy_categorized_blog' ) ) :

	function whimsy_categorized_blog() {
		if ( false === ( $all_the_cool_cats = get_transient( 'whimsy_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$all_the_cool_cats = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,

				// We only need to know if there is more than one category.
				'number'     => 2,
			) );

			// Count the number of categories that are attached to the posts.
			$all_the_cool_cats = count( $all_the_cool_cats );

			set_transient( 'whimsy_categories', $all_the_cool_cats );
		}

		if ( $all_the_cool_cats > 1 ) {
			// This blog has more than 1 category so whimsy_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so whimsy_categorized_blog should return false.
			return false;
		}
	}

endif;

/**
 * Flush out the transients used in whimsy_categorized_blog.
 */
if ( ! function_exists( 'whimsy_category_transient_flusher' ) ) :

	function whimsy_category_transient_flusher() {
		// Like, beat it. Dig?
		delete_transient( 'whimsy_categories' );
	}
	add_action( 'edit_category', 'whimsy_category_transient_flusher' );
	add_action( 'save_post',     'whimsy_category_transient_flusher' );

endif;
