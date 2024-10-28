=== WPSSO Mobile App Meta Tags ===
Plugin Name: WPSSO Mobile App Meta Tags
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-am/assets/
Tags: app store, mobile app, app card, itunes, google play
Contributors: jsmoriss
Requires Plugins: wpsso
Requires PHP: 7.4.33
Requires At Least: 5.9
Tested Up To: 6.7.0
Stable Tag: 4.3.0

Apple Store and Google Play App meta tags for Apple\'s mobile Safari banner and X\'s (Twitter) App Card.

== Description ==

<!-- about -->

**Apple Store / iTunes and Google Play App meta tags.**

**Promote your website's mobile App with a banner in Apple's mobile Safari.**

**Add [X (Twitter) App Card](https://dev.twitter.com/cards/types/app) markup to mobile App product pages:**

<ul>
	<li>twitter:app:country</li>
	<li>twitter:app:id:iphone</li>
	<li>twitter:app:id:ipad</li>
	<li>twitter:app:id:googleplay</li>
	<li>twitter:app:name:iphone</li>
	<li>twitter:app:name:ipad</li>
	<li>twitter:app:name:googleplay</li>
	<li>twitter:app:url:iphone</li>
	<li>twitter:app:url:ipad</li>
	<li>twitter:app:url:googleplay</li>
</ul>

<!-- /about -->

<h3>WPSSO AM Add-on Features</h3>

Extends the features of the [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/) (required plugin).

Adds an optional banner in Apple's mobile Safari for your website's Apple Store mobile App.

Adds optional [X (Twitter) App Card](https://dev.twitter.com/cards/types/app) meta tags to webpages.

Includes a Mobile Apps settings page with additional options:

* Mobile App Banner
	* Add Banner to Home Page
	* Add Banner to Post Types (posts, pages, media, products, etc.).
	* Add Banner to Archive Pages
* Apple Store App
	* Default App ID Number
	* Default Affiliate Data
	* Default Argument String
* Mobile App Products
	* Default App Store Territory
	* Show Tab on Post Types

Includes a Mobile Apps tab in the Document SSO metabox with additional options:

* X (Twitter) App Card
	* App Store Territory
	* iPhone App Details
		* iPhone App ID
		* iPhone App Name
		* iPhone App URL Scheme
	* iPad App Details
		* iPad App ID
		* iPad App Name
		* iPad App URL Scheme
	* Google Play App Details
		* Google Play App ID
		* Google Play App Name
		* Google Play App URL Scheme
* Mobile App Banner
	* App ID Number
	* Affiliate Data
	* Argument String

<h3>WPSSO Core Required</h3>

WPSSO Mobile App Meta Tags (WPSSO AM) is an add-on for the [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/), which creates extensive and complete structured data to present your content at its best for social sites and search results – no matter how URLs are shared, reshared, messaged, posted, embedded, or crawled.

== Installation ==

<h3 class="top">Install and Uninstall</h3>

* [Install the WPSSO Mobile App Meta Tags add-on](https://wpsso.com/docs/plugins/wpsso-am/installation/install-the-plugin/).
* [Uninstall the WPSSO Mobile App Meta Tags add-on](https://wpsso.com/docs/plugins/wpsso-am/installation/uninstall-the-plugin/).

== Frequently Asked Questions ==

== Screenshots ==

01. The WPSSO AM settings page offers options for the Mobile App Banner, Apple Store defaults, and the Mobile Apps tab.
02. The WPSSO AM tab in the Document SSO metabox provides custom settings for the X (Twitter) App Card and Mobile App Banner.

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes and/or incompatible API changes (ie. breaking changes).
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Standard Edition Repositories</h3>

* [GitHub](https://surniaulula.github.io/wpsso-am/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/wpsso-am/)

<h3>Development Version Updates</h3>

<p><strong>WPSSO Core Premium edition customers have access to development, alpha, beta, and release candidate version updates:</strong></p>

<p>Under the SSO &gt; Update Manager settings page, select the "Development and Up" (for example) version filter for the WPSSO Core plugin and/or its add-ons. When new development versions are available, they will automatically appear under your WordPress Dashboard &gt; Updates page. You can reselect the "Stable / Production" version filter at any time to reinstall the latest stable version.</p>

<p><strong>WPSSO Core Standard edition users (ie. the plugin hosted on WordPress.org) have access to <a href="https://wordpress.org/plugins/wpsso-am/advanced/">the latest development version under the Advanced Options section</a>.</strong></p>

<h3>Changelog / Release Notes</h3>

**Version 4.3.0 (2024/08/25)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Changed the main instantiation action hook from 'init_objects' to 'init_objects_preloader'.
* **Requires At Least**
	* PHP v7.4.33.
	* WordPress v5.9.
	* WPSSO Core v18.10.0.

== Upgrade Notice ==

= 4.3.0 =

(2024/08/25) Changed the main instantiation action hook from 'init_objects' to 'init_objects_preloader'.

