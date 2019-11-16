<?php
/**
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2019 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmFiltersMessages' ) ) {

	class WpssoAmFiltersMessages {

		private $p;

		/**
		 * Instantiated by WpssoAmFilters->__construct().
		 */
		public function __construct( &$plugin ) {

			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			if ( is_admin() ) {

				$this->p->util->add_plugin_filters( $this, array( 
					'messages_tooltip_post' => 2,
					'messages_tooltip'      => 2,
					'messages_info'         => 2,
				) );
			}
		}

		public function filter_messages_tooltip_post( $text, $msg_key ) {

			if ( strpos( $msg_key, 'tooltip-post-am_' ) !== 0 ) {
				return $text;
			}

			switch ( $msg_key ) {

				case 'tooltip-post-am_iphone_app_id':

					$text = __( 'The numeric representation of your iPhone application ID in the App Store (example: "307234931").', 'wpsso-am' );

					break;

				case 'tooltip-post-am_iphone_app_name':

					$text = __( 'The name of your iPhone application.', 'wpsso-am' );

					break;

				case 'tooltip-post-am_iphone_app_url':

					$text = __( 'Your iPhone App\'s <em>custom</em> URL scheme (you must include "://" after the scheme name).', 'wpsso-am' );

					break;

				case 'tooltip-post-am_ipad_app_id':

					$text = __( 'The numeric representation of your iPad application ID in the App Store (example: "307234931").', 'wpsso-am' );

					break;

				case 'tooltip-post-am_ipad_app_name':

					$text = __( 'The name of your iPad application.', 'wpsso-am' );

					break;

				case 'tooltip-post-am_ipad_app_url':

					$text = __( 'Your iPad App\'s <em>custom</em> URL scheme (you must include "://" after the scheme name).', 'wpsso-am' );

					break;

				case 'tooltip-post-am_gplay_app_id':

					$text = __( 'The fully qualified package name of your Google Play application (example: "com.google.android.apps.maps").', 'wpsso-am' );

					break;

				case 'tooltip-post-am_gplay_app_name':

					$text = __( 'The name of your Google Play application.', 'wpsso-am' );

					break;

				case 'tooltip-post-am_gplay_app_url':

					$text = __( 'Your Google Play App\'s <em>custom</em> URL scheme (you must include "://" after the scheme name).', 'wpsso-am' );

					break;
			}

			return $text;
		}

		public function filter_messages_tooltip( $text, $msg_key ) {

			if ( strpos( $msg_key, 'tooltip-am_' ) !== 0 ) {
				return $text;
			}

			switch ( $msg_key ) {

				case 'tooltip-am_ws_on_index':

					$text = __( 'Add meta tags for the website\'s mobile App to index and archive pages.', 'wpsso-am' );

					break;

				case 'tooltip-am_ws_on_front':

					$text = __( 'Add meta tags for the website\'s mobile App to a static front page.', 'wpsso-am' );

					break;

				case 'tooltip-am_ws_add_to':

					$text = __( 'Add meta tags for the website\'s mobile App to Posts, Pages, and custom post types.', 'wpsso-am' );

					break;

				case 'tooltip-am_ws_itunes_app_id':

					$text = __( 'A mobile App ID in the Apple Store (example: "307234931").', 'wpsso-am' );

					break;

				case 'tooltip-am_ws_itunes_app_aff':

					$text = __( 'If you have an iTunes affiliate string, enter it here.', 'wpsso-am' );

					break;

				case 'tooltip-am_ws_itunes_app_arg':

					$text = __( 'A query string - which may include one or more inline variables - to provide context to your website\'s mobile App.', 'wpsso-am' ) . ' ';
					
					$text .= __( 'If the user has your mobile App installed, this string can allow them to jump from your website to the same content in the mobile App.', 'wpsso-am' );

					break;

				case 'tooltip-am_ap_ast':

					$text = __( 'The App Store country providing your application.', 'wpsso-am' );

					break;

				case 'tooltip-am_ap_add_to':

					$metabox_tab = _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' );

					$metabox_title = _x( $this->p->cf[ 'meta' ][ 'title' ], 'metabox title', 'wpsso' );	// Use wpsso's text domain.

					$text = sprintf( __( 'Include the <em>%1$s</em> tab in the %2$s metabox on Posts, Pages, etc.', 'wpsso-am' ), $metabox_tab, $metabox_title );

					break;
			}

			return $text;
		}

		public function filter_messages_info( $text, $msg_key ) {

			switch ( $msg_key ) {

				case 'info-banner-general':

					$metabox_title = _x( $this->p->cf[ 'meta' ][ 'title' ], 'metabox title', 'wpsso' );	// Use wpsso's text domain.
					$metabox_tab = _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' );

					$text = '<blockquote class="top-info"><p>';
					
					$text .= __( 'These options allow you to present a banner advertisement in Apple\'s mobile Safari for your Apple Store App.', 'wpsso-am' ) . ' ';
					
					$text .= __( 'The banner advertisement allows users of your website to download your mobile App and/or switch to your mobile App when using Apple\'s mobile Safari.', 'wpsso-am' ) . ' ';
					
					$text .= sprintf( __( 'The Apple Store App information can be customized for each Post, Page, and custom post type under the <em>%1$s</em> tab in the %2$s metabox.', 'wpsso-am' ), $metabox_tab, $metabox_title );
					
					$text .= '</p></blockquote>';

					break;

				case 'info-banner-itunes':

					$text = '<blockquote class="top-info"><p>';
					
					$text .= __( 'If you have an Apple Store App to access your website (as an alternative to using mobile web browsers, for example) and/or want to promote a single Apple Store App on your website, enter its details here.', 'wpsso-am' );
					
					$text .= '</p></blockquote>';

					break;

				case 'info-appmeta-general':

					$metabox_title = _x( $this->p->cf[ 'meta' ][ 'title' ], 'metabox title', 'wpsso' );	// Use wpsso's text domain.
					$metabox_tab   = _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' );

					$text = '<blockquote class="top-info"><p>';
					
					$text .= sprintf( __( 'A <em>%1$s</em> tab can be added to the %2$s metabox on Posts, Pages, and custom post types, allowing you to enter specific information about one or more Apple Store and Google Play mobile Apps.', 'wpsso-am' ), $metabox_tab, $metabox_title ) . ' ';
					
					$text .= sprintf( __( 'The <em>%s</em> information is used to create meta tags for Twitter\'s App Card and customize the mobile App banner for Apple\'s mobile Safari.', 'wpsso-am' ), $metabox_tab );
					
					$text .= '</p></blockquote>';

					break;
			}

			return $text;
		}
	}
}
