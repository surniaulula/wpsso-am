<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2025 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmSubmenuMobileApps' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoAmSubmenuMobileApps extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name, $lib, $ext ) {

			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {

				$this->p->debug->mark();
			}

			$this->menu_id   = $id;
			$this->menu_name = $name;
			$this->menu_lib  = $lib;
			$this->menu_ext  = $ext;

			$this->menu_metaboxes = array(
				'banner'  => _x( 'Mobile App Banner', 'metabox title', 'wpsso-am' ),
				'appmeta' => _x( 'Mobile App Products', 'metabox title', 'wpsso-am' ),
			);
		}

		public function show_metabox_banner( $obj, $mb ) {

			if ( $this->p->debug->enabled ) {

				$this->p->debug->mark();
			}

			$this->show_metabox_table( $obj, $mb );

			$tabs = array(
				'itunes' => _x( 'Apple Store App', 'metabox tab', 'wpsso-am' ),
			);

			$this->show_metabox_tabbed( $obj, $mb, $tabs );
		}

		protected function get_table_rows( $page_id, $metabox_id, $tab_key = '', $args = array() ) {

			$table_rows = array();
			$match_rows = trim( $page_id . '-' . $metabox_id . '-' . $tab_key, '-' );

			switch ( $match_rows ) {

				case 'mobile-apps-banner':

					$table_rows[ 'info-banner-settings' ] = '' .
						'<td colspan="2">' . $this->p->msgs->get( 'info-banner-settings' ) . '</td>';

					$table_rows[ 'am_ws_on_front' ] = '' .
						$this->form->get_th_html( _x( 'Add Banner to Home Page', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ws_on_front' ) .
						'<td>' . $this->form->get_checkbox( 'am_ws_on_front' ) . '</td>';

					$table_rows[ 'am_ws_on_archive' ] = '' .
						$this->form->get_th_html( _x( 'Add Banner to Archive Pages', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ws_on_archive' ) .
						'<td>' . $this->form->get_checkbox( 'am_ws_on_archive' ) . '</td>';

					$table_rows[ 'am_ws_add_to' ] = '' .
						$this->form->get_th_html( _x( 'Add Banner to Post Types', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ws_add_to' ) .
						'<td>' . $this->form->get_checklist_post_types( $name_prefix = 'am_ws_add_to' ) . '</td>';

					break;

				case 'mobile-apps-banner-itunes':

					$table_rows[ 'info-banner-itunes' ] = '' .
						'<td colspan="2">' . $this->p->msgs->get( 'info-banner-itunes' ) . '</td>';

					$table_rows[ 'am_ws_itunes_app_id' ] = '' .
						$this->form->get_th_html( _x( 'Default App ID Number', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ws_itunes_app_id' ) .
						'<td>' . $this->form->get_input( 'am_ws_itunes_app_id' ) . '</td>';

					$table_rows[ 'am_ws_itunes_app_aff' ] = '' .
						$this->form->get_th_html( _x( 'Default Affiliate Data', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ws_itunes_app_aff' ) .
						'<td>' . $this->form->get_input( 'am_ws_itunes_app_aff' ) . '</td>';

					$table_rows[ 'am_ws_itunes_app_arg' ] = '' .
						$this->form->get_th_html( _x( 'Default Argument String', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ws_itunes_app_arg' ) .
						'<td>' . $this->form->get_input( 'am_ws_itunes_app_arg', 'wide' ) . '</td>';

					break;

				case 'mobile-apps-appmeta':

					$table_rows[ 'info-appmeta-settings' ] = '' .
						'<td colspan="2">' . $this->p->msgs->get( 'info-appmeta-settings' ) . '</td>';

					$table_rows[ 'am_ap_ast' ] = '' .
						$this->form->get_th_html( _x( 'Default App Store Territory', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ap_ast' ).
						'<td>' . $this->form->get_select( 'am_ap_ast', WpssoAmConfig::$app_stores ) . '</td>';

					$table_rows[ 'am_ap_add_to' ] = '' .
						$this->form->get_th_html( _x( 'Show Tab on Post Types', 'option label', 'wpsso-am' ),
							$css_class = '', $css_id = 'am_ap_add_to' ).
						'<td>' . $this->form->get_checklist_post_types( $name_prefix = 'am_ap_add_to' ) . '</td>';

					break;
			}

			return $table_rows;
		}
	}
}
