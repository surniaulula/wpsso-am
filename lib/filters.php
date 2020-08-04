<?php
/**
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2020 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmFilters' ) ) {

	class WpssoAmFilters {

		private $p;

		private $md_opts_mt = array(
			'am_iphone_app' => array( 
				'name' => 'twitter:app:name:iphone',
				'id'   => 'twitter:app:id:iphone',
				'url'  => 'twitter:app:url:iphone',
			),
			'am_ipad_app' => array(
				'name' => 'twitter:app:name:ipad',
				'id'   => 'twitter:app:id:ipad',
				'url'  => 'twitter:app:url:ipad',
			),
			'am_gplay_app' => array(
				'name' => 'twitter:app:name:googleplay',
				'id'   => 'twitter:app:id:googleplay',
				'url'  => 'twitter:app:url:googleplay',
			),
		);

		public function __construct( &$plugin ) {

			/**
			 * Just in case - prevent filters from being hooked and executed more than once.
			 */
			static $do_once = null;

			if ( true === $do_once ) {
				return;	// Stop here.
			}

			$do_once = true;

			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$this->p->util->add_plugin_filters( $this, array( 
				'option_type'            => 2,
				'get_defaults'           => 1,
				'get_md_defaults'        => 1,
				'rename_options_keys'    => 1,
				'meta_name'              => 2,
				'tc_seed'                => 2,
			) );

			if ( is_admin() ) {

				if ( ! class_exists( 'WpssoAmFiltersMessages' ) ) {
					require_once WPSSOAM_PLUGINDIR . 'lib/filters-messages.php';
				}

				$this->msgs = new WpssoAmFiltersMessages( $plugin );

				$this->p->util->add_plugin_filters( $this, array( 
					'post_document_meta_tabs' => 3,
					'post_appmeta_rows'       => 4,
				), $prio = 50 );	// Run after WPSSO Core's own Standard / Premium filters.

				$this->p->util->add_plugin_filters( $this, array( 
					'status_std_features' => 3,
				), $prio = 10, $ext = 'wpssoam' );	// Hooks the 'wpssoam' filters.
			}
		}

		public function filter_option_type( $type, $base_key ) {

			if ( ! empty( $type ) ) {
				return $type;
			} elseif ( strpos( $base_key, 'am_' ) !== 0 ) {
				return $type;
			}

			switch ( $base_key ) {

				case 'am_ws_itunes_app_id':
				case 'am_iphone_app_id':
				case 'am_ipad_app_id':

					return 'blank_num';

				/**
				 * Text strings that can be blank.
				 */
				case 'am_ws_itunes_app_aff':
				case 'am_ws_itunes_app_arg':
				case 'am_iphone_app_name':
				case 'am_ipad_app_name':
				case 'am_gplay_app_id':
				case 'am_gplay_app_name':

					return 'ok_blank';

				case 'am_ap_ast':

					return 'not_blank';

				case 'am_iphone_app_url':
				case 'am_ipad_app_url':
				case 'am_gplay_app_url':

					return 'url';
			}

			return $type;
		}

		public function filter_get_defaults( $defs ) {

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			/**
			 * Add options using a key prefix array and post type names.
			 */
			$this->p->util->add_post_type_names( $defs, array(
				'am_ap_add_to' => 0,
				'am_ws_add_to' => 1,
			) );

			return $defs;
		}

		public function filter_get_md_defaults( $md_defs ) {

			$opts =& $this->p->options;		// Shortcut.

			return array_merge( $md_defs, array(
				'am_ap_ast'            => isset( $opts[ 'am_ap_ast' ] ) ? $opts[ 'am_ap_ast' ] : 'US',
				'am_iphone_app_id'     => '',	// iPhone App ID.
				'am_iphone_app_name'   => '',	// iPhone App Name.
				'am_iphone_app_url'    => '',	// iPhone App URL Scheme.
				'am_ipad_app_id'       => '',	// iPad App ID.
				'am_ipad_app_name'     => '',	// iPad App Name.
				'am_ipad_app_url'      => '',	// iPad App URL Scheme.
				'am_gplay_app_id'      => '',	// Google Play App ID.
				'am_gplay_app_name'    => '',	// Google Play App Name.
				'am_gplay_app_url'     => '',	// Google Play App URL Scheme.
				'am_ws_itunes_app_id'  => '',	// App ID Number.
				'am_ws_itunes_app_aff' => '',	// Affiliate Data.
				'am_ws_itunes_app_arg' => '', 	// Argument String.
			) );
		}

		public function filter_rename_options_keys( $options_keys ) {

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$options_keys[ 'wpssoam' ] = array(
				7 => array(
					'plugin_wpssoam_tid' => '',
				),
			);

			return $options_keys;
		}

		/**
		 * Adds the website app meta tag to the $mt_name array.
		 */
		public function filter_meta_name( $mt_name, $mod ) {

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$md_opts = array();

			if ( ! $mod[ 'is_post' ] ) {		// Aka "not singular".

				if ( empty( $this->p->options[ 'am_ws_on_index' ] ) ) {

					if ( $this->p->debug->enabled ) {
						$this->p->debug->log( 'exiting early: am_ws_on_index not enabled' );
					}

					return $mt_name;
				}

			} elseif ( $mod[ 'is_home_page' ] ) {

				if ( empty( $this->p->options[ 'am_ws_on_front' ] ) ) {

					if ( $this->p->debug->enabled ) {
						$this->p->debug->log( 'exiting early: am_ws_on_front not enabled' );
					}

					return $mt_name;
				}

			} elseif ( ! $mod[ 'post_type' ] ) {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'exiting early: module post_type is empty' );
				}

				return $mt_name;

			} elseif ( empty( $this->p->options[ 'am_ws_add_to_' . $mod[ 'post_type' ]] ) ) {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'exiting early: am_ws_add_to_' . $mod[ 'post_type' ] . ' is empty' );
				}

				return $mt_name;
			}

			if ( $mod[ 'id' ] ) {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'loading options from module ID ' . $mod[ 'id' ] );
				}

				$md_opts = $mod[ 'obj' ]->get_options( $mod[ 'id' ] );	// Returns an empty string if no meta found.
			}

			if ( ! empty( $md_opts[ 'am_ws_itunes_app_id' ] ) ) {

				$mt_name[ 'apple-itunes-app' ] = 'app-id=' . $md_opts[ 'am_ws_itunes_app_id' ];

			} elseif ( ! empty( $this->p->options[ 'am_ws_itunes_app_id' ] ) ) {	// Fallback to global options.

				$mt_name[ 'apple-itunes-app' ] = 'app-id=' . $this->p->options[ 'am_ws_itunes_app_id' ];

			} else {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'exiting early: am_ws_itunes_app_id is empty' );
				}

				return $mt_name;
			}	

			if ( ! empty( $md_opts[ 'am_ws_itunes_app_aff' ] ) ) {

				$mt_name[ 'apple-itunes-app' ] .= ', affiliate-data=' . $md_opts[ 'am_ws_itunes_app_aff' ];

			} elseif ( ! empty( $this->p->options[ 'am_ws_itunes_app_aff' ] ) ) {	// Fallback to global options.

				$mt_name[ 'apple-itunes-app' ] .= ', affiliate-data=' . $this->p->options[ 'am_ws_itunes_app_aff' ];
			}
				
			if ( ! empty( $md_opts[ 'am_ws_itunes_app_arg' ] ) ) {

				$mt_name[ 'apple-itunes-app' ] .= ', app-argument=' . $md_opts[ 'am_ws_itunes_app_arg' ];

			} elseif ( ! empty( $this->p->options[ 'am_ws_itunes_app_arg' ] ) ) {	// Fallback to global options.

				$mt_name[ 'apple-itunes-app' ] .= ', app-argument=' . $this->p->options[ 'am_ws_itunes_app_arg' ];
			}

			return $mt_name;
		}

		public function filter_tc_seed( array $tc, array $mod ) {

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			if ( ! $mod[ 'is_post' ] ) {	// aka "not singular"

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'exiting early: index page (not singular)' );
				}

				return $tc;

			} elseif ( ! $mod[ 'post_type' ] ) {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'exiting early: module post_type is empty' );
				}

				return $tc;

			} elseif ( empty( $this->p->options[ 'am_ap_add_to_' . $mod[ 'post_type' ] ] ) ) {

				if ( $this->p->debug->enabled ) {
					$this->p->debug->log( 'exiting early: am_ap_add_to_' . $mod[ 'post_type' ] . ' is empty' );
				}

				return $tc;
			}

			if ( $this->p->debug->enabled ) {
				$this->p->debug->log( 'loading options from post ID ' . $mod[ 'id' ] );
			}

			$tc_app  = array();
			$md_opts = $mod[ 'obj' ]->get_options( $mod[ 'id' ] );	// Returns empty string if no meta found.

			foreach ( $this->md_opts_mt as $key => $mt_names ) {

				if ( ! empty( $md_opts[ $key . '_id' ] ) ) {	// Define the app card if we have an app ID.

					$tc_app[ 'twitter:card' ] = 'app';

					if ( empty( $md_opts[ $key . '_name' ] ) ) {
						$tc_app[ $mt_names[ 'name' ] ] = $this->p->page->get_title( 0, '', $mod );
					} else {
						$tc_app[ $mt_names[ 'name' ] ] = $md_opts[ $key . '_name' ];
					}

					$tc_app[ $mt_names[ 'id' ] ] = $md_opts[ $key . '_id' ];

					if ( ! empty( $md_opts[ $key . '_url' ] ) ) {
						$tc_app[ $mt_names[ 'url' ] ] = $md_opts[ $key . '_url' ];
					}
				}
			}

			if ( empty( $tc_app[ 'twitter:card' ] ) || $tc_app[ 'twitter:card' ] !== 'app' ) {
				return $tc;
			}

			if ( empty( $md_opts[ 'am_ap_ast' ] ) ) {
				$tc_app[ 'twitter:app:country' ] = $this->p->options[ 'am_ap_ast' ];
			} else {
				$tc_app[ 'twitter:app:country' ] = $md_opts[ 'am_ap_ast' ];
			}

			unset( $tc[ 'twitter:title' ] );

			foreach ( range( 1, 4 ) as $num ) {	// Just in case.
				unset( $tc[ 'twitter:label' . $num], $tc[ 'twitter:data' . $num] );
			}

			return array_merge( $tc, $tc_app );
		}

		public function filter_post_document_meta_tabs( $tabs, $mod, $metabox_id ) {

			if ( $metabox_id === $this->p->cf[ 'meta' ][ 'id' ] ) {

				if ( ! empty( $this->p->options[ 'am_ap_add_to_' . $mod[ 'post_type' ]] ) ) {

					SucomUtil::add_after_key( $tabs, 'media', 'appmeta', _x( 'Mobile Apps', 'metabox tab', 'wpsso-am' ) );
				}
			}

			return $tabs;
		}

		public function filter_post_appmeta_rows( $table_rows, $form, $head, $mod ) {

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$def_app_name = $this->p->page->get_title( 0, '', $mod );

			/**
			 * Metabox form rows.
			 */
			$form_rows = array(

				/**
				 * Twitter App Card
				 */
				'subsection_app_card' => array(
					'td_class' => 'subsection top',
					'header'   => 'h4',
					'label'    => _x( 'Twitter App Card', 'metabox title', 'wpsso-am' )
				),
				'am_ap_ast' => array(
					'th_class' => 'medium',
					'label'    => _x( 'App Store Territory', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ap_ast',
					'content'  => $form->get_select( 'am_ap_ast', WpssoAmConfig::$app_stores ),
				),

				/**
				 * iPhone App Details
				 */
				'subsection_iphone_app' => array(
					'td_class' => 'subsection',
					'header'   => 'h5',
					'label'    => _x( 'iPhone App Details', 'metabox title', 'wpsso-am' )
				),
				'am_iphone_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPhone App ID', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_iphone_app_id',
					'content'  => $form->get_input( 'am_iphone_app_id' ),
				),
				'am_iphone_app_name' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPhone App Name', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_iphone_app_name',
					'content'  => $form->get_input( 'am_iphone_app_name', $css_class = 'wide', $css_id = '', 0, $def_app_name ),
				),
				'am_iphone_app_url' => array(
					'tr_class' => $form->get_css_class_hide( 'basic', 'am_iphone_app_url' ),
					'th_class' => 'medium',
					'label'    => _x( 'iPhone App URL Scheme', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_iphone_app_url',
					'content'  => $form->get_input( 'am_iphone_app_url', $css_class = 'wide' ),
				),

				/**
				 * iPad App Details
				 */
				'subsection_ipad_app' => array(
					'td_class' => 'subsection',
					'header'   => 'h5',
					'label'    => _x( 'iPad App Details', 'metabox title', 'wpsso-am' )
				),
				'am_ipad_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPad App ID', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_ipad_app_id',
					'content'  => $form->get_input( 'am_ipad_app_id' ),
				),
				'am_ipad_app_name' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPad App Name', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_ipad_app_name',
					'content'  => $form->get_input( 'am_ipad_app_name', $css_class = 'wide', $css_id = '', 0, $def_app_name ),
				),
				'am_ipad_app_url' => array(
					'tr_class' => $form->get_css_class_hide( 'basic', 'am_ipad_app_url' ),
					'th_class' => 'medium',
					'label'    => _x( 'iPad App URL Scheme', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_ipad_app_url',
					'content'  => $form->get_input( 'am_ipad_app_url', $css_class = 'wide' ),
				),

				/**
				 * Google Play App Details
				 */
				'subsection_gplay_app' => array(
					'td_class' => 'subsection',
					'header'   => 'h5',
					'label'    => _x( 'Google Play App Details', 'metabox title', 'wpsso-am' )
				),
				'am_gplay_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Google Play App ID', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_gplay_app_id',
					'content'  => $form->get_input( 'am_gplay_app_id' ),
				),
				'am_gplay_app_name' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Google Play App Name', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_gplay_app_name',
					'content'  => $form->get_input( 'am_gplay_app_name', $css_class = 'wide', $css_id = '',
						$len = 0, $def_app_name ),
				),
				'am_gplay_app_url' => array(
					'tr_class' => $form->get_css_class_hide( 'basic', 'am_gplay_app_url' ),
					'th_class' => 'medium',
					'label'    => _x( 'Google Play App URL Scheme', 'option label', 'wpsso-am' ),
					'tooltip'  => 'post-am_gplay_app_url',
					'content'  => $form->get_input( 'am_gplay_app_url', $css_class = 'wide' ),
				),

				/**
				 * Mobile App Banner
				 */
				'subsection_app_banner' => array(
					'td_class' => 'subsection',
					'header'   => 'h4',
					'label'    => _x( 'Mobile App Banner', 'metabox title', 'wpsso-am' )
				),
				'am_ws_itunes_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'App ID Number', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ws_itunes_app_id',
					'content'  => $form->get_input( 'am_ws_itunes_app_id', $css_class = '', $css_id = '',
						$len = 0, $this->p->options['am_ws_itunes_app_id'] ),
				),
				'am_ws_itunes_app_aff' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Affiliate Data', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ws_itunes_app_aff',
					'content'  => $form->get_input( 'am_ws_itunes_app_aff', $css_class = '', $css_id = '',
						$len = 0, $this->p->options['am_ws_itunes_app_aff'] ),
				),
				'am_ws_itunes_app_arg' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Argument String', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ws_itunes_app_arg',
					'content'  => $form->get_input( 'am_ws_itunes_app_arg', $css_class = 'wide', $css_id = '',
						$len = 0, $this->p->options['am_ws_itunes_app_arg'] ),
				),
			);

			return $form->get_md_form_rows( $table_rows, $form_rows, $head, $mod );
		}

		/**
		 * Filter for 'wpssoam_status_std_features'.
		 */
		public function filter_status_std_features( $features, $ext, $info ) {

			if ( $this->p->debug->enabled ) {

				$this->p->debug->mark();
			}

			$features[ '(code) Mobile App Banner' ] = array( 
				'label_transl' => _x( '(code) Mobile App Banner', 'lib file description', 'wpsso-am' ),
				'status'       => $this->p->options[ 'am_ws_itunes_app_id' ] ? 'on' : 'off'
			);

			$features[ '(code) Twitter App Card Meta Tags' ] = array( 
				'label_transl' => _x( '(code) Twitter App Card Meta Tags', 'lib file description', 'wpsso-am' ),
				'status'       => 'on',
			);

			return $features;
		}
	}
}
