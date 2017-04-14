<?php
/**
 * @package whimsy-framework
 */
?>
<?php
    $content = apply_filters( 'the_content', get_the_content() );
    $video = false;
    // Only get video from the content if a playlist isn't present.
    if ( false === strpos( $content, 'wp-playlist-script' ) ) {
        $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
    }
?>

<?php if ( '' !== get_the_post_thumbnail() && ! is_single() && empty( $video ) ) : ?>
    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( ); ?>
        </a>
    </div><!-- .post-thumbnail -->
<?php endif; ?>
    
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header"> 
	
	<?php whimsy_post_meta_before(); ?>

	<div class="entry-meta">
        <?php whimsy_post_meta_inside(); ?>
        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
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
	

	<div class="entry-content">

		<?php
		if ( ! is_single() ) {
			// If not a single post, highlight the video file.
			if ( ! empty( $video ) ) {
				foreach ( $video as $video_html ) {
					echo '<div class="entry-video">';
						echo $video_html;
					echo '</div>';
				}
			};
		};
		if ( is_single() || empty( $video ) ) {
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
				get_the_title()
			) );
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
		};
		?>

	</div><!-- .entry-content -->