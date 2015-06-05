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

<?php whimsy_sidebar_before(); ?>

<div id="secondary" class="c3 end" role="complementary">

	<?php whimsy_sidebar_inside_before(); ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

	<?php whimsy_sidebar_inside_after(); ?>

</div><!-- #secondary -->

<?php whimsy_sidebar_after(); ?>