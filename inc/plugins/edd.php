<?php
/**
 * Easy Digital Downloads Compatibility File
 * See: http://easydigitaldownloads.com
 *
 * @package whimsy-framework
 */

if ( class_exists( 'Easy_Digital_Downloads' ) ) {

	function whimsy_edd_styles() {
    	wp_enqueue_style( 'whimsy-edd-styles', get_template_directory_uri() . '/css/plugins/edd.css' );
	}
	
	add_action( 'wp_enqueue_scripts', 'whimsy_edd_styles' );

}