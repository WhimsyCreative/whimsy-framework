<?php
/**
 * Whimsy Display Post categories
 */

if ( ! function_exists( 'whimsy_display_post_categories' ) ) :
function whimsy_display_post_categories() {

		if ( get_post_format() == 'link' || get_post_format() == 'aside' || get_post_format() == 'quote' || get_post_format() == 'video'|| get_post_format() == 'gallery'|| get_post_format() == 'image' ) : ?>
		<!-- Don't show post meta for links -->
		<?php else :

		echo '<div class="entry-category">';
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ' / ', 'whimsy-framework' ) );

			printf(
				$category_list
			);
	echo '</div>';

	endif;
}
endif;
