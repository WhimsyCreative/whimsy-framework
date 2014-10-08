<?php
/**
 * whimsy functions and definitions
 *
 * @package whimsy
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 850; /* pixels */
}

if ( ! function_exists( 'whimsy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function whimsy_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on whimsy, use a find and replace
	 * to change 'whimsy' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'whimsy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 1200, 9999, true );
	add_image_size( 'single-background', 1200, 9999 ); //300 pixels wide (and unlimited height)

	/*
	 * WooCommerce Support
	 */
	add_theme_support( 'woocommerce' ); 
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'whimsy' ),
		'footer' => __( 'Footer Menu', 'whimsy' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'whimsy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // whimsy_setup
add_action( 'after_setup_theme', 'whimsy_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function whimsy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'whimsy' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets (1)', 'whimsy' ),
		'id'            => 'footer-widgets-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets (2)', 'whimsy' ),
		'id'            => 'footer-widgets-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets (3)', 'whimsy' ),
		'id'            => 'footer-widgets-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'whimsy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function whimsy_scripts() {
	wp_register_style( 'whimsy-grid', get_template_directory_uri() . '/css/grid.css', false, false );
	wp_enqueue_style( 'whimsy-grid' );
	wp_enqueue_style( 'whimsy-style', get_stylesheet_uri() );
	wp_enqueue_script( 'whimsy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'whimsy-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_page_template('template-mosaic.php') ) {
 		wp_enqueue_script( 'jquery-masonry' );
		wp_enqueue_script( 'whimsy-mosaic', get_template_directory_uri() . '/js/mosaic.js', array('jquery'), '1.0', true );
	}
	wp_enqueue_style( 'whimsy-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', array(), '4.1.0' );
	wp_register_style( 'whimsy-custom', get_stylesheet_directory_uri() . '/custom.css', false, false );
	wp_enqueue_style( 'whimsy-custom' );

}
add_action( 'wp_enqueue_scripts', 'whimsy_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Whimsical Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/*
 * WooCommerce
 */
if (class_exists('woocommerce')) {
	add_action('woocommerce_before_main_content', 'whimsy_woo_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'whimsy_woo_wrapper_end', 10);

	function whimsy_woo_wrapper_start() {
	  echo '<div id="whimsy-commerce" class="c8">';
	}

	function whimsy_woo_wrapper_end() {
	  echo '</div>';
	}
} 