<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * @package whimsy
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses whimsy_header_style()
 * @uses whimsy_admin_header_style()
 * @uses whimsy_admin_header_image()
 */
function whimsy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'whimsy_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1600,
		'height'                 => 500,
		'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'whimsy_header_style',
		'admin-head-callback'    => 'whimsy_admin_header_style',
		'admin-preview-callback' => 'whimsy_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'whimsy_custom_header_setup' );

if ( ! function_exists( 'whimsy_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see whimsy_custom_header_setup().
 */
function whimsy_header_style() {
		$header_text_color = get_header_textcolor();

		// If no custom options for text are set, let's bail
		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
		if ( HEADER_TEXTCOLOR == $header_text_color ) {
			return;
			}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // whimsy_header_style
