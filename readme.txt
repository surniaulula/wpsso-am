=== WPSSO Mobile App Meta Tags ===
Plugin Name: WPSSO Mobile App Meta Tags
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-am/assets/
Tags: app store, mobile app, app card, mobile, itunes, googleplay, google play, meta tags, app banner, safari, twitter app card, twitter card
Contributors: jsmoriss
Requires PHP: 7.0
Requires At Least: 5.0
Tested Up To: 5.8.1
Stable Tag: 3.10.2

Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari banner and Twitter's App Card.

== Description ==

<p><img class="readme-icon" src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png"> <strong>Promote your website's mobile App with a banner in Apple's mobile Safari.</strong></p>

**Optionally add [Twitter App Card](https://dev.twitter.com/cards/types/app) markup to mobile App product pages:**

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

&#x2605;&#x2605;&#x2605;&#x2605;&#x2605; - "Universal links, smart app banners, Twitter app cards - App developers, this is the plugin you need." - [markofjohnson](https://wordpress.org/support/topic/universal-links-smart-app-banners-twitter-app-cards/)

<h3>WPSSO AM Add-on Features</h3>

Extends the features of the [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/) (required plugin).

Adds an optional banner in Apple's mobile Safari for your website's Apple Store mobile App.

Adds optional [Twitter App Card](https://dev.twitter.com/cards/types/app) meta tags to webpages.

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

<h3>WPSSO Core Required</h3>

WPSSO Mobile App Meta Tags (WPSSO AM) is an add-on for the [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/).

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

**Version 3.11.0-dev.7 (2021/09/10)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* Fixed tooltips for options in the Document SSO metabox.
* **Developer Notes**
	* Added a new WpssoAmFiltersEdit class.
	* Added a new WpssoAmFiltersOptions class.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.
	* WPSSO Core v8.39.0-dev.7.

**Version 3.10.2 (2021/09/02)**

* **New Features**
	* None.
* **Improvements**
	* Minor translation string updates.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.
	* WPSSO Core v8.37.0.

**Version 3.10.1 (2021/08/27)**

* **New Features**
	* None.
* **Improvements**
	* Improved logic check for "Add Banner to Home Page" option.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Renamed the 'am_ws_on_index' option key to 'am_ws_on_archive'.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.
	* WPSSO Core v8.36.1.

**Version 3.10.0 (2021/04/17)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Added support for `SucomForm->get_checklist_post_types()` in the add-on settings page.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.
	* WPSSO Core v8.34.0.

== Upgrade Notice ==

= 3.11.0-dev.7 =

(2021/09/10) Fixed tooltips for options in the Document SSO metabox.

= 3.10.2 =

(2021/09/02) Minor translation string updates.

= 3.10.1 =

(2021/08/27) Improved logic check for "Add Banner to Home Page" option.

= 3.10.0 =

(2021/04/17) Added support for `SucomForm->get_checklist_post_types()` in the add-on settings page.

