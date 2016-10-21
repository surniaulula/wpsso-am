<?php
/*
 * Plugin Name: WPSSO Mobile App Meta (WPSSO AM)
 * Plugin Slug: wpsso-am
 * Text Domain: wpsso-am
 * Domain Path: /languages
 * Plugin URI: https://surniaulula.com/extend/plugins/wpsso-am/
 * Assets URI: https://surniaulula.github.io/wpsso-am/assets/
 * Author: JS Morisset
 * Author URI: https://surniaulula.com/
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Description: WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple's mobile Safari and Twitter's App Card.
 * Requires At Least: 3.1
 * Tested Up To: 4.6.1
 * Version: 1.7.10-rc1
 * 
 * Version Numbers: {major}.{minor}.{bugfix}-{stage}{level}
 *
 *	{major}		Major code changes and/or significant feature changes.
 *	{minor}		New features added and/or improvements included.
 *	{bugfix}	Bugfixes and/or very minor improvements.
 *	{stage}{level}	dev# (development), rc# (release candidate), # (production release)
 * 
 * Copyright 2014-2016 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAm' ) ) {

	class WpssoAm {

		public $p;			// Wpsso
		public $reg;			// WpssoAmRegister
		public $filters;		// WpssoAmFilters

		private static $instance = null;
		private static $req_short = 'WPSSO';
		private static $req_name = 'WordPress Social Sharing Optimization (WPSSO)';
		private static $req_min_version = '3.36.3-rc1';
		private static $req_has_min_ver = true;

		public static function &get_instance() {
			if ( self::$instance === null )
				self::$instance = new self;
			return self::$instance;
		}

		public function __construct() {

			require_once ( dirname( __FILE__ ).'/lib/config.php' );
			WpssoAmConfig::set_constants( __FILE__ );
			WpssoAmConfig::require_libs( __FILE__ );	// includes the register.php class library
			$this->reg = new WpssoAmRegister();		// activate, deactivate, uninstall hooks

			if ( is_admin() ) {
				load_plugin_textdomain( 'wpsso-am', false, 'wpsso-am/languages/' );
				add_action( 'admin_init', array( &$this, 'required_check' ) );
			}

			add_filter( 'wpsso_get_config', array( &$this, 'wpsso_get_config' ), 10, 2 );
			add_action( 'wpsso_init_options', array( &$this, 'wpsso_init_options' ), 10 );
			add_action( 'wpsso_init_objects', array( &$this, 'wpsso_init_objects' ), 10 );
			add_action( 'wpsso_init_plugin', array( &$this, 'wpsso_init_plugin' ), 10 );
		}

		public function required_check() {
			if ( ! class_exists( 'Wpsso' ) )
				add_action( 'all_admin_notices', array( __CLASS__, 'required_notice' ) );
		}

		public static function required_notice( $deactivate = false ) {
			$info = WpssoAmConfig::$cf['plugin']['wpssoam'];

			if ( $deactivate === true ) {
				require_once( ABSPATH.'wp-admin/includes/plugin.php' );
				deactivate_plugins( $info['base'] );

				wp_die( '<p>'.sprintf( __( 'The %1$s extension requires the %2$s plugin &mdash; please install and activate the %3$s plugin before trying to re-activate the %4$s extension.', 'wpsso-am' ), $info['name'], self::$req_name, self::$req_short, $info['short'] ).'</p>' );

			} else echo '<div class="error"><p>'.sprintf( __( 'The %1$s extension requires the %2$s plugin &mdash; please install and activate the %3$s plugin.', 'wpsso-am' ), $info['name'], self::$req_name, self::$req_short ).'</p></div>';
		}

		public function wpsso_get_config( $cf, $plugin_version = 0 ) {
			if ( version_compare( $plugin_version, self::$req_min_version, '<' ) ) {
				self::$req_has_min_ver = false;
				return $cf;
			}
			if ( is_admin() )
				asort( WpssoAmConfig::$app_stores );
			return SucomUtil::array_merge_recursive_distinct( $cf, WpssoAmConfig::$cf );
		}

		public function wpsso_init_options() {
			if ( method_exists( 'Wpsso', 'get_instance' ) )
				$this->p =& Wpsso::get_instance();
			else $this->p =& $GLOBALS['wpsso'];

			if ( $this->p->debug->enabled )
				$this->p->debug->mark();

			if ( self::$req_has_min_ver === false )
				return;		// stop here

			$this->p->is_avail['am'] = true;
			$this->p->is_avail['head']['twittercard'] = true;

			if ( is_admin() ) {
				$this->p->is_avail['admin']['am-general'] = true;
				$this->p->is_avail['admin']['post'] = true;
			}
		}

		public function wpsso_init_objects() {
			if ( $this->p->debug->enabled )
				$this->p->debug->mark();

			if ( self::$req_has_min_ver === false )
				return;		// stop here

			$this->filters = new WpssoAmFilters( $this->p );
		}

		public function wpsso_init_plugin() {
			if ( $this->p->debug->enabled )
				$this->p->debug->mark();

			if ( self::$req_has_min_ver === false )
				return $this->min_version_notice();
		}

		private function min_version_notice() {
			$info = WpssoAmConfig::$cf['plugin']['wpssoam'];
			$have_version = $this->p->cf['plugin']['wpsso']['version'];

			if ( $this->p->debug->enabled )
				$this->p->debug->log( $info['name'].' requires '.self::$req_short.' version '.
					self::$req_min_version.' or newer ('.$have_version.' installed)' );

			if ( is_admin() )
				$this->p->notice->err( sprintf( __( 'The %1$s extension version %2$s requires the use of %3$s version %4$s or newer (version %5$s is currently installed).', 'wpsso-am' ), $info['name'], $info['version'], self::$req_short, self::$req_min_version, $have_version ) );
		}
	}

        global $wpssoam;
	$wpssoam =& WpssoAm::get_instance();
}

?>
