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
	</div><!-- #content-container -->

	<footer id="colophon" class="site-footer grid" role="contentinfo">
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		<div id="footer-widgets" class="row">
			<div class="c4"><?php dynamic_sidebar( 'footer-widgets-1' ); ?></div>
			<div class="c4"><?php dynamic_sidebar( 'footer-widgets-2' ); ?></div>
			<div class="c4 end"><?php dynamic_sidebar( 'footer-widgets-3' ); ?></div>
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'whimsy' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'whimsy' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'whimsy' ), 'whimsy', '<a href="http://thefanciful.com" rel="designer">The Fanciful</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
