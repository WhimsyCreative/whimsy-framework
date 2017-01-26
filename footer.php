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

	<?php whimsy_content_after(); ?>

	</div><!-- #content-container -->

	<?php whimsy_footer_before(); ?>

	<footer id="colophon" class="site-footer container grid" role="contentinfo">

		<?php whimsy_footer_inside_before(); ?>

		<div id="footer-widgets" class="row">
            
            <?php
            
            $whimsy_framework_layout_footer = get_theme_mod( 'whimsy_framework_layout_footer' );

            if( $whimsy_framework_layout_footer  == 'footer-1' ) : ?>

            <!-- Show 1 widget area in the footer. -->
            
                <div class="c12 end"><?php dynamic_sidebar( 'footer-widgets-1' ); ?></div>  

            <?php elseif( $whimsy_framework_layout_footer  == 'footer-2' ) : ?>

            <!-- Show 2 widget areas in the footer. -->
            
                <div class="c6"><?php dynamic_sidebar( 'footer-widgets-1' ); ?></div>    
                <div class="c6 end"><?php dynamic_sidebar( 'footer-widgets-2' ); ?></div>    

            <?php else : ?>
            
            <!-- Show 3 widget areas in the footer. -->

                <div class="c4"><?php dynamic_sidebar( 'footer-widgets-1' ); ?></div>
                <div class="c4"><?php dynamic_sidebar( 'footer-widgets-2' ); ?></div>
                <div class="c4 end"><?php dynamic_sidebar( 'footer-widgets-3' ); ?></div> 
            
            <?php  endif;  ?>

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

		<?php whimsy_footer_inside_after(); ?>

		<div class="site-info">
			<?php printf( __( '%2$s + %1$s', 'whimsy-framework' ), '<a href="http://wordpress.org">WordPress</a>', '<a href="http://whimsycreative.co/framework" rel="designer">Whimsy</a>' ); ?>
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

	<?php whimsy_footer_after(); ?>

</div><!-- #page -->

<?php whimsy_body_end(); ?>

<?php wp_footer(); ?>
</body>
</html>