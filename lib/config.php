<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAmConfig' ) ) {

	class WpssoAmConfig {

		public static $cf = array(
			'plugin' => array(
				'wpssoam' => array(
					'version' => '1.5.0',	// plugin version
					'short' => 'WPSSO AM',
					'name' => 'WPSSO Mobile App Meta (WPSSO AM)',
					'desc' => 'WPSSO extension to provide Apple Store / iTunes and Google Play App meta tags for Apple\'s mobile Safari and Twitter\'s App Card.',
					'slug' => 'wpsso-am',
					'base' => 'wpsso-am/wpsso-am.php',
					'update_auth' => 'tid',
					'text_domain' => 'wpsso-am',
					'domain_path' => '/languages',
					'img' => array(
						'icon_small' => 'images/icon-128x128.png',
						'icon_medium' => 'images/icon-256x256.png',
					),
					'url' => array(
						// wordpress
						'download' => 'https://wordpress.org/plugins/wpsso-am/',
						'review' => 'https://wordpress.org/support/view/plugin-reviews/wpsso-am?filter=5&rate=5#postform',
						'readme' => 'https://plugins.svn.wordpress.org/wpsso-am/trunk/readme.txt',
						'wp_support' => 'https://wordpress.org/support/plugin/wpsso-am',
						// surniaulula
						'update' => 'http://wpsso.com/extend/plugins/wpsso-am/update/',
						'purchase' => 'http://wpsso.com/extend/plugins/wpsso-am/',
						'changelog' => 'http://wpsso.com/extend/plugins/wpsso-am/changelog/',
						'codex' => 'http://wpsso.com/codex/plugins/wpsso-am/',
						'faq' => 'http://wpsso.com/codex/plugins/wpsso-am/faq/',
						'notes' => '',
						'feed' => 'http://wpsso.com/category/application/wordpress/wp-plugins/wpsso-am/feed/',
						'pro_support' => 'http://wpsso-am.support.wpsso.com/',
					),
					'lib' => array(
						'submenu' => array (
							'wpssoam-separator-0' => 'AM Extension',
							'am-general' => 'Mobile App Meta',
						),
						'gpl' => array(
							'admin' => array(
								'am-general' => 'Mobile App Meta',
							),
						),
						'pro' => array(
							'admin' => array(
								'am-general' => 'Mobile App Meta',
							),
							'head' => array(
								'twittercard' => 'Twitter App Card',
							),
						),
					),
				),
			),
		);

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

			require_once( WPSSOAM_PLUGINDIR.'lib/register.php' );
			require_once( WPSSOAM_PLUGINDIR.'lib/filters.php' );

			add_filter( 'wpssoam_load_lib', array( 'WpssoAmConfig', 'load_lib' ), 10, 3 );
		}

		public static function load_lib( $ret = false, $filespec = '', $classname = '' ) {
			if ( $ret === false && ! empty( $filespec ) ) {
				$filepath = WPSSOAM_PLUGINDIR.'lib/'.$filespec.'.php';
				if ( file_exists( $filepath ) ) {
					require_once( $filepath );
					if ( empty( $classname ) )
						return 'wpssoam'.str_replace( array( '/', '-' ), '', $filespec );
					else return $classname;
				}
			}
			return $ret;
		}
	}
}

?>
