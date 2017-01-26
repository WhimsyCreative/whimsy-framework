<?php
/**
 * Whimsy Display Post date and comments
 */

if ( ! function_exists( 'whimsy_display_post_meta' ) ) :
function whimsy_display_post_meta() {

	if( get_post_format() == 'link' || get_post_format() == 'aside' || get_post_format() == 'quote' ) : ?>

	<!-- Don't show post meta for links -->
	<?php else : ?>

		<div class="entry-meta clear">
			<?php 
            
                whimsy_posted_on();  ?>
            
		</div><!-- .entry-meta -->

	<?php endif;

}
endif;