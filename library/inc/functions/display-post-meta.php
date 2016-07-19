<?php
/**
 * Whimsy Display Post date and comments
 */

if ( ! function_exists( 'whimsy_display_post_meta' ) ) :
function whimsy_display_post_meta() {

	if( get_post_format() == 'link' ) : ?>

	<!-- Don't show post meta for links -->

	<?php else : ?>

		<div class="entry-meta clear">
			<?php 
            
                whimsy_posted_on(); 

                $whimsy_framework_hide_page_comments = get_theme_mod( 'whimsy_framework_hide_page_comments' );
                if ( $whimsy_framework_hide_page_comments == 0 ) { ?>
            
			     <div class="entry-comment-meta"><a rel="nofollow" class="entry-comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%' );?> <i class="fa fa-comments"></i></a></div>
                <?php } ?>
            
		</div><!-- .entry-meta -->

	<?php endif;

}
endif;