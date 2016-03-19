<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAmGplAdminAmpost' ) ) {

	class WpssoAmGplAdminAmpost {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 
				'post_social_settings_tabs' => 2,	// $tabs, $mod
				'post_appmeta_rows' => 4,		// $table_rows, $form, $head, $mod
			), 100 );
		}

		public function filter_post_social_settings_tabs( $tabs, $mod ) {
			if ( empty( $this->p->options['am_ap_add_to_'.$mod['post_type']] ) )
				return $tabs;
			$new_tabs = array();
			foreach ( $tabs as $key => $val ) {
				$new_tabs[$key] = $val;
				if ( $key === 'media' )
					$new_tabs['appmeta'] = _x( 'Mobile Apps',
						'metabox tab', 'wpsso-am' );
			}
			return $new_tabs;
		}

		public function filter_post_appmeta_rows( $table_rows, $form, $head, $mod ) {
			if ( $this->p->debug->enabled )
				$this->p->debug->mark();

			if ( empty( $mod['post_status'] ) || $mod['post_status'] === 'auto-draft' ) {
				$table_rows[] = '<td><blockquote class="status-info"><p class="centered">'.
					sprintf( __( 'Save a draft version or publish the %s to display these options.',
						'wpsso-am' ), ucfirst( $mod['post_type'] ) ).'</p></td>';
				return $table_rows;	// abort
			}

			$def_app_name = $this->p->webpage->get_title( 0, '', $mod['use_post'] );

			$table_rows[] = '<td colspan="2">'.
				$this->p->msgs->get( 'pro-feature-msg', 
					array( 'lca' => 'wpssoam' ) ).'</td>';

			$form_rows = array(
				/*
				 * Twitter App Card
				 */
				'subsection_app_card' => array(
					'td_class' => 'subsection top',
					'header' => 'h4',
					'label' => _x( 'Twitter App Card', 'metabox title', 'wpsso-am' )
				),
				/*
				 * App Store Territory
				 */
				'am_ap_ast' => array(
					'label' => _x( 'App Store Territory', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'am_ap_ast', 'td_class' => 'blank',
					'content' => $form->get_no_select( 'am_ap_ast', array( -1 ), '', '', false ),
				),
				/*
				 * iPhone App
				 */
				'subsection_iphone_app' => array(
					'header' => 'h5',
					'label' => _x( 'iPhone App Details', 'metabox title', 'wpsso-am' )
				),
				'am_iphone_app_id' => array(
					'label' => _x( 'iPhone App ID', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_iphone_app_id', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'am_iphone_app_name' => array(
					'label' => _x( 'iPhone App Name', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_iphone_app_name', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( $def_app_name, 'wide' ),
				),
				'am_iphone_app_url' => array(
					'tr_class' => 'hide_in_basic',
					'label' => _x( 'iPhone App URL Scheme', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_iphone_app_url', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '', 'wide' ),
				),
				/*
				 * iPad App
				 */
				'subsection_ipad_app' => array(
					'header' => 'h5',
					'label' => _x( 'iPad App Details', 'metabox title', 'wpsso-am' )
				),
				'am_ipad_app_id' => array(
					'label' => _x( 'iPad App ID', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_ipad_app_id', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'am_ipad_app_name' => array(
					'label' => _x( 'iPad App Name', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_ipad_app_name', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( $def_app_name, 'wide' ),
				),
				'am_ipad_app_url' => array(
					'tr_class' => 'hide_in_basic',
					'label' => _x( 'iPad App URL Scheme', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_ipad_app_url', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '', 'wide' ),
				),
				/*
				 * Google Play App
				 */
				'subsection_gplay_app' => array(
					'header' => 'h5',
					'label' => _x( 'Google Play App Details', 'metabox title', 'wpsso-am' )
				),
				'am_gplay_app_id' => array(
					'label' => _x( 'Google Play App ID', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_gplay_app_id', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '' ),
				),
				'am_gplay_app_name' => array(
					'label' => _x( 'Google Play App Name', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_gplay_app_name', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( $def_app_name, 'wide' ),
				),
				'am_gplay_app_url' => array(
					'tr_class' => 'hide_in_basic',
					'label' => _x( 'Google Play App URL Scheme', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'post-am_gplay_app_url', 'td_class' => 'blank',
					'content' => $form->get_no_input_value( '', 'wide' ),
				),
				/*
				 * Mobile App Banner
				 */
				'subsection_app_banner' => array(
					'td_class' => 'subsection',
					'header' => 'h4',
					'label' => _x( 'Mobile App Banner', 'metabox title', 'wpsso-am' )
				),
				'am_ws_itunes_app_id' => array(
					'label' => _x( 'App ID Number', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'am_ws_itunes_app_id', 'td_class' => 'blank',
					'content' => $form->get_no_input_options( 'am_ws_itunes_app_id', $this->p->options ),
				),
				'am_ws_itunes_app_aff' => array(
					'label' => _x( 'Affiliate Data', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'am_ws_itunes_app_aff', 'td_class' => 'blank',
					'content' => $form->get_no_input_options( 'am_ws_itunes_app_aff', $this->p->options ),
				),
				'am_ws_itunes_app_arg' => array(
					'label' => _x( 'Argument String', 'option label', 'wpsso-am' ),
					'th_class' => 'medium', 'tooltip' => 'am_ws_itunes_app_arg', 'td_class' => 'blank',
					'content' => $form->get_no_input_options( 'am_ws_itunes_app_arg', $this->p->options, 'wide' ),
				),
			);

			return $form->get_md_form_rows( $table_rows, $form_rows, $head, $mod );
		}
	}
}

?>
