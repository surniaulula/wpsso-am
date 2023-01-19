<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2022 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmFiltersOptions' ) ) {

	class WpssoAmFiltersOptions {

		private $p;	// Wpsso class object.
		private $a;	// WpssoAm class object.

		/*
		 * Instantiated by WpssoAmFilters->__construct().
		 */
		public function __construct( &$plugin, &$addon ) {

			$this->p =& $plugin;
			$this->a =& $addon;

			$this->p->util->add_plugin_filters( $this, array(
				'add_custom_post_type_options' => 1,
				'get_md_defaults'              => 1,
				'option_type'                  => 2,
			) );
		}

		public function filter_add_custom_post_type_options( $opt_prefixes ) {

			$opt_prefixes[ 'am_ws_add_to' ] = 1;	// Add Banner to Post Types.
			$opt_prefixes[ 'am_ap_add_to' ] = 0;	// Show Tab on Post Types.

			return $opt_prefixes;
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

		/*
		 * Return the sanitation type for a given option key.
		 */
		public function filter_option_type( $type, $base_key ) {

			if ( ! empty( $type ) ) {	// Return early if we already have a type.

				return $type;

			} elseif ( 0 !== strpos( $base_key, 'am_' ) ) {	// Nothing to do.

				return $type;
			}

			switch ( $base_key ) {

				case 'am_ws_itunes_app_id':
				case 'am_iphone_app_id':
				case 'am_ipad_app_id':

					return 'blank_num';

				/*
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
	}
}
