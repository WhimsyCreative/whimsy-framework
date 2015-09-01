<?php
/**
 * The template for displaying all single posts.
 *
 * @package whimsy-framework
 */

get_header(); ?>

<?php whimsy_content_before(); ?>

<div id="content" class="container row">

	<div id="primary" class="c9">

		<?php whimsy_main_before(); ?>

		<main id="main" class="site-main" role="main">
		
			<?php whimsy_main_inside_before(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
		
			<?php whimsy_post_before(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

				<?php whimsy_post_nav(); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php whimsy_post_after(); ?>

			<?php endwhile; // end of the loop. ?>

			<?php whimsy_main_inside_after(); ?>

		</main><!-- #main -->

		<?php whimsy_main_after(); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>