<?php

class bt_bb_single_product extends BT_BB_Element {

	function handle_shortcode( $atts, $content ) {
		extract( shortcode_atts( apply_filters( 'bt_bb_extract_atts', array(
			'product_id'        		=> '',
			'product_title'        		=> '',
			'product_description'      	=> '',
			'product_price'      		=> '',
			'product_image'      		=> ''
		) ), $atts, $this->shortcode ) );
		
		if ( class_exists( 'WooCommerce' ) && $product_id != '' ) {
			$product = wc_get_product( $product_id );
		} else {
			$product = false;
		}
		$product_exists = ( $product != false ) ? true : false;

		$product_description = html_entity_decode( $product_description ) ;
		$product_description = nl2br( $product_description );
		
		$class = array( $this->shortcode, 'woocommerce' );

		if ( !$product_exists ) {
			$class[] = "btNoWooProduct";
		}

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
		
		if ( $product_title == '' && $product_exists ) {
			$product_title = $product->get_title();
		}
		
		if ( $product_description == '' && $product_exists ) {
			$product_description = $product->get_short_description();
		}
		
		if ( $product_price == '' && $product_exists ) {
			$product_price = $product->get_price_html();
		}
		
		if ( $product_image == '' ) {
			if ( $product_exists ) $product_image = $product->get_image( 'shop_catalog' );
		} else {
			$post_image = get_post( $product_image );
			if ( $post_image == '' ) return;
		
			$image = wp_get_attachment_image_src( $product_image, "full" );
			$caption = $post_image->post_excerpt;
			
			$image = $image[0];
			if ( $caption == '' ) {
				$caption = $product_title;
			}
			$product_image = '<img src="' . $image . '" alt="' . $caption . '" title="' . $caption . '" >';
		}

		$class = apply_filters( $this->shortcode . '_class', $class, $atts );		

		$output = '<div class="' . implode( ' ', $class ) . '"' . $style_attr . '' . $id_attr . '>';
			$output .= '<div class="' . $this->shortcode . '_image">';
				$output .= $product_image;
			$output .= '</div>';
			$output .= '<div class="' . $this->shortcode . '_content">';
				if ( $product_price != '' ) $output .= '<div class="' . $this->shortcode . '_price">' . $product_price . '</div>';
				if ( $product_title != '' ) $output .= '<div class="' . $this->shortcode . '_title">' . $product_title . '</div>';
				if ( $product_description != '' ) $output .= '<div class="' . $this->shortcode . '_description">' . $product_description . '</div>';
				if (  $product_exists ) {
					$output .= '<div class="' . $this->shortcode . '_price_cart">';
						$output .= do_shortcode( '[add_to_cart id="' . $product_id . '" style="" show_price="false"]' );
					$output .= '</div>';					
				}

			$output .= '</div>';
		$output .= '</div>';

		$output = apply_filters( 'bt_bb_general_output', $output, $atts );
		$output = apply_filters( $this->shortcode . '_output', $output, $atts );

		return $output;

	}

	function map_shortcode() {
		
		bt_bb_map( $this->shortcode, array( 'name' => __( 'Single product', 'craft-beer' ), 'description' => __( 'Single product', 'craft-beer' ), 'container' => 'vertical', 'accept' => array( 'bt_bb_button' => true, 'bt_bb_icon' => true, 'bt_bb_separator' => true, 'bt_bb_text' => true, 'bt_bb_headline' => true ), 'icon' => 'bt_bb_icon_bt_bb_service',
			'params' => array(
				array( 'param_name' => 'product_id', 'type' => 'textfield', 'heading' => __( 'Product ID', 'craft-beer' ), 'preview' => true ),
				array( 'param_name' => 'product_title', 'type' => 'textfield', 'heading' => __( 'Custom product title', 'craft-beer' ) ),
				array( 'param_name' => 'product_description', 'type' => 'textarea', 'heading' => __( 'Custom product description', 'craft-beer' ) ),
				array( 'param_name' => 'product_price', 'type' => 'textfield', 'heading' => __( 'Custom product price', 'craft-beer' ) ),
				array( 'param_name' => 'product_image', 'type' => 'attach_image', 'heading' => __( 'Custom product image', 'craft-beer' ) ),
			)
		) );
	}
}