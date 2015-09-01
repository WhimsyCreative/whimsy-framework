<?php
/**
 * @package whimsy-framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header"> 
	
	<?php whimsy_post_meta_before(); ?>

	<div class="entry-meta">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
	
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

		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'whimsy-framework' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'whimsy-framework' ) );

			if ( ! whimsy_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'whimsy-framework' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'whimsy-framework' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'whimsy-framework' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'whimsy-framework' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'whimsy-framework' ), '<span class="edit-link">', '</span>' ); ?>
	
		<?php whimsy_post_footer_after(); ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->