<?php

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/library/inc/extras.php';

/**
 * Define action hooks for the theme.
 */
require_once get_template_directory() . '/library/inc/hooks.php';

/**
 * Include scripts and styles for the theme.
 */
require_once get_template_directory() . '/library/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/library/inc/template-tags.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/library/admin/customize/custom-header.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/library/admin/customize/customizer.php';

/**
 * Plugin Recommendations
 */
require_once get_template_directory() . '/library/admin/plugins.php';

/**
 * Load Jetpack compatibility file.
 */
require_once get_template_directory() . '/library/admin/plugins/jetpack.php';

/**
 * Load WooCommerce compatibility file.
 */
require_once get_template_directory() . '/library/admin/plugins/woocommerce.php';

/**
 * Load Easy Digital Downloads compatibility file.
 */
require_once get_template_directory() . '/library/admin/plugins/edd.php';

/**
 * Whimsical Widgets
 */
require_once get_template_directory() . '/library/admin/widgets.php';