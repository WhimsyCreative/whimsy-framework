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
			define( 'WHIMSY_LIB_PATH',       trailingslashit( WHIMSY_DIR .   '/library'   ) );
			define( 'WHIMSY_LIB_URI',        trailingslashit( WHIMSY_URI  .   '/library'   ) );
            
			// Core framework directory paths.
			define( 'WHIMSY_ADMIN',     trailingslashit( WHIMSY_LIB_PATH . 'admin'            ) );
			define( 'WHIMSY_CUSTOMIZE', trailingslashit( WHIMSY_LIB_PATH . 'admin/customize'  ) );
			define( 'WHIMSY_INC',       trailingslashit( WHIMSY_LIB_PATH . 'inc'              ) );
            
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
            
            require_once WHIMSY_INC . 'enqueue.php';
            require_once WHIMSY_INC . 'extras.php';
            require_once WHIMSY_INC . 'hooks.php';
            require_once WHIMSY_INC . 'template-tags.php';

        }
    }
}