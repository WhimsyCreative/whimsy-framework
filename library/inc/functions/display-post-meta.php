<?php
/**
 * Whimsy Display Post date and comments
 */

if ( ! function_exists( 'whimsy_display_post_meta' ) ) :
function whimsy_display_post_meta() {

		if ( get_post_format() == 'link' || get_post_format() == 'aside' || get_post_format() == 'quote' || get_post_format() == 'video'|| get_post_format() == 'gallery'|| get_post_format() == 'image' ) : ?>

		<!-- Don't show post meta for links -->
		<?php else : ?>

		<div class="entry-posted-on clear">
			<?php

							whimsy_posted_on();  ?>

					</div><!-- .entry-meta -->

	<?php endif;

}
endif;
