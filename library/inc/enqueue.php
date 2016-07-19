<?php

add_action( 'wp_enqueue_scripts', 'whimsy_scripts' );

/**
 * Enqueue scripts and styles.
 */
function whimsy_scripts() {
	
	wp_enqueue_style( 'whimsy-grid', get_template_directory_uri() . '/library/css/grid.css', '1.0', false, false );
	
	wp_enqueue_style( 'whimsy-menu', get_template_directory_uri() . '/library/css/navigation.css', '1.0', false, false );
	
	wp_enqueue_style( 'whimsy-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'whimsy-navigation', get_template_directory_uri() . '/library/js/jquery.slimmenu.js', array('jquery'), '1.0', true );
	
	wp_enqueue_script( 'whimsy-scripts', get_template_directory_uri() . '/library/js/scripts.js', array(), '1.0', true );
	
	wp_enqueue_script( 'whimsy-skip-link-focus-fix', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	if ( is_page_template('template-mosaic.php') ) {
		wp_enqueue_script( 'whimsy-mosaic', get_template_directory_uri() . '/library/js/mosaic.js', array('jquery-masonry'), '1.0', true );
	}
	
	wp_enqueue_style( 'whimsy-font-awesome', get_template_directory_uri() . '/library/css/font-awesome.min.css', array(), '4.3.0', false );
	
	$whimsy_framework_layout = get_theme_mod( 'whimsy_framework_layout' );
	if ( $whimsy_framework_layout  == 'sidebar-content' ) {
	    wp_enqueue_style( 'whimsy-layout-sidebar-content', get_template_directory_uri() . '/library/css/layouts/sidebar-content.css' );
	}

	if ( $whimsy_framework_layout  == 'full-width' ) {
	    wp_enqueue_style( 'whimsy-layout-full-width', get_template_directory_uri() . '/library/css/layouts/full-width.css' );
	}

}