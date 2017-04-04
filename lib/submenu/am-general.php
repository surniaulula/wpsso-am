<?php
/*
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2017 Jean-Sebastien Morisset (https://surniaulula.com/)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'These aren\'t the droids you\'re looking for...' );
}

if ( ! class_exists( 'WpssoAmSubmenuAmGeneral' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoAmSubmenuAmGeneral extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name, $lib, $ext ) {
			$this->p =& $plugin;

			if ( $this->p->debug->enabled ) {
				$this->p->debug->mark();
			}

			$this->menu_id = $id;
			$this->menu_name = $name;
			$this->menu_lib = $lib;
			$this->menu_ext = $ext;	// lowercase acronyn for plugin or extension
		}

		protected function add_meta_boxes() {
			add_meta_box( $this->pagehook.'_banner',
				_x( 'Mobile App Banner', 'metabox title', 'wpsso-am' ), 
					array( &$this, 'show_metabox_banner' ), $this->pagehook, 'normal' );

			add_meta_box( $this->pagehook.'_appmeta', 
				_x( 'Mobile App Products', 'metabox title', 'wpsso-am' ),
					array( &$this, 'show_metabox_appmeta' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_banner() {
			$metabox = 'banner';
			$this->p->util->do_table_rows( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', 
				$this->get_table_rows( $metabox, 'general' ), $this->form ), 'metabox-'.$metabox.'-general' );

			$tabs = apply_filters( $this->p->cf['lca'].'_am_'.$metabox.'_tabs', array(
				'itunes' => _x( 'Apple Store App', 'metabox tab', 'wpsso-am' ),
			) );

			$table_rows = array();
			foreach ( $tabs as $key => $title ) {
				$table_rows[$key] = array_merge( $this->get_table_rows( $metabox, $key ), 
					apply_filters( $this->p->cf['lca'].'_'.$metabox.'_'.$key.'_rows', array(), $this->form ) );
			}
			$this->p->util->do_metabox_tabs( $metabox, $tabs, $table_rows );
		}

		public function show_metabox_appmeta() {
			$metabox = 'appmeta';
			$key = 'general';
			$this->p->util->do_table_rows( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_'.$key.'_rows', 
				$this->get_table_rows( $metabox, $key ), $this->form, false ), 'metabox-'.$metabox.'-'.$key );
		}

		protected function get_table_rows( $metabox, $key ) {
			$table_rows = array();
			switch ( $metabox.'-'.$key ) {
				case 'banner-general':

					$table_rows[] = '<td colspan="2">'.
						$this->p->msgs->get( 'info-banner-general' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Archive Webpages',
						'option label', 'wpsso-am' ), null, 'am_ws_on_index' ).
					'<td>'.$this->form->get_checkbox( 'am_ws_on_index' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Static Front Page',
						'option label', 'wpsso-am' ), null, 'am_ws_on_front' ).
					'<td>'.$this->form->get_checkbox( 'am_ws_on_front' ).'</td>';

					$add_to_checkboxes = '';
					foreach ( $this->p->util->get_post_types() as $post_type ) {
						$add_to_checkboxes .= '<p>'.$this->form->get_checkbox( 'am_ws_add_to_'.$post_type->name ).
							' '.$post_type->label.( empty( $post_type->description ) ?
								'' : ' ('.$post_type->description.')' ).'</p>';
					}

					$table_rows[] = $this->form->get_th_html( _x( 'Add Banner to Post Types',
						'option label', 'wpsso-am' ), null, 'am_ws_add_to' ).'<td>'.$add_to_checkboxes.'</td>';

					break;

				case 'banner-itunes':

					$table_rows[] = '<td colspan="2">'.
						$this->p->msgs->get( 'info-banner-itunes' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default App ID Number',
						'option label', 'wpsso-am' ), '', 'am_ws_itunes_app_id' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_id' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default Affiliate Data',
						'option label', 'wpsso-am' ), '', 'am_ws_itunes_app_aff' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_aff' ).'</td>';

					$table_rows[] = $this->form->get_th_html( _x( 'Default Argument String',
						'option label', 'wpsso-am' ), '', 'am_ws_itunes_app_arg' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_arg', 'wide' ).'</td>';

					break;
			}
			return $table_rows;
		}
	}
}

?>
