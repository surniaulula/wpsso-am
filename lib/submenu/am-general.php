<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2016 Jean-Sebastien Morisset (http://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAmSubmenuAmgeneral' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoAmSubmenuAmgeneral extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name, $lib, $ext ) {
			$this->p =& $plugin;
			$this->menu_id = $id;
			$this->menu_name = $name;
			$this->menu_lib = $lib;
			$this->menu_ext = $ext;

			if ( $this->p->debug->enabled )
				$this->p->debug->mark();
		}

		protected function add_meta_boxes() {
			// add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
			add_meta_box( $this->pagehook.'_appmeta', 
				_x( 'Mobile App Products', 'metabox title', 'wpsso-am' ),
				array( &$this, 'show_metabox_appmeta' ), $this->pagehook, 'normal' );
			add_meta_box( $this->pagehook.'_banner',
				_x( 'Mobile App Banner', 'metabox title', 'wpsso-am' ), 
				array( &$this, 'show_metabox_banner' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_appmeta() {
			$metabox = 'appmeta';
			echo '<table class="sucom-setting">';
			foreach ( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', 
				$this->get_table_rows( $metabox, 'general' ), $this->form ) as $row )
					echo '<tr>'.$row.'</tr>';
			echo '</table>';
		}

		public function show_metabox_banner() {
			$metabox = 'banner';
			echo '<table class="sucom-setting">';
			foreach ( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', 
				$this->get_table_rows( $metabox, 'general' ), $this->form ) as $row )
					echo '<tr>'.$row.'</tr>';
			echo '</table>';

			$tabs = apply_filters( $this->p->cf['lca'].'_general_banner_tabs', array(
				'itunes' => _x( 'Apple Store App', 'metabox tab', 'wpsso-am' ),
			) );

			$table_rows = array();
			foreach ( $tabs as $key => $title )
				$table_rows[$key] = array_merge( $this->get_table_rows( $metabox, $key ), 
					apply_filters( $this->p->cf['lca'].'_'.$metabox.'_'.$key.'_rows', array(), $this->form ) );
			$this->p->util->do_metabox_tabs( $metabox, $tabs, $table_rows );
		}

		protected function get_table_rows( $metabox, $key ) {
			$table_rows = array();
			switch ( $metabox.'-'.$key ) {
				case 'banner-general':

					$table_rows[] = '<td colspan="2">'.
						$this->p->msgs->get( 'info-banner-general' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Index Webpages',
						'option label', 'wpsso-am' ), null, 'am_ws_on_index' ).
					'<td>'.$this->form->get_checkbox( 'am_ws_on_index' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Static Homepage',
						'option label', 'wpsso-am' ), null, 'am_ws_on_front' ).
					'<td>'.$this->form->get_checkbox( 'am_ws_on_front' ).'</td>';

					$checkboxes = '';
					foreach ( $this->p->util->get_post_types() as $post_type )
						$checkboxes .= '<p>'.$this->form->get_checkbox( 'am_ws_add_to_'.$post_type->name ).' '.
							$post_type->label.' '.( empty( $post_type->description ) ?
								'' : '('.$post_type->description.')' ).'</p>';

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Post Types',
						'option label', 'wpsso-am' ), null, 'am_ws_add_to' ).'<td>'.$checkboxes.'</td>';

					break;

				case 'banner-itunes':

					$table_rows[] = '<td colspan="2">'.
						$this->p->msgs->get( 'info-banner-itunes' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default App ID Number',
						'option label', 'wpsso-am' ), null, 'am_ws_itunes_app_id' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_id' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default Affiliate Data',
						'option label', 'wpsso-am' ), null, 'am_ws_itunes_app_aff' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_aff' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default Argument String',
						'option label', 'wpsso-am' ), null, 'am_ws_itunes_app_arg' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_arg', 'wide' ).'</td>';

					break;
			}
			return $table_rows;
		}
	}
}

?>
