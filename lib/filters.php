<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAmFilters' ) ) {

	class WpssoAmFilters {

		protected $p;

		public static $cf = array(
			'opt' => array(				// options
				'defaults' => array(
					'add_meta_name_apple-itunes-app' => 1,
					'add_meta_name_twitter:app:country' => 1,
					'add_meta_name_twitter:app:name:iphone' => 1,
					'add_meta_name_twitter:app:id:iphone' => 1,
					'add_meta_name_twitter:app:url:iphone' => 1,
					'add_meta_name_twitter:app:name:ipad' => 1,
					'add_meta_name_twitter:app:id:ipad' => 1,
					'add_meta_name_twitter:app:url:ipad' => 1,
					'add_meta_name_twitter:app:name:googleplay' => 1,
					'add_meta_name_twitter:app:id:googleplay' => 1,
					'add_meta_name_twitter:app:url:googleplay' => 1,
					'am_ws_on_index' => 1,
					'am_ws_on_front' => 1,
					'am_ws_add_to_post' => 1,
					'am_ws_add_to_page' => 1,
					'am_ws_add_to_attachment' => 1,
					'am_ws_itunes_app_id' => '',
					'am_ws_itunes_app_aff' => '',
					'am_ws_itunes_app_arg' => '%%request_url%%',
					'am_ap_ast' => 'US',
					'am_ap_add_to_post' => 0,
					'am_ap_add_to_page' => 1,
					'am_ap_add_to_attachment' => 0,
				),
			),
		);

		public function __construct( &$plugin ) {
			$this->p =& $plugin;

			$this->p->util->add_plugin_filters( $this, array( 
				'get_defaults' => 1,			// option defaults
				'get_md_defaults' => 1,			// meta data defaults
				'meta_name' => 3,
			) );

			if ( is_admin() ) {
				$this->p->util->add_plugin_filters( $this, array( 
					'option_type' => 2,			// define the value type for each option
					'post_social_settings_tabs' => 2,	// $tabs, $mod
					'messages_tooltip_post' => 2,		// tooltip messages for post social settings
					'messages_tooltip' => 2,		// tooltip messages filter
					'messages_info' => 2,			// info messages filter
				) );
				$this->p->util->add_plugin_filters( $this, array( 
					'status_gpl_features' => 3,
					'status_pro_features' => 3,
				), 10, 'wpssoam' );

			}
		}

		public function filter_get_defaults( $def_opts ) {
			$def_opts = array_merge( $def_opts, self::$cf['opt']['defaults'] );

			$def_opts = $this->p->util->add_ptns_to_opts( $def_opts, array(
				'am_ap_add_to' => 0,
				'am_ws_add_to' => 1,
			) );

			return $def_opts;
		}

		public function filter_get_md_defaults( $def_opts ) {
			return array_merge( $def_opts, array(
				'am_ap_ast' => -1,		// App Store Territory
				'am_iphone_app_id' => '',	// iPhone App ID
				'am_iphone_app_name' => '',	// iPhone App Name
				'am_iphone_app_url' => '',	// iPhone App URL Scheme
				'am_ipad_app_id' => '',		// iPad App ID
				'am_ipad_app_name' => '',	// iPad App Name
				'am_ipad_app_url' => '',	// iPad App URL Scheme
				'am_gplay_app_id' => '',	// Google Play App ID
				'am_gplay_app_name' => '',	// Google Play App Name
				'am_gplay_app_url' => '',	// Google Play App URL Scheme
				'am_ws_itunes_app_id' => '',	// App ID Number
				'am_ws_itunes_app_aff' => '',	// Affiliate Data
				'am_ws_itunes_app_arg' => '', 	// Argument String
			) );
		}

		// adds the website app meta tag to the $mt_name array
		public function filter_meta_name( $mt_name, $use_post, $mod ) {
			if ( $this->p->debug->enabled )
				$this->p->debug->mark();

			$md_opts = array();

			if ( ! $mod['is_post'] ) {		// aka "not singular"
				if ( empty( $this->p->options['am_ws_on_index'] ) ) {
					if ( $this->p->debug->enabled )
						$this->p->debug->log( 'exiting early: am_ws_on_index not enabled' );
					return $mt_name;
				}

			} elseif ( $mod['is_home_page'] ) {
				if ( empty( $this->p->options['am_ws_on_front'] ) ) {
					if ( $this->p->debug->enabled )
						$this->p->debug->log( 'exiting early: am_ws_on_front not enabled' );
					return $mt_name;
				}

			} elseif ( ! $mod['post_type'] ) {
				if ( $this->p->debug->enabled )
					$this->p->debug->log( 'exiting early: module post_type is empty' );
				return $mt_name;

			} elseif ( empty( $this->p->options['am_ws_add_to_'.$mod['post_type']] ) ) {
				if ( $this->p->debug->enabled )
					$this->p->debug->log( 'exiting early: am_ws_add_to_'.$mod['post_type'].' is empty' );
				return $mt_name;
			}

			if ( $mod['id'] ) {
				if ( $this->p->debug->enabled )
					$this->p->debug->log( 'loading options from module ID '.$mod['id'] );
				$md_opts = $mod['obj']->get_options( $mod['id'] );
			}

			if ( ! empty( $md_opts['am_ws_itunes_app_id'] ) )
				$mt_name['apple-itunes-app'] = 'app-id='.$md_opts['am_ws_itunes_app_id'];
			elseif ( ! empty( $this->p->options['am_ws_itunes_app_id'] ) )	// fallback to global options
				$mt_name['apple-itunes-app'] = 'app-id='.$this->p->options['am_ws_itunes_app_id'];
			else {
				if ( $this->p->debug->enabled )
					$this->p->debug->log( 'exiting early: am_ws_itunes_app_id is empty' );
				return $mt_name;
			}	

			if ( ! empty( $md_opts['am_ws_itunes_app_aff'] ) )
				$mt_name['apple-itunes-app'] .= ', affiliate-data='.$md_opts['am_ws_itunes_app_aff'];
			elseif ( ! empty( $this->p->options['am_ws_itunes_app_aff'] ) )	// fallback to global options
				$mt_name['apple-itunes-app'] .= ', affiliate-data='.$this->p->options['am_ws_itunes_app_aff'];
				
			if ( ! empty( $md_opts['am_ws_itunes_app_arg'] ) )
				$mt_name['apple-itunes-app'] .= ', app-argument='.$md_opts['am_ws_itunes_app_arg'];
			elseif ( ! empty( $this->p->options['am_ws_itunes_app_arg'] ) )	// fallback to global options
				$mt_name['apple-itunes-app'] .= ', app-argument='.$this->p->options['am_ws_itunes_app_arg'];

			return $mt_name;
		}

		public function filter_option_type( $type, $key ) {

			if ( ! empty( $type ) )
				return $type;
			elseif ( strpos( $key, 'am_' ) !== 0 )
				return $type;

			switch ( $key ) {
				case 'am_ws_itunes_app_id':
				case 'am_iphone_app_id':
				case 'am_ipad_app_id':
					return 'blank_num';
					break;
				// text strings that can be blank
				case 'am_ws_itunes_app_aff':
				case 'am_ws_itunes_app_arg':
				case 'am_iphone_app_name':
				case 'am_ipad_app_name':
				case 'am_gplay_app_id':
				case 'am_gplay_app_name':
					return 'ok_blank';
					break;
				case 'am_ap_ast':
					return 'not_blank';
					break;
				case 'am_iphone_app_url':
				case 'am_ipad_app_url':
				case 'am_gplay_app_url':
					return 'url';
					break;
			}
			return $type;
		}

		public function filter_post_social_settings_tabs( $tabs, $mod ) {
			if ( empty( $this->p->options['am_ap_add_to_'.$mod['post_type']] ) )
				return $tabs;
			else return SucomUtil::after_key( $tabs, 'text', 'appmeta',
				_x( 'Mobile Apps', 'metabox tab', 'wpsso-am' ) );
		}

		public function filter_messages_tooltip_post( $text, $idx ) {
			if ( strpos( $idx, 'tooltip-post-am_' ) !== 0 )
				return $text;

			switch ( $idx ) {
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

		public function filter_messages_tooltip( $text, $idx ) {
			if ( strpos( $idx, 'tooltip-am_' ) !== 0 )
				return $text;

			switch ( $idx ) {
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
					$text = __( 'A query string - which may include one or more inline variables - to provide context to your website\'s mobile App. If the user has your mobile App installed, this string can allow them to jump from your website to the same content in the mobile App.', 'wpsso-am' );
					break;
				case 'tooltip-am_ap_ast':
					$text = __( 'The App Store country providing your application.', 'wpsso-am' );
					break;
				case 'tooltip-am_ap_add_to':
					$text = sprintf( __( 'Include the <em>%1$s</em> tab in the %2$s metabox on Posts, Pages, etc.', 'wpsso-am' ), _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' ), _x( 'Social Settings', 'metabox title', 'wpsso' ) );
					break;
			}
			return $text;
		}

		public function filter_messages_info( $text, $idx ) {
			switch ( $idx ) {
				case 'info-banner-general':
					$text = '<blockquote class="top-info"><p>'.__( 'These options provide a way to present a banner advertisement in Apple\'s mobile Safari for your Apple Store App(s).', 'wpsso-am' ).' '.__( 'The banner advertisement allows users of your website to download your mobile App and/or switch to your mobile App when using Apple\'s mobile Safari.', 'wpsso-am' ).' '.sprintf( __( 'The Apple Store App information can be customized for each Post, Page, and custom post type under the <em>%1$s</em> tab (enabled above) in the %2$s metabox.', 'wpsso-am' ), _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' ), _x( 'Social Settings', 'metabox title', 'wpsso' ) ).'</p></blockquote>';
					break;
				case 'info-banner-itunes':
					$text = '<blockquote class="top-info"><p>'.__( 'If you have an Apple Store App to access your website (as an alternative to using mobile web browsers, for example) and/or want to promote a single Apple Store App on your website, enter its details here.', 'wpsso-am' ).'</p></blockquote>';
					break;
				case 'info-appmeta-general':
					$text = '<blockquote class="top-info"><p>'.sprintf( __( 'An <em>%1$s</em> tab can be added to the %2$s metabox on Posts, Pages, and custom post types, allowing you to enter specific information about one or more Apple Store and Google Play mobile Apps.', 'wpsso-am' ), _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' ), _x( 'Social Settings', 'metabox title', 'wpsso' ) ).' '.sprintf( __( 'The <em>%s</em> information is used to create meta tags for Twitter\'s App Card and customize a mobile App banner for Apple\'s mobile Safari.', 'wpsso-am' ), _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' ) ).'</p></blockquote>';
					break;
			}
			return $text;
		}

		public function filter_status_gpl_features( $features, $lca, $info ) {
			$features['(code) Mobile App Banner'] = array( 
				'status' => $this->p->options['am_ws_itunes_app_id'] ? 'on' : 'off'
			);
			return $features;
		}

		public function filter_status_pro_features( $features, $lca, $info ) {
			$aop = $this->p->check->aop( $lca, true, $this->p->is_avail['aop'] );
			$features['(code) Custom Mobile Apps Meta'] = array( 
				'td_class' => $aop ? '' : 'blank',
				'status' => $aop ? 'on' : 'off',
			);
			$features['(code) Twitter App Card Meta Tags'] = array( 
				'td_class' => $aop ? '' : 'blank',
				'status' => $aop ? 'on' : 'off',
			);
			return $features;
		}
	}
}

?>
