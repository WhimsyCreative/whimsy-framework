<?php
/**
 * HTML output for menus.
 *
 * @since  2.1.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_primary_menu' ) ) :
function whimsy_primary_menu() {
		?>

		<?php whimsy_nav_before(); ?>

		<nav id="site-navigation">

		<?php whimsy_nav_inside_before(); ?>

		<?php whimsy_nav_inside_after(); ?>

		</nav><!-- /#site-navigation -->

		<?php whimsy_nav_after(); ?>

		<?php }
endif; // End function_exists Primary Menu.

// add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
// function your_custom_menu_item ( $items, $args ) {
// if (is_single() && $args->theme_location == 'primary') {
// $items .= '<li>Show whatever</li>';
// }
// return $items;
// }
