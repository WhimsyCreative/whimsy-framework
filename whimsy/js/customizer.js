/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Link color.
	wp.customize( 'whimsy_link_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( a ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( a ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Alternate color
	wp.customize( 'whimsy_alt_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$("a").hover(function() {
					$( 'a:hover' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
					} );
				});
			} else {
				$("a").hover(function() {
				$( '.sub-menu' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
					} );
				});
			}
		} );
	} );
} )( jQuery );
