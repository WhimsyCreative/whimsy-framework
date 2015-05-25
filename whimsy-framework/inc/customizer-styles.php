<?php
/**
 * Customizer style output
 *
 * @package whimsy-framework
 */

/**
 * Insert Customizer styles.
 */
function whimsy_customizer_styles() {
    echo '<!-- Begin Whimsy styles --><style type="text/css">';
	
	$whimsy_link_color = get_theme_mod( 'whimsy_link_color' );
	echo 'a, a:visited, ul.whimsy-nav li a:hover, ul.whimsy-nav li a:focus, .entry-title a { color: ' . esc_html($whimsy_link_color) . ' }';
	echo 'a.btn-shortcode, button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span { border-color: ' . $whimsy_link_color . '; color:' . esc_html($whimsy_link_color) . ' }';

	if( get_theme_mod( 'whimsy_framework_logo_center' ) == false ) { 
		echo '.site-branding > .site-logo img {  max-width: 25%;  text-align: left;  float: left;  margin-bottom: 1.2em; }';
	}

	if ( class_exists( 'woocommerce' ) ) {
		echo '.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce-page .shipping-calculator-button, #infinite-handle span { color: ' . esc_html($whimsy_link_color) . ' }';
	} 

	$whimsy_alt_color = get_theme_mod( 'whimsy_alt_color' );
	echo 'a:hover, a:focus, a:active, .collapse-button, #site-navigation ul.sub-menu a:hover, ul.whimsy-nav li a, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover { color: ' . esc_html($whimsy_alt_color) . ' }';
	echo '::selection { background: ' . esc_html($whimsy_link_color) . ' }';
	echo '::-moz-selection { background: ' . esc_html($whimsy_link_color) . ' }';
	echo '.collapse-button:hover, .collapse-button:focus { background-color: ' . esc_html($whimsy_alt_color) . '; }';
	echo 'h1,h2,h3,h4,h5,h6 { color: ' . esc_html($whimsy_alt_color) . ' }';
	echo 'a.btn-shortcode:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover { border-color: ' . esc_html($whimsy_alt_color) . ' }';

	$whimsy_body_color = get_theme_mod( 'whimsy_body_color' );
	echo '#content, .widget { color: ' . esc_html($whimsy_body_color) . ' }';

	$whimsy_menu_background_color = get_theme_mod( 'whimsy_menu_background_color' );   
	echo '#site-navigation, #site-navigation ul.whimsy-nav.collapsed { background: ' . esc_html($whimsy_menu_background_color) . '; }';

	$whimsy_menu_link_color = get_theme_mod( 'whimsy_menu_link_color' );   
	echo '#site-navigation a, .sub-collapser { color: ' . esc_html($whimsy_menu_link_color) . '; }';

	$whimsy_submenu_background_color = get_theme_mod( 'whimsy_submenu_background_color' );   
	echo '#site-navigation ul.sub-menu, #site-navigation ul.sub-menu li { background: ' . esc_html($whimsy_submenu_background_color) . '; }';

	$whimsy_submenu_link_color = get_theme_mod( 'whimsy_submenu_link_color' );   
	echo '#site-navigation ul.sub-menu a { color: ' . esc_html($whimsy_submenu_link_color) . '; }';

	echo '</style>';
}
add_action('wp_head', 'whimsy_customizer_styles');
