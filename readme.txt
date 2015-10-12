=== WPSSO Mobile App Meta - for Apple's mobile Safari and Twitter's App Card ===
Plugin Name: WPSSO Mobile App Meta (WPSSO AM)
Plugin Slug: wpsso-am
Text Domain: wpsso-am
Domain Path: /languages
Contributors: jsmoriss
Donate Link: https://wpsso.com/
Tags: wpsso, app, iphone, ipad, googleplay, meta, tags, itunes
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl.txt
Requires At Least: 3.1
Tested Up To: 4.3.1
Stable Tag: 1.3.8

WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.

== Description ==

<p><img src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png" width="256" height="256" style="width:33%;min-width:128px;max-width:256px;float:left;margin:0 40px 20px 0;" /><strong>Do you have a mobile App for your website</strong> that you'd like to promote as a banner in Apple's mobile Safari?</p>

**Do you sell Apple Store mobile Apps**, and you'd like to support the [Twitter App Card](https://dev.twitter.com/cards/types/app) on your product pages?

WPSSO Mobile App Meta (WPSSO AM) works in conjunction with the [WordPress Social Sharing Optimization (WPSSO)](https://wordpress.org/plugins/wpsso/) plugin, extending its features with additional settings pages, tabs, and options to include iPhone, iPad, and Google Play App meta tags in your webpages (for Apple's mobile Safari and [Twitter's App Card](https://dev.twitter.com/cards/types/app)).

**Available in multiple languages:**

* English (US)
* French (France)
* More to come...

= Quick List of Features =

**WPSSO AM Free / Basic Features**

* Adds an optional banner advertisement in Apple's mobile Safari for your website's Apple Store mobile App.
* Include the banner advertisement on index / archive webpages, a your static home page, Posts, Pages, and custom post types (e-commerce Product pages, for example).

**WPSSO AM Pro / Power-User Features**

* Add an *App Product* tab to WPSSO's Social Settings metabox with additional options:
	* The App Store Territory.
	* Apple Store iPhone App ID, Name, and Custom URL Scheme.
	* Apple Store iPad App ID, Name, and Custom URL Scheme.
	* Google Play App ID, Name, and Custom URL Scheme.
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

= WPSSO Framework Required =

The WordPress Social Sharing Optimization (WPSSO) plugin is required to use the WPSSO AM extension. You can use the Free version of WPSSO AM with *both* the Free and Pro versions of WPSSO, but [WPSSO AM Pro](http://wpsso.com/extend/plugins/wpsso-am/) requires the use of the [WPSSO Pro](http://wpsso.com/extend/plugins/wpsso/) plugin as well. [Purchase the WPSSO Mobile App Meta (WPSSO AM) Pro extension](http://wpsso.com/extend/plugins/wpsso-am/) (includes a *No Risk 30 Day Refund Policy*).

== Installation ==

= Install and Uninstall =

* [Install the Plugin](http://wpsso.com/codex/plugins/wpsso-am/installation/install-the-plugin/)
* [Uninstall the Plugin](http://wpsso.com/codex/plugins/wpsso-am/installation/uninstall-the-plugin/)

== Frequently Asked Questions ==

= Frequently Asked Questions =

== Other Notes ==

= Additional Documentation =

== Screenshots ==

01. The WPSSO AM Settings Page
02. The App Product Tab

== Changelog ==

= Free / Basic Version Repository =

* [GitHub](https://github.com/SurniaUlula/wpsso-am)
* [WordPress.org](https://wordpress.org/plugins/wpsso-am/developers/)

= Version 1.3.8 2015/10/11 =

* **New Features**
	* Added a French language (fr_FR) translation.
* **Improvements**
	* Minor improvements to title / option text strings and contextual help messages.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.3.7 2015/10/04 =

* **New Features**
	* *None*
* **Improvements**
	* Added translation function calls to all option labels and popup help messages.
	* Updated the text domain in preparation for plugin import to translate.wordpress.org.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Added a POT (Portable Object Template) file with translation strings in languages/wpsso-am.pot.

= Version 1.3.6 2015/09/19 =

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Added a self-deactivation feature when WPSSO AM is activated and WPSSO is missing. 

= Version 1.3.5 2015/09/09 =

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Added a WpssoAmRegister class with `WpssoUtil::save_time()` calls during activation to save install / activation / update timestamps.

= Version 1.3.4 2015/09/03 =

* **New Features**
	* *None*
* **Improvements**
	* *None*
* **Bugfixes**
	* *None*
* **Developer Notes**
	* Updated the tooltip message filter names for WPSSO v3.8.
	* Removed the WPSSO AM specific 'installed_version' filter.

= Version 1.3.3 2015/08/04 =

* **New Features**
	* *None*
* **Improvements**
	* Confirmed WordPress v4.2.4 compatibility.
	* Renamed the deprecated SucomUtil `th()` method to `get_th()`.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.3.2 =

* **New Features**
	* *None*
* **Improvements**
	* Renamed the 'postmeta' filter hooks to 'post' for compatibility with WPSSO v3.3.
* **Bugfixes**
	* *None*
* **Developer Notes**
	* *None*

= Version 1.3.1 2015/04/21 =

* **New Features**
	* *None*
* **Improvements**
	* Replaced self-deactivation by a warning notice if the WPSSO plugin is not found.
	* Made use of the new table row class 'hide_in_basic' from WPSSO v3.0.5 for the Social Settings metabox tab options.
* **Bugfixes**
	* Fixed variable references to a deprecated 'plugin_display' option.

= Version 1.3 2015/04/12 =

* **New Features**
	* *None*
* **Improvements**
	* Moved the minimum version checks to a new `WpssoAm::min_version_warning()` method.
	* Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" *Free* extension plugin.
* **Bugfixes**
	* *None*

== Upgrade Notice ==

= 1.3.8 =

2015/10/11 Added a French language (fr_FR) translation. Minor improvements to title / option text strings and contextual help messages.

= 1.3.7 =

2015/10/04 Added translation function calls to all option labels and popup help messages. Added POT (Portable Object Template) file with translation strings in languages/wpsso-am.pot.

