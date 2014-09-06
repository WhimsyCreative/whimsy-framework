<?php
/*
Template Name: Mosaic Template
*/

get_header(); ?>

	<div id="whimsy-full" class="12">
		<main id="main" class="site-main" role="main">
		
<!-- Start the Loop. -->
			<div id="mosaic" >
				<?php
					$temp = $wp_query;
					$wp_query= null;
					$wp_query = new WP_Query();
					$wp_query->query('posts_per_page=100'.'&paged='.$paged);
					while ($wp_query->have_posts()) : $wp_query->the_post();
				?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'mosaic' );
				?>

				<?php endwhile;?>
				<?php $wp_query = null; $wp_query = $temp;?>

			<?php whimsy_paging_nav(); ?>


			</div><!-- #mosaic -->

		</main><!-- #main -->
		<script type="text/javascript">
			jQuery( document ).ready( function( $ ) {
			$( '#mosaic' ).masonry( { columnWidth: 290 } );
			} );
		</script>
<?php get_footer(); ?>