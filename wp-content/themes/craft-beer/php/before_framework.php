<?php

/**
 * Default header dash
 */
/*if ( ! function_exists( 'boldthemes_header_headline_dash' ) ) {
	function boldthemes_header_headline_dash() {
		return ""; // 
	}
}

add_filter( 'boldthemes_header_headline_dash', 'boldthemes_header_headline_dash' );
*/

/**
 * Product headline size
 */
/*if ( ! function_exists( 'boldthemes_product_headline_size' ) ) {
	function boldthemes_product_headline_size( $size ) {
		return 'small';
	}
}

add_filter( 'boldthemes_product_headline_size', 'boldthemes_product_headline_size' );*/

/**
 * Default headline size
 */
if ( ! function_exists( 'boldthemes_header_headline_size' ) ) {
	function boldthemes_header_headline_size( $size ) {
		return 'normal';
	}
}
add_filter( 'boldthemes_header_headline_size', 'boldthemes_header_headline_size' );

