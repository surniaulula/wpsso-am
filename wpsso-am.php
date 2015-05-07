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
 * Tested Up To: 4.2.2
 * Version: 1.3.1
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
		private $wpsso_min_version = '3.0.5';
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

			add_filter( 'wpsso_get_config', array( &$this, 'wpsso_get_config' ), 10, 1 );

			if ( is_admin() )
				add_action( 'admin_init', array( &$this, 'wp_check_for_wpsso' ) );

			add_action( 'wpsso_init_options', array( &$this, 'wpsso_init_options' ), 10 );
			add_action( 'wpsso_init_objects', array( &$this, 'wpsso_init_objects' ), 10 );
			add_action( 'wpsso_init_plugin', array( &$this, 'wpsso_init_plugin' ), 10 );
		}

		// this filter is executed at init priority -1
		public function wpsso_get_config( $cf ) {
			if ( version_compare( $cf['plugin']['wpsso']['version'], $this->wpsso_min_version, '<' ) ) {
				$this->wpsso_has_min_ver = false;
				return $cf;
			}
			$cf['opt']['version'] .= $this->opt_version_suffix;
			$cf = SucomUtil::array_merge_recursive_distinct( $cf, WpssoAmConfig::$cf );
			return $cf;
		}

		public function wp_check_for_wpsso() {
			if ( ! class_exists( 'Wpsso' ) )
				add_action( 'all_admin_notices', array( &$this, 'wp_notice_missing_wpsso' ) );
		}

		public function wp_notice_missing_wpsso() {
			$ext_name = WpssoAmConfig::$cf['plugin']['wpssoam']['name'];
			$req_name = 'WordPress Social Sharing Optimization (WPSSO)';
			$req_uca = 'WPSSO';
			echo '<div class="error"><p>';
			echo sprintf( __( 'The %s extension requires the %s plugin &mdash; '.
				'Please install and activate the %s plugin.', WPSSOAM_TEXTDOM ),
					$ext_name, $req_name, $req_uca );
			echo '</p></div>';
		}

		// this action is executed when WpssoOptions::__construct() is executed (class object is created)
		public function wpsso_init_options() {
			$this->p =& Wpsso::get_instance();
			if ( $this->wpsso_has_min_ver === false )
				return;		// stop here
			$this->p->is_avail['am'] = true;
			$this->p->is_avail['admin']['am-general'] = true;
			$this->p->is_avail['head']['twittercard'] = true;
		}

		public function wpsso_init_objects() {
			if ( $this->wpsso_has_min_ver === false )
				return;		// stop here
			WpssoAmConfig::load_lib( false, 'filters' );
			$this->p->am = new WpssoAmFilters( $this->p, __FILE__ );
		}

		// this action is executed once all class objects have been defined and modules have been loaded
		public function wpsso_init_plugin() {
			if ( $this->wpsso_has_min_ver === false )
				return $this->warning_wpsso_version( WpssoAmConfig::$cf['plugin']['wpssoam'] );

			if ( ! empty( $this->p->options['plugin_wpssoam_tid'] ) )
				add_filter( 'wpssoam_installed_version', array( &$this, 'filter_installed_version' ), 10, 1 );
		}

		public function filter_installed_version( $version ) {
			if ( ! $this->p->check->aop( 'wpssoam', false ) )
				$version = '0.'.$version;
			return $version;
		}

		private function warning_wpsso_version( $info ) {
			$wpsso_version = $this->p->cf['plugin']['wpsso']['version'];
			if ( $this->p->debug->enabled )
				$this->p->debug->log( $info['name'].' requires WPSSO version '.$this->wpsso_min_version.
					' or newer ('.$wpsso_version.' installed)' );
			if ( is_admin() )
				$this->p->notice->err( 'The '.$info['name'].' version '.$info['version'].
					' extension requires WPSSO version '.$this->wpsso_min_version.
					' or newer (version '.$wpsso_version.' is currently installed).', true );
		}
	}

        global $wpssoam;
	$wpssoam = WpssoAm::get_instance();
}

?>
