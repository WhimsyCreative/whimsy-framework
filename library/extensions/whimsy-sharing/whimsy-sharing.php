<?php
/*
 * Plugin Name: Whimsy+Sharing
 * Version: 1.0.0
 * Plugin URI: http://www.thefanciful.com/plugins/whimsy/extend/styles/waterlily
 * Description: The Waterlily style extension for the Whimsy Framework.
 * Author: The Fanciful
 * Author URI: http://www.thefanciful.com/
 * Requires at least: 4.0
 * Tested up to: 4.5
 *
 * Text Domain: whimsy-styles-waterlily
 * Domain Path: /language/
 *
 * @package WordPress
 * @author The Fanciful
 * @since 1.0.0
 */

if ( !class_exists( 'WhimsySharing' ) ) {

	/**
	 * @since  1.0.0
	 * @access public
	 */
	class WhimsySharing {

		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function __construct() {
        
			global $extend;

			/* Set up an empty class for the global $whimsy object. */
			$extend = new stdClass;

			/* Define framework, parent theme, and child theme constants. */
			add_action( 'init', array( $this, 'constants' ), 1 );

			/* Load the core functions/classes required by the rest of the plugin. */
			add_action( 'init', array( $this, 'includes' ), 2 );
            
			/* Load the settings and controls for the Customizer. */
        
            add_action( 'customize_register', array( $this, 'customize' ), 40 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 80 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            
            add_action( 'admin_enqueue_scripts', array( $this, 'admin' ), 15 );
        
        }
   
		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function constants() {

			/* Sets the framework version number. */
			define( 'WHIMSY_WATERLILY_VERSION', '1.0.0' );

			/* Sets the path to the plugin directory. */
            define( 'WHIMSY_WATERLILY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
            
			/* Sets the url to the plugin directory. */
            define( 'WHIMSY_WATERLILY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
            
        }
        
        function includes() {

            /**
             * Custom functions that act independently of the theme templates.
             */
            require_once WHIMSY_WATERLILY_PLUGIN_PATH . 'inc/fonts.php';

        }
        
        function customize ( $wp_customize ) {
            
            /* Add Styles Section */
            $wp_customize->add_section(
                'whimsy_framework_section_style',
                array(
                    'title'         => __( 'Styles', 'whimsy-framework' ),
                    'priority'      => 39,
                )
            );

            /* Add Styles Setting */
            $wp_customize->add_setting( 'whimsy_styles_customize_options', array(
                'default' => 'none',
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_key'
            ) );
            
            /* Add Styles Control */
            $wp_customize->add_control( new Whimsy_Layout_Control( $wp_customize, 'whimsy_styles_customize_options', array(
                'label' => __( 'Whimsy+Waterlily', 'whimsy-styles' ),
                'section' => 'whimsy_framework_section_style',
                'layouts' => array(
                    'one' => array(
                        'label' => __( 'Nora', 'whimsy-styles' )
                    ),
                    'two' => array(
                        'label' => __( 'Azurea', 'whimsy-styles' )
                    ),
                    'three' => array(
                        'label' => __( 'Karolina', 'whimsy-styles' )
                    ),
                    'four' => array(
                        'label' => __( 'Marliacea', 'whimsy-styles' )
                    ),
                    'none' => array(
                        'label' => __( 'No Style', 'whimsy-styles' )
                    )
                ),
                'priority' => 1
            ) ) );
                        
        }
        
        /**
         * Additional style and script file inclusion.
         */

        function enqueue() {
            
            wp_enqueue_style( 'whimsy-styles-global', WHIMSY_WATERLILY_PLUGIN_URL . 'css/global.css' );
            
            $whimsy_styles_customize_options = get_theme_mod( 'whimsy_styles_customize_options' );

            if ( $whimsy_styles_customize_options == 'one' ) {
                wp_enqueue_style( 'whimsy-style-one', WHIMSY_WATERLILY_PLUGIN_URL . 'css/one.css' );
            }
            if ( $whimsy_styles_customize_options  == 'two' ) {
                wp_enqueue_style( 'whimsy-style-two', WHIMSY_WATERLILY_PLUGIN_URL . 'css/two.css' );
            }
            if ( $whimsy_styles_customize_options  == 'three' ) {
                wp_enqueue_style( 'whimsy-style-three', WHIMSY_WATERLILY_PLUGIN_URL . 'css/three.css' );
            }
            if ( $whimsy_styles_customize_options  == 'four' ) {
                wp_enqueue_style( 'whimsy-style-four', WHIMSY_WATERLILY_PLUGIN_URL . 'css/four.css' );
            }
            
        }
        
        /**
         * Include additional styles when in admin.
         */

        function admin() {

             /* Enqueue the appropriate CSS based on which skin is selected via Theme Customizer */

            wp_enqueue_style( 'whimsy-styles-admin', WHIMSY_WATERLILY_PLUGIN_URL . 'css/admin.css' );
            
        }
        
        function 
    }
}

new WhimsySharing();