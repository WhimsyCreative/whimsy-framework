<?php

if ( ! function_exists( 'whimsy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function whimsy_posted_on() {
    
    $whimsy_framework_hide_page_date = get_theme_mod( 'whimsy_framework_hide_page_date' );
    if ( $whimsy_framework_hide_page_date  == 0 ) {
        
        echo '<div class="entry-posted-on">';
    
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
        
        echo '</div>';
        
    }
}
endif;