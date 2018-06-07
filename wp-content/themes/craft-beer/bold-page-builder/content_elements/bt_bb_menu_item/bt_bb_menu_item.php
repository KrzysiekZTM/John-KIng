<?php

class bt_bb_menu_item extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'menu_item_title'        				=> '',
			'menu_item_icon'        				=> '',
			'menu_item_description'      			=> '',
			'menu_item_price'      					=> '',
			'menu_item_image'      					=> '',
			'color_scheme'      					=> ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		if ( $menu_item_image != '' ) {
			$post_image = get_post( $menu_item_image );
			if ( $post_image == '' ) return;
		
			$image = wp_get_attachment_image_src( $menu_item_image, "boldthemes_small_square" );
			$caption = $post_image->post_excerpt;
			
			$image = $image[0];
			if ( $caption == '' ) {
				$caption = $menu_item_title;
			}
			$menu_item_image = '<img src="' . $image . '" alt="' . $caption . '" title="' . $caption . '" >';
		}
		
		
		$menu_item_icon_html = do_shortcode( '[bt_bb_icon icon="' . $menu_item_icon  . '" size="xsmall" style="borderless" shape="" ]' );
		
		$output = '<div class="' . implode( ' ', $class ) . '"' . $style_attr . ' ' . $id_attr . '>';
			if ( $menu_item_image != '' ) {
				$output .= '<div class="' . $this->shortcode . '_image">';
					$output .= $menu_item_image;
					//$output .= $menu_item_icon_html;
				$output .= '</div>';
			}
			$output .= '<div class="' . $this->shortcode . '_content">';
				$output .= '<div class="' . $this->shortcode . '_title_price">';
					if ( $menu_item_title != '' ) $output .= '<div class="' . $this->shortcode . '_title"><div>' . $menu_item_title . $menu_item_icon_html . ''  . '</div></div>';
					if ( $menu_item_price != '' ) $output .= '<div class="' . $this->shortcode . '_price">' . $menu_item_price . '</div>';
				$output .= '</div>';
				$output .= '<div class="' . $this->shortcode . '_description">' . $menu_item_description . '</div>';
			$output .= '</div>';
			
		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );


		return $output;

	}

	function map_shortcode() {
		
		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			$icon_arr = array();
		}
		
		require_once( dirname(__FILE__) . '/../../../../../plugins/bold-page-builder/content_elements_misc/misc.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();
		
		bt_bb_map( $this->shortcode, array( 'name' => __( 'Menu item (food & drinks)', 'craft-beer' ), 'description' => __( 'Menu item (food & drinks)', 'craft-beer' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_separator' => true, 'bt_bb_text' => true, 'bt_bb_headline' => true ), 'icon' => 'bt_bb_icon_bt_bb_service',
			'params' => array(
				array( 'param_name' => 'menu_item_title', 'type' => 'textfield', 'heading' => __( 'Custom product title', 'craft-beer' ), 'preview' => true ),
				array( 'param_name' => 'menu_item_icon', 'type' => 'iconpicker', 'heading' => __( 'Icon', 'craft-beer' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'menu_item_description', 'type' => 'textarea', 'heading' => __( 'Custom product description', 'craft-beer' ) ),
				array( 'param_name' => 'menu_item_price', 'type' => 'textfield', 'heading' => __( 'Custom product price', 'craft-beer' ), 'preview' => true ),
				array( 'param_name' => 'menu_item_image', 'type' => 'attach_image', 'heading' => __( 'Custom product image', 'craft-beer' ), 'preview' => true ),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => __( 'Color scheme', 'craft-beer' ), 'value' => $color_scheme_arr, 'preview' => true )
			)
		) );
	}
}