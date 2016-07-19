<?php
/**
 * Whimsy Framework Theme Customizer
 *
 * @package whimsy
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */

function whimsy_customize_register_section( $wp_customize ) {	

	/* Add Logo Settings Section */
    $wp_customize->add_section(
        'whimsy_framework_section_logo',
        array(
            'title' 		=> __( 'Logo', 'whimsy-framework' ),
            'description' 	=> __( 'Add a logo for desktop and mobile screens.', 'whimsy-framework' ),
            'priority' 		=> 35,

        )
    );

    /* Add Skin Settings */
    $wp_customize->add_section(
        'whimsy_framework_section_display',
        array(
            'title'         => __( 'Display', 'whimsy-framework' ),
            'description'   => __( 'Choose where the content and sidebar should be displayed.', 'whimsy-framework' ),
            'priority'      => 37,

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

// Add Color Support

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

/**     
 * Display Settings
 */
    // Choose layout style.
    
     // Add A Layout Picker
    
    
    // Load the radio image control class.
    require_once( trailingslashit( get_template_directory() ) . 'library/admin/customize/custom-radio.php' );

//
//    // Register the radio image control class as a JS control type.
//    $wp_customize->register_control_type( 'Whimsy_Customize_Control_Radio_Image' );
//
//    
//    // Add the layout setting.
//    $wp_customize->add_setting(
//        'whimsy_framework_layout',
//        array(
//            'default'           => 'content-sidebar',
//            'transport'         => 'refresh',
//            'sanitize_callback' => 'sanitize_key'
//        )
//    );
//
//    // Add the layout control.
//    $wp_customize->add_control(
//        new Whimsy_Customize_Control_Radio_Image(
//            $wp_customize,
//            'whimsy_framework_layout',
//            array(
//                'label'    => esc_html__( 'Layout', 'whimsy-framework' ),
//                'section'  => 'whimsy_framework_section_display',
//                'choices'  => array(
//                    'content-sidebar' => array(
//                        'label' => esc_html__( 'Content/Sidebar', 'whimsy-framework' ),
//                        'url'   => '%s/library/img/content-sidebar.png'
//                    ),
//                    'full-width' => array(
//                        'label' => esc_html__( 'Full-Width', 'whimsy-framework' ),
//                        'url'   => '%s/library/img/full-width.png'
//                    ),
//                    'sidebar-content' => array(
//                        'label' => esc_html__( 'Sidebar/Content', 'whimsy-framework' ),
//                        'url'   => '%s/library/img/sidebar-content.png'
//                    )
//                )
//            )
//        )
//    );
//    
//    $wp_customize->add_setting(
//        'whimsy_framework_layout',
//        array(
//            'default'           => 'content-sidebar',
//            'transport'         => 'refresh',
//            'sanitize_callback' => 'sanitize_key',
//        )
//    );
//     
//    $wp_customize->add_control(
//        'whimsy_framework_layout',
//        array(
//            'type' 		=> 'select',
//            'label' 	=> __( 'Layout', 'whimsy-framework' ),
//            'section' 	=> 'whimsy_framework_section_display',
//            'choices' 	=> array(
//                'content-sidebar' 	=> __( 'Content/Sidebar', 'whimsy-framework' ),
//                'sidebar-content' 	=> __( 'Sidebar/Content', 'whimsy-framework' ),
//                'full-width' 		=> __( 'Full-Width', 'whimsy-framework' ),
//            ),
//        )
//    );
//    
    
    
    // Load the layout control class.
    require_once( trailingslashit( get_template_directory() ) . 'library/admin/customize/custom-layout.php' );
    
	$wp_customize->add_setting( 'whimsy_framework_layout', array(
		'default' => 'content-sidebar',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new Whimsy_Layout_Control( $wp_customize, 'whimsy_framework_layout', array(
		'label' => __( 'Global Layout', 'whimsy-framework' ),
		'section' => 'whimsy_framework_section_display',
		'layouts' => array(
			'sidebar-content' => array(
				'label' => __( 'Sidebar/Content', 'whimsy-framework' )
			),
			'content-sidebar' => array(
				'label' => __( 'Content/Sidebar', 'whimsy-framework' )
			),
			'full-width' => array(
				'label' => __( 'Full-Width', 'whimsy-framework' )
			)
		),
		'priority' => 1
	) ) );
    
	$wp_customize->add_setting( 'whimsy_framework_layout_footer', array(
		'default' => 'footer-3',
		'transport' => 'refresh'
	) );
	$wp_customize->add_control( new Whimsy_Layout_Control( $wp_customize, 'whimsy_framework_layout_footer', array(
		'label' => __( 'Footer Layout', 'whimsy-framework' ),
		'section' => 'whimsy_framework_section_display',
		'layouts' => array(
			'footer-1' => array(
				'label' => __( '1 Widget Area', 'whimsy-framework' )
			),
			'footer-2' => array(
				'label' => __( '2 Widget Areas', 'whimsy-framework' )
			),
			'footer-3' => array(
				'label' => __( '3 Widget Areas', 'whimsy-framework' )
			)
		),
		'priority' => 2
	) ) );
    
    // Hide date on pages
    $wp_customize->add_setting(
        'whimsy_framework_hide_page_date',
        array(
            'default'           => false,
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_whimsy_framework_checkbox',
        )
    );
    $wp_customize->add_control(
        'whimsy_framework_hide_page_date',
        array(
            'type' => 'checkbox',
            'label' => __( 'Hide date on pages?', 'whimsy-framework' ),
            'section' => 'whimsy_framework_section_display',
        )
    );

    // Hide comments on pages
    $wp_customize->add_setting(
        'whimsy_framework_hide_page_comments',
        array(
            'default' => false,
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_whimsy_framework_checkbox',
        )
    );
    $wp_customize->add_control(
        'whimsy_framework_hide_page_comments',
        array(
            'type' => 'checkbox',
            'label' => __( 'Hide comments on pages?', 'whimsy-framework' ),
            'section' => 'whimsy_framework_section_display',
        )
    );
    
    // Hide link on page titles
    $wp_customize->add_setting(
        'whimsy_framework_hide_page_title_link',
        array(
            'default' => false,
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_whimsy_framework_checkbox',
        )
    );
    $wp_customize->add_control(
        'whimsy_framework_hide_page_title_link',
        array(
            'type' => 'checkbox',
            'label' => __( 'Hide link on page titles?', 'whimsy-framework' ),
            'section' => 'whimsy_framework_section_display',
        )
    );
/** 
 * Logo Settings 
 */

    // Desktop logo
    $wp_customize->add_setting(
        'whimsy_framework_logo_desktop',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( 
    	new WP_Customize_Image_Control( 
    		$wp_customize, 'whimsy_framework_logo_desktop', 
    		array(
    		'label'    => __( 'Desktop Logo', 'whimsy-framework' ),
            'description'   => __( 'Displayed on most screens.', 'whimsy-framework' ),    		
            'section'  => 'title_tagline',
    		'settings' => 'whimsy_framework_logo_desktop',
    ) ) );

    // Mobile logo
    $wp_customize->add_setting(
        'whimsy_framework_logo_mobile',
        array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( 
            $wp_customize, 'whimsy_framework_logo_mobile', 
            array(
            'label'    => __( 'Mobile Logo', 'whimsy-framework' ),
            'description'   => __( 'Displayed on screens less than 980px.', 'whimsy-framework' ),
            'section'  => 'title_tagline',
            'settings' => 'whimsy_framework_logo_mobile',
    ) ) );

    // Centered logo checkbox
    $wp_customize->add_setting(
        'whimsy_framework_logo_center',
        array(
            'default' => true,
            'sanitize_callback' => 'sanitize_whimsy_framework_checkbox',
        )
    );
    $wp_customize->add_control(
        'whimsy_framework_logo_center',
        array(
            'type' => 'checkbox',
            'label' => __( 'Center desktop logo on the page.', 'whimsy-framework' ),
            'section' => 'title_tagline',
        )
    );
// Add Menu Display Settings

    // Menu bg color
    $wp_customize->add_setting(
        'whimsy_menu_background_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_menu_background_color',
            array(
                'label'     => __( 'Menu Background Color', 'whimsy-framework' ),
                'section'   => 'colors',
                'settings'  => 'whimsy_menu_background_color',
            )
        )
    );	

    // Menu link color
    $wp_customize->add_setting(
        'whimsy_menu_link_color',
        array(
            'default' => '#18a2b6',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_menu_link_color',
            array(
                'label'     => __( 'Menu Link Color', 'whimsy-framework' ),
                'section'   => 'colors',
                'settings'  => 'whimsy_menu_link_color',
            )
        )
    );  

    // Submenu bg color
    $wp_customize->add_setting(
        'whimsy_submenu_background_color',
        array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_submenu_background_color',
            array(
                'label'     => __( 'Sub-Menu Background Color', 'whimsy-framework' ),
                'section'   => 'colors',
                'settings'  => 'whimsy_submenu_background_color',
            )
        )
    );  

    // Submenu link color
    $wp_customize->add_setting(
        'whimsy_submenu_link_color',
        array(
            'default' => '#18a2b6',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_submenu_link_color',
            array(
                'label'     => __( 'Sub-Menu Link Color', 'whimsy-framework' ),
                'section'   => 'colors',
                'settings'  => 'whimsy_submenu_link_color',
            )
        )
    ); 

// End menu settings
}
add_action( 'customize_register', 'whimsy_customize_register' );

// Sanitize layout setting
function whimsy_framework_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}


function sanitize_whimsy_framework_layout( $input ) {
    $valid = array(
        'content-sidebar' 	=> 'Content/Sidebar',
        'full-width'		=> 'Full-Width',
        'sidebar-content' 	=> 'Sidebar/Content',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } 

    else {
        return '';
    }
}

// Sanitize checkboxes
function sanitize_whimsy_framework_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function whimsy_customize_preview_js() {
    wp_enqueue_script( 'whimsy_customizer', get_template_directory_uri() . '/library/js/customizer.js', array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'whimsy_customize_preview_js' );

/*
 * Load Customizer styles
 */
function whimsy_customize_style_output() { include( get_template_directory() . '/library/admin/customize/customizer-styles.php'); }
add_action('init', 'whimsy_customize_style_output', 5);