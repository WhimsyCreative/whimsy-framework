README
Whimsy Framework
================

The Whimsy Framework is a minimal theme ready for customization with lots of extras baked in.

== Manual Installation ==

* Download the Whimsy Framework.
* On your WordPress site go to Dashboard > Appearance > Add New.
* On the next page, click the Upload button.
* Select Browse, and install the whimsy.zip file.
* Activate the Whimsy Framework, or upload a child theme. 

=== Using the Customizer ===
For detailed instructions on using the built-in WordPress Customizer with the Whimsy Framework please visit The Fanciful. http://whimsycreative.co/docs/using-wordpress-customizer/

=== Full Documentation ===
http://whimsycreative.co/docs

== Changelog ==

= 2.1, April 23, 2017 =
* Style tweaks to navigation.
* New action hooks.
* Added menu id's for better control.
* New welcome screen and getting started panel.
* Build header and footer dynamically.
* Added sticky menu CSS support.
* Changed logo priority in Customizer.
* Added methods for tracking framework usage.

= 2.0.1, January 25, 2017 =

* Improved typography and updated design.
* New folder structure - framework files have all been moved to the /library folder.
* Moved widget initialization from functions.php to library/admin/widgets.php.
* Moved script and style enqueue function from functions.php to Whimsy library class.
* library/css/navigation.css - A legion of bugs were felled. 
* library/inc/custom-header.php - Remove code for the admin that is now included in WP core.
* library/inc/extras.php - Remove functions that are handled by WP core.
* library/inc/plugins/jetpack.php - Add theme support for responsive videos
* Customizer updates:
	* Moved Logo into Site Identity where it belongs.
	* Display: Global layout, updated, uses images instead of select dropdown
	* Display: Footer layout, new, choose from 1-3 widget areas in the footer
	* Display: Hide date on pages
	* Display: Hide comments on pages
	* Display: Hide link on page titles
* Updated dependencies:
	* FontAwesome to 4.7.0

### 2.0.0
= 2.0.0 =
* Fixed issue with featured image display.

= 1.2.4 =
* Fixed issue with featured image display.
* Fixed issue with site width on large displays.
* Updated FontAwesome to version 4.5.0
* Updated TGM Plugin Activation to version 2.5.1
* Added support for Easy Digital Downloads.
* Added GitHub and PayPal to social widget.

= 1.2.3 =
* Swapped the_content for the_excerpt on archive pages.

= 1.2.2 =
* Fixed issue with hooks.php

= 1.2.1 =
* Removed terrible, no good, very bad reference to inc/hooks-test.php

= 1.2 =
* Moved stragglers from style.css to css/navigation.css
* Added 32 action hooks.
* Added author page template.
* Added content templates for links and galleries.
* Moved the function that adds the Customizer styles to inc/customizer-styles.php
* Added special formatting for link Post Formats.
* Updated FontAwesome version to 4.3.0
* Added new options for the Social Media widget: Instagram, DeviantArt, Skype, Twitch, Vine, Behance, WordPress, YouTube, Tumblr, Reddit, Flickr, Medium.

= 1.1 =
* header.php -
	* Reconfigured the way Custom Header is utilized.
	* Added desktop logo support.
	* Added mobile logo support.
* template-full.php - removed div#whimsy-full container.
* single.php - Defined styles for post meta sections, removed grid references.
* style.css - 
	* Moved main menu styles to /css/navigation.css.
	* navigation.css - Added #site-navigation selector to sub-menus.
	* 10.1 Header Styles
	* 10.2 Posts and pages
	* 10.3 Asides
	* 10.4 Comments
	* 10.5 Footer styles
	* Moved woo commerce styles to /css/woocommerce.css
* footer.php - Changed theme credit format.
* Customizer -
	* NEW SECTION: Logo
	* NEW SECTION: Menu Display
* widget-about-me.php - Added image upload support to widget.
* Plugin Integrations - 
	* Moved WC integration out of functions.php to /inc/plugins/woocommerce.php
	* Added styles for Infinite Scroll via Jetpack.
* Added Gallery Post Type support.
* Added Title Tag support for WP 4.1+.

= 1.0.6 =
* Official WordPress Release.
* NOTE: So many changes were made over the course of releasing this theme on the WordPress Repository. Development changes will be detailed in future releases.

= 1.0.1 =
* 404.php - Added .container to #content div.
* archive.php - Added .container to #content div.
* footer.php - Moved footer menu below footer widgets, added .container to #colophon.
* index.php - Added .container to #content div.
* page.php - Added .container to #content div.
* single.php - Added .container to #content div.
* template-full.php - Added .container to #content div.
* template-mosaic.php - Added .container to #content div.
* screenshot.png - Updated for WordPress repository.
* style.css - Added styles for .container, removed width declarations from #content, #footer.

= 1.0 =
* Initial release.