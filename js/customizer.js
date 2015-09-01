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
	// Body text color.
	wp.customize( 'whimsy_body_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( body ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( body ).css( {
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
	// Menu bg color.
	wp.customize( 'whimsy_menu_background_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( "#site-navigation" ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( "#site-navigation" ).css( {
					'clip': 'auto',
					'background': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Menu link color
	wp.customize( 'whimsy_menu_link_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( "#site-navigation a, .sub-collapser" ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( "#site-navigation a, .sub-collapser" ).css( {
					'clip': 'auto',
					'background': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Menu sub-menu bg color
	wp.customize( 'whimsy_submenu_background_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( "#site-navigation ul.sub-menu, #site-navigation ul.sub-menu li" ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( "#site-navigation ul.sub-menu, #site-navigation ul.sub-menu li" ).css( {
					'clip': 'auto',
					'background': to,
					'position': 'relative'
				} );
			}
		} );
	} );

	// Menu sub-menu link color
	wp.customize( 'whimsy_submenu_link_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( "#site-navigation ul.sub-menu a" ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( "#site-navigation ul.sub-menu a" ).css( {
					'clip': 'auto',
					'background': to,
					'position': 'relative'
				} );
			}
		} );
	} );

} )( jQuery );
