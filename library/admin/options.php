<?php
/**
 * Welcome Page Class
 * @copyright   Copyright (c) 2015, Pippin Williamson
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.4
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Whimsy_Framework_Welcome Class
 *
 * A general class for About and Credits page.
 *
 * @since 1.4
 */
class Whimsy_Framework_Welcome {

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
		add_theme_page(
			__( 'Whimsy Framework', 'whimsy-framework' ),
			__( 'Whimsy Framework', 'whimsy-framework' ),
			$this->minimum_capability,
			'whimsy-framework',
			array( $this, 'about_screen' )
		);

		// Changelog Page
		add_theme_page(
			__( 'Whimsy Framework Changelog', 'whimsy-framework' ),
			__( 'Whimsy Framework Changelog', 'whimsy-framework' ),
			$this->minimum_capability,
			'whimsy-changelog',
			array( $this, 'changelog_screen' )
		);

		// Getting Started Page
		add_theme_page(
			__( 'Getting started with Whimsy Framework', 'whimsy-framework' ),
			__( 'Getting started with Whimsy Framework', 'whimsy-framework' ),
			$this->minimum_capability,
			'whimsy-getting-started',
			array( $this, 'getting_started_screen' )
		);
		// Now remove them from the menus so plugins that allow customizing the admin menu don't show them
		remove_submenu_page( 'themes.php', 'whimsy-changelog' );
		remove_submenu_page( 'themes.php', 'whimsy-getting-started' );
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
			.whimsy-framework-wrap .whimsy-badge { float: right; border-radius: 4px; margin: 0 0 15px 15px; max-width: 180px; }
			.whimsy-framework-wrap #whimsy-header { margin-bottom: 15px; }
			.whimsy-framework-wrap #whimsy-header h1 { margin-bottom: 15px !important; }
			.whimsy-framework-wrap .about-text { margin: 0 0 15px; max-width: 670px; }
			.whimsy-framework-wrap .feature-section { margin-top: 20px; }
			.whimsy-framework-wrap .feature-section-content,
			.whimsy-framework-wrap .feature-section-media { width: 50%; box-sizing: border-box; }
			.whimsy-framework-wrap .feature-section-content { float: left; padding-right: 50px; }
			.whimsy-framework-wrap .feature-section-content h4 { margin: 0 0 1em; }
			.whimsy-framework-wrap .feature-section-media { float: right; text-align: right; margin-bottom: 20px; }
			.whimsy-framework-wrap .feature-section-media img { border: 1px solid #ddd; }
			.whimsy-framework-wrap .feature-section:not(.under-the-hood) .col { margin-top: 0; }
			/* responsive */
			@media all and ( max-width: 782px ) {
				.whimsy-framework-wrap .feature-section-content,
				.whimsy-framework-wrap .feature-section-media { float: none; padding-right: 0; width: 100%; text-align: left; }
				.whimsy-framework-wrap .feature-section-media img { float: none; margin: 0 0 20px; }
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
			<img class="whimsy-badge" src="<?php echo WHIMSY_IMG . 'whimsy-framework-logo.svg'; ?>" alt="<?php _e( 'Whimsy Framework', 'whimsy-framework' ); ?>" / >
			<h1><?php printf( __( 'Welcome to Whimsy Framework %s', 'whimsy-framework' ), $display_version ); ?></h1>
			<p class="about-text">
				<?php printf( __( 'Thank you for updating to the latest version! Whimsy Framework %s is ready to make your online store faster, safer, and better!', 'whimsy-framework' ), $display_version ); ?>
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
		$selected = isset( $_GET['page'] ) ? $_GET['page'] : 'whimsy-framework';
		?>
		<h1 class="nav-tab-wrapper">
			<a class="nav-tab <?php echo $selected == 'whimsy-framework' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'whimsy-framework' ), 'themes.php' ) ) ); ?>">
				<?php _e( "What's New", 'whimsy-framework' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'whimsy-getting-started' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'whimsy-getting-started' ), 'themes.php' ) ) ); ?>">
				<?php _e( 'Getting Started', 'whimsy-framework' ); ?>
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
		<div class="wrap about-wrap whimsy-framework-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<div class="changelog">
				<h3><?php _e( 'Additional Customer Emails', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo WHIMSY_URI . 'assets/images/screenshots/26-customer.png'; ?>"/>
					</div>
					<div class="feature-section-content">
						<p><?php _e( 'To help keep track of customers that have multiple email addresses, Whimsy Framework now supports storing additional emails on customers. During checkout, customers can use any email address assigned to their account to complete their purchase.', 'whimsy-framework' );?></p>

						<p><?php _e( 'Email addresses can be easily added by site administrators at anytime and will also be automatically registered when a customer makes a purchase with an additional email address.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Improved Help Text', 'whimsy-framework' );?></h4>
						<p><?php _e( 'While we strive to make Whimsy Framework live up to its name, there are always times when certain things are not quite clear. To help alleviate any uncertainty, we have introduced improved descriptions and help texts throughout the plugin. Along with the improved descriptions, we have also added tooltips in many places that offer verbose definitions of options.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Better Mobile Checkout', 'whimsy-framework' );?></h4>
						<p><?php _e( 'When purchasing with a debit or credit card from a mobile phone, the card number input field will now properly set the phone’s keyboard to a numerical keyboard.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Native Import Options', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo WHIMSY_URI . 'assets/images/screenshots/26-import.png'; ?>"/>
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
						<img src="<?php echo WHIMSY_URI . 'assets/images/screenshots/26-refund.png'; ?>" class="whimsy-welcome-screenshots alignleft"/>
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
		<div class="wrap about-wrap whimsy-framework-wrap">
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
		<div class="wrap about-wrap whimsy-framework-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<p class="about-description"><?php _e( 'Use the tips below to get started using Whimsy Framework. You will be up and running in no time!', 'whimsy-framework' ); ?></p>

			<div class="changelog">
				<h3><?php _e( 'Creating Your First Download Product', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo WHIMSY_IMG . 'edit-download.png'; ?>" class="whimsy-welcome-screenshots"/>
					</div>
					<div class="feature-section-content">


						<h4><?php _e( 'Download Files', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Uploading the downloadable files is simple. Click <em>Upload File</em> in the Download Files section and choose your download file. To add more than one file, simply click the <em>Add New</em> button.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Display a Product Grid', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo WHIMSY_URI . 'assets/images/screenshots/grid.png'; ?>"/>
					</div>
					<div class="feature-section-content">
						<h4><?php _e( 'Flexible Product Grids','whimsy-framework' );?></h4>
						<p><?php _e( 'The [downloads] shortcode will display a product grid that works with any theme, no matter the size. It is even responsive!', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Change the Number of Columns', 'whimsy-framework' );?></h4>
						<p><?php _e( 'You can easily change the number of columns by adding the columns="x" parameter:', 'whimsy-framework' );?></p>
						<p><pre>[downloads columns="4"]</pre></p>

						<h4><?php _e( 'Additional Display Options', 'whimsy-framework' ); ?></h4>
						<p><?php printf( __( 'The product grids can be customized in any way you wish and there is <a href="%s">extensive documentation</a> to assist you.', 'whimsy-framework' ), 'http://docs.easydigitaldownloads.com/' ); ?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Purchase Buttons Anywhere', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-media">
						<img src="<?php echo WHIMSY_URI . 'assets/images/screenshots/purchase-link.png'; ?>"/>
					</div>
					<div class="feature-section-content">
						<h4><?php _e( 'The <em>[purchase_link]</em> Shortcode','whimsy-framework' );?></h4>
						<p><?php _e( 'With easily accessible shortcodes to display purchase buttons, you can add a Buy Now or Add to Cart button for any product anywhere on your site in seconds.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Buy Now Buttons', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Purchase buttons can behave as either Add to Cart or Buy Now buttons. With Buy Now buttons customers are taken straight to PayPal, giving them the most frictionless purchasing experience possible.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Need Help?', 'whimsy-framework' );?></h3>
				<div class="feature-section two-col">
					<div class="col">
						<h4><?php _e( 'Phenomenal Support','whimsy-framework' );?></h4>
						<p><?php _e( 'We do our best to provide the best support we can. If you encounter a problem or have a question, simply open a ticket using our <a href="https://easydigitaldownloads.com/support/?utm_source=plugin-welcome-page&utm_medium=support-link&utm_term=support&utm_campaign=EDDWelcomeSupport">support form</a>.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Need Even Faster Support?', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Our <a href="https://easydigitaldownloads.com/support/pricing/?utm_source=plugin-welcome-page&utm_medium=support-link&utm_term=priority-support&utm_campaign=EDDWelcomeSupport">Priority Support</a> system is there for customers that need faster and/or more in-depth assistance.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Stay Up to Date', 'whimsy-framework' );?></h3>
				<div class="feature-section two-col">
					<div class="col">
						<h4><?php _e( 'Get Notified of Extension Releases','whimsy-framework' );?></h4>
						<p><?php _e( 'New extensions that make Whimsy Framework even more powerful are released nearly every single week. Subscribe to the newsletter to stay up to date with our latest releases. <a href="https://easydigitaldownloads.com/subscribe" target="_blank">Sign up now</a> to ensure you do not miss a release!', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Get Alerted About New Tutorials', 'whimsy-framework' );?></h4>
						<p><?php _e( '<a href="https://easydigitaldownloads.com/subscribe" target="_blank">Sign up now</a> to hear about the latest tutorial releases that explain how to take Whimsy Framework further.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Extensions for Everything', 'whimsy-framework' );?></h3>
				<div class="feature-section two-col">
					<div class="col">
						<h4><?php _e( 'Over 250 Extensions','whimsy-framework' );?></h4>
						<p><?php _e( 'Add-on plugins are available that greatly extend the default functionality of Whimsy Framework. There are extensions for payment processors, such as Stripe and PayPal, extensions for newsletter integrations, and many, many more.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Visit the Extension Store', 'whimsy-framework' );?></h4>
						<p><?php _e( '<a href="https://easydigitaldownloads.com/downloads/?utm_source=plugin-welcome-page&utm_medium=extensions-link&utm_term=extensions&utm_campaign=EDDWelcomeExtensions" target="_blank">The Extensions store</a> has a list of all available extensions, including convenient category filters so you can find exactly what you are looking for.', 'whimsy-framework' );?></p>
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
		$file = file_exists( WHIMSY_DIR . 'readme.txt' ) ? WHIMSY_DIR . 'readme.txt' : null;

		if ( ! $file ) {
			$readme = '<p>' . __( 'No valid changelog was found.', 'whimsy-framework' ) . '</p>';
		} else {
			$readme = WP_Filesystem( $file );
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
			wp_safe_redirect( admin_url( 'themes.php?page=whimsy-getting-started' ) ); exit;
		} else { // Update
			wp_safe_redirect( admin_url( 'themes.php?page=whimsy-framework' ) ); exit;
		}
	}
}
new Whimsy_Framework_Welcome();