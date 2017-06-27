<?php

// Whimsy Framework functions and definitions
add_action( 'after_setup_theme', 'whimsy_setup' );

require_once get_template_directory() . '/library/library.php';
new WHIMSY();

/**
 * Set content_width for WordPress.
 */
if ( ! isset( $content_width ) ) {

	$content_width = 850; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'whimsy_setup' ) ) :

	function whimsy_setup() {

		/*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on whimsy, use a find and replace
         * to change 'whimsy-framework' to the name of your theme in all the template files
         */
		load_theme_textdomain( 'whimsy-framework', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
		add_theme_support( 'title-tag' );

		/*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Set custom thumbnail dimensions
		 */
		set_post_thumbnail_size( 1200, 9999, true );
		add_image_size( 'whimsy-featured-image', 1200, 9999 ); // 1200 pixels wide (and unlimited height)

		/*
         * WooCommerce Support
         */
		add_theme_support( 'woocommerce' );

		/**
		 * This theme uses wp_nav_menu() in two locations.
		 */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'whimsy-framework' ),
			'footer' => __( 'Footer Menu', 'whimsy-framework' ),
		) );

		/*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
					) );

		/*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
					) );

		/**
		 * Setup the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'whimsy_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}

endif; // whimsy_setup
