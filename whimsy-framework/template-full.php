<?php
/*
Template Name: Full-width Template
*/

get_header(); ?>

<?php whimsy_content_before(); ?>

<div id="content" class="container row">

	<?php whimsy_main_before(); ?>

	<main id="main" class="site-main" role="main">
	
		<?php whimsy_main_inside_before(); ?>

		<?php whimsy_post_before(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php whimsy_post_after(); ?>

		<?php endwhile; // end of the loop. ?>

		<?php whimsy_paging_nav(); ?>

		<?php whimsy_main_inside_after(); ?>

	</main><!-- #main -->

	<?php whimsy_main_after(); ?>

</div><!-- #content -->
<?php get_footer(); ?>