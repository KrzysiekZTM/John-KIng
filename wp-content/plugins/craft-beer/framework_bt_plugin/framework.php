<?php

add_filter( 'register_post_type_args', 'boldthemes_update_portfolio_slug', 10, 2 );
add_action( 'init', 'boldthemes_portfolio_category_slug', 11 );


/**
 * Change portfolio slug
 *
 * @return array
 */

function boldthemes_update_portfolio_slug( $args, $post_type ) {
	if ( function_exists( 'boldthemes_get_option' ) ) {
		if ( 'portfolio' === $post_type && boldthemes_get_option( 'pf_slug' ) != '' ) {
			$new_args = array(
				'rewrite' => array( 'slug' => boldthemes_get_option( 'pf_slug' ) )
			);
			return array_merge( $args, $new_args );
		}
	}
	return $args;
}

function boldthemes_portfolio_category_slug() {
	if ( function_exists( 'boldthemes_get_option' ) ) {
		if ( boldthemes_get_option ( 'pf_category_slug' ) != '' ) {
			$portfolio_category_args = get_taxonomy( 'portfolio_category' ); // returns an object
			$portfolio_category_args->rewrite['slug'] = boldthemes_get_option( 'pf_category_slug' );
			register_taxonomy( 'portfolio_category', 'portfolio', (array) $portfolio_category_args );
		}
	}
}
// hook it up to 11 so that it overrides the original register_taxonomy function