<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

if ( ! function_exists( 'whimsy_body_classes' ) ) :
    add_filter( 'body_class', 'whimsy_body_classes' );

    function whimsy_body_classes( $classes ) {

        // Adds a class of group-blog to blogs with more than 1 published author.
        if ( is_multi_author() ) {
            $classes[] = 'group-blog';
        }

        return $classes;

    }
endif;

/**
 * Link Twitter mentions to profile
 */
if ( ! function_exists( 'whimsy_link_twitter_mention' ) ) :

    function whimsy_link_twitter_mention($content) {
        return preg_replace('/([^a-zA-Z0-9-_&])@([0-9a-zA-Z_]+)/', "$1<a href=\"http://twitter.com/$2\" target=\"_blank\" rel=\"nofollow\">@$2</a>", $content);
    }

    add_filter('the_content', 'whimsy_link_twitter_mention');   
    add_filter('comment_text', 'whimsy_link_twitter_mention');
    
endif;