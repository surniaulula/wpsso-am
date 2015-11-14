<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAmGplAdminAmgeneral' ) ) {

	class WpssoAmGplAdminAmgeneral {

		public function __construct( &$plugin ) {
			$this->p =& $plugin;
			$this->p->util->add_plugin_filters( $this, array( 
				'post_tabs' => 1,
				'post_appmeta_rows' => 3,
				'appmeta_general_rows' => 2,
			), 100 );
		}

		public function filter_post_tabs( $tabs ) {
			if ( ( $obj = $this->p->util->get_post_object() ) === false ) 
				return $tabs;
			$post_type = get_post_type_object( $obj->post_type );
			if ( empty( $this->p->options[ 'am_ap_add_to_'.$post_type->name ] ) )
				return $tabs;
			$new_tabs = array();	// new array to insert am after media tab
			foreach ( $tabs as $key => $val ) {
				$new_tabs[$key] = $val;
				if ( $key === 'media' )
					$new_tabs['appmeta'] = _x( 'App Products',
						'metabox tab', 'wpsso-am' );
			}
			return $new_tabs;
		}

		public function filter_post_appmeta_rows( $rows, $form, $head_info ) {

			$post_status = get_post_status( $head_info['post_id'] );

			if ( $post_status === 'auto-draft' )
				$draft_msg = sprintf( __( 'Save a draft version or publish the %s to update and display this value.',
					'wpsso-am' ), $head_info['ptn'] );

			$rows[] = '<td colspan="2">'.
				$this->p->msgs->get( 'pro-feature-msg', 
					array( 'lca' => 'wpssoam' ) ).'</td>';

			$rows[] = '<td colspan="2" class="subsection"><h4>'.
				_x( 'Twitter App Card', 'metabox title', 'wpsso-am' ).'</h4></td>';

			$rows[] = $this->p->util->get_th( _x( 'App Store Territory',
				'option label', 'wpsso-am' ), 'medium', 'am_ap_ast' ).
			'<td class="blank">'.$this->p->options['am_ap_ast'].'</td>';

			$rows[] = $this->p->util->get_th( _x( 'iPhone App ID',
				'option label', 'wpsso-am' ), 'medium', 'post-am_iphone_app_id' ). 
			'<td class="blank"></td>';

			if ( $post_status === 'auto-draft' )
				$rows[] = $this->p->util->get_th( _x( 'iPhone App Name',
					'option label', 'wpsso-am' ), 'medium', 'post-am_iphone_app_name' ). 
				'<td class="blank"><em>'.$draft_msg.'</em></td>';
			else
				$rows[] = $this->p->util->get_th( _x( 'iPhone App Name',
					'option label', 'wpsso-am' ), 'medium', 'post-am_iphone_app_name' ). 
				'<td class="blank"></td>';

			$rows[] = '<tr class="hide_in_basic">'.
			$this->p->util->get_th( _x( 'iPhone App URL Scheme',
				'option label', 'wpsso-am' ), 'medium nowrap', 'post-am_iphone_app_url' ). 
			'<td class="blank"></td>';

			$rows[] = $this->p->util->get_th( _x( 'iPad App ID',
				'option label', 'wpsso-am' ), 'medium', 'post-am_ipad_app_id' ). 
			'<td class="blank"></td>';

			if ( $post_status === 'auto-draft' )
				$rows[] = $this->p->util->get_th( _x( 'iPad App Name',
					'option label', 'wpsso-am' ), 'medium', 'post-am_ipad_app_name' ). 
				'<td class="blank"><em>'.$draft_msg.'</em></td>';
			else
				$rows[] = $this->p->util->get_th( _x( 'iPad App Name',
					'option label', 'wpsso-am' ), 'medium', 'post-am_ipad_app_name' ). 
				'<td class="blank"></td>';

			$rows[] = '<tr class="hide_in_basic">'.
			$this->p->util->get_th( _x( 'iPad App URL Scheme',
				'option label', 'wpsso-am' ), 'medium nowrap', 'post-am_ipad_app_url' ). 
			'<td class="blank"></td>';

			$rows[] = $this->p->util->get_th( _x( 'Google Play App ID',
				'option label', 'wpsso-am' ), 'medium', 'post-am_gplay_app_id' ). 
			'<td class="blank"></td>';

			if ( $post_status === 'auto-draft' )
				$rows[] = $this->p->util->get_th( _x( 'Google Play App Name',
					'option label', 'wpsso-am' ), 'medium', 'post-am_gplay_app_name' ). 
				'<td class="blank"><em>'.$draft_msg.'</em></td>';
			else
				$rows[] = $this->p->util->get_th( _x( 'Google Play App Name',
					'option label', 'wpsso-am' ), 'medium', 'post-am_gplay_app_name' ). 
				'<td class="blank"></td>';

			$rows[] = '<tr class="hide_in_basic">'.
			$this->p->util->get_th( _x( 'Google Play App URL Scheme',
				'option label', 'wpsso-am' ), 'medium nowrap', 'post-am_gplay_app_url' ). 
			'<td class="blank"></td>';

			$rows[] = '<td colspan="2" class="subsection"><h4>'.
				_x( 'Mobile App Banner', 'metabox title', 'wpsso-am' ).'</h4></td>';

			$rows[] = $this->p->util->get_th( _x( 'App ID Number',
				'option label', 'wpsso-am' ), 'medium', 'am_ws_itunes_app_id' ). 
			'<td class="blank">'.$this->p->options['am_ws_itunes_app_id'].'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Affiliate Data',
				'option label', 'wpsso-am' ), 'medium', 'am_ws_itunes_app_aff' ).
			'<td class="blank">'.$this->p->options['am_ws_itunes_app_aff'].'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Argument String',
				'option label', 'wpsso-am' ), 'medium', 'am_ws_itunes_app_arg' ).
			'<td class="blank">'.$this->p->options['am_ws_itunes_app_arg'].'</td>';

			return $rows;
		}

		public function filter_appmeta_general_rows( $rows, $form ) {

			$rows[] = '<td colspan="2">'.
				$this->p->msgs->get( 'info-appmeta-general' ).'</td>';

			$rows[] = '<td colspan="2">'.
				$this->p->msgs->get( 'pro-feature-msg', 
					array( 'lca' => 'wpssoam' ) ).'</td>';

			$checkboxes = '';
			foreach ( $this->p->util->get_post_types( 'frontend' ) as $post_type )
				$checkboxes .= '<p>'.$form->get_no_checkbox( 'am_ap_add_to_'.$post_type->name ).' '.
					$post_type->label.' '.( empty( $post_type->description ) ? '' : '('.$post_type->description.')' ).'</p>';

			$rows[] = $this->p->util->get_th( _x( 'Show Tab on Post Types',
				'option label', 'wpsso-am' ), null, 'am_ap_add_to' ).
			'<td class="blank">'.$checkboxes.'</td>';

			$rows[] = $this->p->util->get_th( _x( 'Default App Store Territory',
				'option label', 'wpsso-am' ), null, 'am_ap_ast' ).
			'<td class="blank">'.$this->p->options['am_ap_ast'].'</td>';

			return $rows;
		}
	}
}

?>
