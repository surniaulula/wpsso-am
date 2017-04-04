=== WPSSO Mobile App Meta - for Apple's mobile Safari and Twitter's App Card ===
Plugin Name: WPSSO Mobile App Meta (WPSSO AM)
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl.txt
Assets URI: https://surniaulula.github.io/wpsso-am/assets/
Tags: app store, mobile app, app card, mobile, itunes, googleplay, google play, meta tags, app banner, safari, twitter app card, twitter card
Contributors: jsmoriss
Requires At Least: 3.7
Tested Up To: 4.7.3
Stable Tag: 1.7.15-1

WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.

== Description ==

<img src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png" style="width:33%;min-width:128px;max-width:256px;height:auto;float:left;margin:10px 40px 40px 0;" />

<p><strong>Promote your website mobile App</strong> as a banner in Apple's mobile Safari.</p>

<p><strong>Add <a href="https://dev.twitter.com/cards/types/app">Twitter App Card</a> meta tags</strong> to Apple Store and/or Google Play mobile Apps product pages.</p>

<blockquote>
<p><strong>Prerequisite</strong> &mdash; WPSSO Mobile App Meta (WPSSO AM) is an extension for the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, which <em>automatically</em> generates complete and accurate meta tags + Schema markup from your content for Social Sharing Optimization (SSO) and Search Engine Optimization (SEO).</p>
</blockquote>

= Quick List of Features =

**WPSSO AM Free / Basic Features**

* Extends the features of WPSSO Free or Pro.
* Adds an optional banner advertisement in Apple's mobile Safari for your website's Apple Store mobile App.
	* Add Banner to Archive Webpages
	* Add Banner to Static Front Page
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

<blockquote>
<p>The <a href="https://wordpress.org/plugins/wpsso-am/">WPSSO AM Free extension</a> works with the WPSSO Free or Pro plugin. The <a href="https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-extends">WPSSO AM Pro extension</a> (along with all WPSSO Pro extensions) requires the <a href="https://wpsso.com/extend/plugins/wpsso/?utm_source=wpssoam-readme-extends">WPSSO Pro plugin</a> as well.</p>
</blockquote>

[Purchase the WPSSO Mobile App Meta (WPSSO AM) Pro extension here](https://wpsso.com/extend/plugins/wpsso-am/?utm_source=wpssoam-readme-purchase) (all purchases include a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the Plugin](https://wpsso.com/docs/plugins/wpsso-am/installation/install-the-plugin/)
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

= Version Numbering Scheme =

Version components: `{major}.{minor}.{bugfix}-{stage}{level}`

* {major} = Major code changes / re-writes or significant feature changes.
* {minor} = New features / options were added or improved.
* {bugfix} = Bugfixes or minor improvements.
* {stage}{level} = dev &lt; a (alpha) &lt; b (beta) &lt; rc (release candidate) &lt; # (production).

Note that the production stage level can be incremented on occasion for simple text revisions and/or translation updates. See [PHP's version_compare()](http://php.net/manual/en/function.version-compare.php) documentation for additional information on "PHP-standardized" version numbering.

= Changelog / Release Notes =

**Version 1.7.16-dev2 (2017/04/03)**

* *New Features*
	* None
* *Improvements*
	* Updated the plugin documentation and FAQ URLs.
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

**Version 1.7.14-1 (2017/02/26)**

* *New Features*
	* None
* *Improvements*
	* None
* *Bugfixes*
	* None
* *Developer Notes*
	* Minor update for WPSSO v3.40.0-1 compatibility:
		* Removed the $use_post argument from the 'wpsso_meta_name' and 'wpsso_tc_seed' filters.

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

= 1.7.16-dev2 =

(2017/04/03) Updated the plugin documentation and FAQ URLs.

= 1.7.15-1 =

(2017/03/15) Replaced the "(settings value)" text shown for options in the Social Settings metabox with the actual default value.

= 1.7.14-1 =

(2017/02/26) Minor update for WPSSO v3.40.0-1 compatibility.

= 1.7.13-1 =

(2017/01/08) Added a 'plugins_loaded' action hook to load the plugin text domain.

= 1.7.12-1 =

(2016/11/25) Refactored the min_version_notice() and show_metabox_banner() methods.

