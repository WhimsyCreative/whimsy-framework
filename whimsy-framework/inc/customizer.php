<?php
/**
 * whimsy Theme Customizer
 *
 * @package whimsy
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
function whimsy_customize_register_section( $wp_customize ) {	

	/* Add Skin Settings */

    $wp_customize->add_section(
        'whimsy_framework_section_display',
        array(
            'title' 		=> __( 'Content Display', 'whimsy-framework' ),
            'description' 	=> __( 'Choose where the content and sidebar should be displayed.', 'whimsy-framework' ),
            'priority' 		=> 35,

        )
    );

}
add_action( 'customize_register', 'whimsy_customize_register_section' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function whimsy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor')->transport  = 'postMessage';
	$wp_customize->add_setting(
	    'whimsy_link_color',
	    array(
	        'default' => '#18a2b6',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_link_color',
	        array(
	            'label' 	=> __( 'Link Color', 'whimsy-framework' ),
	            'section' 	=> 'colors',
	            'settings' 	=> 'whimsy_link_color',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'whimsy_alt_color',
	    array(
	        'default' => '#324159',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_alt_color',
	        array(
	            'label' 	=> __( 'Highlight Color', 'whimsy-framework' ),
	            'section' 	=> 'colors',
	            'settings' 	=> 'whimsy_alt_color',
	        )
	    )
	);
	$wp_customize->add_setting(
	    'whimsy_body_color',
	    array(
	        'default' => '#1e1d1f',
	        'sanitize_callback' => 'sanitize_hex_color',
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_body_color',
	        array(
	            'label' 	=> __( 'Body Text Color', 'whimsy-framework' ),
	            'section' 	=> 'colors',
	            'settings' 	=> 'whimsy_body_color',
	        )
	    )
	);
	/* Add Layout Settings */
    $wp_customize->add_setting(
        'whimsy_framework_layout',
        array(
            'default' => 'content-sidebar',
            'sanitize_callback' => 'sanitize_whimsy_framework_layout',
        )
    );
     
    $wp_customize->add_control(
        'whimsy_framework_layout',
        array(
            'type' 		=> 'select',
            'label' 	=> __( 'Layout', 'whimsy-framework' ),
            'section' 	=> 'whimsy_framework_section_display',
            'choices' 	=> array(
                'content-sidebar' 	=> __( 'Content/Sidebar', 'whimsy-framework' ),
                'sidebar-content' 	=> __( 'Sidebar/Content', 'whimsy-framework' ),
                'full-width' 		=> __( 'Full-Width', 'whimsy-framework' ),
            ),
        )
    );
}
add_action( 'customize_register', 'whimsy_customize_register' );

function sanitize_whimsy_framework_layout( $input ) {
    $valid = array(
        'content-sidebar' 	=> 'Content/Sidebar',
        'sidebar-content' 	=> 'Sidebar/Content',
        'full-width'		=> 'Full-Width',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whimsy_customize_preview_js() {
	wp_enqueue_script( 'whimsy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'whimsy_customize_preview_js' );
