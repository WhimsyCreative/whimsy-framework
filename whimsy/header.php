<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package whimsy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); whimsy_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site grid">
	
	<div id="header-container">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'whimsy' ); ?></a>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><i class="fa fa-bars fa-2x"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">

				<?php if ( get_header_image() ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; // End header image check. ?>
			</div>

		</header><!-- #masthead -->
	</div><!-- #header-container -->

	<div id="content-container">
