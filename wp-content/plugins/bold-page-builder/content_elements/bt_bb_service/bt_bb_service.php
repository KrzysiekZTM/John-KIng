<?php

class bt_bb_service extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts_' . $this->shortcode, array(
			'icon'         => '',
			'title'        => '',
			'text'         => '',
			'url'          => '',
			'target'       => '',
			'color_scheme' => '',
			'style'        => '',
			'size'         => '',
			'shape'        => '',
			'align'        => ''
		) ), $atts, $this->shortcode ) );

		$class = array( $this->shortcode );

		if ( $el_class != '' ) {
			$class[] = $el_class;
		}

		$id_attr = '';
		if ( $el_id != '' ) {
			$id_attr = ' ' . 'id="' . $el_id . '"';
		}

		$style_attr = '';
		if ( $el_style != '' ) {
			$style_attr = ' ' . 'style="' . $el_style . '"';
		}
		
		if ( $color_scheme != '' ) {
			$class[] = $this->prefix . 'color_scheme_' . bt_bb_get_color_scheme_id( $color_scheme );
		}		

		if ( $style != '' ) {
			$class[] = $this->prefix . 'style' . '_' . $style;
		}

		if ( $size != '' ) {
			$class[] = $this->prefix . 'size' . '_' . $size;
		}

		if ( $shape != '' ) {
			$class[] = $this->prefix . 'shape' . '_' . $shape;
		}
		
		if ( $align != '' ) {
			$class[] = $this->prefix . 'align' . '_' . $align;
		}
		
		$icon = bt_bb_icon::get_html( $icon, '', $url, $title, $target );

		if ( $url != '' ) {
			$title = '<a href="' . $url . '" target="' . $target . '">' . $title . '</a>';
		} 

		
		
		$class = apply_filters( $this->shortcode . '_class', $class, $atts );

		$output = $icon;

		$output .= '<div class="' . $this->shortcode . '_content">';
			$output .= '<div class="' . $this->shortcode . '_content_title">' . $title . '</div>';
			$output .= '<div class="' . $this->shortcode . '_content_text">' . nl2br( $text ) . '</div>';
		$output .= '</div>';

		$output = '<div' . $id_attr . ' class="' . implode( ' ', $class ) . '"' . $style_attr . '>' . $output . '</div>';
		
		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {

		if ( function_exists('boldthemes_get_icon_fonts_bb_array') ) {
			$icon_arr = boldthemes_get_icon_fonts_bb_array();
		} else {
			require_once( dirname(__FILE__) . '/../../content_elements_misc/fa_icons.php' );
			require_once( dirname(__FILE__) . '/../../content_elements_misc/s7_icons.php' );
			$icon_arr = array( 'Font Awesome' => bt_bb_fa_icons(), 'S7' => bt_bb_s7_icons() );
		}

		require_once( dirname(__FILE__) . '/../../content_elements_misc/misc.php' );
		$color_scheme_arr = bt_bb_get_color_scheme_param_array();

		bt_bb_map( $this->shortcode, array( 'name' => esc_html__( 'Service', 'bold-builder' ), 'description' => esc_html__( 'Icon with text', 'bold-builder' ), 'icon' => $this->prefix_backend . 'icon' . '_' . $this->shortcode,
			'params' => array(
				array( 'param_name' => 'icon', 'type' => 'iconpicker', 'heading' => esc_html__( 'Icon', 'bold-builder' ), 'value' => $icon_arr, 'preview' => true ),
				array( 'param_name' => 'title', 'type' => 'textfield', 'heading' => esc_html__( 'Title', 'bold-builder' ), 'preview' => true ),
				array( 'param_name' => 'text', 'type' => 'textarea', 'heading' => esc_html__( 'Text', 'bold-builder' ) ),
				array( 'param_name' => 'url', 'type' => 'textfield', 'heading' => esc_html__( 'URL', 'bold-builder' ) ),
				array( 'param_name' => 'target', 'type' => 'dropdown', 'heading' => esc_html__( 'Target', 'bold-builder' ),
					'value' => array(
						__( 'Self (open in same tab)', 'bold-builder' ) => '_self',
						__( 'Blank (open in new tab)', 'bold-builder' ) => '_blank',
					)
				),
				array( 'param_name' => 'align', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon alignment', 'bold-builder' ),
					'value' => array(
						__( 'Inherit', 'bold-builder' ) => 'inherit',
						__( 'Left', 'bold-builder' ) => 'left',
						__( 'Right', 'bold-builder' ) => 'right'
					)
				),
				array( 'param_name' => 'size', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon size', 'bold-builder' ), 'preview' => true, 'group' => esc_html__( 'Design', 'bold-builder' ),
					'value' => array(
						__( 'Small', 'bold-builder' ) => 'small',
						__( 'Extra small', 'bold-builder' ) => 'xsmall',
						__( 'Normal', 'bold-builder' ) => 'normal',
						__( 'Large', 'bold-builder' ) => 'large',
						__( 'Extra large', 'bold-builder' ) => 'xlarge'
					)
				),
				array( 'param_name' => 'color_scheme', 'type' => 'dropdown', 'heading' => esc_html__( 'Color scheme', 'bold-builder' ), 'value' => $color_scheme_arr, 'preview' => true, 'group' => esc_html__( 'Design', 'bold-builder' ) ),
				array( 'param_name' => 'style', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon style', 'bold-builder' ), 'preview' => true, 'group' => esc_html__( 'Design', 'bold-builder' ),
					'value' => array(
						__( 'Outline', 'bold-builder' ) => 'outline',
						__( 'Filled', 'bold-builder' ) => 'filled',
						__( 'Borderless', 'bold-builder' ) => 'borderless'
					)
				),
				array( 'param_name' => 'shape', 'type' => 'dropdown', 'heading' => esc_html__( 'Icon shape', 'bold-builder' ), 'group' => esc_html__( 'Design', 'bold-builder' ),
					'value' => array(
						__( 'Circle', 'bold-builder' ) => 'circle',
						__( 'Square', 'bold-builder' ) => 'square',
						__( 'Rounded Square', 'bold-builder' ) => 'round'
					)
				)
			)
		) );
	}
}