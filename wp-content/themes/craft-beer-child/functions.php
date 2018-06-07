<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'simple-line-icons', 'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// SVG support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');



//Add in text after price to certain products
function themeprefix_custom_price_message( $price ) {

	global $post;
	$textafter = ' netto'; //add your text
	return $price . '<span class="price-description">' . $textafter . '</span>';

}
add_filter( 'woocommerce_get_price_html', 'themeprefix_custom_price_message' );
