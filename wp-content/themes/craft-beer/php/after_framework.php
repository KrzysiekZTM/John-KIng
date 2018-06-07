<?php

BoldThemes_Customize_Default::$data['body_font'] = 'Roboto Slab';
BoldThemes_Customize_Default::$data['heading_supertitle_font'] = 'Roboto Slab';
BoldThemes_Customize_Default::$data['heading_font'] = 'Roboto Condensed';
BoldThemes_Customize_Default::$data['heading_subtitle_font'] = 'Roboto Slab';
BoldThemes_Customize_Default::$data['menu_font'] = 'Roboto Condensed';

BoldThemes_Customize_Default::$data['accent_color'] = '#B28564';
BoldThemes_Customize_Default::$data['alternate_color'] = '#FF7F00';
BoldThemes_Customize_Default::$data['logo_height'] = '100';

BoldThemes_Customize_Default::$data['page_border_style'] = 'default';

if ( ! function_exists( 'boldthemes_customize_page_border_style' ) ) {
	function boldthemes_customize_page_border_style( $wp_customize ) {
		
		$wp_customize->add_setting( BoldThemesFramework::$pfx . '_theme_options[page_border_style]', array(
			'default'           => BoldThemes_Customize_Default::$data['page_border_style'],
			'type'              => 'option',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'boldthemes_sanitize_select'
		));
		$wp_customize->add_control( 'page_border_style', array(
			'label'     => esc_html__( 'Page border style', 'craft-beer' ),
			'section'   => BoldThemesFramework::$pfx . '_general_section',
			'settings'  => BoldThemesFramework::$pfx . '_theme_options[page_border_style]',
			'priority'  => 96,
			'type'      => 'select',
			'choices'   => array(
				'default' => esc_html__( 'Default', 'craft-beer' ),
				'dark' => esc_html__( 'Dark solid', 'craft-beer' ),
				'light' => esc_html__( 'Light solid', 'craft-beer' ),
				'accent' => esc_html__( 'Accent solid', 'craft-beer' ),
				'alternate' => esc_html__( 'Alternate solid ', 'craft-beer' )
			)
		));
	}
}

add_action( 'customize_register', 'boldthemes_customize_page_border_style' );
add_action( 'boldthemes_customize_register', 'boldthemes_customize_page_border_style' );