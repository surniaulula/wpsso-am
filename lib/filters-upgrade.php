<?php
/**
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2021 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmFiltersUpgrade' ) ) {

	class WpssoAmFiltersUpgrade {

		private $p;	// Wpsso class object.
		private $a;	// WpssoAm class object.

		/**
		 * Instantiated by WpssoAmFilters->__construct().
		 */
		public function __construct( &$plugin, &$addon ) {

			$this->p =& $plugin;
			$this->a =& $addon;

			$this->p->util->add_plugin_filters( $this, array(
				'rename_options_keys'    => 1,
			) );
		}

		public function filter_rename_options_keys( $options_keys ) {

			$options_keys[ 'wpssoam' ] = array(
				7 => array(
					'plugin_wpssoam_tid' => '',
				),
				8 => array(
					'am_ws_on_index' => 'am_ws_on_archive',
				),
			);

			return $options_keys;
		}
	}
}
