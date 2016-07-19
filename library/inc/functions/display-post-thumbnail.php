<?php

if ( ! function_exists( 'whimsy_display_post_thumbnail' ) ) :
/**
 * Whimsy Display Post thumbnail
 */
function whimsy_display_post_thumbnail() {

	if( get_post_format() == 'link' ) : ?>

	<!-- Don't show post thumbnil for links -->

	<?php elseif( get_post_format() == 'gallery' ) : ?>

	<!-- Don't show post thumbnil galleries -->

	<?php else : ?>

		<div class="entry-img">

			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>
		
		</div>

	<?php endif;

}

endif;
