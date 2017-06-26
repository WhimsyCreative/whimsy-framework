<?php
/**
 * HTML output for footer credit.
 *
 * @since  2.1.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_get_footer_credits' ) ) :
function whimsy_get_footer_credits() {
		?>

		<div class="site-info">
		<?php printf( __( '%2$s + %1$s', 'whimsy-framework' ), '<a href="http://wordpress.org">WordPress</a>', '<a href="http://whimsycreative.co" rel="designer">Whimsy</a>' ); ?>
		</div><!-- .site-info -->

		<?php }
endif; // End function_exists Primary Menu.
