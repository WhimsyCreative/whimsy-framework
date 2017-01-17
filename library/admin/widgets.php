<?php
 
add_action( 'widgets_init', 'whimsy_widgets_init' );

/**
 * Register Whimsy Framework widget areas.
 */
 
function whimsy_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'whimsy-framework' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets (1)', 'whimsy-framework' ),
		'id'            => 'footer-widgets-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets (2)', 'whimsy-framework' ),
		'id'            => 'footer-widgets-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Widgets (3)', 'whimsy-framework' ),
		'id'            => 'footer-widgets-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

/**
 * Include custom widgets for the Whimsy Framework.
 */
 
    require_once WHIMSY_ADMIN . '/widgets/about-me.php';
    require_once WHIMSY_ADMIN . '/widgets/social.php';