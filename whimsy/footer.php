<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package whimsy
 */
?>
		
		</div><!-- #content -->
	</div><!-- #content-container -->

	<footer id="colophon" class="site-footer container grid" role="contentinfo">
		<div id="footer-widgets" class="row">
			<div class="c4"><?php dynamic_sidebar( 'footer-widgets-1' ); ?></div>
			<div class="c4"><?php dynamic_sidebar( 'footer-widgets-2' ); ?></div>
			<div class="c4 end"><?php dynamic_sidebar( 'footer-widgets-3' ); ?></div>
		</div>
		<div id="footer-menu">
			<?php 
				if(wp_nav_menu( array( 'theme_location' => 'footer', 'fallback_cb' => 'false') )) {
				echo wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => 'menu-footer', 'theme_location' => 'footer' , 'echo' => '0' ) );
			}
			else
			{
				// there's no custom menu created.
			}?>
		</div>
		<div class="site-info">
			<?php printf( __( '%1$s by %2$s.', 'whimsy' ), 'WordPress Theme', '<a href="http://thefanciful.com" rel="designer">The Fanciful</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
