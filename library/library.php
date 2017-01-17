<?php
/**
 * Whimsy Framework - A WordPress theme development framework.
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU 
 * General Public License as published by the Free Software Foundation; either version 2 of the License, 
 * or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without 
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * You should have received a copy of the GNU General Public License along with this program; if not, write 
 * to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
 *
 * @package   whimsy-framework
 * @version   2.0.0
 * @author    Natasha K. Cross <natasha@thefanciful.com>
 * @copyright Copyright (c) 2014-2016, Justin Tadlock
 * @link      http://thefanciful.com/whimsy/framework
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( !class_exists( 'Whimsy' ) ) {

	/**
	 * @since  1.0.0
	 * @access public
	 */
	class Whimsy {

		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function __construct() {
        
			global $whimsy;

			/* Set up an empty class for the global $whimsy object. */
			$whimsy = new stdClass;

			/* Define framework, parent theme, and child theme constants. */
			add_action( 'after_setup_theme', array( $this, 'constants' ), 1 );

			/* Load the core functions/classes required by the rest of the framework. */
			add_action( 'after_setup_theme', array( $this, 'includes' ), 2 );
        
			/* Load the scripts and styles defined by the framework. */
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 0 );

        }
   
		/**
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		function constants() {

			/* Sets the framework version number. */
			define( 'WHIMSY_VERSION', '2.0.0' );

			/* Sets the paths to the parent theme directory. */
			define( 'WHIMSY_DIR', get_template_directory() );
			define( 'WHIMSY_URI', get_template_directory_uri() );

			// Sets the paths to the child theme directory. 
			define( 'WHIMSY_CHILD_DIR', get_stylesheet_directory() );
			define( 'WHIMSY_CHILD_URI', get_stylesheet_directory_uri() );
            
            // Sets the paths to the Whimsy library.
			define( 'WHIMSY_LIB_PATH',       trailingslashit( WHIMSY_DIR  .   '/library'   ) );
			define( 'WHIMSY_LIB_URI',        trailingslashit( WHIMSY_URI  .   '/library'   ) );
            
			// Core framework directory paths.
			define( 'WHIMSY_ADMIN',     trailingslashit( WHIMSY_LIB_PATH . 'admin'                            ) );
			define( 'WHIMSY_CUSTOMIZE', trailingslashit( WHIMSY_LIB_PATH . 'admin/customize'                  ) );
			define( 'WHIMSY_INC',       trailingslashit( WHIMSY_LIB_PATH . 'inc'                              ) );
            
			define( 'WHIMSY_EXT',       trailingslashit( WHIMSY_LIB_PATH . 'extensions'                       ) );
			define( 'WHIMSY_BG',        trailingslashit( WHIMSY_LIB_PATH . 'extensions/whimsy-bg'             ) );
			define( 'WHIMSY_COLORS',    trailingslashit( WHIMSY_LIB_PATH . 'extensions/whimsy-colors'         ) );
			define( 'WHIMSY_SHARING',   trailingslashit( WHIMSY_LIB_PATH . 'extensions/whimsy-sharing'        ) );
            
			// Core framework directory URIs.
			define( 'WHIMSY_CSS', trailingslashit( WHIMSY_LIB_URI . 'css' ) );
			define( 'WHIMSY_JS',  trailingslashit( WHIMSY_LIB_URI . 'js'  ) );
            
        }
        
        function includes() {

            /**
             * Custom functions that act independently of the theme templates.
             */
            
            require_once WHIMSY_ADMIN . 'plugins.php';
            require_once WHIMSY_ADMIN . 'welcome-screen.php';
            require_once WHIMSY_ADMIN . 'widgets.php';
            
            require_once WHIMSY_CUSTOMIZE . 'customizer.php';
            require_once WHIMSY_CUSTOMIZE . 'custom-header.php';
            
            require_once WHIMSY_INC . 'extras.php';
            require_once WHIMSY_INC . 'fonts.php';
            require_once WHIMSY_INC . 'hooks.php';
            require_once WHIMSY_INC . 'template-tags.php';
            
            require_once WHIMSY_BG      . 'whimsy-bg.php';
            require_once WHIMSY_COLORS  . 'whimsy-colors.php';
            //require_once WHIMSY_SHARING . 'whimsy-sharing.php';
            
            

        }
        
        function enqueue() {

            /**
             * Enqueue scripts and styles.
             */
            
            wp_enqueue_style( 'whimsy-style', get_stylesheet_uri() );

            wp_enqueue_style( 'whimsy-grid', get_template_directory_uri() . '/library/css/grid.css', '1.0', false, false );

            wp_enqueue_style( 'whimsy-menu', get_template_directory_uri() . '/library/css/navigation.css', '1.0', false, false );

            wp_enqueue_style( 'whimsy-fonts', whimsy_framework_fonts_url(), array(), null );
            
            wp_enqueue_script( 'whimsy-navigation', get_template_directory_uri() . '/library/js/jquery.slimmenu.js', array('jquery'), '1.0', true );

            wp_enqueue_script( 'whimsy-scripts', get_template_directory_uri() . '/library/js/scripts.js', array(), '1.0', true );

            wp_enqueue_script( 'whimsy-skip-link-focus-fix', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '1.0', true );

            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }

            if ( is_page_template('template-mosaic.php') ) {
                wp_enqueue_script( 'whimsy-mosaic', get_template_directory_uri() . '/library/js/mosaic.js', array('jquery-masonry'), '1.0', true );
            }

            wp_enqueue_style( 'whimsy-font-awesome', get_template_directory_uri() . '/library/css/font-awesome.min.css', '4.3.0', false );

            $whimsy_framework_layout = get_theme_mod( 'whimsy_framework_layout' );
            if ( $whimsy_framework_layout  == 'sidebar-content' ) {
                wp_enqueue_style( 'whimsy-layout-sidebar-content', get_template_directory_uri() . '/library/css/layouts/sidebar-content.css' );
            }

            if ( $whimsy_framework_layout  == 'full-width' ) {
                wp_enqueue_style( 'whimsy-layout-full-width', get_template_directory_uri() . '/library/css/layouts/full-width.css' );
            }

        }
    }
}