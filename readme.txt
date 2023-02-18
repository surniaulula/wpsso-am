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
Requires Plugins: wpsso
Requires PHP: 7.2
Requires At Least: 5.4
Tested Up To: 6.1.1
Stable Tag: 3.17.1

Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari banner and Twitter's App Card.

== Description ==

<!-- about -->

**Apple Store / iTunes and Google Play App meta tags.**

**Promote your website's mobile App with a banner in Apple's mobile Safari.**

**Add [Twitter App Card](https://dev.twitter.com/cards/types/app) markup to mobile App product pages:**

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

WPSSO Mobile App Meta Tags (WPSSO AM) is an add-on for the [WPSSO Core plugin](https://wordpress.org/plugins/wpsso/), which provides complete structured data for WordPress to present your content at its best on social sites and in search results – no matter how URLs are shared, reshared, messaged, posted, embedded, or crawled.

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

**Version 3.18.0-dev.4 (2023/02/18)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Renamed the 'wpssoam_status_std_features' filter to 'wpssoam_features_status'.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.4.
	* WPSSO Core v15.4.0-dev.4.

**Version 3.17.1 (2023/01/26)**

* **New Features**
	* None.
* **Improvements**
	* Updated the minimum WordPress version from v5.2 to v5.4.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Updated the `WpssoAbstractAddOn` library class.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.4.
	* WPSSO Core v14.7.0.

**Version 3.17.0 (2023/01/20)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Updated the `SucomAbstractAddOn` common library class.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v14.5.0.

**Version 3.16.0 (2022/03/10)**

Maintenance release.

* **New Features**
	* None.
* **Improvements**
	* Added dynamic placeholders to Document SSO metabox title options.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v11.6.0.

**Version 3.15.1 (2022/03/07)**

Maintenance release.

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* None.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v11.5.0.

**Version 3.15.0 (2022/02/17)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Updated the `WpssoPage` class `get_title()`, `get_description()`, and `get_caption()` method arguments for WPSSO Core v11.0.0.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v11.0.0.

**Version 3.14.0 (2022/01/19)**

* **New Features**
	* None.
* **Improvements**
	* Renamed the Document SSO &gt; Mobile Apps tab to Edit Mobile Apps.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Renamed the lib/abstracts/ folder to lib/abstract/.
	* Renamed the `SucomAddOn` class to `SucomAbstractAddOn`.
	* Renamed the `WpssoAddOn` class to `WpssoAbstractAddOn`.
	* Renamed the `WpssoWpMeta` class to `WpssoAbstractWpMeta`.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v9.14.0.

**Version 3.13.0 (2021/12/16)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Replaced a call to `WpssoUtil->add_post_type_names()` with a new 'wpsso_add_custom_post_type_options' filter hook.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v9.12.0.

**Version 3.12.2 (2021/11/16)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Refactored the `SucomAddOn->get_missing_requirements()` method.
* **Requires At Least**
	* PHP v7.2.
	* WordPress v5.2.
	* WPSSO Core v9.8.0.

**Version 3.12.1 (2021/10/06)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Standardized `get_table_rows()` calls and filters in 'submenu' and 'sitesubmenu' classes.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.
	* WPSSO Core v9.1.0.

**Version 3.12.0 (2021/09/24)**

* **New Features**
	* None.
* **Improvements**
	* None.
* **Bugfixes**
	* None.
* **Developer Notes**
	* Minor code optimization.
* **Requires At Least**
	* PHP v7.0.
	* WordPress v5.0.
	* WPSSO Core v9.0.0.

**Version 3.11.0 (2021/09/11)**

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
	* WPSSO Core v8.39.0.

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

= 3.18.0-dev.4 =

(2023/02/18) Renamed the 'wpssoam_status_std_features' filter to 'wpssoam_features_status'.

= 3.17.1 =

(2023/01/26) Updated the minimum WordPress version from v5.2 to v5.4.

= 3.17.0 =

(2023/01/20) Updated the `SucomAbstractAddOn` common library class.

= 3.16.0 =

(2022/03/10) Added dynamic placeholders to Document SSO metabox title options.

= 3.15.1 =

(2022/03/07) Maintenance release.

= 3.15.0 =

(2022/02/17) Updated `WpssoPage` class method arguments for WPSSO Core v11.0.0.

= 3.14.0 =

(2022/01/19) Renamed the Document SSO &gt; Mobile Apps tab. Renamed the lib/abstracts/ folder and its classes.

= 3.13.0 =

(2021/12/16) Replaced a method call with a filter hook when completing the default options array.

= 3.12.2 =

(2021/11/16) Refactored the `SucomAddOn->get_missing_requirements()` method.

= 3.12.1 =

(2021/10/06) Standardized `get_table_rows()` calls and filters in 'submenu' and 'sitesubmenu' classes.

= 3.12.0 =

(2021/09/24) Minor code optimization.

= 3.11.0 =

(2021/09/11) Fixed tooltips for options in the Document SSO metabox.

= 3.10.2 =

(2021/09/02) Minor translation string updates.

= 3.10.1 =

(2021/08/27) Improved logic check for "Add Banner to Home Page" option.

= 3.10.0 =

(2021/04/17) Added support for `SucomForm->get_checklist_post_types()` in the add-on settings page.

