<?php
/*
 * Load additional Google Fonts
 * https://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
 */

if ( ! function_exists( 'whimsy_framework_fonts_url' ) ) :

    function whimsy_framework_fonts_url() {

        $fonts_url = '';

        /* Transopensansrs: If there are characters in your language that are not
        * supported by Open Sans, translate this to 'off'. Do not translate
        * into your own language.
        */
        $opensans = _x( 'on', 'Open Sans font: on or off', 'whimsy-framework' );

        if ( 'off' !== $opensans ) {
            $font_families = array();

            if ( 'off' !== $opensans ) {
                $font_families[] = 'Open+Sans';
            }

            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
        }

        return $fonts_url;

    }
endif;