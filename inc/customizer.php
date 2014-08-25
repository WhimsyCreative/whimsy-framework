<?php
/**
 * whimsy Theme Customizer
 *
 * @package whimsy
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whimsy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_setting(
	    'alt_color',
	    array(
	        'default' => '#1fb4ca',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	 
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'alt_color',
	        array(
	            'label' => 'Highlight Color',
	            'section' => 'colors',
	            'settings' => 'alt_color'
	        )
	    )
	);
}
add_action( 'customize_register', 'whimsy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whimsy_customize_preview_js() {
	wp_enqueue_script( 'whimsy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'whimsy_customize_preview_js' );
