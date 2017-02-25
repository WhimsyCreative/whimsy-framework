<?php
/**
 * Whimsy Responsive Nav
 */

if ( ! function_exists( 'whimsy_responsive_nav' ) ) :

    function whimsy_responsive_nav() {
        wp_nav_menu( array( 
            'theme_location' => 'primary',
            'container_id' => 'site-navigation-primary',
            'container_class' => '',
            'menu_class' => 'whimsy-nav',
            'items_wrap' => '<ul id="whimsy-nav" class="%2$s">%3$s</ul>', 
        ));
    }
    
endif;