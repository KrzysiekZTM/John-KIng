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

function my_theme_scripts(){
  wp_enqueue_script('modal', get_stylesheet_directory_uri().'/js/modal.js');
}

add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// SVG support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function my_theme_transport_table_modal(){
$html = '<div style="display: none;" id="overlay"></div>
        <div style="display:none; z-index:9999" class="modal-window" data-modal="true" data-modal-id="transport-table">
          <div class="modal-content">
            <div class="modal-window_header">
              <h5>Tabela kosztów dostawy</h5>
            </div>
            <div class="modal-window_body">';
$html .= '';
$html .= '</div>
            <div class="modal-window_footer">
              <button class="button" type="button" name="button" data-modal="close">Zamknij</button>
            </div>
          </div>
        </div>';

echo $html;
}

add_action( 'woocommerce_after_cart', 'my_theme_transport_table_modal' );
