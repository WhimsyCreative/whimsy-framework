<?php
/**
 * @package whimsy-framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header"> 
	
	<?php whimsy_post_meta_before(); ?>

	<div class="entry-meta">
	
	<?php whimsy_post_meta_after(); ?>

	</header><!-- .entry-header -->

	<section class="entry-content">

			<?php the_content(); ?>

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'whimsy-framework' ),
					'after'  => '</div>',
				) );
			?>

	</section><!-- .entry-content -->
	
	<footer class="entry-footer">

	<?php whimsy_post_footer_before(); ?>

	<?php edit_post_link( __( 'Edit', 'whimsy-framework' ), '<span class="edit-link">', '</span>' ); ?>
	
	<?php whimsy_post_footer_after(); ?>

	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->