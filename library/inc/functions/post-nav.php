<?php
/**
 * Display navigation to next/previous post when applicable.
 */

if ( ! function_exists( 'whimsy_post_nav' ) ) :

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
					next_post_link( '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'whimsy-framework' ) );
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}

endif;
