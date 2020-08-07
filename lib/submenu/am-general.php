<?php
/**
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2020 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmSubmenuAmGeneral' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoAmSubmenuAmGeneral extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name, $lib, $ext ) {

			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$this->menu_id   = $id;
			$this->menu_name = $name;
			$this->menu_lib  = $lib;
			$this->menu_ext  = $ext;
		}

		/**
		 * Called by the extended WpssoAdmin class.
		 */
		protected function add_meta_boxes() {

			$metabox_id      = 'banner';
			$metabox_title   = _x( 'Mobile App Banner', 'metabox title', 'wpsso-am' );
			$metabox_screen  = $this->pagehook;
			$metabox_context = 'normal';
			$metabox_prio    = 'default';
			$callback_args   = array(	// Second argument passed to the callback function / method.
			);

			add_meta_box( $this->pagehook . '_' . $metabox_id, $metabox_title,
				array( $this, 'show_metabox_banner' ), $metabox_screen,
					$metabox_context, $metabox_prio, $callback_args );

			$metabox_id      = 'appmeta';
			$metabox_title   = _x( 'Mobile App Products', 'metabox title', 'wpsso-am' );
			$metabox_screen  = $this->pagehook;
			$metabox_context = 'normal';
			$metabox_prio    = 'default';
			$callback_args   = array(	// Second argument passed to the callback function / method.
			);

			add_meta_box( $this->pagehook . '_' . $metabox_id, $metabox_title,
				array( $this, 'show_metabox_appmeta' ), $metabox_screen,
					$metabox_context, $metabox_prio, $callback_args );
		}

		/**
		 * Mobile App Banner metabox.
		 */
		public function show_metabox_banner() {

			$metabox_id = 'am-banner';

			$tab_key = 'general';

			$filter_name = SucomUtil::sanitize_hookname( $this->p->lca . '_' . $metabox_id . '_' . $tab_key . '_rows' );

			$table_rows = apply_filters( $filter_name, $this->get_table_rows( $metabox_id, $tab_key ), $this->form );

			$this->p->util->metabox->do_table( $table_rows, 'metabox-' . $metabox_id . '-' . $tab_key );

			/**
			 * Apple Store App tab.
			 */
			$filter_name = SucomUtil::sanitize_hookname( $this->p->lca . '_' . $metabox_id . '_tabs' );

			$tabs = apply_filters( $filter_name, array(
				'itunes' => _x( 'Apple Store App', 'metabox tab', 'wpsso-am' ),
			) );

			$table_rows = array();

			foreach ( $tabs as $tab_key => $title ) {

				$filter_name = SucomUtil::sanitize_hookname( $this->p->lca . '_' . $metabox_id . '_' . $tab_key . '_rows' );

				$table_rows[ $tab_key ] = array_merge(
					$this->get_table_rows( $metabox_id, $tab_key ), 
					(array) apply_filters( $filter_name, array(), $this->form )
				);
			}

			$this->p->util->metabox->do_tabbed( $metabox_id, $tabs, $table_rows );
		}

		/**
		 * Mobile App Products metabox.
		 */
		public function show_metabox_appmeta() {

			$metabox_id = 'am-appmeta';

			$tab_key = 'general';

			$filter_name = SucomUtil::sanitize_hookname( $this->p->lca . '_' . $metabox_id . '_' . $tab_key . '_rows' );

			$table_rows = apply_filters( $filter_name, $this->get_table_rows( $metabox_id, $tab_key ), $this->form );

			$this->p->util->metabox->do_table( $table_rows, 'metabox-' . $metabox_id . '-' . $tab_key );
		}

		protected function get_table_rows( $metabox_id, $tab_key ) {

			$table_rows = array();

			switch ( $metabox_id . '-' . $tab_key ) {

				case 'am-banner-general':

					$table_rows[] = '<td colspan="2">' . $this->p->msgs->get( 'info-banner-general' ) . '</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Archive Webpages',
						'option label', 'wpsso-am' ), null, 'am_ws_on_index' ) . 
					'<td>' . $this->form->get_checkbox( 'am_ws_on_index' ) . '</td>';

					$table_rows[] = '' .
					$this->form->get_th_html( _x( 'Add Banner to Page Homepage', 'option label', 'wpsso-am' ),
						$css_class = '', $css_id = 'am_ws_on_front' ) . 
					'<td>' . $this->form->get_checkbox( 'am_ws_on_front' ) . '</td>';

					$add_to_checkboxes = '';

					foreach ( SucomUtilWP::get_post_types( 'objects' ) as $obj ) {

						$add_to_checkboxes .= '<p>' . $this->form->get_checkbox( 'am_ws_add_to_' . $obj->name ) . ' ' .
							$obj->label . ( empty( $obj->description ) ? '' : ' (' . $obj->description . ')' ) . '</p>';
					}

					$table_rows[] = '' .
					$this->form->get_th_html( _x( 'Add Banner to Post Types', 'option label', 'wpsso-am' ),
						$css_class = '', $css_id = 'am_ws_add_to' ) .
					'<td>' . $add_to_checkboxes . '</td>';

					break;

				case 'am-banner-itunes':

					$table_rows[] = '<td colspan="2">' . $this->p->msgs->get( 'info-banner-itunes' ) . '</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default App ID Number',
						'option label', 'wpsso-am' ), '', 'am_ws_itunes_app_id' ) . 
					'<td>' . $this->form->get_input( 'am_ws_itunes_app_id' ) . '</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default Affiliate Data',
						'option label', 'wpsso-am' ), '', 'am_ws_itunes_app_aff' ) . 
					'<td>' . $this->form->get_input( 'am_ws_itunes_app_aff' ) . '</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default Argument String',
						'option label', 'wpsso-am' ), '', 'am_ws_itunes_app_arg' ) . 
					'<td>' . $this->form->get_input( 'am_ws_itunes_app_arg', 'wide' ) . '</td>';

					break;

				case 'am-appmeta-general':

					$table_rows[] = '<td colspan="2">' . $this->p->msgs->get( 'info-appmeta-general' ) . '</td>';

					$add_to_checkboxes = '';

					foreach ( SucomUtilWP::get_post_types( 'objects' ) as $obj ) {

						$add_to_checkboxes .= '<p>' . $this->form->get_checkbox( 'am_ap_add_to_' . $obj->name ). ' ' .
							$obj->label . ( empty( $obj->description ) ? '' : ' (' . $obj->description . ')' ) . '</p>';
					}

					$table_rows[] = $this->form->get_th_html( _x( 'Show Tab on Post Types',
						'option label', 'wpsso-am' ), '', 'am_ap_add_to' ).
					'<td>' . $add_to_checkboxes . '</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default App Store Territory',
						'option label', 'wpsso-am' ), '', 'am_ap_ast' ).
					'<td>' . $this->form->get_select( 'am_ap_ast', WpssoAmConfig::$app_stores ) . '</td>';

					break;
			}

			return $table_rows;
		}
	}
}
