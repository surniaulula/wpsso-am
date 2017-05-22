<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'WpssoAmConfig' ) ) {

	class WpssoAmConfig {

		public static $cf = array(
			'plugin' => array(
				'wpssoam' => array(
					'version' => '1.7.19',		// plugin version
					'opt_version' => '7',		// increment when changing default options
					'short' => 'WPSSO AM',		// short plugin name
					'name' => 'WPSSO Mobile App Meta',
					'desc' => 'WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple\'s mobile Safari and Twitter\'s App Card.',
					'slug' => 'wpsso-am',
					'base' => 'wpsso-am/wpsso-am.php',
					'update_auth' => 'tid',
					'text_domain' => 'wpsso-am',
					'domain_path' => '/languages',
					'req' => array(
						'short' => 'WPSSO',
						'name' => 'WPSSO',
						'min_version' => '3.42.0',
					),
					'img' => array(
						'icons' => array(
							'low' => 'images/icon-128x128.png',
							'high' => 'images/icon-256x256.png',
						),
					),
					'lib' => array(
						// submenu items must have unique keys
						'submenu' => array (
							'am-general' => 'Mobile App Meta',	// general settings
						),
						'gpl' => array(
							'admin' => array(
								'am-general' => 'AM General Settings',
								'post' => 'Post Settings',
							),
						),
						'pro' => array(
							'admin' => array(
								'am-general' => 'AM General Settings',
								'post' => 'Post Settings',
							),
							'head' => array(
								'twittercard' => '(code) Twitter App Card Meta Tags',
							),
						),
					),
				),
			),
		);

		public static function get_version() { 
			return self::$cf['plugin']['wpssoam']['version'];
		}

		// from https://developer.apple.com/library/ios/documentation/LanguagesUtilities/Conceptual/iTunesConnect_Guide/Appendices/AppStoreTerritories.html
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

		public static function set_constants( $plugin_filepath ) { 
			define( 'WPSSOAM_FILEPATH', $plugin_filepath );						
			define( 'WPSSOAM_PLUGINDIR', trailingslashit( realpath( dirname( $plugin_filepath ) ) ) );
			define( 'WPSSOAM_PLUGINSLUG', self::$cf['plugin']['wpssoam']['slug'] );		// wpsso-am
			define( 'WPSSOAM_PLUGINBASE', self::$cf['plugin']['wpssoam']['base'] );		// wpsso-am/wpsso-am.php
			define( 'WPSSOAM_URLPATH', trailingslashit( plugins_url( '', $plugin_filepath ) ) );
		}

		public static function require_libs( $plugin_filepath ) {

			require_once WPSSOAM_PLUGINDIR.'lib/register.php';
			require_once WPSSOAM_PLUGINDIR.'lib/filters.php';

			add_filter( 'wpssoam_load_lib', array( 'WpssoAmConfig', 'load_lib' ), 10, 3 );
		}

		public static function load_lib( $ret = false, $filespec = '', $classname = '' ) {
			if ( $ret === false && ! empty( $filespec ) ) {
				$filepath = WPSSOAM_PLUGINDIR.'lib/'.$filespec.'.php';
				if ( file_exists( $filepath ) ) {
					require_once $filepath;
					if ( empty( $classname ) )
						return SucomUtil::sanitize_classname( 'wpssoam'.$filespec, false );	// $underscore = false
					else return $classname;
				}
			}
			return $ret;
		}
	}
}

?>
