<?php

/**
 * Dynamically build out the header so it can be extended by the Customizer.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_get_header' ) ) :
function whimsy_get_header() { 
?>
				
<header id="masthead" class="site-header" role="banner">
		
    <?php whimsy_header_inside_before(); ?>
            
        <?php whimsy_desktop_branding(); ?>

		<?php if ( get_header_image() ) : ?>

			<div class="custom-header">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">						
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</a>
			
			</div><!-- /.custom-header -->

    <?php endif; // End header image check.
    
    whimsy_header_inside_after(); ?>

</header><!-- /#masthead -->

    <?php 
}
endif; // End function_exists whimsy_get_header check 

/**
 * HTML output for mobile site branding.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_mobile_branding' ) ) :
function whimsy_mobile_branding() {
?>
            
    <div class="mobile-site-branding"><!-- Does not display on screens larger than 980px -->

        <?php if ( get_theme_mod( 'whimsy_framework_logo_mobile' ) ) : ?>

            <div class="site-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'whimsy_framework_logo_mobile' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
            </div>

        <?php else : // If no logo is set, display title as text. ?>

                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

        <?php endif; // End mobile logo check. ?>

    </div><!-- /.mobile-site-branding -->

<?php }
endif; // End function_exists mobile logo check.

/**
 * HTML output for desktop site branding.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_desktop_branding' ) ) :
function whimsy_desktop_branding() { 
?>

    <div class="site-branding"><!-- Does not display on screens smaller than 980px -->

        <?php if ( get_theme_mod( 'whimsy_framework_logo_desktop' ) ) : ?>

            <div class="site-logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'whimsy_framework_logo_desktop' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
            </div><!-- /.site-logo -->

        <?php else : // If no logo is set, display title and description text. ?>

            <hgroup>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
            </hgroup>

        <?php endif; // End desktop logo check. ?>

    </div><!-- /.site-branding -->

<?php }
endif; // End function_exists desktop logo check. 
