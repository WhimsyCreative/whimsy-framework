<?php
/**
 * The Business sidebar containing an alternate widget area for the Business page template.
 *
 * @package whimsy
 */

if ( ! is_active_sidebar( 'business-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="c4 end" role="complementary">
	<?php dynamic_sidebar( 'business-sidebar' ); ?>
</div><!-- #secondary -->