=== Mobile App Meta Tags | WPSSO Add-on ===
Plugin Name: WPSSO Mobile App Meta Tags
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-am/assets/
Tags: app store, mobile app, app card, mobile, itunes, googleplay, google play, meta tags, app banner, safari, twitter app card, twitter card
Contributors: jsmoriss
Requires PHP: 5.6
Requires At Least: 4.2
Tested Up To: 5.4.1
Stable Tag: 3.5.0

Apple Store / iTunes and Google Play App Meta Tags for Apple's mobile Safari Banner and Twitter's App Card.

== Description ==

<p style="margin:0;"><img class="readme-icon" src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png"></p>

**Promote your website's mobile App with a banner in Apple's mobile Safari.**

**Add [Twitter App Card](https://dev.twitter.com/cards/types/app) meta tags to mobile App product pages:**

<ul style="display:inline-block;">
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

<h3>Users Love the WPSSO AM Add-on</h3>

&#x2605;&#x2605;&#x2605;&#x2605;&#x2605; &mdash; "Universal links, smart app banners, Twitter app cards - App developers, this is the plugin you need." - [markofjohnson](https://wordpress.org/support/topic/universal-links-smart-app-banners-twitter-app-cards/)

<h3>WPSSO AM Standard Features</h3>

* Extends the features of the WPSSO Core plugin.

* Adds an optional banner in Apple's mobile Safari for your website's Apple Store mobile App.

* Adds optional [Twitter App Card](https://dev.twitter.com/cards/types/app) meta tags to webpages.

* Adds a Mobile App Meta Tags settings page to the SSO menu with additional options:

	* Mobile App Banner
		* Add Banner to Archive Webpages
		* Add Banner to Page Homepage
		* Add Banner to Post Types (posts, pages, media, products, etc.).
	* Apple Store App
		* Default App ID Number
		* Default Affiliate Data
		* Default Argument String
	* Mobile App Products
		* Show Tab on Post Types
		* Default App Store Territory

* Includes and optional Mobile Apps tab in the Document SSO metabox with additional options:

	* Twitter App Card
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

<h3>WPSSO Core Plugin Required</h3>

WPSSO Mobile App Meta Tags (aka WPSSO AM) is an add-on for the [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/).

== Installation ==

<h3 class="top">Install and Uninstall</h3>

* [Install the WPSSO Mobile App Meta Tags add-on](https://wpsso.com/docs/plugins/wpsso-am/installation/install-the-plugin/).
* [Uninstall the WPSSO Mobile App Meta Tags add-on](https://wpsso.com/docs/plugins/wpsso-am/installation/uninstall-the-plugin/).

== Frequently Asked Questions ==

== Screenshots ==

01. The WPSSO AM settings page offers options for the Mobile App Banner, Apple Store defaults, and the Mobile Apps tab.
02. The WPSSO AM tab in the Document SSO metabox provides custom settings for the Twitter App Card and Mobile App Banner.

== Changelog ==

<h3 class="top">Version Numbering</h3>

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

<h3>Standard Version Repositories</h3>

* [GitHub](https://surniaulula.github.io/wpsso-am/)
* [WordPress.org](https://plugins.trac.wordpress.org/browser/wpsso-am/)

<h3>Changelog / Release Notes</h3>

**Version 3.5.0 (2020/06/04)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Updated method calls for WPSSO Core v7.8.0:
		* Changed `WpssoUtil->get_post_types()` to `SucomUtilWP::get_post_types()`.
* **Requires At Least**
	* PHP v5.6.
	* WordPress v4.2.
	* WPSSO Core v7.8.0.

**Version 3.4.0 (2020/05/09)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Refactored the required plugin check to (optionally) check the class name and a version constant.
* **Requires At Least**
	* PHP v5.6.
	* WordPress v4.2.
	* WPSSO Core v7.5.0.

**Version 3.3.0 (2020/04/06)**

* **New Features**
	* None.
* **Improvements**
	* Updated "Requires At Least" to WordPress v4.2.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Refactored WPSSO Core active and minimum version dependency checks.
* **Requires At Least**
	* PHP v5.6.
	* WordPress v4.2.
	* WPSSO Core v7.3.0.

== Upgrade Notice ==

= 3.5.0 =

(2020/06/04) Updated method calls for WPSSO Core v7.8.0.

