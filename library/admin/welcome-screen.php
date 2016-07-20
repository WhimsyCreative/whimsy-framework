<?php
/**
 * Welcome Page Class
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Whimsy_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class Whimsy_Welcome {

	/**
	 * @var string The capability users should have to view the page
	 */
	public $minimum_capability = 'manage_options';

	/**
	 * Get things started
	 *
	 * @since 1.4
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menus') );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome'    ), 11 );
	}

	/**
	 * Register the Dashboard Pages which are later hidden but these pages
	 * are used to render the Welcome and Credits pages.
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function admin_menus() {
		// About Page
		add_dashboard_page(
			__( 'Welcome to Whimsy Framework', 'whimsy-framework' ),
			__( 'Welcome to Whimsy Framework', 'whimsy-framework' ),
			$this->minimum_capability,
			'whimsy-about',
			array( $this, 'about_screen' )
		);

		// Changelog Page
		add_dashboard_page(
			__( 'Whimsy Framework Changelog', 'whimsy-framework' ),
			__( 'Whimsy Framework Changelog', 'whimsy-framework' ),
			$this->minimum_capability,
			'whimsy-changelog',
			array( $this, 'changelog_screen' )
		);

		// Getting Started Page
		add_dashboard_page(
			__( 'Getting started with Whimsy Framework', 'whimsy-framework' ),
			__( 'Getting started with Whimsy Framework', 'whimsy-framework' ),
			$this->minimum_capability,
			'whimsy-getting-started',
			array( $this, 'getting_started_screen' )
		);


		// Now remove them from the menus so plugins that allow customizing the admin menu don't show them
		remove_submenu_page( 'index.php', 'whimsy-about' );
		remove_submenu_page( 'index.php', 'whimsy-changelog' );
		remove_submenu_page( 'index.php', 'whimsy-getting-started' );
	}

	/**
	 * Hide Individual Dashboard Pages
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function admin_head() {
		?>
		<style type="text/css" media="screen">
			/*<![CDATA[*/
			.whimsy-about-wrap .whimsy-badge { float: right; margin: 0 0 15px 15px; max-width: 200px; }
			.whimsy-about-wrap #whimsy-header { margin-bottom: 25px; }
			.whimsy-about-wrap #whimsy-header h1 { margin-bottom: 15px !important; }
			.whimsy-about-wrap .about-text { margin: 0 0 15px; max-width: 870px; }
			.whimsy-about-wrap .feature-section { margin-top: 20px; }
			.whimsy-about-wrap .feature-section-content,
			.whimsy-about-wrap .feature-section-media { width: 50%; box-sizing: border-box; }
			.whimsy-about-wrap .feature-section-content { float: left; padding-right: 50px; }
			.whimsy-about-wrap .feature-section-content h4 { margin: 0 0 1em; }
			.whimsy-about-wrap .feature-section-media { float: right; text-align: right; margin-bottom: 20px; }
			.whimsy-about-wrap .feature-section-media img { border: 1px solid #ddd; }
			.whimsy-about-wrap .feature-section:not(.under-the-hood) .col { margin-top: 0; }
			/* responsive */
			@media all and ( max-width: 782px ) {
				.whimsy-about-wrap .feature-section-content,
				.whimsy-about-wrap .feature-section-media { float: none; padding-right: 0; width: 100%; text-align: left; }
				.whimsy-about-wrap .feature-section-media img { float: none; margin: 0 0 20px; }
			}
			/*]]>*/
		</style>
		<?php
	}

	/**
	 * Welcome message
	 *
	 * @access public
	 * @since 2.5
	 * @return void
	 */
	public function welcome_message() {
		list( $display_version ) = explode( '-', WHIMSY_VERSION );
		?>
		<div id="whimsy-header">
			<img class="whimsy-badge" src="<?php echo THEME_URI . '/library/img/the-fanciful.png'; ?>" alt="<?php _e( 'Whimsy Framework', 'whimsy-framework' ); ?>" / >
			<h1><?php printf( __( 'Welcome to Whimsy Framework %s', 'whimsy-framework' ), $display_version ); ?></h1>
			<p class="about-text">
				<?php printf( __( 'Thank you for updating to the latest version! Whimsy Framework %s!', 'whimsy-framework' ), $display_version ); ?>
			</p>
		</div>
		<?php
	}

	/**
	 * Navigation tabs
	 *
	 * @access public
	 * @since 1.9
	 * @return void
	 */
	public function tabs() {
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'whimsy-about';
		?>
		<h1 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'whimsy-about' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'whimsy-about' ), 'index.php' ) ) ); ?>">
				<?php _e( "What's New", 'whimsy-framework' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'whimsy-getting-started' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'whimsy-getting-started' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Getting Started', 'whimsy-framework' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'whimsy-changelog' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'whimsy-changelog' ), 'index.php' ) ) ); ?>">
				<?php _e( 'Changelog', 'whimsy-framework' ); ?>
			</a>
		</h1>
		<?php
	}

	/**
	 * Render About Screen
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function about_screen() {
		?>
		<div class="wrap about-wrap whimsy-about-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<div class="changelog">
				<h3><?php _e( 'Customizer Updates', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
					</div>
					<div class="feature-section-content">
						<p><?php _e( 'The Whimsy Framework Customizer is now more user friendly and has even more options for customizing your website.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Multiple footer options', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Now you can choose between 1-3 widgetized areas in your footer.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Better Mobile Checkout', 'whimsy-framework' );?></h4>
						<p><?php _e( 'When purchasing with a debit or credit card from a mobile phone, the card number input field will now properly set the phone’s keyboard to a numerical keyboard.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'New Library Class', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo THEME_DIR . 'assets/images/screenshots/26-import.png'; ?>"/>
					</div>
					<div class="feature-section-content">
						<p><?php _e( 'We believe you should own your data. We also believe that it should be easy to get data out of <em>and</em> into Whimsy Framework. 2.6 introduces native import options for payments and download products.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Product Import', 'whimsy-framework' );?></h4>
						<p><?php _e( 'With the new import options, Whimsy Framework now makes it easy to import products from a CSV file into your store. Whether you wish to import five products or 50,000, Whimsy Framework can now effortlessly handle the import for you.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Payment Import', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Sometimes it is necessary to move purchase records from one location to another. Perhaps you are transitioning from another eCommerce system, or from a separate Whimsy Framework store; whatever the reason, Whimsy Framework now allows you to easily import purchase records from a CSV file.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Better Refunds', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo whimsy_PLUGIN_URL . 'assets/images/screenshots/26-refund.png'; ?>" class="whimsy-welcome-screenshots alignleft"/>
					</div>
					<div class="feature-section-content">
						<h4><?php _e( 'Refund Processing for PayPal Standard', 'whimsy-framework' );?></h4>
						<p><?php _e( 'While not usually something store administrators take great pleasure in handling, refunds are a very real part of running an eCommerce store. As much as we would love to, we can’t make the actual refund more enjoyable, but we can make refunds easier to process.', 'whimsy-framework' );?></p>
						<p><?php _e( 'In Whimsy Framework 2.6, we have added support for processing refunds directly from the View Order Details screen for purchases made through PayPal Standard.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Additional Updates', 'whimsy-framework' );?></h3>
				<div class="feature-section three-col">
					<div class="col">
						<h4><?php _e( 'REST API Version 2', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Version 2 of the REST API offers several improved endpoint options and better data standardization.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Prices on oEmbed', 'whimsy-framework' );?></h4>
						<p><?php _e( 'When embedding a download product on another site, using WordPress core’s oEmbed feature, the product prices are now shown.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Customer Meta', 'whimsy-framework' );?></h4>
						<p><?php _e( 'The customer database now includes a complete metadata API for storing additional information on customer records.' ,'whimsy-framework' );?></p>
					</div>
					<div class="clear">
						<div class="col">
							<h4><?php _e( 'Improved Accessibility', 'whimsy-framework' );?></h4>
							<p><?php _e( 'Whimsy Framework is now more accessible to more users thanks to a member of the WordPress accessibility team who helped resolve accessibility issues throughout the administrative interfaces.', 'whimsy-framework' );?></p>
						</div>
						<div class="col">
							<h4><?php _e( 'Resolved Schema Problems', 'whimsy-framework' );?></h4>
							<p><?php _e( 'Invalid and missing schema microdata has been resolved.', 'whimsy-framework' );?></p>
						</div>
						<div class="col">
							<h4><?php _e( 'More Actions and Filters', 'whimsy-framework' );?></h4>
							<p><?php _e( 'Numerous new actions and filters have been added to help make Whimsy Framework more extensible for developers.' ,'whimsy-framework' );?></p>
						</div>
					</div>
				</div>
			</div>

		</div>
		<?php
	}

	/**
	 * Render Changelog Screen
	 *
	 * @access public
	 * @since 2.0.3
	 * @return void
	 */
	public function changelog_screen() {
		?>
		<div class="wrap about-wrap whimsy-about-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<div class="changelog">
				<h3><?php _e( 'Full Changelog', 'whimsy-framework' );?></h3>

				<div class="feature-section">
					<?php echo $this->parse_readme(); ?>
				</div>
			</div>

		</div>
		<?php
	}

	/**
	 * Render Getting Started Screen
	 *
	 * @access public
	 * @since 1.9
	 * @return void
	 */
	public function getting_started_screen() {
		?>
		<div class="wrap about-wrap whimsy-about-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<p class="about-description"><?php _e( 'Whimsy Framework is lightweight and easy to customize, even for beginners.', 'whimsy-framework' ); ?></p>

			<div class="changelog">
				<h3><?php _e( 'Extensions for Everything', 'whimsy-framework' );?></h3>
				<div class="feature-section two-col">
					<div class="col">
						<h4><?php _e( 'Customizable colors','whimsy-framework' );?></h4>
						<p><?php _e( 'Use the color picker tool to choose colors that will represent your brand throughout your website.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Upload your logo', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Choose a different logo for mobile and desktop versions so your brand looks great on all screens.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Cool Custom Widgets','whimsy-framework' );?></h4>
						<p><?php _e( 'Whimsy Framework has two custom widgets: one for easy social media links and the other for your “About Me” section.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Custom Shortcodes', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Whimsy+Shortcodes is a lightweight shortcode plugin so even if you change themes you won’t lose your shortcode content.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Responsive Layout','whimsy-framework' );?></h4>
						<p><?php _e( 'Your layout dynamically shrinks and expands inside tablets and phones and is designed to look ideal on any resolution, big or small.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Plugin Integrations', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Whimsy Framework has been styled and tested for use with popular plugins like WooCommerce, Jetpack, Easy Digital Downloads, WP-Retina, and more.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
    
	/**
	 * Parse the EDD readme.txt file
	 *
	 * @since 2.0.3
	 * @return string $readme HTML formatted readme file
	 */
	public function parse_readme() {
		$file = file_exists( THEME_DIR . '/readme.txt' ) ? THEME_DIR . '/readme.txt' : null;

		if ( ! $file ) {
			$readme = '<p>' . __( 'No valid changelog was found.', 'whimsy-framework' ) . '</p>';
		} else {
			$readme = file_get_contents( $file );
			$readme = nl2br( esc_html( $readme ) );
			$readme = explode( '== Changelog ==', $readme );
			$readme = end( $readme );

			$readme = preg_replace( '/`(.*?)`/', '<code>\\1</code>', $readme );
			$readme = preg_replace( '/[\040]\*\*(.*?)\*\*/', ' <strong>\\1</strong>', $readme );
			$readme = preg_replace( '/[\040]\*(.*?)\*/', ' <em>\\1</em>', $readme );
			$readme = preg_replace( '/= (.*?) =/', '<h4>\\1</h4>', $readme );
			$readme = preg_replace( '/\[(.*?)\]\((.*?)\)/', '<a href="\\2">\\1</a>', $readme );
		}

		return $readme;
	}

	/**
	 * Sends user to the Welcome page on first activation of EDD as well as each
	 * time EDD is upgraded to a new version
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */
	public function welcome() {
		// Bail if no activation redirect
		if ( ! get_transient( '_whimsy_activation_redirect' ) )
			return;

		// Delete the redirect transient
		delete_transient( '_whimsy_activation_redirect' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) )
			return;

		$upgrade = get_option( 'whimsy_version_upgraded_from' );

		if( ! $upgrade ) { // First time install
			wp_safe_redirect( admin_url( 'index.php?page=whimsy-getting-started' ) ); exit;
		} else { // Update
			wp_safe_redirect( admin_url( 'index.php?page=whimsy-about' ) ); exit;
		}
	}
}
new Whimsy_Welcome();