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
				'meta_tabs' => 1,
				'meta_appmeta_rows' => 3,
				'appmeta_general_rows' => 2,
			), 100 );
		}

		public function filter_meta_tabs( $tabs ) {
			if ( ( $obj = $this->p->util->get_post_object() ) === false ) 
				return $tabs;
			$post_type = get_post_type_object( $obj->post_type );
			if ( empty( $this->p->options[ 'am_ap_add_to_'.$post_type->name ] ) )
				return $tabs;
			$new_tabs = array();
			foreach ( $tabs as $key => $val ) {
				$new_tabs[$key] = $val;
				if ( $key === 'media' )
					$new_tabs['appmeta'] = 'App Product';
			}
			return $new_tabs;
		}

		public function filter_meta_appmeta_rows( $rows, $form, $post_info ) {
			$post_status = get_post_status( $post_info['id'] );
			$def_name = $this->p->webpage->get_title( 0, '', true );

			$rows[] = '<td colspan="2" align="center">'.
				$this->p->msgs->get( 'pro-feature-msg', array( 'lca' => 'wpssoam' ) ).'</td>';

			$rows[] = $this->p->util->th( 'App Store Territory', 'medium', 'am_ap_ast' ).
			'<td class="blank">'.$form->get_options( 'am_ap_ast', '(value from settings)' ).'</td>';

			$rows[] = '<td colspan="2" class="subsection"><h4>Apple Store</h4></td>';

			$rows[] = $this->p->util->th( 'iPhone App ID', 'medium', 'postmeta-am_iphone_app_id' ). 
			'<td class="blank">'.$form->get_options( 'am_iphone_app_id' ).'</td>';

			if ( $post_status == 'auto-draft' )
				$rows[] = $this->p->util->th( 'iPhone App Name', 'medium', 'postmeta-am_iphone_app_name' ). 
				'<td class="blank"><em>Save a draft version or publish the '.$post_info['ptn'].' to update and display this value.</em></td>';
			else
				$rows[] = $this->p->util->th( 'iPhone App Name', 'medium', 'postmeta-am_iphone_app_name' ). 
				'<td class="blank">'.$form->get_options( 'am_iphone_app_name' ).'</td>';

			$rows[] = '<tr class="hide_in_basic">'.
			$this->p->util->th( 'iPhone App Custom URL Scheme', 'medium nowrap', 'postmeta-am_iphone_app_url' ). 
			'<td class="blank">'.$form->get_options( 'am_iphone_app_url' ).'</td>';

			$rows[] = $this->p->util->th( 'iPad App ID', 'medium', 'postmeta-am_ipad_app_id' ). 
			'<td class="blank">'.$form->get_options( 'am_ipad_app_id' ).'</td>';

			if ( $post_status == 'auto-draft' )
				$rows[] = $this->p->util->th( 'iPad App Name', 'medium', 'postmeta-am_ipad_app_name' ). 
				'<td class="blank"><em>Save a draft version or publish the '.$post_info['ptn'].' to update and display this value.</em></td>';
			else
				$rows[] = $this->p->util->th( 'iPad App Name', 'medium', 'postmeta-am_ipad_app_name' ). 
				'<td class="blank">'.$form->get_options( 'am_ipad_app_name' ).'</td>';

			$rows[] = '<tr class="hide_in_basic">'.
			$this->p->util->th( 'iPad App Custom URL Scheme', 'medium nowrap', 'postmeta-am_ipad_app_url' ). 
			'<td class="blank">'.$form->get_options( 'am_ipad_app_url' ).'</td>';

			$rows[] = '<td colspan="2" class="subsection"><h4>Google Play</h4></td>';

			$rows[] = $this->p->util->th( 'App ID', 'medium', 'postmeta-am_gplay_app_id' ). 
			'<td class="blank">'.$form->get_options( 'am_gplay_app_id' ).'</td>';

			if ( $post_status == 'auto-draft' )
				$rows[] = $this->p->util->th( 'App Name', 'medium', 'postmeta-am_gplay_app_name' ). 
				'<td class="blank"><em>Save a draft version or publish the '.$post_info['ptn'].' to update and display this value.</em></td>';
			else
				$rows[] = $this->p->util->th( 'App Name', 'medium', 'postmeta-am_gplay_app_name' ). 
				'<td class="blank">'.$form->get_options( 'am_gplay_app_name' ).'</td>';

			$rows[] = '<tr class="hide_in_basic">'.
			$this->p->util->th( 'App Custom URL Scheme', 'medium nowrap', 'postmeta-am_gplay_app_url' ). 
			'<td class="blank">'.$form->get_options( 'am_gplay_app_url' ).'</td>';

			return $rows;
		}

		public function filter_appmeta_general_rows( $rows, $form ) {

			$rows[] = '<td colspan="2" style="padding-bottom:10px;">'.
				$this->p->msgs->get( 'info-appmeta-general' ).'</td>';

			$rows[] = '<td colspan="2" align="center">'.
				$this->p->msgs->get( 'pro-feature-msg', array( 'lca' => 'wpssoam' ) ).'</td>';

			$rows[] = $this->p->util->th( 'App Store Territory', null, 'am_ap_ast' ).
			'<td class="blank">'.$this->p->options['am_ap_ast'].'</td>';

			$checkboxes = '';
			foreach ( $this->p->util->get_post_types( 'frontend' ) as $post_type )
				$checkboxes .= '<p>'.$form->get_no_checkbox( 'am_ap_add_to_'.$post_type->name ).' '.
					$post_type->label.' '.( empty( $post_type->description ) ? '' : '('.$post_type->description.')' ).'</p>';

			$rows[] = $this->p->util->th( 'Show Tab on Post Types', null, 'am_ap_add_to' ).
			'<td class="blank">'.$checkboxes.'</td>';

			return $rows;
		}
	}
}

?>
