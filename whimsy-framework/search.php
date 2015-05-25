<?php
/**
 * The template for displaying search results pages.
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

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'whimsy-framework' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'content', 'search' );
					?>

				<?php whimsy_post_after(); ?>

				<?php endwhile; ?>

				<?php whimsy_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			<?php whimsy_main_inside_after(); ?>

		</main><!-- #main -->

		<?php whimsy_main_after(); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>