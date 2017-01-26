<?php
/**
 * @package whimsy-framework
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header"> 
	
	<?php whimsy_post_meta_before(); ?>

	<div class="entry-meta">
        
		<?php 

            $whimsy_framework_hide_page_title_link = get_theme_mod( 'whimsy_framework_hide_page_title_link' );

            if ( $whimsy_framework_hide_page_title_link == 1 ) :
                
                the_title( '<h1 class="entry-title">', '</h1>' ); 
                
            else :
                
                the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
            
            endif;
        ?>
        
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