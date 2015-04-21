<h1>WPSSO App Meta</h1><h3>for Apple's mobile Safari and Twitter's App Card</h3>

<blockquote>
<strong>Contributors</strong>: jsmoriss<br/>
<strong>Donate Link</strong>: https://surniaulula.com/extend/plugins/wpsso-am/<br/>
<strong>Tags</strong>: wpsso, app, iphone, ipad, googleplay, meta, tags, itunes<br/>
<strong>License</strong>: GPLv3<br/>
<strong>License URI</strong>: http://www.gnu.org/licenses/gpl.txt<br/>
<strong>Requires At Least</strong>: 3.0<br/>
<strong>Tested Up To</strong>: 4.2<br/>
<strong>Stable Tag</strong>: 1.3.1<br/>
</blockquote>

<p>

WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.

</p>

<h3>Description</h3>

<p align="center"><img src="https://surniaulula.github.io/wpsso-am/assets/icon-256x256.png" width="256" height="256" /></p>
<p><strong>Do you have a mobile App for your website</strong> that you'd like to promote as a banner in Apple's mobile Safari?</p>

<p><strong>Do you sell Apple Store Apps</strong>, and you'd like to support the Twitter App Card for your product pages?</p>

<p>WPSSO App Meta (WPSSO AM) works in conjunction with the <a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization (WPSSO)</a> plugin, extending its features with additional settings pages, tabs, and options, to include iPhone, iPad, and Google Play App meta tags in your webpages (for Apple's mobile Safari and Twitter's App Card). WPSSO AM is <em>fast</em>, <em>efficient</em>, and &mdash; using WPSSO as its framework &mdash; provides <em>accurate</em> information about your content to social websites.</p>

<p>You can download the <a href="https://wordpress.org/plugins/wpsso-am/">Free version of WPSSO AM on wordpress.org</a> and <a href="(http://surniaulula.com/extend/plugins/wpsso-am/">purchase Pro license(s) on surniaulula.com</a> (includes a <strong>No Risk 30 Day Refund Policy</strong>). The banner advertisement feature for mobile Safari is included with the Free version, and the Twitter App Card feature is provided with the Pro version.</p>

<h4>Quick List of Features</h4>

**Free / Basic Version**

* Create an optional **banner advertisement** in Apple's mobile Safari for your website's Apple Store App.
* Include the **banner advertisement** on index and archive webpages, a static home page, Posts, Pages, and custom post types (ie. Product pages).

**Pro / Power-User Version**

* **No Risk 30 Day Refund Policy**
* Add an *App Product* tab to WPSSO's Social Settings metabox with additional options:
	* App Store Territory.
	* Apple Store iPhone App ID, Name, and Custom URL Scheme.
	* Apple Store iPad App ID, Name, and Custom URL Scheme.
	* Google Play App ID, Name, and Custom URL Scheme.
* Include the *App Product* tab on Posts, Pages, and custom post types (ie. Product pages).
* Adds the **Twitter App Card** meta tags to *App Product* webpages for social sharing.

<h4>App Meta Tags</h4>

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

<blockquote>
<p><a href="https://wordpress.org/plugins/wpsso/">WordPress Social Sharing Optimization</a> plugin is required to use the WPSSO AM extension. You can use the <em>Free version</em> of WPSSO AM with either WPSSO Free or Pro, but the <a href="http://surniaulula.com/extend/plugins/wpsso-am/">WPSSO AM Pro version</a> requires the use of <a href="http://surniaulula.com/extend/plugins/wpsso/">WPSSO Pro</a> as well.</p>
</blockquote>

<h3>Installation</h3>

<h4>Install and Uninstall</h4>

<ul>
	<li><a href="http://surniaulula.com/codex/plugins/wpsso-am/installation/install-the-plugin/">Install the Plugin</a></li>
	<li><a href="http://surniaulula.com/codex/plugins/wpsso-am/installation/uninstall-the-plugin/">Uninstall the Plugin</a></li>
</ul>

<h3>Frequently Asked Questions</h3>

<h4>Frequently Asked Questions</h4>

<h3>Other Notes</h3>

<h4>Additional Documentation</h4>

<h3>Screenshots</h3>

01. The WPSSO AM Settings Page
02. The App Product Tab

<h3>Changelog</h3>

<h4>Free / Basic Version Repository</h4>

* [GitHub](https://github.com/SurniaUlula/wpsso-am)
* [WordPress.org](https://wordpress.org/plugins/wpsso-am/developers/)

<h4>Version 1.3.1 (2015/04/21)</h4>

* **New Features**
	* *None*
* **Improvements**
	* Replaced self-deactivation by a warning notice if the WPSSO plugin is not found.
	* Made use of the new table row class 'hide_in_basic' from WPSSO v3.0.5 for the Social Settings metabox tab options.
* **Bugfixes**
	* Fixed variable references to a deprecated 'plugin_display' option.

<h4>Version 1.3 (2015/04/12)</h4>

* **New Features**
	* *None*
* **Improvements**
	* Moved the minimum version checks to a new `WpssoAm::min_version_warning()` method.
	* Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" *Free* extension plugin.
* **Bugfixes**
	* *None*

<h4>Version 1.2 (2015/04/02)</h4>

* **New Features**
	* *None*
* **Improvements**
	* Renamed the main library file from "appmeta" to "filters".
	* Renamed the settings library files from "appmeta" to "am-general".
* **Bugfixes**
	* *None*

<h3>Upgrade Notice</h3>

<h4>1.3.1</h4>

Replaced self-deactivation by a warning notice if the WPSSO plugin is not found.

<h4>1.3</h4>

Refactored code for the new "WPSSO Pro Update Manager (WPSSO UM)" Free extension plugin.

<h4>1.2</h4>

Renamed the settings and main library files.

