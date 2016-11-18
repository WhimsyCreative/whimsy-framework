<?php
/**
 * @package whimsy-framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="entry-content">

			<?php the_content(); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'whimsy-framework' ),
					'after'  => '</div>',
				) );
			?>

	</section><!-- .entry-content -->
	
</article><!-- #post-## -->