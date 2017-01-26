<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package whimsy-framework
 */

if ( class_exists( 'Jetpack' ) ) {

    if ( ! function_exists( 'whimsy_jetpack_styles' ) ) :

        function whimsy_jetpack_styles() {
            wp_enqueue_style( 'whimsy-jetpack-styles', get_template_directory_uri() . '/library/css/plugins/jetpack.css' );
        }

        add_action( 'wp_enqueue_scripts', 'whimsy_jetpack_styles' );
    
    endif;
    
    if ( ! function_exists( 'whimsy_jetpack_setup' ) ) :

        function whimsy_jetpack_setup() {
            /**
             * Add theme support for Infinite Scroll.
             * See: https://jetpack.me/support/infinite-scroll/
             */
            add_theme_support( 'infinite-scroll', array(
                'type'      => 'click',
                'container' => 'main',
                'render'    => 'whimsy_infinite_scroll_render',
                'footer'    => false,
            ) );

            /**
             * Add theme support for Responsive Videos.
             * See: https://jetpack.me/support/responsive-videos/
             */
            add_theme_support( 'jetpack-responsive-videos' );

        } // end function whimsy_jetpack_setup
        add_action( 'after_setup_theme', 'whimsy_jetpack_setup' );

    endif;

    /**
     * Custom render function for Infinite Scroll.
     */
    
    if ( ! function_exists( 'whimsy_infinite_scroll_render' ) ) :

        function whimsy_infinite_scroll_render() {
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/content', get_post_format() );
            }
        } // end function whimsy_infinite_scroll_render

    endif;
    
}