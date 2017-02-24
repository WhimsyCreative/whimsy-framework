<?php
/**
 * HTML output for menus.
 *
 * @since  2.1.0
 * @access public
 * @return void
 */
if ( ! function_exists( 'whimsy_primary_menu' ) ) :
function whimsy_primary_menu() { 
?>

    <?php whimsy_nav_before(); ?>

    <nav id="site-navigation">

        <?php whimsy_nav_inside_before(); ?>

        <?php whimsy_nav_inside_after(); ?>

    </nav><!-- /#site-navigation -->

    <?php whimsy_nav_after(); ?>

<?php }
endif; // End function_exists Primary Menu. 