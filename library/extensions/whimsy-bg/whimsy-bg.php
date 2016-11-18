<?php
/**
 * @package   WhimsyFramework
 * @version   1.0.0
 * @author    Natasha K. Cross <natasha@thefanciful.com>
 * @copyright 2016, Natasha K. Cross
 * @link      http://thefanciful.com/whimsy
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( !class_exists( 'WhimsyBackgrounds' ) ) {

	class WhimsyBackgrounds {

		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function __construct() {
        
			global $WhimsyBackgrounds;

			/* Set up an empty class for the global $whimsy object. */
			$WhimsyBackgrounds = new stdClass;

			/* Define Whimsy+Skins constants. */
			add_action( 'init', array( $this, 'constants' ), 1 );

			/* Load the settings and controls for the Customizer. */
        
            add_action( 'customize_register', array( $this, 'customize' ), 40 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            
            add_action( 'admin_enqueue_scripts', array( $this, 'admin' ), 15 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            
            add_action( 'wp_head', array( $this, 'style' ), 115 );
        }
   
		/**
		 * @since  0.7.0
		 * @access public
		 * @return void
		 */
		function constants() {

			/* Sets the framework version number. */
			define( 'WHIMSY_BG_VERSION', '1.0.0' );
            
			/* Sets the path to the plugin directory. */
            define( 'WHIMSY_BG_DIR',      plugin_dir_path( __FILE__ )  );
            
			/* Sets the url to the plugin directory. */
            define( 'WHIMSY_BG_URI',      plugin_dir_url( __FILE__ )   );
            
        }
        
        function customize ( $wp_customize ) {

            // Change the name of the Background Image section because we'll be including a color control too.
            $wp_customize->get_section('background_image')->title = __( 'Background' );

            // Add Background Color 
            $wp_customize->add_setting(
                'whimsy_bg_color',
                array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_hex_color'
                )
            );
            $wp_customize->add_control(
                new WP_Customize_Color_Control(
                    $wp_customize,
                    'whimsy_bg_color',
                    array(
                        'label' 	=> __( 'Background Color', 'whimsy-framework' ),
                        'section' 	=> 'background_image',
                        'settings' 	=> 'whimsy_bg_color'
                    )
                )
            );

            // Add our new Whimsy+BG control.
            $wp_customize->add_setting( 'whimsy_backgrounds_customize_options', array(
                'default' => 'none',
                'transport' => 'refresh'
            ) );

            $wp_customize->add_control( new Whimsy_Layout_Control( $wp_customize, 'whimsy_backgrounds_customize_options', array(
                'label' => __( 'Background Overlay', 'whimsy-backgrounds' ),
                'section' => 'background_image',
                'layouts' => array(
                    'none' => array(
                        'label' => __( 'No Overlay', 'whimsy-backgrounds' )
                    ),
                    'dots' => array(
                        'label' => __( 'Dots', 'whimsy-backgrounds' )
                    ),
                    'feathered' => array(
                        'label' => __( 'Feathered', 'whimsy-backgrounds' )
                    ),
                    'floral-mural' => array(
                        'label' => __( 'Floral Mural', 'whimsy-backgrounds' )
                    ),
                    'sketchy-lines' => array(
                        'label' => __( 'Sketched Lines', 'whimsy-backgrounds' )
                    ),
                    'woven-fabric' => array(
                        'label' => __( 'Woven Fabric', 'whimsy-backgrounds' )
                    ),
                    'honeycomb' => array(
                        'label' => __( 'Honeycomb', 'whimsy-backgrounds' )
                    ),
                    'quatrefoil' => array(
                        'label' => __( 'Quatrefoil', 'whimsy-backgrounds' )
                    ),
                    'sketchy-clouds' => array(
                        'label' => __( 'Sketched Clouds', 'whimsy-backgrounds' )
                    ),
                    'arrow-hearts' => array(
                        'label' => __( 'Arrows+Hearts', 'whimsy-backgrounds' )
                    ),
                    'sketchy-doodles' => array(
                        'label' => __( 'Doodles', 'whimsy-backgrounds' )
                    )
                ),
                'priority' => 10
            ) ) );
                        
        }

        /**
         * Insert Customizer styles.
         */
        function style() {
            echo '<!-- Begin Whimsy Background styles --><style type="text/css">';

            $whimsy_bg_color = get_theme_mod( 'whimsy_bg_color' );
            if( get_theme_mod( 'whimsy_bg_color' ) == true ) { 
                echo 'body.custom-background { background-color: ' . esc_html($whimsy_bg_color) . ' }';
            }
            
            $whimsy_backgrounds_customize_options = get_theme_mod( 'whimsy_backgrounds_customize_options' );
            if( get_theme_mod( 'whimsy_backgrounds_customize_options' ) == true ) { 
                echo 'body.custom-background { background-image: url( '. plugin_dir_url( __FILE__ ) . 'img/whimsy-bg-' . esc_html( $whimsy_backgrounds_customize_options ) . '.png) }';
            }
            echo '</style>';
        }
        
        /**
         * Include additional styles when in admin.
         */
        function admin() {

             /* Enqueue the appropriate CSS based on which skin is selected via Theme Customizer */

            wp_enqueue_style( 'whimsy-backgrounds-admin', plugin_dir_url( __FILE__ ) . 'css/whimsy-bg.css' );
            
        }
    }
    
    new WhimsyBackgrounds();
}