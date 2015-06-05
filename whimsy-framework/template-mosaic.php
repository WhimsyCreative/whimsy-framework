<?php
/*
Template Name: Mosaic Template
*/

get_header(); ?>

	<div id="mosaic" class="container">

		<?php

		$mosaic_query = new WP_Query( 'posts_per_page=-1' . '&paged=' . absint ( $paged) );

		while($mosaic_query->have_posts()) : $mosaic_query->the_post();

			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'content', 'mosaic' );

		endwhile;

		wp_reset_postdata();

		whimsy_paging_nav();
		?>

	</div><!-- #mosaic -->

<?php get_footer(); ?>