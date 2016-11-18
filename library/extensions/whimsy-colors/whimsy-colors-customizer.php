<?php
/**
 * @since  1.0.0
 * @access public
 * @return void
 */

    // Clear out the original Colors section to make way for new colors.
    $wp_customize->remove_section( 'colors' );
    
    // Add our new Colors section.
	$wp_customize->add_section(
		'whimsy_extend_colors_section',
		array(
			'title'      => __( 'Colors', 'whimsy-extend' ),
			'priority'   => 40,
			'capability' => 'edit_theme_options',
		)
	);

    // Add Color Controls
	$wp_customize->add_setting(
	    'whimsy_link_color',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_hex_color'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_link_color',
	        array(
	            'label' 	=> __( 'Link Color', 'whimsy-framework' ),
	            'section' 	=> 'whimsy_extend_colors_section',
	            'settings' 	=> 'whimsy_link_color'
	        )
	    )
	);

    // Add Color Controls
	$wp_customize->add_setting(
	    'whimsy_link_hover_color',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_hex_color'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_link_hover_color',
	        array(
	            'label' 	=> __( 'Link Hover Color', 'whimsy-framework' ),
	            'section' 	=> 'whimsy_extend_colors_section',
	            'settings' 	=> 'whimsy_link_hover_color'
	        )
	    )
	);

	$wp_customize->add_setting(
	    'whimsy_alt_color',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_hex_color'
	    )
	);
    
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_alt_color',
	        array(
	            'label' 	=> __( 'Highlight Color', 'whimsy-framework' ),
	            'section' 	=> 'whimsy_extend_colors_section',
	            'settings' 	=> 'whimsy_alt_color'
	        )
	    )
	);

	$wp_customize->add_setting(
	    'whimsy_body_color',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_hex_color'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_body_color',
	        array(
	            'label' 	=> __( 'Body Text Color', 'whimsy-framework' ),
	            'section' 	=> 'whimsy_extend_colors_section',
	            'settings' 	=> 'whimsy_body_color'
	        )
	    )
	);

    // Add Menu Display Settings

    // Menu bg color
    $wp_customize->add_setting(
        'whimsy_menu_background_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_menu_background_color',
            array(
                'label'     => __( 'Menu Background Color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_menu_background_color'
            )
        )
    );	

    // Menu link color
    $wp_customize->add_setting(
        'whimsy_menu_link_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_menu_link_color',
            array(
                'label'     => __( 'Menu link color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_menu_link_color'
            )
        )
    );  

    // Menu link color :hover
    $wp_customize->add_setting(
        'whimsy_menu_link_hover_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_menu_link_hover_color',
            array(
                'label'     => __( 'Menu link hover color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_menu_link_hover_color'
            )
        )
    );  


    // Submenu bg color
    $wp_customize->add_setting(
        'whimsy_submenu_background_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_submenu_background_color',
            array(
                'label'     => __( 'Sub-menu background color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_submenu_background_color'
            )
        )
    );  

    // Submenu link color
    $wp_customize->add_setting(
        'whimsy_submenu_link_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_submenu_link_color',
            array(
                'label'     => __( 'Sub-Menu link color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_submenu_link_color'
            )
        )
    ); 

    // Header container background color
    $wp_customize->add_setting(
        'whimsy_header_container_bg_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_header_container_bg_color',
            array(
                'label'     => __( 'Header container background color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_header_container_bg_color'
            )
        )
    ); 

    // Masthead background color
    $wp_customize->add_setting(
        'whimsy_masthead_bg_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_masthead_bg_color',
            array(
                'label'     => __( 'Masthead background color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_masthead_bg_color'
            )
        )
    ); 

    // Site Title color
	$wp_customize->add_setting(
	    'whimsy_site_title_color',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_hex_color'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_site_title_color',
	        array(
	            'label' 	=> __( 'Site Title color', 'whimsy-framework' ),
	            'section' 	=> 'whimsy_extend_colors_section',
	            'settings' 	=> 'whimsy_site_title_color'
	        )
	    )
	);

    // Site description color
	$wp_customize->add_setting(
	    'whimsy_site_desc_color',
	    array(
	        'default' => '',
	        'sanitize_callback' => 'sanitize_hex_color'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'whimsy_site_desc_color',
	        array(
	            'label' 	=> __( 'Site Description Color', 'whimsy-framework' ),
	            'section' 	=> 'whimsy_extend_colors_section',
	            'settings' 	=> 'whimsy_site_desc_color'
	        )
	    )
	);

    // Masthead text color
    $wp_customize->add_setting(
        'whimsy_masthead_text_color',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'whimsy_masthead_text_color',
            array(
                'label'     => __( 'Masthead text color', 'whimsy-framework' ),
                'section'   => 'whimsy_extend_colors_section',
                'settings'  => 'whimsy_masthead_text_color'
            )
        )
    ); 