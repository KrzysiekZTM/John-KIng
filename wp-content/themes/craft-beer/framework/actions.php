<?php

add_action( 'after_setup_theme', 'boldthemes_theme_init' );
add_action( 'after_setup_theme', 'boldthemes_image_sizes' );
add_action( 'widgets_init', 'boldthemes_widgets_init' );
add_action( 'wp_enqueue_scripts', 'boldthemes_enqueue' );
add_action( 'admin_enqueue_scripts', 'boldthemes_wp_admin_style' );
add_action( 'init', 'boldthemes_add_excerpt_to_page' );

// callbacks

/**
 * Theme setup
 */
if ( ! function_exists( 'boldthemes_theme_init' ) ) {
	function boldthemes_theme_init() {  
		// add theme support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio', 'link', 'quote' ) );
		add_theme_support( 'title-tag' );
		
		// load translated strings
		load_theme_textdomain( 'craft-beer', get_parent_theme_file_path( 'languages' ) );
		
		// date format
		BoldThemesFramework::$date_format = get_option( 'date_format' );
	}
}

/**
 * Image sizes
 */
if ( ! function_exists( 'boldthemes_image_sizes' ) ) {
	function boldthemes_image_sizes() {
		
		update_option( 'thumbnail_size_w', 160 );
		update_option( 'thumbnail_size_h', 160 );
		
		update_option( 'medium_size_w', 640 );
		update_option( 'medium_size_h', 0 );
		
		update_option( 'large_size_w', 1280 );
		update_option( 'large_size_h', 0 );
		
		/* Small */

		add_image_size( 'boldthemes_small', 320, 0, true );
		add_image_size( 'boldthemes_small_rectangle', 320, 240, true );
		add_image_size( 'boldthemes_small_square', 320, 320, true );
		
		/* Medium */

		add_image_size( 'boldthemes_medium', 640 );
		add_image_size( 'boldthemes_medium_rectangle', 640, 480, true );
		add_image_size( 'boldthemes_medium_square', 640, 640, true );
		
		/* Large */
		
		add_image_size( 'boldthemes_large_square', 1280, 1280, true );
		add_image_size( 'boldthemes_large_rectangle', 1280, 640, true );
		add_image_size( 'boldthemes_large_vertical_rectangle', 640, 1280, true );

	}
}

/**
 * Remove Recent Comments widget style and register sidebar and widget areas
 */
if ( ! function_exists( 'boldthemes_widgets_init' ) ) {
	function boldthemes_widgets_init() {  
		global $wp_widget_factory;
		register_sidebar( array (
			'name' 			=> esc_html__( 'Sidebar', 'craft-beer' ),
			'id' 			=> 'primary_widget_area',
			'description'   => 'Main sidebar',
			'before_widget' => '<div class="btBox %2$s">',
			'after_widget' 	=> '</div>',
			'before_title' 	=> '<h4><span>',
			'after_title' 	=> '</span></h4>',
		));
	}
}

/**
 * Add excerpt to page
 */
if ( ! function_exists( 'boldthemes_add_excerpt_to_page' ) ) {
	function boldthemes_add_excerpt_to_page() {
		 add_post_type_support( 'page', 'excerpt' );
	}
}

/**
 * Enqueue scripts/styles
 */
if ( ! function_exists( 'boldthemes_enqueue' ) ) {
	function boldthemes_enqueue() {
		wp_enqueue_style( 'boldthemes-framework', get_parent_theme_file_uri( 'framework/css/style.css' ) );
	}
}

/**
 * Admin style
 */
if ( ! function_exists( 'boldthemes_wp_admin_style' ) ) {
	function boldthemes_wp_admin_style() {
		wp_enqueue_style( 'boldthemes-framework-admin', get_parent_theme_file_uri( 'framework/css/admin_style.css' ), array(), false );
	
	}
}
/**
 * Alowed tags
 */

if(!function_exists('boldthemes_add_allowed_tags')) {
	function boldthemes_add_allowed_tags($tags) {
		$allowed_attributes = array(
			'class' => true,
			'id' => true,
			'class' => true,
			'target' => true,
			'src' => true,
			'style' => true,
			'data-ico-fa' => true,
			'id' => true,
			'href' => true
        );
		$tags['span'] = $allowed_attributes;
		$tags['div'] = $allowed_attributes;
		$tags['a'] = $allowed_attributes;
		return $tags;
	}
	add_filter('wp_kses_allowed_html', 'boldthemes_add_allowed_tags');
}