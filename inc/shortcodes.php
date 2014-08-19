<?php
/**
 * Custom shortcodes built for whimsical inclusion, but also regular inclusion too.
 * @package whimsy
 */

// Add Recent Posts Shortcode
function recent_posts_shortcode( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'posts' => '5'
		), $atts )
	);

	// Code
$output = '<ul>';
$the_query = new WP_Query( array ( 'posts_per_page' => $posts ) );
while ( $the_query->have_posts() ):
	$the_query->the_post();
	$output = '<li>' . get_the_title() . '</li>';
endwhile;
wp_reset_postdata();
$output = '</ul>';
return $output;

}
add_shortcode( 'recentposts', 'recent_posts_shortcode' );

// Add Email Ninja Shortcode
function email_cloaking_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'email' => ''
		), $atts )
	);

	// Code
	return antispambot( $email );

}
add_shortcode( 'cloak', 'email_cloaking_shortcode' );

// Add Button Shortcode
function whimsy_button( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'url' => 'http://',
			'style' => '',
			'target' => '_blank',
			'size' => ''
		), $atts )
	);

	// Code
return '<a href="'.$url.'" class="btn-shortcode '.$style.' '.$size.'" target="'.$target.'">'.$content.'</a>';
}
add_shortcode( 'button', 'whimsy_button' );

// Add Accordian Shortcode

// Add Containing Shortcode
function whimsy_accordian( $atts , $content = null ) {
	// Code
return '<dl class="accordion">'.do_shortcode($content).'</dl>';
}
add_shortcode( 'accordian', 'whimsy_accordian' );

// Add Panel Shortcode
function whimsy_panel( $atts , $content = null ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'intro' => 'This is the title',
		), $atts )
	);

	// Code
return '<dt><a href="">'.$intro.'</a></dt><dd>'.$content.'</dd>';
}
add_shortcode( 'panel', 'whimsy_panel' );