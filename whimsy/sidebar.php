<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package whimsy
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

?>

<div id="secondary" class="c3 end" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->