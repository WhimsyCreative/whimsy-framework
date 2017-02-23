<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up to <div id="content">
 *
 * @package whimsy-framework
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	if ( ! function_exists( 'whimsy_render_title_tag' ) ) {
		function whimsy_render_title() {
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
		}
		add_action( 'wp_head', 'whimsy_render_title' );
	}
?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php whimsy_body_start(); ?>

<div id="page" class="hfeed site grid">

<?php whimsy_header_before(); ?>

	<div id="header-container">

		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'whimsy-framework' ); ?></a>		
		
		<?php whimsy_nav_before(); ?>

		<nav id="site-navigation">
            
			<?php whimsy_nav_inside_before(); ?>

			<?php whimsy_nav_inside_after(); ?>

		</nav><!-- /#site-navigation -->

		<?php whimsy_nav_after(); ?>

		<header id="masthead" class="site-header" role="banner">
		
		<?php whimsy_header_inside_before(); ?>
            
		<?php whimsy_header(); ?>

		<?php whimsy_header_inside_after(); ?>

		</header><!-- /#masthead -->

	</div><!-- /#header-container -->

	<?php whimsy_header_after(); ?>

	<div id="content-container">