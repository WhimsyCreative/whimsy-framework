<?php
/**
 * @package   WhimsyFramework
 * @version   1.0.0
 * @author    Natasha K. Cross <natasha@thefanciful.com>
 * @copyright 2016, Natasha K. Cross
 * @link      http://thefanciful.com/whimsy
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( !class_exists( 'WhimsyColors' ) ) {

	class WhimsyColors {

		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function __construct() {
        
			global $WhimsyColors;

			/* Set up an empty class for the global $whimsy object. */
			$WhimsyColors = new stdClass;

			/* Define Whimsy+Skins constants. */
			add_action( 'init', array( $this, 'constants' ), 1 );
            
			/* Load the settings and controls for the Customizer. */
            add_action( 'customize_register', array( $this, 'customize' ), 40 );
            
			/* Enqueue necessary scripts and CSS files for the skins . */
            add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 15 );
            
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
			define( 'WHIMSY_COLORS_VERSION', '1.0.0' );
            
			/* Sets the path to the plugin directory. */
            define( 'WHIMSY_COLORS_DIR',      plugin_dir_path( __FILE__ )  );
            
			/* Sets the url to the plugin directory. */
            define( 'WHIMSY_COLORS_URI',      plugin_dir_url( __FILE__ )   );
            
        }
        
        function customize ( $wp_customize ) {
                        
			// Include customizer settings and controls for Colors.
            require_once plugin_dir_path( __FILE__ ) . 'whimsy-colors-customizer.php' ;
            
        }

        /**
         * Insert Customizer styles.
         */
        function style() {
            echo '<!-- Begin Whimsy Colors styles --><style type="text/css">';
	
            if( get_theme_mod( 'whimsy_framework_logo_center' ) == false ) { 
                echo '.site-branding > .site-logo img {  max-width: 25%;  text-align: left;  float: left;  margin-bottom: 1.2em; }';
            }
            
            $whimsy_alt_color = get_theme_mod( 'whimsy_alt_color' );
            if( get_theme_mod( 'whimsy_alt_color' ) == true ) { 
                echo 'a:hover, a:focus, a:active, .collapse-button, #site-navigation ul.sub-menu a:hover, ul.whimsy-nav li a, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover { color: ' . esc_html($whimsy_alt_color) . ' }';
                echo '::selection { background: ' . esc_html($whimsy_link_color) . ' }';
                echo '::-moz-selection { background: ' . esc_html($whimsy_link_color) . ' }';
                echo '.collapse-button:hover, .collapse-button:focus { background-color: ' . esc_html($whimsy_alt_color) . '; }';
                echo 'h1,h2,h3,h4,h5,h6 { color: ' . esc_html($whimsy_alt_color) . ' }';
                echo 'a.btn-shortcode:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover { border-color: ' . esc_html($whimsy_alt_color) . ' }';
            }
            
            $whimsy_link_color = get_theme_mod( 'whimsy_link_color' );
            if( get_theme_mod( 'whimsy_link_color' ) == true ) { 
                echo 'a, a:visited, ul.whimsy-nav li a:hover, ul.whimsy-nav li a:focus, .entry-title a { color: ' . esc_html($whimsy_link_color) . ' }';
                echo 'a.btn-shortcode, button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span { border-color: ' . $whimsy_link_color . '; color:' . esc_html($whimsy_link_color) . ' }';
            }
            $whimsy_link_hover_color = get_theme_mod( 'whimsy_link_hover_color' );
            if( get_theme_mod( 'whimsy_link_hover_color' ) == true ) { 
                echo 'a:hover, a:focus, a:active, .collapse-button, #site-navigation ul.sub-menu a:hover, ul.whimsy-nav li a, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover { color: ' . esc_html($whimsy_link_hover_color) . ' }';
            }
            
            $whimsy_body_color = get_theme_mod( 'whimsy_body_color' );
            if( get_theme_mod( 'whimsy_body_color' ) == true ) { echo 'body, #content, .widget { color: ' . esc_html($whimsy_body_color) . ' }'; }
            
            $whimsy_menu_background_color = get_theme_mod( 'whimsy_menu_background_color' );   
            if( get_theme_mod( 'whimsy_menu_background_color' ) == true ) { echo '#site-navigation, #site-navigation ul.whimsy-nav.collapsed { background: ' . esc_html($whimsy_menu_background_color) . '; }'; }
            
            $whimsy_menu_link_color = get_theme_mod( 'whimsy_menu_link_color' ); 
            if( get_theme_mod( 'whimsy_menu_link_color' ) == true ) { echo '#site-navigation a, .sub-collapser { color: ' . esc_html($whimsy_menu_link_color) . '; }'; }
            
            $whimsy_menu_link_hover_color = get_theme_mod( 'whimsy_menu_link_hover_color' );   
            if( get_theme_mod( 'whimsy_menu_link_hover_color' ) == true ) { echo '#site-navigation a:hover, #site-navigation a:focus, .sub-collapser :hover, .sub-collapser :focus { color: ' . esc_html($whimsy_menu_link_hover_color) . '; }'; }
            
            $whimsy_submenu_background_color = get_theme_mod( 'whimsy_submenu_background_color' );  
            if( get_theme_mod( 'whimsy_submenu_background_color' ) == true ) { echo '#site-navigation ul.sub-menu, #site-navigation ul.sub-menu li { background: ' . esc_html($whimsy_submenu_background_color) . '; }'; }
            
            $whimsy_submenu_link_color = get_theme_mod( 'whimsy_submenu_link_color' );   
            if( get_theme_mod( 'whimsy_submenu_link_color' ) == true ) { echo '#site-navigation ul.sub-menu a { color: ' . esc_html($whimsy_submenu_link_color) . '; }'; }

            $whimsy_header_container_bg_color = get_theme_mod( 'whimsy_header_container_bg_color' ); 
            if( get_theme_mod( 'whimsy_header_container_bg_color' ) == true ) { echo '#header-container { background-color: ' . esc_html($whimsy_header_container_bg_color) . '; }'; }

            $whimsy_masthead_bg_color = get_theme_mod( 'whimsy_masthead_bg_color' );   
            if( get_theme_mod( 'whimsy_masthead_bg_color' ) == true ) { echo '#masthead { background-color: ' . esc_html($whimsy_masthead_bg_color) . '; }'; }
            
            $whimsy_masthead_text_color = get_theme_mod( 'whimsy_masthead_text_color' );   
            if( get_theme_mod( 'whimsy_masthead_text_color' ) == true ) { echo '#masthead { color: ' . esc_html($whimsy_masthead_text_color) . '; }'; }
            
            $whimsy_site_title_color = get_theme_mod( 'whimsy_site_title_color' );   
            if( get_theme_mod( 'whimsy_site_title_color' ) == true ) { echo '.site-branding > hgroup > h1.site-title a { color: ' . esc_html($whimsy_site_title_color) . '; }'; }
            
            $whimsy_site_desc_color = get_theme_mod( 'whimsy_site_desc_color' );   
            if( get_theme_mod( 'whimsy_site_desc_color' ) == true ) { echo '.site-branding > hgroup > h2.site-description { color: ' . esc_html($whimsy_site_desc_color) . '; }'; }


            if ( class_exists( 'woocommerce' ) ) { /* WooCommerce Styles*/
                echo '.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce-page .shipping-calculator-button, #infinite-handle span, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce-cart .wc-proceed-to-checkout { color: ' . esc_html($whimsy_link_color) . '; border-color: 1px solid ' . esc_html($whimsy_link_color) . ' }';
            } 

            echo '</style>';
            
        }
        
        /**
         * Include additional styles when in admin.
         */
        function enqueue() {

            // Enqueue live preview js.
            wp_enqueue_script( 'whimsy_customizer', plugin_dir_path( __FILE__ ) . 'customizer-colors.js', array( 'customize-preview' ), '1.0', true );

        }
    }
    
    new WhimsyColors();
}