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
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	
	add_action('woocommerce_before_main_content', 'whimsy_woo_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'whimsy_woo_wrapper_end', 10);

	function whimsy_woo_wrapper_start() {
		echo '<section id="primary" class="c9">';
	}

	function whimsy_woo_wrapper_end() {
		echo '</section>';
	}

	function whimsy_woocommerce_styles() {
    	wp_enqueue_style( 'whimsy-woocommerce-styles', get_template_directory_uri() . '/css/plugins/woocommerce.css' );
	}
	
	add_action( 'wp_enqueue_scripts', 'whimsy_woocommerce_styles' );

}