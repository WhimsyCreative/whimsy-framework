<?php
/**
 * Whimsy Display Post categories
 */

if ( ! function_exists( 'whimsy_display_post_categories' ) ) :
function whimsy_display_post_categories() {

	echo '<div class="entry-category">';
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ' / ', 'whimsy-framework' ) );
			
			printf(
				$category_list
			);
	echo "</div>";
}
endif;
