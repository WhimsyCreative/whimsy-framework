<?php
/*
Template Name: Mosaic Template
*/

get_header(); ?>

	<div id="whimsy-full" class="12">
		<main id="main" class="site-main" role="main">

			<div id="mosaic" >
				<?php
				$mosaic_query = new WP_Query('posts_per_page=100'.'&paged='.$paged); // exclude category
				while($mosaic_query->have_posts()) : $mosaic_query->the_post();
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'mosaic' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php whimsy_paging_nav(); ?>
			</div><!-- #mosaic -->

		</main><!-- #main -->

<?php get_footer(); ?>