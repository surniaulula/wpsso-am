<?php
/*
 * Plugin Name: WPSSO App Meta (WPSSO AM)
 * Plugin URI: http://surniaulula.com/extend/plugins/wpsso-am/
 * Author: Jean-Sebastien Morisset
 * Author URI: http://surniaulula.com/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Description: WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.
 * Requires At Least: 3.0
 * Tested Up To: 4.1.1
 * Version: 1.3dev1
 * 
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
*/

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAm' ) ) {

	class WpssoAm {

		public $p;				// class object variables

		protected static $instance = null;

		private $opt_version_suffix = 'am7';
		private $wpsso_min_version = '3.0dev1';
		private $wpsso_has_min_ver = true;

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {
			require_once ( dirname( __FILE__ ).'/lib/config.php' );
			WpssoAmConfig::set_constants( __FILE__ );
			WpssoAmConfig::require_libs( __FILE__ );

			add_filter( 'wpsso_get_config', array( &$this, 'filter_get_config' ), 10, 1 );

			if ( is_admin() )
				add_action( 'admin_init', array( &$this, 'check_for_wpsso' ) );
			add_action( 'wpsso_init_options', array( &$this, 'init_options' ), 10 );
			add_action( 'wpsso_init_objects', array( &$this, 'init_objects' ), 10 );
			add_action( 'wpsso_init_plugin', array( &$this, 'init_plugin' ), 10 );
		}

		// this filter is executed at init priority -1
		public function filter_get_config( $cf ) {
			if ( version_compare( $cf['plugin']['wpsso']['version'], $this->wpsso_min_version, '<' ) ) {
				$this->wpsso_has_min_ver = false;
				return $cf;
			}
			$cf['opt']['version'] .= $this->opt_version_suffix;
			$cf = SucomUtil::array_merge_recursive_distinct( $cf, WpssoAmConfig::$cf );
			return $cf;
		}

		public function check_for_wpsso() {
			if ( ! class_exists( 'Wpsso' ) ) {
				require_once( ABSPATH.'wp-admin/includes/plugin.php' );
				deactivate_plugins( WPSSOAM_PLUGINBASE );
				wp_die( '<p>'. sprintf( __( 'The WPSSO App Meta (WPSSO AM) extension requires the WordPress Social Sharing Optimization (WPSSO) plugin &mdash; Please install and activate WPSSO before re-activating this extension.', WPSSOAM_TEXTDOM ) ).'</p>' );
			}
		}

		// this action is executed when WpssoOptions::__construct() is executed (class object is created)
		public function init_options() {
			$this->p =& Wpsso::get_instance();
			if ( $this->wpsso_has_min_ver === false )
				return;
			$this->p->is_avail['am'] = true;
			$this->p->is_avail['admin']['am-general'] = true;
			$this->p->is_avail['head']['twittercard'] = true;
		}

		public function init_objects() {
			WpssoAmConfig::load_lib( false, 'filters' );
			$this->p->am = new WpssoAmFilters( $this->p, __FILE__ );
		}

		// this action is executed once all class objects have been defined and modules have been loaded
		public function init_plugin() {
			if ( $this->wpsso_has_min_ver === false ) {
				$shortname = WpssoAmConfig::$cf['plugin']['wpssoam']['short'];
				$wpsso_version = $this->p->cf['plugin']['wpsso']['version'];
				if ( $this->p->debug_enabled )
					$this->p->debug->log( $shortname.' requires WPSSO version '.
						$this->wpsso_min_version.' or newer ('.$wpsso_version.' installed)' );
				if ( is_admin() )
					$this->p->notice->err( $shortname.' v'.WpssoAmConfig::$cf['plugin']['wpssoam']['version'].
						' requires WPSSO v'.$this->wpsso_min_version.' or newer ('.$wpsso_version.' is currently installed).', true );
				return;
			}
			if ( ! empty( $this->p->options['plugin_wpssoam_tid'] ) )
				add_filter( 'wpssoam_installed_version', array( &$this, 'filter_installed_version' ), 10, 1 );
		}

		public function filter_installed_version( $version ) {
			if ( ! $this->p->check->aop( 'wpssoam', false ) )
				$version = '0.'.$version;
			return $version;
		}
	}

        global $wpssoam;
	$wpssoam = WpssoAm::get_instance();
}

?>
