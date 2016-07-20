<?php
/**
 * Hybrid Core - A WordPress theme development framework.
 *
 * Hybrid Core is a framework for developing WordPress themes.  The framework allows theme developers
 * to quickly build themes without having to handle all of the "logic" behind the theme or having to code 
 * complex functionality for features that are often needed in themes.  The framework does these things 
 * for developers to allow them to get back to what matters the most:  developing and designing themes.  
 * The framework was built to make it easy for developers to include (or not include) specific, pre-coded 
 * features.  Themes handle all the markup, style, and scripts while the framework handles the logic.
 *
 * Hybrid Core is a modular system, which means that developers can pick and choose the features they 
 * want to include within their themes.  Many files are only loaded if the theme registers support for the 
 * feature using the add_theme_support( $feature ) function within their theme.
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
 * @package   HybridCore
 * @version   2.0.4
 * @author    Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2008 - 2014, Justin Tadlock
 * @link      http://themehybrid.com/hybrid-core
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( !class_exists( 'Whimsy_Framework' ) ) {

	/**
	 * The Hybrid class launches the framework.  It's the organizational structure behind the entire framework. 
	 * This class should be loaded and initialized before anything else within the theme is called to properly use 
	 * the framework.  
	 *
	 * After parent themes call the Hybrid class, they should perform a theme setup function on the 
	 * 'after_setup_theme' hook with a priority of 10.  Child themes should add their theme setup function on
	 * the 'after_setup_theme' hook with a priority of 11.  This allows the class to load theme-supported features
	 * at the appropriate time, which is on the 'after_setup_theme' hook with a priority of 12.
	 *
	 * Note that while it is possible to extend this class, it's not usually recommended unless you absolutely 
	 * know what you're doing and expect your sub-class to break on updates.  This class often gets modifications 
	 * between versions.
	 *
	 * @since  0.7.0
	 * @access public
	 */
	class Whimsy_Framework {

		/**
		 * Constructor method for the Hybrid class.  This method adds other methods of the class to 
		 * specific hooks within WordPress.  It controls the load order of the required files for running 
		 * the framework.
		 *
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
		 * Defines the constant paths for use within the core framework, parent theme, and child theme.  
		 * Constants prefixed with 'HYBRID_' are for use only within the core framework and don't 
		 * reference other areas of the parent or child theme.
		 *
		 * @since  0.7.0
		 * @access public
		 * @return void
		 */
		function constants() {

			/* Sets the framework version number. */
			define( 'WHIMSY_VERSION', '2.0.0' );

			/* Sets the path to the parent theme directory. */
			define( 'THEME_DIR', get_template_directory() );

			/* Sets the path to the parent theme directory URI. */
			define( 'THEME_URI', get_template_directory_uri() );

			/* Sets the path to the child theme directory. */
			define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

			/* Sets the path to the child theme directory URI. */
			define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );
            
        }
        
        function includes() {

            /**
             * Custom functions that act independently of the theme templates.
             */
            require_once get_template_directory() . '/library/inc/extras.php';

            /**
             * Define action hooks for the theme.
             */
            require_once get_template_directory() . '/library/inc/hooks.php';

            /**
             * Include scripts and styles for the theme.
             */
            require_once get_template_directory() . '/library/inc/enqueue.php';

            /**
             * Custom template tags for this theme.
             */
            require_once get_template_directory() . '/library/inc/template-tags.php';

            /**
             * Implement the Custom Header feature.
             */
            require_once get_template_directory() . '/library/admin/customize/custom-header.php';

            /**
             * Customizer additions.
             */
            require_once get_template_directory() . '/library/admin/customize/customizer.php';

            /**
             * Plugin Recommendations
             */
            require_once get_template_directory() . '/library/admin/plugins.php';

            /**
             * Load Jetpack compatibility file.
             */
            require_once get_template_directory() . '/library/admin/plugins/jetpack.php';

            /**
             * Load WooCommerce compatibility file.
             */
            require_once get_template_directory() . '/library/admin/plugins/woocommerce.php';

            /**
             * Load Easy Digital Downloads compatibility file.
             */
            require_once get_template_directory() . '/library/admin/plugins/edd.php';

            /**
             * Whimsical Widgets
             */
            require_once get_template_directory() . '/library/admin/widgets.php';

            /**
             * Call the welcome screen for new users and updates.
             */
            require_once get_template_directory() . '/library/admin/welcome-screen.php';
        }
    }
}