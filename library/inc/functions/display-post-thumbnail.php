<?php
/**
 * Whimsy Display Post thumbnail
 */

if ( ! function_exists( 'whimsy_display_post_thumbnail' ) ) :

    function whimsy_display_post_thumbnail() {

        if( get_post_format() == 'link' ) : ?>

        <!-- Don't show post thumbnil for links -->

        <?php elseif( get_post_format() == 'gallery' ) : ?>

        <!-- Don't show post thumbnail for galleries -->

        <?php elseif( get_post_format() == 'image' ) : ?>

            <div class="entry-img">
                 <?php 
                    if ( has_post_thumbnail()) {
                    
                        $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                    
                        echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                    
                        the_post_thumbnail( 'full' );
                    
                        echo '</a>';
                    } 
                ?>

            </div>
        <?php else : ?>

            <div class="entry-img">

                <?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>

            </div>

        <?php endif;

    }

endif;