<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2022 Jean-Sebastien Morisset (https://wpsso.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {

	die( 'These aren\'t the droids you\'re looking for.' );
}

if ( ! class_exists( 'WpssoAmFiltersEdit' ) ) {

	class WpssoAmFiltersEdit {

		private $p;	// Wpsso class object.
		private $a;	// WpssoAm class object.

		/*
		 * Instantiated by WpssoAmFilters->__construct().
		 */
		public function __construct( &$plugin, &$addon ) {

			$this->p =& $plugin;
			$this->a =& $addon;

			$this->p->util->add_plugin_filters( $this, array(
				'post_document_meta_tabs' => 3,
				'post_edit_appmeta_rows'  => 4,
			), $prio = 100 );
		}

		public function filter_post_document_meta_tabs( $tabs, $mod, $metabox_id ) {

			if ( $metabox_id === $this->p->cf[ 'meta' ][ 'id' ] ) {

				if ( ! empty( $this->p->options[ 'am_ap_add_to_' . $mod[ 'post_type' ] ] ) ) {

					SucomUtil::add_after_key( $tabs, $after_tab = 'edit_visibility', 'edit_appmeta',
						_x( 'Edit Mobile Apps', 'metabox tab', 'wpsso-am' ) );
				}
			}

			return $tabs;
		}

		public function filter_post_edit_appmeta_rows( $table_rows, $form, $head, $mod ) {

			/*
			 * Use default $md_key = 'seo_title' and no maximum length.
			 */
			$def_app_name = $this->p->page->get_title( $mod );

			/*
			 * Metabox form rows.
			 */
			$form_rows = array(

				/*
				 * Twitter App Card
				 */
				'subsection_app_card' => array(
					'td_class' => 'subsection top',
					'header'   => 'h4',
					'label'    => _x( 'Twitter App Card', 'metabox title', 'wpsso-am' )
				),
				'am_ap_ast' => array(
					'th_class' => 'medium',
					'label'    => _x( 'App Store Territory', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ap_ast',	// Use tootip from settings page.
					'content'  => $form->get_select( 'am_ap_ast', WpssoAmConfig::$app_stores ),
				),

				/*
				 * iPhone App Information
				 */
				'subsection_iphone_app' => array(
					'td_class' => 'subsection',
					'header'   => 'h5',
					'label'    => _x( 'iPhone App Information', 'metabox title', 'wpsso-am' )
				),
				'am_iphone_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPhone App ID', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_iphone_app_id',
					'content'  => $form->get_input( 'am_iphone_app_id' ),
				),
				'am_iphone_app_name' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPhone App Name', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_iphone_app_name',
					'content'  => $form->get_input_dep( 'am_iphone_app_name', $css_class = 'wide', $css_id = '',
						$max_len = 0, $def_app_name, $is_disabled = false, $dep_id = 'seo_title' ),
				),
				'am_iphone_app_url' => array(
					'tr_class' => $form->get_css_class_hide( 'basic', 'am_iphone_app_url' ),
					'th_class' => 'medium',
					'label'    => _x( 'iPhone App URL Scheme', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_iphone_app_url',
					'content'  => $form->get_input( 'am_iphone_app_url', $css_class = 'wide' ),
				),

				/*
				 * iPad App Information
				 */
				'subsection_ipad_app' => array(
					'td_class' => 'subsection',
					'header'   => 'h5',
					'label'    => _x( 'iPad App Information', 'metabox title', 'wpsso-am' )
				),
				'am_ipad_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPad App ID', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ipad_app_id',
					'content'  => $form->get_input( 'am_ipad_app_id' ),
				),
				'am_ipad_app_name' => array(
					'th_class' => 'medium',
					'label'    => _x( 'iPad App Name', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ipad_app_name',
					'content'  => $form->get_input_dep( 'am_ipad_app_name', $css_class = 'wide', $css_id = '',
						$max_len = 0, $def_app_name, $is_disabled = false, $dep_id = 'seo_title' ),
				),
				'am_ipad_app_url' => array(
					'tr_class' => $form->get_css_class_hide( 'basic', 'am_ipad_app_url' ),
					'th_class' => 'medium',
					'label'    => _x( 'iPad App URL Scheme', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ipad_app_url',
					'content'  => $form->get_input( 'am_ipad_app_url', $css_class = 'wide' ),
				),

				/*
				 * Google Play App Information
				 */
				'subsection_gplay_app' => array(
					'td_class' => 'subsection',
					'header'   => 'h5',
					'label'    => _x( 'Google Play App Information', 'metabox title', 'wpsso-am' )
				),
				'am_gplay_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Google Play App ID', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_gplay_app_id',
					'content'  => $form->get_input( 'am_gplay_app_id', $css_class = 'wide' ),
				),
				'am_gplay_app_name' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Google Play App Name', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_gplay_app_name',
					'content'  => $form->get_input_dep( 'am_gplay_app_name', $css_class = 'wide', $css_id = '',
						$max_len = 0, $def_app_name, $is_disabled = false, $dep_id = 'seo_title' ),
				),
				'am_gplay_app_url' => array(
					'tr_class' => $form->get_css_class_hide( 'basic', 'am_gplay_app_url' ),
					'th_class' => 'medium',
					'label'    => _x( 'Google Play App URL Scheme', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_gplay_app_url',
					'content'  => $form->get_input( 'am_gplay_app_url', $css_class = 'wide' ),
				),

				/*
				 * Mobile App Banner
				 */
				'subsection_app_banner' => array(
					'td_class' => 'subsection',
					'header'   => 'h4',
					'label'    => _x( 'Mobile App Banner', 'metabox title', 'wpsso-am' )
				),
				'am_ws_itunes_app_id' => array(
					'th_class' => 'medium',
					'label'    => _x( 'App ID Number', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ws_itunes_app_id',	// Use tootip from settings page.
					'content'  => $form->get_input( 'am_ws_itunes_app_id', $css_class = '', $css_id = '',
						$len = 0, $this->p->options[ 'am_ws_itunes_app_id' ] ),
				),
				'am_ws_itunes_app_aff' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Affiliate Data', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ws_itunes_app_aff',	// Use tootip from settings page.
					'content'  => $form->get_input( 'am_ws_itunes_app_aff', $css_class = '', $css_id = '', $max_len = 0,
						$this->p->options[ 'am_ws_itunes_app_aff' ] ),
				),
				'am_ws_itunes_app_arg' => array(
					'th_class' => 'medium',
					'label'    => _x( 'Argument String', 'option label', 'wpsso-am' ),
					'tooltip'  => 'am_ws_itunes_app_arg',	// Use tootip from settings page.
					'content'  => $form->get_input( 'am_ws_itunes_app_arg', $css_class = 'wide', $css_id = '', $max_len = 0,
						$this->p->options[ 'am_ws_itunes_app_arg' ] ),
				),
			);

			return $form->get_md_form_rows( $table_rows, $form_rows, $head, $mod );
		}
	}
}
