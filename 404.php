<?php
/**
 * The template for displaying 404 pages (not found).
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

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'whimsy-framework' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">

					<?php whimsy_page_before(); ?>

					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'whimsy-framework' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( whimsy_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php _e( 'Most Used Categories', 'whimsy-framework' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'whimsy-framework' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					
					<?php whimsy_page_after(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

			<?php whimsy_main_inside_after(); ?>

		</main><!-- #main -->

		<?php whimsy_main_after(); ?>

	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>