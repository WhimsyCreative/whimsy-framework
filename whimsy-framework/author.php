<?php
/**
 * The template for displaying author pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package whimsy-framework
 */
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

get_header(); ?>

<div id="content" class="container row">

	<section id="primary" class="c9">

		<main id="main" class="site-main" role="main">
		
			<div class="author-meta">

				<h3><?php printf( __( 'About %1$s', 'whimsy-framework' ), $curauth->nickname ); ?></h3>

				<div class="author-meta-avatar">

					<?php 
					/**
					 * Filter the author avatar size
					 */
					$author_meta_avatar_size = apply_filters( 'whimsy_author_meta_avatar_size', 140 );

					echo get_avatar( get_the_author_meta('email'), $author_meta_avatar_size ); 

					?>

				</div><!-- .author-meta-gravatar -->

				<dl>
				    <dt><?php _e( 'More Info', 'whimsy-framework' ); ?></dt>
				    <dd><?php echo $curauth->user_description; ?></dd>
					
					<dt><?php _e( 'Website', 'whimsy-framework' ); ?></dt>
				    <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
				</dl>
			</div> <!-- .author-meta -->

		<h2><?php printf( __( 'Posts by %1$s:', 'whimsy-framework' ), $curauth->nickname ); ?></h2>

		<ul>
		<!-- The Loop -->

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		    <li>
		        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
		        <?php the_title(); ?></a>, posted on <em><?php the_time( get_option( 'date_format' ) ); ?></em> in <?php the_category(' / ');?>
		    </li>

		<?php endwhile; else: ?>
		    <p><?php _e('No posts by this author.', 'whimsy-framework'); ?></p>

		<?php endif; ?>

		<!-- End Loop -->

		</ul>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>