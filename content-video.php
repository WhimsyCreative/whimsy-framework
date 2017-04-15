<?php
/**
 * @package whimsy-framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
        <?php echo ( $video = hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true ) ) ); ?>

		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'whimsy-framework' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'whimsy-framework' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
	