<?php
/**
 * WooCommerce Compatibility File
 * See: http://woothemes.com/woocommerce
 *
 * @package whimsy-framework
 */

/*
 * WooCommerce Integration
 */
if ( class_exists( 'woocommerce' ) ) {
    
    /**
     * Make Whimsy play nice with Woo.
     */
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	
	add_action('woocommerce_before_main_content', 'whimsy_woo_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'whimsy_woo_wrapper_end', 10);

    /**
     * Include styles for WooCommerce.
     */
    if ( ! function_exists( 'whimsy_woocommerce_styles' ) ) :

       function whimsy_woocommerce_styles() {
            wp_enqueue_style( 'whimsy-woocommerce-styles', get_template_directory_uri() . '/library/css/plugins/woocommerce.css' );
        }
	
	   add_action( 'wp_enqueue_scripts', 'whimsy_woocommerce_styles' );
    
    endif;
    
    /**
     * Changes the output of the woo wrapper opening.
     */
    if ( ! function_exists( 'whimsy_woo_wrapper_start' ) ) :

        function whimsy_woo_wrapper_start() {
            echo '<section id="primary" class="c9">';
        }
    
    endif;

    /**
     * Changes the output of the woo wrapper closing.
     */
    if ( ! function_exists( 'whimsy_woo_wrapper_end' ) ) :
    
        function whimsy_woo_wrapper_end() {
            echo '</section>';
        }
    
    endif;

}