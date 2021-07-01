<?php
/**
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2021 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmConfig' ) ) {

	class WpssoAmConfig {

		public static $cf = array(
			'plugin' => array(
				'wpssoam' => array(			// Plugin acronym.
					'version'     => '3.10.0',	// Plugin version.
					'opt_version' => '8',		// Increment when changing default option values.
					'short'       => 'WPSSO AM',	// Short plugin name.
					'name'        => 'WPSSO Mobile App Meta Tags',
					'desc'        => 'Apple Store / iTunes and Google Play App meta tags for Apple\'s mobile Safari banner and Twitter\'s App Card.',
					'slug'        => 'wpsso-am',
					'base'        => 'wpsso-am/wpsso-am.php',
					'update_auth' => '',		// No premium version.
					'text_domain' => 'wpsso-am',
					'domain_path' => '/languages',

					/**
					 * Required plugin and its version.
					 */
					'req' => array(
						'wpsso' => array(
							'name'          => 'WPSSO Core',
							'home'          => 'https://wordpress.org/plugins/wpsso/',
							'plugin_class'  => 'Wpsso',
							'version_const' => 'WPSSO_VERSION',
							'min_version'   => '8.34.0',
						),
					),

					/**
					 * URLs or relative paths to plugin banners and icons.
					 *
					 * Icon image array keys are '1x' and '2x'.
					 */
					'assets' => array(
						'icons' => array(
							'1x' => 'images/icon-128x128.png',
							'2x' => 'images/icon-256x256.png',
						),
					),

					/**
					 * Library files loaded and instantiated by WPSSO.
					 */
					'lib' => array(
						'submenu' => array(
							'am-general' => 'Mobile Apps',
						),
					),
				),
			),

			/**
			 * Additional add-on setting options.
			 */
			'opt' => array(
				'defaults' => array(
					'add_meta_name_apple-itunes-app'            => 1,
					'add_meta_name_twitter:app:country'         => 1,
					'add_meta_name_twitter:app:name:iphone'     => 1,
					'add_meta_name_twitter:app:id:iphone'       => 1,
					'add_meta_name_twitter:app:url:iphone'      => 1,
					'add_meta_name_twitter:app:name:ipad'       => 1,
					'add_meta_name_twitter:app:id:ipad'         => 1,
					'add_meta_name_twitter:app:url:ipad'        => 1,
					'add_meta_name_twitter:app:name:googleplay' => 1,
					'add_meta_name_twitter:app:id:googleplay'   => 1,
					'add_meta_name_twitter:app:url:googleplay'  => 1,
					'am_ws_on_front'                            => 1,	// Add Banner to Home Page.
					'am_ws_on_index'                            => 1,	// Add Banner to Archive Pages.
					'am_ws_add_to_attachment'                   => 1,	// Add Banner to Post Types.
					'am_ws_add_to_page'                         => 1,
					'am_ws_add_to_post'                         => 1,
					'am_ws_itunes_app_id'                       => '',
					'am_ws_itunes_app_aff'                      => '',
					'am_ws_itunes_app_arg'                      => '%%request_url%%',
					'am_ap_ast'                                 => 'US',
					'am_ap_add_to_attachment'                   => 0,
					'am_ap_add_to_page'                         => 1,
					'am_ap_add_to_post'                         => 0,
				),
			),
		);

		/**
		 * From https://developer.apple.com/library/ios/documentation/LanguagesUtilities/Conceptual/iTunesConnect_Guide/Appendices/AppStoreTerritories.html.
		 */
		public static $app_stores = array(
			'AE' => 'United Arab Emirates',
			'AG' => 'Antigua and Barbuda',
			'AI' => 'Anguilla',
			'AL' => 'Albania',
			'AM' => 'Armenia',
			'AO' => 'Angola',
			'AR' => 'Argentina',
			'AT' => 'Austria',
			'AU' => 'Australia',
			'AZ' => 'Azerbaijan',
			'BB' => 'Barbados',
			'BE' => 'Belgium',
			'BF' => 'Burkina Faso',
			'BG' => 'Bulgaria',
			'BH' => 'Bahrain',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BN' => 'Brunei',
			'BO' => 'Bolivia',
			'BR' => 'Brazil',
			'BS' => 'Bahamas',
			'BT' => 'Bhutan',
			'BW' => 'Botswana',
			'BY' => 'Belarus',
			'BZ' => 'Belize',
			'CA' => 'Canada',
			'CG' => 'Republic Of Congo',
			'CH' => 'Switzerland',
			'CL' => 'Chile',
			'CN' => 'China',
			'CO' => 'Colombia',
			'CR' => 'Costa Rica',
			'CV' => 'Cape Verde',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DE' => 'Germany',
			'DK' => 'Denmark',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'DZ' => 'Algeria',
			'EC' => 'Ecuador',
			'EE' => 'Estonia',
			'EG' => 'Egypt',
			'ES' => 'Spain',
			'FI' => 'Finland',
			'FJ' => 'Fiji',
			'FM' => 'Federated States Of Micronesia',
			'FR' => 'France',
			'GB' => 'United Kingdom',
			'GD' => 'Grenada',
			'GH' => 'Ghana',
			'GM' => 'Gambia',
			'GR' => 'Greece',
			'GT' => 'Guatemala',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HK' => 'Hong Kong',
			'HN' => 'Honduras',
			'HR' => 'Croatia',
			'HU' => 'Hungary',
			'ID' => 'Indonesia',
			'IE' => 'Ireland',
			'IL' => 'Israel',
			'IN' => 'India',
			'IS' => 'Iceland',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JO' => 'Jordan',
			'JP' => 'Japan',
			'KE' => 'Kenya',
			'KG' => 'Kyrgyzstan',
			'KH' => 'Cambodia',
			'KN' => 'St. Kitts and Nevis',
			'KR' => 'Republic Of Korea',
			'KW' => 'Kuwait',
			'KY' => 'Cayman Islands',
			'KZ' => 'Kazakstan',
			'LA' => 'Lao People\'s Democratic Republic',
			'LB' => 'Lebanon',
			'LC' => 'St. Lucia',
			'LK' => 'Sri Lanka',
			'LR' => 'Liberia',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'LV' => 'Latvia',
			'MD' => 'Republic Of Moldova',
			'MG' => 'Madagascar',
			'MK' => 'Macedonia',
			'ML' => 'Mali',
			'MN' => 'Mongolia',
			'MO' => 'Macau',
			'MR' => 'Mauritania',
			'MS' => 'Montserrat',
			'MT' => 'Malta',
			'MU' => 'Mauritius',
			'MW' => 'Malawi',
			'MX' => 'Mexico',
			'MY' => 'Malaysia',
			'MZ' => 'Mozambique',
			'NA' => 'Namibia',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NI' => 'Nicaragua',
			'NL' => 'Netherlands',
			'NO' => 'Norway',
			'NP' => 'Nepal',
			'NZ' => 'New Zealand',
			'OM' => 'Oman',
			'PA' => 'Panama',
			'PE' => 'Peru',
			'PG' => 'Papua New Guinea',
			'PH' => 'Philippines',
			'PK' => 'Pakistan',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PW' => 'Palau',
			'PY' => 'Paraguay',
			'QA' => 'Qatar',
			'RO' => 'Romania',
			'RU' => 'Russia',
			'SA' => 'Saudi Arabia',
			'SB' => 'Solomon Islands',
			'SC' => 'Seychelles',
			'SE' => 'Sweden',
			'SG' => 'Singapore',
			'SI' => 'Slovenia',
			'SK' => 'Slovakia',
			'SL' => 'Sierra Leone',
			'SN' => 'Senegal',
			'SR' => 'Suriname',
			'ST' => 'Sao Tome and Principe',
			'SV' => 'El Salvador',
			'SZ' => 'Swaziland',
			'TC' => 'Turks and Caicos',
			'TD' => 'Chad',
			'TH' => 'Thailand',
			'TJ' => 'Tajikistan',
			'TM' => 'Turkmenistan',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TT' => 'Trinidad and Tobago',
			'TW' => 'Taiwan',
			'TZ' => 'Tanzania',
			'UA' => 'Ukraine',
			'UG' => 'Uganda',
			'US' => 'United States',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VC' => 'St. Vincent and The Grenadines',
			'VE' => 'Venezuela',
			'VG' => 'British Virgin Islands',
			'VN' => 'Vietnam',
			'YE' => 'Yemen',
			'ZA' => 'South Africa',
			'ZW' => 'Zimbabwe',
		);

		public static function get_version( $add_slug = false ) {

			$info =& self::$cf[ 'plugin' ][ 'wpssoam' ];

			return $add_slug ? $info[ 'slug' ] . '-' . $info[ 'version' ] : $info[ 'version' ];
		}

		public static function set_constants( $plugin_file ) {

			if ( defined( 'WPSSOAM_VERSION' ) ) {	// Define constants only once.

				return;
			}

			$info =& self::$cf[ 'plugin' ][ 'wpssoam' ];

			/**
			 * Define fixed constants.
			 */
			define( 'WPSSOAM_FILEPATH', $plugin_file );
			define( 'WPSSOAM_PLUGINBASE', $info[ 'base' ] );	// Example: wpsso-am/wpsso-am.php.
			define( 'WPSSOAM_PLUGINDIR', trailingslashit( realpath( dirname( $plugin_file ) ) ) );
			define( 'WPSSOAM_PLUGINSLUG', $info[ 'slug' ] );	// Example: wpsso-am.
			define( 'WPSSOAM_URLPATH', trailingslashit( plugins_url( '', $plugin_file ) ) );
			define( 'WPSSOAM_VERSION', $info[ 'version' ] );
		}

		public static function require_libs( $plugin_file ) {

			require_once WPSSOAM_PLUGINDIR . 'lib/filters.php';
			require_once WPSSOAM_PLUGINDIR . 'lib/register.php';

			add_filter( 'wpssoam_load_lib', array( 'WpssoAmConfig', 'load_lib' ), 10, 3 );
		}

		public static function load_lib( $success = false, $filespec = '', $classname = '' ) {

			if ( false === $success && ! empty( $filespec ) ) {

				$file_path = WPSSOAM_PLUGINDIR . 'lib/' . $filespec . '.php';

				if ( file_exists( $file_path ) ) {

					require_once $file_path;

					if ( empty( $classname ) ) {

						return SucomUtil::sanitize_classname( 'wpssoam' . $filespec, $allow_underscore = false );

					}

					return $classname;
				}
			}

			return $success;
		}
	}
}
