<?php
/**
 * Welcome Page Class
 *
 * @copyright   Copyright (c) 2015, Pippin Williamson
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit;
}

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
		add_action( 'admin_menu', array( $this, 'admin_menus' ) );
		add_action( 'admin_head', array( $this, 'admin_head' ) );
		add_action( 'admin_init', array( $this, 'welcome' ), 11 );
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
			.whimsy-framework-wrap .whimsy-badge { float: right; margin: 15px 0 15px 15px; max-width: 250px; border:0; padding: 2em; border-radius: 4px; border: 3px solid #203266; }
			.whimsy-framework-wrap #whimsy-header { margin-bottom: 15px; }
			.whimsy-framework-wrap #whimsy-header h1 { margin-bottom: 15px !important; }
			.whimsy-framework-wrap h2.nav-tab-wrapper { display: none; }
			.whimsy-framework-wrap .about-text { margin: 0 0 15px; max-width: 670px; }
			.whimsy-framework-wrap .feature-section { margin-top: 20px; }
			.whimsy-framework-wrap .feature-section-content,
			.whimsy-framework-wrap .feature-section-media { width: 50%; box-sizing: border-box; }
			.whimsy-framework-wrap .feature-section-content { float: left; padding-right: 50px; }
			.whimsy-framework-wrap .feature-section-content h4 { margin: 0 0 1em; }
			.whimsy-framework-wrap .feature-section-media { float: right; text-align: right; margin-bottom: 20px; }
			.whimsy-framework-wrap .feature-section-media img { border: 0; }
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
			<img class="whimsy-badge" src="<?php echo WHIMSY_IMG . 'whimsy-framework-logo.png'; ?>" alt="<?php _e( 'Whimsy Framework', 'whimsy-framework' ); ?>" / >
			<h1><?php printf( __( 'Welcome to Whimsy Framework %s', 'whimsy-framework' ), $display_version ); ?></h1>
			<p class="about-text">
				<?php printf( __( 'Thank you for updating to Whimsy Framework 2.1! Whimsy Framework is a stylish, customizable, seo-friendly, lightweight theme ready to help you build something beautiful.', 'whimsy-framework' ), $display_version ); ?>
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
			<a class="nav-tab <?php echo $selected == 'whimsy-framework' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array(
	'page' => 'whimsy-framework',
), 'themes.php' ) ) ); ?>">
				<?php _e( "What's New", 'whimsy-framework' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'whimsy-getting-started' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array(
	'page' => 'whimsy-getting-started',
), 'themes.php' ) ) ); ?>">
				<?php _e( 'Getting Started', 'whimsy-framework' ); ?>
			</a>
			<a class="nav-tab <?php echo $selected == 'whimsy-changelog' ? 'nav-tab-active' : ''; ?>" href="<?php echo esc_url( admin_url( add_query_arg( array(
	'page' => 'whimsy-changelog',
), 'themes.php' ) ) ); ?>">
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
		<div class="wrap about-wrap whimsy-framework-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<div class="changelog">
				<div class="feature-section">
					<h3><?php _e( 'Improved typography and updated design', 'whimsy-framework' );?></h3>
					<div class="feature-section-media">
						<img src="<?php echo WHIMSY_IMG . 'whimsy-framework-display.png'; ?>" class="whimsy-welcome-screenshots alignleft" />
					</div>
					<div class="feature-section-content">
						<p><?php _e( 'Drop shadows were removed for a flat look, fonts and spacing were tweaked, and we made some updates to the menu.', 'whimsy-framework' );?></p>
					</div>
					<h3><?php _e( 'More options in the Customizer', 'whimsy-framework' );?></h3>
					<div class="feature-section-content">
						<p><?php _e( 'The Whimsy Framework Customizer was updated to included display options like layout, widget areas, and the option to hide meta options like dates and titles on pages.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Additional Updates', 'whimsy-framework' );?></h3>
				<div class="feature-section two-col">
					<div class="col">
						<h4><?php _e( 'New stuff for developers', 'whimsy-framework' );?></h4>
						<p><?php _e( 'New action hooks were added, and the header and footer are now built dynamically to make Whimsy Framework easier to extend by developers.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'Updated Dependancies', 'whimsy-framework' );?></h4>
						<p><?php _e( 'FontAwesome was updated to 4.7.0.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'The Framework Library', 'whimsy-framework' );?></h4>
						<p><?php _e( 'The functions powering the framework are now more in line with Object-Oriented Programming. OOP is one of the driving WordPress standards for development which means enhanced compatibility with plugins developed to the same standards.', 'whimsy-framework' );?></p>
					</div>
					<div class="col">
						<h4><?php _e( 'New folder structure ', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Whimsy Framework files have all been moved to their own class in the /library folder.', 'whimsy-framework' );?></p>
					</div>
					<div class="clear"></div>
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
			<p class="about-description"><?php _e( 'Need help getting started with Whimsy Framework? These tips should help!', 'whimsy-framework' ); ?></p>

			<div class="changelog">
				<h3><?php _e( 'Responsive Logo', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-content">
						<h4><?php _e( 'Mobile Logo', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Whimsy Framework is responsive. There are two different ways to display your logo: desktop, and mobile. Around the size of the portrait view on an iPad (980px), the menu collapses into a mobile menu. The desktop logo is changed to a compact mobile logo, or if left empty, your site title.', 'whimsy-framework' );?></p>
						<h4><?php _e( 'Desktop Logo', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Your desktop logo is the full-size logo that can be center-aligned or aligned to the left.', 'whimsy-framework' );?></p>
					</div>
				</div>
			</div>

			<div class="changelog">
				<h3><?php _e( 'Easily Customizable', 'whimsy-framework' );?></h3>
				<div class="feature-section">
					<div class="feature-section-content">
						<h4><?php _e( 'Tweak the display options','whimsy-framework' );?></h4>
						<p><?php _e( 'There are options for which side your sidebar should be on and how many widget columns in your footer. As well as tweaks to pages and layouts.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Change your colors', 'whimsy-framework' );?></h4>
						<p><?php _e( 'You can customize the colors for your backgrounds, links, menu, and text from the Colors panel in the Customizer.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Setup your menus', 'whimsy-framework' );?></h4>
						<p><?php _e( 'The Whimsy Framework has two menu areas: Primary, and Footer. The Primary menu is at the top of the page. It is mobile friendly, and you can add secondary pages that drop down. The Footer menu is a list of pages located near the bottom of the page, above the footer widget area.', 'whimsy-framework' );?></p>

						<h4><?php _e( 'Choose your widgets', 'whimsy-framework' );?></h4>
						<p><?php _e( 'Whimsy Framework includes two widgets made with bloggers in mind. An About Me widget, and a Social Network widget. You can see them in action in my sidebar here.', 'whimsy-framework' );?></p>
						<div class="two-col">
							<div class="col">
								<h4><?php _e( 'About Me','whimsy-framework' );?></h4>
								<p><?php _e( 'This widget features an image, a paragraph to introduce yourself and your website, and a link with customized text to read more.', 'whimsy-framework' );?></p>
							</div>
							<div class="col">
								<h4><?php _e( 'Social Networks', 'whimsy-framework' );?></h4>
								<p><?php _e( 'The Social Media widget features icons for many social networks, big and small. ', 'whimsy-framework' );?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	public function addons_screen( $content) {
		ob_start();

		?>
		<div class="wrap about-wrap whimsy-framework-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<?php echo $content; ?>

		</div>
		<?php

		return ob_get_clean();
	}

	public function account_screen( $content) {
		ob_start();

		?>
		<div class="wrap about-wrap whimsy-framework-wrap">
			<?php
				// load welcome message and content tabs
				$this->welcome_message();
				$this->tabs();
			?>
			<?php echo $content; ?>
		</div>
		<?php

		return ob_get_clean();
	}

	/**
	 * Parse the Whimsy Framework readme.txt file
	 *
	 * @since 2.0.3
	 * @return string $readme HTML formatted readme file
	 */
	public function parse_readme() {

				$access_type = get_filesystem_method();
		if ($access_type === 'direct') {
		/* you can safely run request_filesystem_credentials() without any issues and don't need to worry about passing in a URL */
		$creds = request_filesystem_credentials( site_url() . '/wp-admin/', '', false, false, array() );

		/* initialize the API */
		if ( ! WP_Filesystem( $creds ) ) {
				/* any problems and we exit */
				return false;
		}

		global $wp_filesystem;
		/* do our file manipulations below */

		  $readme = '';

		  $method = ''; // leave this empty to perform test for 'direct' writing
		  $context = get_template_directory(); // target folder
		  /*
           * now $wp_filesystem could be used
           * get correct target file first
           **/
		  $target_dir = $wp_filesystem->find_folder( $context );
		  $target_file = trailingslashit( $target_dir ) . 'readme.txt';

		  /* read the file */
		  if ($wp_filesystem->exists( $target_file )) { // check for existence

				$readme = $wp_filesystem->get_contents( $target_file );

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
		} else {
		/* don't have direct write access. Prompt user with our notice */
		add_action( 'admin_notices', 'whimsy_admin_notice_permission' );
		}// End if().
	}

	/**
	 * Sends user to the Welcome page on first activation of Whimsy Framework as well as each
	 * time Whimsy Framework is upgraded to a new version
	 *
	 * @access public
	 * @since 1.4
	 * @return void
	 */

	public function welcome() {

				// Bail if no activation redirect
		if ( ! get_transient( '_whimsy_activation_redirect' ) ) {
			return;
		}

		// Delete the redirect transient
		delete_transient( '_whimsy_activation_redirect' );

		// Bail if activating from network, or bulk
		if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
			return;
		}

		$upgrade = get_option( 'whimsy_version_upgraded_from' );

		if ( ! $upgrade ) { // First time install
			wp_safe_redirect( admin_url( 'themes.php?page=whimsy-getting-started' ) );
exit;
		} else { // Update
			wp_safe_redirect( admin_url( 'themes.php?page=whimsy-framework' ) );
exit;
		}
	}
}
new Whimsy_Framework_Welcome();
