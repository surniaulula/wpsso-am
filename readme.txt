=== WPSSO Mobile App Meta - Meta Tags for Apple's mobile Safari and Twitter's App Card ===
Plugin Name: WPSSO Mobile App Meta
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-am/assets/
Tags: app store, mobile app, app card, mobile, itunes, googleplay, google play, meta tags, app banner, safari, twitter app card, twitter card
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.8
Stable Tag: 1.7.19

WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.

== Description ==

<img class="readme-icon" src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png">

<p><strong>Promote your website mobile App</strong> as a banner in Apple's mobile Safari.</p>

<p><strong>Add <a href="https://dev.twitter.com/cards/types/app">Twitter App Card</a> meta tags</strong> to Apple Store and/or Google Play mobile Apps product pages.</p>

<blockquote>
<p><strong>Prerequisite</strong> &mdash; WPSSO Mobile App Meta is an extension for the <a href="https://wordpress.org/plugins/wpsso/">WPSSO</a> plugin, which <em>automatically</em> generates complete and accurate meta tags + Schema markup from your content for social media optimization (SMO) and SEO.</p>
</blockquote>

= Quick List of Features =

**WPSSO AM Free / Standard Features**

* Extends the features of WPSSO Free or Pro.
* Adds an optional banner advertisement in Apple's mobile Safari for your website's Apple Store mobile App.
	* Add Banner to Archive Webpages
	* Add Banner to Static Front Page
	* Add Banner to Post Types (Posts, Pages, Media, Products, etc.).
	* Apple Store App
		* Default App ID Number
		* Default Affiliate Data
		* Default Argument String

**WPSSO AM Pro / Additional Features**

* Extends the features of WPSSO Pro (requires a licensed WPSSO Pro plugin).
* Add an *App Product* tab to WPSSO's Social Settings metabox with additional options:
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
* Include the *App Product* tab on Posts, Pages, and custom post types (e-commerce Product pages, for example).
* Adds [Twitter App Card](https://dev.twitter.com/cards/types/app) meta tags for *App Product* webpages.

= Mobile App Meta Tags =

* **Apple mobile Safari Meta Tags**
	* apple-itunes-app
* **Twitter App Card Meta Tags** (Pro version)
	* twitter:app:country
	* twitter:app:id:iphone
	* twitter:app:id:ipad
	* twitter:app:id:googleplay
	* twitter:app:name:iphone
	* twitter:app:name:ipad
	* twitter:app:name:googleplay
	* twitter:app:url:iphone
	* twitter:app:url:ipad
	* twitter:app:url:googleplay

= Extends the WPSSO Plugin =

<p>The <a href="https://wordpress.org/plugins/wpsso-am/">WPSSO AM Free extension</a> works with the WPSSO Free or Pro plugin. The <a href="https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-extends">WPSSO AM Pro extension</a> (along with all WPSSO Pro extensions) requires the <a href="https://wpsso.com/extend/plugins/wpsso/?utm_source=wpssoam-readme-extends">WPSSO Pro plugin</a> as well.</p>

[Purchase the WPSSO Mobile App Meta Pro extension here](https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-purchase) (all purchases include a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the Plugin (Free and Pro version)](https://wpsso.com/docs/plugins/wpsso-am/installation/install-the-plugin/)
* [Uninstall the Plugin](https://wpsso.com/docs/plugins/wpsso-am/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

01. WPSSO AM settings page includes options for the Mobile App Banner, Apple Store App defaults, and the Mobile Apps tab.
02. WPSSO AM tab in the Social Settings metabox provides custom settings for the Twitter App Card and Mobile App Banner (Pro version).

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://surniaulula.github.io/wpsso-am/)
* [WordPress.org](https://wordpress.org/plugins/wpsso-am/developers/)

= Version Numbering =

Version components: `{major}.{minor}.{bugfix}[-{stage}.{level}]`

* {major} = Major structural code changes / re-writes or incompatible API changes.
* {minor} = New functionality was added or improved in a backwards-compatible manner.
* {bugfix} = Backwards-compatible bug fixes or small improvements.
* {stage}.{level} = Pre-production release: dev < a (alpha) < b (beta) < rc (release candidate).

= Changelog / Release Notes =

**Version 1.7.19 (2017/04/30)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Code refactoring to rename the $is_avail array to $avail for WPSSO v3.42.0.

**Version 1.7.18 (2017/04/16)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Refactored the plugin init filters and moved/renamed the registration boolean from `is_avail[$name]` to `is_avail['p_ext'][$name]`.

**Version 1.7.17 (2017/04/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor revision to move URLs in the extension config to the main WPSSO plugin config.
	* Dropped the package number from the production version string.

**Version 1.7.16-1 (2017/04/05)**

* *New Features*
	* None
* *Improvements*
	* Updated the plugin icon images and the documentation URLs.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

**Version 1.7.15-1 (2017/03/15)**

* *New Features*
	* None
* *Improvements*
	* Replaced the "(settings value)" text shown for options in the Social Settings metabox with the actual default value.
* *Bugfixes*
	* None
* *Developer Notes*
	* None

== Upgrade Notice ==

= 1.7.19 =

(2017/04/30) Code refactoring to rename the $is_avail array to $avail for WPSSO v3.42.0.

= 1.7.18 =

(2017/04/16) Refactored the plugin init filters and moved/renamed the registration boolean.

= 1.7.17 =

(2017/04/08) Minor revision to move URLs in the extension config to the main WPSSO plugin config.

= 1.7.16-1 =

(2017/04/05) Updated the plugin icon images and the documentation URLs.

= 1.7.15-1 =

(2017/03/15) Replaced the "(settings value)" text shown for options in the Social Settings metabox with the actual default value.

