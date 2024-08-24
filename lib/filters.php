<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2024 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmFilters' ) ) {

	class WpssoAmFilters {

		private $p;	// Wpsso class object.
		private $a;	// WpssoAm class object.
		private $edit;	// WpssoAmFiltersEdit class object.
		private $msgs;	// WpssoAmFiltersMessages class object.
		private $opts;	// WpssoAmFiltersOptions class object.
		private $upg;	// WpssoAmFiltersUpgrade class object.

		/*
		 * Instantiated by WpssoAm->init_objects().
		 */
		public function __construct( &$plugin, &$addon ) {

			static $do_once = null;

			if ( $do_once ) return;	// Stop here.

			$do_once = true;

			$this->p =& $plugin;
			$this->a =& $addon;

			require_once WPSSOAM_PLUGINDIR . 'lib/filters-options.php';

			$this->opts = new WpssoAmFiltersOptions( $plugin, $addon );

			require_once WPSSOAM_PLUGINDIR . 'lib/filters-upgrade.php';

			$this->upg = new WpssoAmFiltersUpgrade( $plugin, $addon );

			$this->p->util->add_plugin_filters( $this, array(
				'meta_name' => 2,
				'tc_seed'   => 2,
			) );

			if ( is_admin() ) {

				require_once WPSSOAM_PLUGINDIR . 'lib/filters-edit.php';

				$this->edit = new WpssoAmFiltersEdit( $plugin, $addon );

				require_once WPSSOAM_PLUGINDIR . 'lib/filters-messages.php';

				$this->msgs = new WpssoAmFiltersMessages( $plugin, $addon );
			}
		}

		/*
		 * Adds the website app meta tag to the $mt_name array.
		 */
		public function filter_meta_name( $mt_name, $mod ) {

			$md_opts = array();

			if ( $mod[ 'is_home' ] ) {	// Static front page (singular post).

				if ( empty( $this->p->options[ 'am_ws_on_front' ] ) ) {	// Add Banner to Home Page.

					if ( $this->p->debug->enabled ) {

						$this->p->debug->log( 'exiting early: am_ws_on_front not enabled' );
					}

					return $mt_name;
				}

			} elseif ( ! $mod[ 'is_post' ] ) {	// Not singular.

				if ( empty( $this->p->options[ 'am_ws_on_archive' ] ) ) {	// Add Banner to Archive Pages.

					if ( $this->p->debug->enabled ) {

						$this->p->debug->log( 'exiting early: am_ws_on_archive not enabled' );
					}

					return $mt_name;
				}

			} elseif ( ! $mod[ 'post_type' ] ) {

				if ( $this->p->debug->enabled ) {

					$this->p->debug->log( 'exiting early: module post_type is empty' );
				}

				return $mt_name;

			} elseif ( empty( $this->p->options[ 'am_ws_add_to_' . $mod[ 'post_type' ] ] ) ) {

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

			if ( ! $mod[ 'is_post' ] ) {

				if ( $this->p->debug->enabled ) {

					$this->p->debug->log( 'exiting early: archive page (not singular)' );
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

			$tc_app_info = array(
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

			$md_opts = $mod[ 'obj' ]->get_options( $mod[ 'id' ] );	// Returns empty string if no meta found.

			foreach ( $tc_app_info as $opt_prefix => $mt_names ) {

				if ( ! empty( $md_opts[ $opt_prefix . '_id' ] ) ) {	// Define the app card if we have an app ID.

					$tc_app[ 'twitter:card' ] = 'app';

					if ( empty( $md_opts[ $opt_prefix . '_name' ] ) ) {

						/*
						 * Use default $md_key = 'seo_title' and no maximum length.
						 */
						$tc_app[ $mt_names[ 'name' ] ] = $this->p->page->get_title( $mod );

					} else {

						$tc_app[ $mt_names[ 'name' ] ] = $md_opts[ $opt_prefix . '_name' ];
					}

					$tc_app[ $mt_names[ 'id' ] ] = $md_opts[ $opt_prefix . '_id' ];

					if ( ! empty( $md_opts[ $opt_prefix . '_url' ] ) ) {

						$tc_app[ $mt_names[ 'url' ] ] = $md_opts[ $opt_prefix . '_url' ];
					}
				}
			}

			if ( empty( $tc_app[ 'twitter:card' ] ) || 'app' !== $tc_app[ 'twitter:card' ] ) {

				return $tc;
			}

			if ( empty( $md_opts[ 'am_ap_ast' ] ) ) {

				$tc_app[ 'twitter:app:country' ] = $this->p->options[ 'am_ap_ast' ];

			} else $tc_app[ 'twitter:app:country' ] = $md_opts[ 'am_ap_ast' ];

			unset( $tc[ 'twitter:title' ] );

			foreach ( range( 1, 4 ) as $num ) {	// Just in case.

				unset( $tc[ 'twitter:label' . $num ], $tc[ 'twitter:data' . $num ] );
			}

			return array_merge( $tc, $tc_app );
		}
	}
}
