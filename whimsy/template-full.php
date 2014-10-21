<?php
/*
Template Name: Full-width Template
*/

get_header(); ?>

<div id="content" class="row">
	<div id="whimsy-full" class="12 end">
		<main id="main" class="site-main" role="main">
            
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

			<?php whimsy_paging_nav(); ?>


		</main><!-- #main -->
	</div><!-- #whimsy-full -->
</div><!-- #content -->
<?php get_footer(); ?>