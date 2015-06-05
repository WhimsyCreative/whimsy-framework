<?php
/**
 * Custom template tags for this theme.
 *
 * @package whimsy-framework
 */

if ( ! function_exists( 'whimsy_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function whimsy_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'whimsy-framework' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'whimsy-framework' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'whimsy-framework' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'whimsy_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function whimsy_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'whimsy-framework' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'whimsy-framework' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'whimsy-framework' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'whimsy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function whimsy_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		_x( '%s', 'post date', 'whimsy-framework' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'whimsy-framework' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span><span class="posted-on">' . $posted_on . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function whimsy_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'whimsy_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'whimsy_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so whimsy_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so whimsy_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in whimsy_categorized_blog.
 */
function whimsy_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'whimsy_categories' );
}
add_action( 'edit_category', 'whimsy_category_transient_flusher' );
add_action( 'save_post',     'whimsy_category_transient_flusher' );

/**
 * Whimsy Responsive Nav
 */
function whimsy_responsive_nav() {
	wp_nav_menu( array( 
		'theme_location' => 'primary',
		'container_class' => '',
		'menu_class' => 'whimsy-nav',
		'items_wrap' => '<ul id="whimsy-nav" class="%2$s">%3$s</ul>', 
	));
}

if ( ! function_exists( 'whimsy_display_post_categories' ) ) :
/**
 * Whimsy Display Post categories
 */
function whimsy_display_post_categories() {

	echo '<div class="entry-category">';
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ' / ', 'whimsy-framework' ) );
			
			printf(
				$category_list
			);
	echo "</div>";
}
add_action( 'whimsy_post_meta_before', 'whimsy_display_post_categories' );
endif;

if ( ! function_exists( 'whimsy_display_post_thumbnail' ) ) :
/**
 * Whimsy Display Post thumbnail
 */
function whimsy_display_post_thumbnail() {

	if( get_post_format() == 'link' ) : ?>

	<!-- Don't show post thumbnil for links -->

	<?php elseif( get_post_format() == 'gallery' ) : ?>

	<!-- Don't show post thumbnil galleries -->

	<?php else : ?>

		<div class="entry-img">

			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>
		
		</div>

	<?php endif;

}

add_action( 'whimsy_post_meta_after', 'whimsy_display_post_thumbnail', 10);
endif;

if ( ! function_exists( 'whimsy_display_post_meta' ) ) :
/**
 * Whimsy Display Post date and comments
 */
function whimsy_display_post_meta() {

	if( get_post_format() == 'link' ) : ?>

	<!-- Don't show post meta for links -->

	<?php else : ?>

		<div class="entry-meta clear">
			<div class="entry-posted-on"><?php whimsy_posted_on(); ?></div>
			<div class="entry-comment-meta"><a rel="nofollow" class="entry-comment" href="<?php the_permalink(); ?>#comments"><?php comments_number('0', '1', '%' );?> <i class="fa fa-comments"></i></a></div>
		</div><!-- .entry-meta -->

	<?php endif;

}
add_action( 'whimsy_post_meta_after', 'whimsy_display_post_meta', 15 );
endif;

if ( ! function_exists( 'whimsy_display_post_meta' ) ) :
/**
 * Whimsy display avatar in posts
 */
function whimsy_author_gravatar() {
	if ( 'post' == get_post_type() ) : 
?>
	<div class="author-gravatar">
		<?php echo get_avatar( get_the_author_meta( 'email' ), '80' ); ?>
	</div>
<?php 
	endif;
}
add_action('whimsy_post_meta_after', 'whimsy_author_gravatar', 11);
endif;
