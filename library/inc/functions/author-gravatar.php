<?php
/**
 * Whimsy display avatar in posts
 */
if ( ! function_exists( 'whimsy_author_gravatar' ) ) :

    function whimsy_author_gravatar() {
        
        if ( 'post' == get_post_type() ) : ?>

        <div class="author-gravatar">
            
            <?php echo get_avatar( get_the_author_meta( 'email' ), '80' ); ?>
            
        </div>

    <?php endif; }

endif;
