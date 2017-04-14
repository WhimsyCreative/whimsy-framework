<?php
/**
 * @package whimsy-framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header"> 
	
	<?php whimsy_post_meta_before(); ?>

	<div class="entry-meta">
        
	   <?php whimsy_post_meta_inside(); ?>
        
		<?php 
        $whimsy_framework_hide_page_title = get_theme_mod( 'whimsy_framework_hide_page_title' );
        $whimsy_framework_hide_page_title_link = get_theme_mod( 'whimsy_framework_hide_page_title_link' );

        if( $whimsy_framework_hide_page_title == 1 ) : ?>

        <?php elseif( $whimsy_framework_hide_page_title_link == 1 || $whimsy_framework_hide_page_title == 0 && $whimsy_framework_hide_page_title_link == 1 ) : ?>

            <div class="entry-meta">
                <?php whimsy_post_meta_inside(); ?>
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div>

        <!-- Don't show post meta for links -->
        <?php else : ?>

            <div class="entry-meta">
                <?php whimsy_post_meta_inside(); ?>
                <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
            </div>

        <?php endif; ?>
        
	</div>
	
	<?php whimsy_post_meta_after(); ?>

	</header><!-- .entry-header -->
	
	<div class="entry-content">
        
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'whimsy-framework' ) ); ?>
        
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'whimsy-framework' ),
				'after'  => '</div>',
			) );
		?>
        
	</div><!-- .entry-content -->

</article><!-- #post-## -->