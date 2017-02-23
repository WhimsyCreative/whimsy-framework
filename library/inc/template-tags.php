<?php
/**
 * Custom template tags for this theme.
 *
 * @package whimsy-framework
 */

add_action( 'whimsy_header', 'whimsy_get_header', 10 );

add_action( 'whimsy_nav_inside_before', 'whimsy_mobile_branding', 10 );
add_action( 'whimsy_nav_inside_before', 'whimsy_responsive_nav', 40 );

add_action( 'whimsy_post_meta_before',  'whimsy_display_post_categories', 10 );

add_action( 'whimsy_post_meta_after',   'whimsy_display_post_meta', 10 );
add_action( 'whimsy_post_meta_after',   'whimsy_display_post_thumbnail', 30);



/**
 * Custom functions that act independently of the theme templates.
 */
    require_once WHIMSY_FUNC . 'responsive-nav.php';

    require_once WHIMSY_FUNC . 'categorized-blog.php';

    require_once WHIMSY_FUNC . 'display-post-categories.php';

    require_once WHIMSY_FUNC . 'display-post-thumbnail.php';

    require_once WHIMSY_FUNC . 'display-post-meta.php';

    require_once WHIMSY_FUNC . 'paging-nav.php';

    require_once WHIMSY_FUNC . 'post-nav.php';

    require_once WHIMSY_FUNC . 'posted-on.php';

    require_once WHIMSY_FUNC . 'whimsy-get-header.php';