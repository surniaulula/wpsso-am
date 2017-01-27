=== WPSSO Mobile App Meta - for Apple's mobile Safari and Twitter's App Card ===
Plugin Name: WPSSO Mobile App Meta (WPSSO AM)
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Donate Link: https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-donate
Assets URI: https://surniaulula.github.io/wpsso-am/assets/
Tags: app, app store, mobile app, app card, itunes, iphone, ipad, googleplay, google play, meta, tags, banner, safari, twitter app card, twitter card
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.7.2
Stable Tag: 1.7.13-1

WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Promote your website mobile App</strong> as a banner in Apple's mobile Safari.</p>

<p><strong>Add <a href="https://dev.twitter.com/cards/types/app">Twitter App Card</a> meta tags</strong> to Apple Store and/or Google Play mobile Apps product pages.</p>

<blockquote>
<p><strong>Prerequisite</strong> &mdash; WPSSO Mobile App Meta (WPSSO AM) is an extension for the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, which <em>automatically</em> creates complete and accurate meta tags and Schema markup for Social Sharing Optimization (SSO) and SEO.</p>
</blockquote>

= Quick List of Features =

**WPSSO AM Free / Basic Features**

* Extends the features of either the Free or Pro versions of WPSSO.
* Adds an optional banner advertisement in Apple's mobile Safari for your website's Apple Store mobile App.
	* Add Banner to Archive Webpages
	* Add Banner to Static Homepage
	* Add Banner to Post Types (Posts, Pages, Media, Products, etc.).
	* Apple Store App
		* Default App ID Number
		* Default Affiliate Data
		* Default Argument String

**WPSSO AM Pro / Power-User Features**

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

The WordPress Social Sharing Optimization (WPSSO) plugin is required to use the WPSSO AM extension. 

Use the Free version of WPSSO AM with *both* the Free and Pro versions of WPSSO. The [WPSSO AM Pro extension](https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-extends) (along with all WPSSO Pro extensions) requires the [WPSSO Pro plugin](https://wpsso.com/extend/plugins/wpsso/?utm_source=wpssoam-readme-extends) as well.

[Purchase the WPSSO Mobile App Meta (WPSSO AM) Pro extension](https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-purchase) (includes a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the Plugin](https://wpsso.com/codex/plugins/wpsso-am/installation/install-the-plugin/)
* [Uninstall the Plugin](https://wpsso.com/codex/plugins/wpsso-am/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

* None

== Other Notes ==

= Additional Documentation =

* None

== Screenshots ==

01. Mobile App Meta settings page &mdash; Settings for the Mobile App Banner, Apple Store App defaults, and the Mobile Apps tab.
02. Mobile Apps Tab in the Social Settings metabox &mdash; Custom settings for the Twitter App Card and Mobile App Banner.

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://surniaulula.github.io/wpsso-am/)
* [WordPress.org](https://wordpress.org/plugins/wpsso-am/developers/)

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

Note that the production stage level can be incremented on occasion for simple text revisions and/or translation updates. See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 1.7.13-1 (2017/01/08)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Added a 'plugins_loaded' action hook to load the plugin text domain.

**Version 1.7.12-1 (2016/11/25)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Refactored the min_version_notice() method and moved variables to config class.
	* Refactored the show_metabox_banner() method for the Mobile App Meta settings page.

**Version 1.7.11-1 (2016/11/03)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor code changes required for WPSSO v3.37.0-1:
		* Renamed the SucomUtil after_key() method to get_after_key().

== Upgrade Notice ==

= 1.7.13-1 =

(2017/01/08) Added a 'plugins_loaded' action hook to load the plugin text domain.

= 1.7.12-1 =

(2016/11/25) Refactored the min_version_notice() and show_metabox_banner() methods.

