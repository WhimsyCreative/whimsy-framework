<?php
/**
 * Custom template tags for this theme.
 *
 * @package whimsy-framework
 */

add_action( 'whimsy_post_meta_before', 'whimsy_display_post_categories', 10 );
add_action( 'whimsy_post_meta_after', 'whimsy_display_post_thumbnail', 10);
add_action( 'whimsy_post_meta_after', 'whimsy_display_post_meta', 20 );
//add_action( 'whimsy_post_meta_after', 'whimsy_author_gravatar', 15 );

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/library/inc/functions/author-gravatar.php';
require_once get_template_directory() . '/library/inc/functions/categorized-blog.php';
require_once get_template_directory() . '/library/inc/functions/display-post-categories.php';
require_once get_template_directory() . '/library/inc/functions/display-post-thumbnail.php';
require_once get_template_directory() . '/library/inc/functions/display-post-meta.php';
require_once get_template_directory() . '/library/inc/functions/paging-nav.php';
require_once get_template_directory() . '/library/inc/functions/post-nav.php';
require_once get_template_directory() . '/library/inc/functions/posted-on.php';
require_once get_template_directory() . '/library/inc/functions/responsive-nav.php';