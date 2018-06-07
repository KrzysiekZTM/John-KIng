<?php

// BoldThemes framework related
add_filter( 'get_search_form', 'boldthemes_search_form' );
add_filter( 'wp_video_shortcode', 'boldthemes_wp_video_shortcode', 10, 5 );
add_filter( 'embed_oembed_html', 'boldthemes_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'boldthemes_embed_html' ); // Jetpack
add_filter( 'wp_video_shortcode_library', 'boldthemes_wp_video_shortcode_library' );
add_filter( 'wp_audio_shortcode_library', 'boldthemes_wp_audio_shortcode_library' );
add_filter( 'body_class', 'boldthemes_get_body_class' );


/**
 * Custom search form
 *
 * @return string
 */
if ( ! function_exists( 'boldthemes_search_form' ) ) {
	function boldthemes_search_form( $form ) {
		$form = '<div class="btSearch">';
		$form .= boldthemes_get_icon_html( array( 'icon' => 'fa_f002', 'url' => '#' ) );
		$form .= '
		<div class="btSearchInner gutter" role="search">
			<div class="btSearchInnerContent port">
				<form action="' . esc_url_raw( home_url( '/' ) ) . '" method="get"><input type="text" name="s" placeholder="' . esc_attr( esc_html__( 'Looking for...', 'craft-beer' ) ) . '" class="untouched">
				<button type="submit" data-icon="&#xf105;"></button>
				</form>
				<div class="btSearchInnerClose">' . boldthemes_get_icon_html( array( 'icon' => 'fa_f00d', 'url' => '#' ) ) . '</div>
			</div>
		</div>';
		$form .= '</div>';
		return $form;
	}
}

/**
 * Video shortcode custom HTML
 *
 * @return string
 */
if ( ! function_exists( 'boldthemes_wp_video_shortcode' ) ) {
	function boldthemes_wp_video_shortcode( $item_html, $atts, $video, $post_id, $library ) {
		$replace_value = 'width: ' . $atts['width'] . 'px';
		$replace_with  = 'width: 100%';
		$item_html = str_ireplace( $replace_value, $replace_with, $item_html );
		return '<div class="bt-video-container">' . $item_html . '</div>';
	}
}

/**
 * Enqueue video shortcode custom JS
 *
 * @return string 
 */
if ( ! function_exists( 'boldthemes_wp_video_shortcode_library' ) ) {
	function boldthemes_wp_video_shortcode_library() {
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'boldthemes-video-shortcode', get_parent_theme_file_uri( 'framework/js/video_shortcode.js' ), array( 'mediaelement' ), '', true );
		return 'boldthemes_mejs';
	}
}

/**
 * Enqueue audio shortcode custom JS
 *
 * @return string 
 */
if ( ! function_exists( 'boldthemes_wp_audio_shortcode_library' ) ) {
	function boldthemes_wp_audio_shortcode_library() {
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'boldthemes-audio-shortcode', get_parent_theme_file_uri( 'framework/js/audio_shortcode.js' ), array( 'mediaelement' ), '', true );
		return 'boldthemes_mejs';
	}
}

/*  Add responsive container to embeds
/* ------------------------------------ */ 
function boldthemes_embed_html( $html ) {
    return '<div class="bt-video-container">' . $html . '</div>';
}