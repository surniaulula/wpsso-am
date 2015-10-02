<?php
/*
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl.txt
 * Copyright 2014-2015 - Jean-Sebastien Morisset - http://surniaulula.com/
 */

if ( ! defined( 'ABSPATH' ) ) 
	die( 'These aren\'t the droids you\'re looking for...' );

if ( ! class_exists( 'WpssoAmSubmenuAmgeneral' ) && class_exists( 'WpssoAdmin' ) ) {

	class WpssoAmSubmenuAmgeneral extends WpssoAdmin {

		public function __construct( &$plugin, $id, $name ) {
			$this->p =& $plugin;
			$this->menu_id = $id;
			$this->menu_name = $name;
		}

		protected function add_meta_boxes() {
			// add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
			add_meta_box( $this->pagehook.'_webapp', 'Website App', 
				array( &$this, 'show_metabox_webapp' ), $this->pagehook, 'normal' );
			add_meta_box( $this->pagehook.'_appmeta', 'App Products', 
				array( &$this, 'show_metabox_appmeta' ), $this->pagehook, 'normal' );
		}

		public function show_metabox_webapp() {
			$metabox = 'webapp';
			echo '<table class="sucom-setting">';
			foreach ( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', 
				$this->get_rows( $metabox, 'general' ), $this->form ) as $row )
					echo '<tr>'.$row.'</tr>';
			echo '</table>';
			$tabs = array( 'itunes' => 'Apple Store' );
			$tabs = apply_filters( $this->p->cf['lca'].'_'.$metabox.'_tabs', $tabs );
			$rows = array();
			foreach ( $tabs as $key => $title )
				$rows[$key] = array_merge( $this->get_rows( $metabox, $key ), 
					apply_filters( $this->p->cf['lca'].'_'.$metabox.'_'.$key.'_rows', array(), $this->form ) );
			$this->p->util->do_tabs( $metabox, $tabs, $rows );
		}

		public function show_metabox_appmeta() {
			$metabox = 'appmeta';
			echo '<table class="sucom-setting">';
			foreach ( apply_filters( $this->p->cf['lca'].'_'.$metabox.'_general_rows', 
				$this->get_rows( $metabox, 'general' ), $this->form ) as $row )
					echo '<tr>'.$row.'</tr>';
			echo '</table>';
		}

		protected function get_rows( $metabox, $key ) {
			$rows = array();
			switch ( $metabox.'-'.$key ) {
				case 'webapp-general':

					$rows[] = '<td colspan="2">'.
						$this->p->msgs->get( 'info-webapp-general' ).'</td>';

					$rows[] = $this->p->util->get_th( __( 'Add to Index Webpages',
						'wpsso-am' ), null, 'am_ws_on_index' ).
					'<td>'.$this->form->get_checkbox( 'am_ws_on_index' ).'</td>';

					$rows[] = $this->p->util->get_th( __( 'Add to Static Homepage',
						'wpsso-am' ), null, 'am_ws_on_front' ).
					'<td>'.$this->form->get_checkbox( 'am_ws_on_front' ).'</td>';

					$checkboxes = '';
					foreach ( $this->p->util->get_post_types( 'frontend' ) as $post_type )
						$checkboxes .= '<p>'.$this->form->get_checkbox( 'am_ws_add_to_'.$post_type->name ).' '.
							$post_type->label.' '.( empty( $post_type->description ) ?
								'' : '('.$post_type->description.')' ).'</p>';

					$rows[] = $this->p->util->get_th( __( 'Add to Post Types',
						'wpsso-am' ), null, 'am_ws_add_to' ).'<td>'.$checkboxes.'</td>';

					break;

				case 'webapp-itunes':

					$rows[] = '<td colspan="2">'.
						$this->p->msgs->get( 'info-webapp-itunes' ).'</td>';

					$rows[] = $this->p->util->get_th( __( 'App ID Number',
						'wpsso-am' ), null, 'am_ws_itunes_app_id' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_id' ).'</td>';

					$rows[] = $this->p->util->get_th( __( 'Affiliate Data',
						'wpsso-am' ), null, 'am_ws_itunes_app_aff' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_aff' ).'</td>';

					$rows[] = $this->p->util->get_th( __( 'Argument String',
						'wpsso-am' ), null, 'am_ws_itunes_app_arg' ).
					'<td>'.$this->form->get_input( 'am_ws_itunes_app_arg', 'wide' ).'</td>';

					break;
			}
			return $rows;
		}
	}
}

?>
