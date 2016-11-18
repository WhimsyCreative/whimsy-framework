<?php
/**
 * Whimsy display avatar in posts
 */
if ( ! function_exists( 'whimsy_author_gravatar' ) ) :

    function whimsy_author_gravatar() {
        
        if ( get_theme_mod( 'whimsy_framework_author_gravatar' ) == false && 'post' == get_post_type() && 'link' != get_post_format() && 'aside' != get_post_format() ) : ?>

        <div class="author-gravatar">
            
            <?php echo get_avatar( get_the_author_meta( 'email' ), '80' ); ?>
            
        </div>

    <?php endif; }

endif;


/**
 * Add the individual settings and controls to the Customizer.
 */
if ( ! function_exists( 'whimsy_author_gravatar_customize_register' ) ) :

    function whimsy_author_gravatar_customize_register( $wp_customize ) {

        // Hide author Gravatar on posts
        $wp_customize->add_setting(
            'whimsy_framework_author_gravatar',
            array(
                'default'           => false,
                'transport'         => 'refresh',
                'sanitize_callback' => 'whimsy_framework_sanitize_checkbox',
            )
        );
        $wp_customize->add_control(
            'whimsy_framework_author_gravatar',
            array(
                'type' => 'checkbox',
                'label' => __( 'Hide author Gravatar on posts?', 'whimsy-framework' ),
                'section' => 'whimsy_framework_section_display',
            )
        );
        
    }

    add_action( 'customize_register', 'whimsy_author_gravatar_customize_register', 16 );

endif;