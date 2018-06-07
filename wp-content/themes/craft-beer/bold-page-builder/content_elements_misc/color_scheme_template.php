<?php

if ( ! isset( $color_scheme[2] ) ) {

	$custom_css = '';

} else {

	$custom_css = "

		.bt_bb_color_scheme_{$scheme_id}.bt_bb_headline .bt_bb_headline_subheadline
		{
			color: {$color_scheme[2]};
		}
		
		/* Menu item */
		
		.bt_bb_color_scheme_{$scheme_id}.bt_bb_menu_item .bt_bb_menu_item_content
		{
			color: {$color_scheme[1]};
		}
		
		.bt_bb_color_scheme_{$scheme_id}.bt_bb_menu_item .bt_bb_menu_item_content .bt_bb_menu_item_title_price .bt_bb_menu_item_title .bt_bb_icon {
			color: {$color_scheme[2]};
		}
		
		.bt_bb_color_scheme_{$scheme_id}.bt_bb_menu_item .bt_bb_menu_item_content .bt_bb_menu_item_title_price .bt_bb_menu_item_title:after {
			border-color: {$color_scheme[2]};
		}
		
		/* Tabs */ 
		
		.bt_bb_tabs.bt_bb_color_scheme_{$scheme_id}.bt_bb_style_filled .bt_bb_tab_content {
			border-color: {$color_scheme[1]};
		}

		/* Button */
		
		.bt_bb_color_scheme_{$scheme_id}.bt_bb_button.bt_bb_style_outline a:hover
		{
			color: {$color_scheme[2]};
			box-shadow: 0 0 0 1px {$color_scheme[2]} inset;
		}




		


	";

}