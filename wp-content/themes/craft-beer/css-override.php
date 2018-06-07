<?php
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars ) ) {
	$boldthemes_crush_vars = BoldThemesFramework::$crush_vars;
}
if ( class_exists( 'BoldThemesFramework' ) && isset( BoldThemesFramework::$crush_vars_def ) ) {
	$boldthemes_crush_vars_def = BoldThemesFramework::$crush_vars_def;
}
if ( isset( $boldthemes_crush_vars['accentColor'] ) ) {
	$accentColor = $boldthemes_crush_vars['accentColor'];
} else {
	$accentColor = "#B28564";
}
if ( isset( $boldthemes_crush_vars['alternateColor'] ) ) {
	$alternateColor = $boldthemes_crush_vars['alternateColor'];
} else {
	$alternateColor = "#FF7F00";
}
if ( isset( $boldthemes_crush_vars['bodyFont'] ) ) {
	$bodyFont = $boldthemes_crush_vars['bodyFont'];
} else {
	$bodyFont = "Roboto Slab";
}
if ( isset( $boldthemes_crush_vars['menuFont'] ) ) {
	$menuFont = $boldthemes_crush_vars['menuFont'];
} else {
	$menuFont = "Roboto Condensed";
}
if ( isset( $boldthemes_crush_vars['headingFont'] ) ) {
	$headingFont = $boldthemes_crush_vars['headingFont'];
} else {
	$headingFont = "Roboto Condensed";
}
if ( isset( $boldthemes_crush_vars['headingSuperTitleFont'] ) ) {
	$headingSuperTitleFont = $boldthemes_crush_vars['headingSuperTitleFont'];
} else {
	$headingSuperTitleFont = "Roboto Slab";
}
if ( isset( $boldthemes_crush_vars['headingSubTitleFont'] ) ) {
	$headingSubTitleFont = $boldthemes_crush_vars['headingSubTitleFont'];
} else {
	$headingSubTitleFont = "Roboto Slab";
}
if ( isset( $boldthemes_crush_vars['logoHeight'] ) ) {
	$logoHeight = $boldthemes_crush_vars['logoHeight'];
} else {
	$logoHeight = "100";
}
$accentColorDark = CssCrush\fn__l_adjust( $accentColor." -15" );$accentColorVeryDark = CssCrush\fn__l_adjust( $accentColor." -35" );$accentColorVeryVeryDark = CssCrush\fn__l_adjust( $accentColor." -42" );$accentColorLight = CssCrush\fn__a_adjust( $accentColor." -30" );$alternateColorDark = CssCrush\fn__l_adjust( $alternateColor." -15" );$alternateColorVeryDark = CssCrush\fn__l_adjust( $alternateColor." -25" );$alternateColorLight = CssCrush\fn__a_adjust( $alternateColor." -40" );$css_override = sanitize_text_field("select,
input{font-family: \"{$bodyFont}\";}
.btContent a{color: {$accentColor};}
a:hover{
    color: {$accentColor};}
.btText a{color: {$accentColor};}
body{font-family: \"{$bodyFont}\",Arial,sans-serif;}
h1,
h2,
h3,
h4,
h5,
h6{font-family: \"{$headingFont}\";}
blockquote{
    font-family: \"{$headingFont}\";}
.btContentHolder table thead th{
    background-color: {$accentColor};}
.btPreloader .animation .preloaderLogo{height: {$logoHeight}px;}
.mainHeader{
    font-family: \"{$menuFont}\";}
.mainHeader a:hover{color: {$accentColor};}
.menuPort{font-family: \"{$menuFont}\";}
.menuPort nav ul li a:hover{color: {$accentColor};}
.menuPort nav > ul > li > a{line-height: {$logoHeight}px;}
.btTextLogo{font-family: \"{$menuFont}\";
    line-height: {$logoHeight}px;}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btHorizontalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor > a:after,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item > a:after{
    background-color: {$accentColor};}
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-ancestor li.current-menu-item > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-ancestor > a,
.btMenuHorizontal .menuPort nav > ul > li.current-menu-item li.current-menu-item > a{color: {$accentColor};}
.btMenuHorizontal .menuPort ul ul li a:hover{color: {$accentColor};}
body.btMenuHorizontal .subToggler{
    line-height: {$logoHeight}px;}
.btMenuHorizontal .menuPort > nav > ul > li > ul li a:hover{-webkit-box-shadow: inset 5px 0 0 0 {$accentColor};
    box-shadow: inset 5px 0 0 0 {$accentColor};}
.btMenuHorizontal .topBarInMenu{
    height: {$logoHeight}px;}
.btAccentLightHeader .btBelowLogoArea,
.btAccentLightHeader .topBar{background-color: {$accentColor};}
.btAccentLightHeader .btBelowLogoArea a:hover,
.btAccentLightHeader .topBar a:hover{color: {$alternateColor};}
.btAccentDarkHeader .btBelowLogoArea,
.btAccentDarkHeader .topBar{background-color: {$accentColor};}
.btAccentDarkHeader .btBelowLogoArea a:hover,
.btAccentDarkHeader .topBar a:hover{color: {$alternateColor};}
.btLightAccentHeader .btLogoArea,
.btLightAccentHeader .btVerticalHeaderTop{background-color: {$accentColor};}
.btLightAccentHeader.btMenuHorizontal.btBelowMenu .mainHeader .btLogoArea{background-color: {$accentColor};}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:before,
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon:after,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon:after{border-top-color: {$accentColor};}
.btTransparentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btTransparentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentLightHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btAccentDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btLightDarkHeader .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before,
.btHasAltLogo.btStickyHeaderActive .btVerticalMenuTrigger:hover .bt_bb_icon .bt_bb_icon_holder:before{border-top-color: {$accentColor};}
.btMenuVertical .mainHeader .btCloseVertical:before:hover{color: {$accentColor};}
.btMenuHorizontal .topBarInLogoArea{
    height: {$logoHeight}px;}
.btMenuHorizontal .topBarInLogoArea .topBarInLogoAreaCell{border: 0 solid {$accentColor};}
.btDarkSkin .btSiteFooter .port:before,
.bt_bb_color_scheme_1 .btSiteFooter .port:before,
.bt_bb_color_scheme_3 .btSiteFooter .port:before,
.bt_bb_color_scheme_6 .btSiteFooter .port:before{background-color: {$accentColor};}
.btMediaBox.btQuote,
.btMediaBox.btLink{
    background-color: {$accentColor};}
.sticky.btArticleListItem .btArticleHeadline h1 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h2 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h3 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h4 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h5 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h6 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h7 .bt_bb_headline_content span a:after,
.sticky.btArticleListItem .btArticleHeadline h8 .bt_bb_headline_content span a:after{
    color: {$accentColor};}
.post-password-form p:first-child{color: {$alternateColor};}
.post-password-form p:nth-child(2) input[type=\"submit\"]{
    background: {$accentColor};}
.btPagination{font-family: \"{$headingFont}\";}
.btPagination .paging a:hover{color: {$accentColor};}
.btPagination .paging a:hover:after{border-color: {$accentColor};
    color: {$accentColor};}
.btPrevNextNav .btPrevNext .btPrevNextItem .btPrevNextTitle{font-family: \"{$headingFont}\";}
.btPrevNextNav .btPrevNext:hover .btPrevNextTitle{color: {$accentColor};}
.btArticleCategories a{color: {$accentColor};}
.btArticleCategories a:not(:first-child):before{
    background-color: {$accentColor};}
.btArticleDate{color: {$accentColor};}
.btLightSkin .btArticleDate:not(:last-child):after,
.btLightSkin .btArticleAuthor:not(:last-child):after,
.btLightSkin .btArticleComments:not(:last-child):after,
.btLightSkin .btArticleCategories:not(:last-child):after,
.bt_bb_color_scheme_2 .btArticleDate:not(:last-child):after,
.bt_bb_color_scheme_2 .btArticleAuthor:not(:last-child):after,
.bt_bb_color_scheme_2 .btArticleComments:not(:last-child):after,
.bt_bb_color_scheme_2 .btArticleCategories:not(:last-child):after,
.bt_bb_color_scheme_4 .btArticleDate:not(:last-child):after,
.bt_bb_color_scheme_4 .btArticleAuthor:not(:last-child):after,
.bt_bb_color_scheme_4 .btArticleComments:not(:last-child):after,
.bt_bb_color_scheme_4 .btArticleCategories:not(:last-child):after,
.bt_bb_color_scheme_5 .btArticleDate:not(:last-child):after,
.bt_bb_color_scheme_5 .btArticleAuthor:not(:last-child):after,
.bt_bb_color_scheme_5 .btArticleComments:not(:last-child):after,
.bt_bb_color_scheme_5 .btArticleCategories:not(:last-child):after{color: {$accentColor};}
.btDarkSkin .btArticleDate:not(:last-child):after,
.btDarkSkin .btArticleAuthor:not(:last-child):after,
.btDarkSkin .btArticleComments:not(:last-child):after,
.btDarkSkin .btArticleCategories:not(:last-child):after,
.bt_bb_color_scheme_1 .btArticleDate:not(:last-child):after,
.bt_bb_color_scheme_1 .btArticleAuthor:not(:last-child):after,
.bt_bb_color_scheme_1 .btArticleComments:not(:last-child):after,
.bt_bb_color_scheme_1 .btArticleCategories:not(:last-child):after,
.bt_bb_color_scheme_3 .btArticleDate:not(:last-child):after,
.bt_bb_color_scheme_3 .btArticleAuthor:not(:last-child):after,
.bt_bb_color_scheme_3 .btArticleComments:not(:last-child):after,
.bt_bb_color_scheme_3 .btArticleCategories:not(:last-child):after,
.bt_bb_color_scheme_6 .btArticleDate:not(:last-child):after,
.bt_bb_color_scheme_6 .btArticleAuthor:not(:last-child):after,
.bt_bb_color_scheme_6 .btArticleComments:not(:last-child):after,
.bt_bb_color_scheme_6 .btArticleCategories:not(:last-child):after{color: {$accentColor};}
.btCommentsBox .vcard .posted{
    font-family: \"{$headingFont}\";}
.btCommentsBox .commentTxt p.edit-link,
.btCommentsBox .commentTxt p.reply{
    font-family: \"{$headingFont}\";}
.comment-awaiting-moderation{color: {$accentColor};}
a#cancel-comment-reply-link{
    color: {$accentColor};}
a#cancel-comment-reply-link:hover{color: {$alternateColor};}
.btCommentSubmit:hover{color: {$accentColor};
    border: 1px solid {$accentColor};}
body:not(.btNoDashInSidebar) .btBox > h4:after,
body:not(.btNoDashInSidebar) .btCustomMenu > h4:after,
body:not(.btNoDashInSidebar) .btTopBox > h4:after{
    border-bottom: 3px solid {$accentColor};}
.btBox ul li.current-menu-item > a,
.btCustomMenu ul li.current-menu-item > a,
.btTopBox ul li.current-menu-item > a{color: {$accentColor};}
.widget_calendar table caption{background: {$accentColor};
    background: {$accentColor};
    font-family: \"{$headingFont}\";}
.widget_rss li a.rsswidget{font-family: \"{$headingFont}\";}
.fancy-select ul.options li:hover{color: {$accentColor};}
.widget_shopping_cart .total{
    font-family: \"{$headingFont}\";}
.widget_shopping_cart .buttons .button{
    background: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove{
    background-color: {$accentColor};}
.widget_shopping_cart .widget_shopping_cart_content .mini_cart_item .ppRemove a.remove:hover{background-color: {$alternateColor};}
.menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents,
.topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetIcon span.cart-contents{
    background-color: {$alternateColor};
    font: normal 10px/1 {$menuFont};}
.btMenuVertical .menuPort .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topTools .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler,
.btMenuVertical .topBarInLogoArea .widget_shopping_cart .widget_shopping_cart_content .btCartWidgetInnerContent .verticalMenuCartToggler{
    background-color: {$accentColor};}
.widget_recent_reviews{font-family: \"{$headingFont}\";}
.widget_price_filter .price_slider_wrapper .ui-slider .ui-slider-handle{
    background-color: {$accentColor};}
.btBox .tagcloud a,
.btTags ul a{
    background: {$accentColor};}
.topTools .btIconWidget:hover,
.topBarInMenu .btIconWidget:hover{color: {$accentColor};}
.btSidebar .btIconWidget:hover .btIconWidgetText,
footer .btIconWidget:hover .btIconWidgetText,
.topBarInLogoArea .btIconWidget:hover .btIconWidgetText{color: {$accentColor};}
.btAccentIconWidget.btIconWidget .btIconWidgetIcon{color: {$accentColor};}
.btLightSkin .btSiteFooterWidgets .btSearch button:hover,
.bt_bb_color_scheme_2 .btSiteFooterWidgets .btSearch button:hover,
.bt_bb_color_scheme_4 .btSiteFooterWidgets .btSearch button:hover,
.bt_bb_color_scheme_5 .btSiteFooterWidgets .btSearch button:hover,
.btDarkSkin .btSiteFooterWidgets .btSearch button:hover,
.bt_bb_color_scheme_1 .btSiteFooterWidgets .btSearch button:hover,
.bt_bb_color_scheme_3 .btSiteFooterWidgets .btSearch button:hover,
.bt_bb_color_scheme_6 .btSiteFooterWidgets .btSearch button:hover,
.btLightSkin .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_2 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_4 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_5 .btSidebar .btSearch button:hover,
.btDarkSkin .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_1 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_3 .btSidebar .btSearch button:hover,
.bt_bb_color_scheme_6 .btSidebar .btSearch button:hover,
.btLightSkin .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_2 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_4 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_5 .btSidebar .widget_product_search button:hover,
.btDarkSkin .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_1 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_3 .btSidebar .widget_product_search button:hover,
.bt_bb_color_scheme_6 .btSidebar .widget_product_search button:hover{background: {$accentColor} !important;
    border-color: {$accentColor} !important;}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon a.bt_bb_icon_holder{color: {$accentColor};}
.btSearchInner.btFromTopBox .btSearchInnerClose .bt_bb_icon:hover a.bt_bb_icon_holder{color: {$accentColorDark};}
.btSearchInner.btFromTopBox button:hover:before{color: {$accentColor};}
.bt_bb_headline.bt_bb_superheadline .bt_bb_headline_superheadline{
    font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_headline.bt_bb_subheadline .bt_bb_headline_subheadline{font-family: \"{$headingSubTitleFont}\";}
.bt_bb_headline h1 b,
.bt_bb_headline h2 b,
.bt_bb_headline h3 b,
.bt_bb_headline h4 b,
.bt_bb_headline h5 b,
.bt_bb_headline h6 b{color: {$accentColor};}
.bt_bb_headline h1 del,
.bt_bb_headline h2 del,
.bt_bb_headline h3 del,
.bt_bb_headline h4 del,
.bt_bb_headline h5 del,
.bt_bb_headline h6 del{color: {$accentColor};}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_date{font-family: \"{$headingSuperTitleFont}\";}
.bt_bb_latest_posts_item .bt_bb_latest_posts_item_title{
    color: {$accentColor};}
.bt_bb_button .bt_bb_button_text{
    font-family: \"{$headingFont}\";}
.bt_bb_service:hover .bt_bb_service_content_title a{color: {$accentColor};}
button.slick-arrow:before{
    color: {$accentColor};}
.btLightSkin .bt_bb_content_slider .slick-dots li{border-color: {$accentColor};}
.btLightSkin .slick-dots li.slick-active,
.slick-dots li:hover{background: {$accentColor};}
.bt_bb_custom_menu div ul a{
    font-family: \"{$headingFont}\";}
.bt_bb_custom_menu div ul a:hover{color: {$accentColor};}
.bt_bb_google_maps .bt_bb_google_maps_content .bt_bb_google_maps_content_wrapper .bt_bb_google_maps_location{
    border: 1px solid {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content{
    border: 1px solid {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price{
    border-bottom: 1px solid {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart .add_to_cart_inline{
    border-top: 1px solid {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart .add_to_cart_inline a{
    font-family: \"{$headingFont}\";}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart .add_to_cart_inline a.added:after,
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart .add_to_cart_inline a.loading:after{
    background-color: {$accentColor};}
.bt_bb_single_product .bt_bb_single_product_content .bt_bb_single_product_price_cart .add_to_cart_inline .added_to_cart{color: {$accentColor};}
.bt_bb_menu_item .bt_bb_menu_item_content .bt_bb_menu_item_title_price{
    font-family: \"{$headingFont}\";}
.bt_bb_menu_item .bt_bb_menu_item_content .bt_bb_menu_item_title_price .bt_bb_menu_item_title:after{
    border-bottom: 1px solid {$accentColor};}
.bt_bb_menu_item .bt_bb_menu_item_content .bt_bb_menu_item_title_price .bt_bb_menu_item_title .bt_bb_icon{
    color: {$accentColor};}
.wpcf7-form .wpcf7-submit{
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor} !important;
    font-family: \"{$headingFont}\" !important;}
.btNewsletterRow .btNewsletterRowInput input{border: 1px solid {$accentColor};}
div.wpcf7-validation-errors{color: {$accentColor};}
.btContactRow .btContactRowInput input{border: 1px solid {$accentColor};}
.btContactRow .btContactRowInput input{border: 1px solid {$accentColor};}
.btContactRow .btContactRowInput textarea{border: 1px solid {$accentColor};}
.wpcf7-not-valid-tip{
    background: {$accentColor};}
.wpcf7-validation-errors{
    background-color: {$accentColor} !important;}
.products ul li.product .btWooShopLoopItemInner .bt_bb_headline,
ul.products li.product .btWooShopLoopItemInner .bt_bb_headline{border: 1px solid {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .bt_bb_headline h2,
ul.products li.product .btWooShopLoopItemInner .bt_bb_headline h2{font-family: {$bodyFont};}
.products ul li.product .btWooShopLoopItemInner .price,
ul.products li.product .btWooShopLoopItemInner .price{
    border-left: 1px solid {$accentColor};
    border-bottom: 1px solid {$accentColor};}
.products ul li.product .btWooShopLoopItemInner a.button,
ul.products li.product .btWooShopLoopItemInner a.button{
    font-family: {$headingFont};}
.products ul li.product .btWooShopLoopItemInner .added:after,
.products ul li.product .btWooShopLoopItemInner .loading:after,
ul.products li.product .btWooShopLoopItemInner .added:after,
ul.products li.product .btWooShopLoopItemInner .loading:after{
    background-color: {$accentColor};}
.products ul li.product .btWooShopLoopItemInner .added_to_cart,
ul.products li.product .btWooShopLoopItemInner .added_to_cart{
    color: {$accentColor};}
.products ul li.product .onsale,
ul.products li.product .onsale{
    background: {$accentColor};}
nav.woocommerce-pagination ul li a,
nav.woocommerce-pagination ul li span{
    border: 1px solid {$accentColor};
    color: {$accentColor};}
nav.woocommerce-pagination ul li a:focus,
nav.woocommerce-pagination ul li a:hover,
nav.woocommerce-pagination ul li a.next,
nav.woocommerce-pagination ul li a.prev,
nav.woocommerce-pagination ul li span.current{background: {$accentColor};}
div.product .onsale{
    background: {$alternateColor};}
div.product div.images .woocommerce-product-gallery__trigger:after{
    -webkit-box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 2em {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;}
div.product div.images .woocommerce-product-gallery__trigger:hover:after{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    box-shadow: 0 0 0 1px {$accentColor} inset,0 0 0 2em rgba(255,255,255,.5) inset;
    color: {$accentColor};}
table.shop_table .coupon .input-text{
    color: {$accentColor};}
table.shop_table td.product-remove a.remove{
    color: {$accentColor};
    border: 1px solid {$accentColor};}
table.shop_table td.product-remove a.remove:hover{background-color: {$accentColor};}
ul.wc_payment_methods li .about_paypal{
    color: {$accentColor};}
#place-order{font-family: {$headingFont};}
.woocommerce-MyAccount-navigation ul li a{
    border-bottom: 2px solid {$accentColor};}
.woocommerce-info a: not(.button),
.woocommerce-message a: not(.button){color: {$accentColor};}
.woocommerce-message:before,
.woocommerce-info:before{
    color: {$accentColor};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{
    font-family: {$headingFont};}
.woocommerce .btSidebar a.button,
.woocommerce .btContent a.button,
.woocommerce-page .btSidebar a.button,
.woocommerce-page .btContent a.button,
.woocommerce .btSidebar input[type=\"submit\"],
.woocommerce .btContent input[type=\"submit\"],
.woocommerce-page .btSidebar input[type=\"submit\"],
.woocommerce-page .btContent input[type=\"submit\"],
.woocommerce .btSidebar button[type=\"submit\"],
.woocommerce .btContent button[type=\"submit\"],
.woocommerce-page .btSidebar button[type=\"submit\"],
.woocommerce-page .btContent button[type=\"submit\"],
.woocommerce .btSidebar input.button,
.woocommerce .btContent input.button,
.woocommerce-page .btSidebar input.button,
.woocommerce-page .btContent input.button,
.woocommerce .btSidebar input.alt:hover,
.woocommerce .btContent input.alt:hover,
.woocommerce-page .btSidebar input.alt:hover,
.woocommerce-page .btContent input.alt:hover,
.woocommerce .btSidebar a.button.alt:hover,
.woocommerce .btContent a.button.alt:hover,
.woocommerce-page .btSidebar a.button.alt:hover,
.woocommerce-page .btContent a.button.alt:hover,
.woocommerce .btSidebar .button.alt:hover,
.woocommerce .btContent .button.alt:hover,
.woocommerce-page .btSidebar .button.alt:hover,
.woocommerce-page .btContent .button.alt:hover,
.woocommerce .btSidebar button.alt:hover,
.woocommerce .btContent button.alt:hover,
.woocommerce-page .btSidebar button.alt:hover,
.woocommerce-page .btContent button.alt:hover,
div.woocommerce a.button,
div.woocommerce input[type=\"submit\"],
div.woocommerce button[type=\"submit\"],
div.woocommerce input.button,
div.woocommerce input.alt:hover,
div.woocommerce a.button.alt:hover,
div.woocommerce .button.alt:hover,
div.woocommerce button.alt:hover{border: 1px solid {$accentColor};
    color: {$accentColor};}
.woocommerce .btSidebar a.button:hover,
.woocommerce .btContent a.button:hover,
.woocommerce-page .btSidebar a.button:hover,
.woocommerce-page .btContent a.button:hover,
.woocommerce .btSidebar input[type=\"submit\"]:hover,
.woocommerce .btContent input[type=\"submit\"]:hover,
.woocommerce-page .btSidebar input[type=\"submit\"]:hover,
.woocommerce-page .btContent input[type=\"submit\"]:hover,
.woocommerce .btSidebar button[type=\"submit\"]:hover,
.woocommerce .btContent button[type=\"submit\"]:hover,
.woocommerce-page .btSidebar button[type=\"submit\"]:hover,
.woocommerce-page .btContent button[type=\"submit\"]:hover,
.woocommerce .btSidebar input.button:hover,
.woocommerce .btContent input.button:hover,
.woocommerce-page .btSidebar input.button:hover,
.woocommerce-page .btContent input.button:hover,
.woocommerce .btSidebar input.alt,
.woocommerce .btContent input.alt,
.woocommerce-page .btSidebar input.alt,
.woocommerce-page .btContent input.alt,
.woocommerce .btSidebar a.button.alt,
.woocommerce .btContent a.button.alt,
.woocommerce-page .btSidebar a.button.alt,
.woocommerce-page .btContent a.button.alt,
.woocommerce .btSidebar .button.alt,
.woocommerce .btContent .button.alt,
.woocommerce-page .btSidebar .button.alt,
.woocommerce-page .btContent .button.alt,
.woocommerce .btSidebar button.alt,
.woocommerce .btContent button.alt,
.woocommerce-page .btSidebar button.alt,
.woocommerce-page .btContent button.alt,
div.woocommerce a.button:hover,
div.woocommerce input[type=\"submit\"]:hover,
div.woocommerce button[type=\"submit\"]:hover,
div.woocommerce input.button:hover,
div.woocommerce input.alt,
div.woocommerce a.button.alt,
div.woocommerce .button.alt,
div.woocommerce button.alt{border: 1px solid {$accentColor};}
.star-rating span:before{
    color: {$accentColor};}
p.stars a[class^=\"star-\"].active:after,
p.stars a[class^=\"star-\"]:hover:after{color: {$accentColor};}
.btQuoteBooking .btContactNext{
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor};}
.btQuoteBooking .btContactNext:focus,
.btQuoteBooking .btContactNext:hover{-webkit-box-shadow: 0 0 0 2em {$accentColor} inset;
    box-shadow: 0 0 0 2em {$accentColor} inset;}
.btQuoteBooking .btContactNext:hover,
.btQuoteBooking .btContactNext:active{background-color: {$accentColor} !important;}
.btQuoteBooking .btQuoteSwitch.on .btQuoteSwitchInner{
    background: {$accentColor};}
.btQuoteBooking input[type=\"text\"]:focus,
.btQuoteBooking input[type=\"email\"]:focus,
.btQuoteBooking input[type=\"password\"]:focus,
.btQuoteBooking textarea:focus,
.btQuoteBooking .fancy-select .trigger:focus,
.btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btLightSkin .btQuoteBooking input[type=\"text\"]:focus,
.bt_bb_color_scheme_2 .btQuoteBooking input[type=\"text\"]:focus,
.bt_bb_color_scheme_4 .btQuoteBooking input[type=\"text\"]:focus,
.bt_bb_color_scheme_5 .btQuoteBooking input[type=\"text\"]:focus,
.btLightSkin .btQuoteBooking input[type=\"email\"]:focus,
.bt_bb_color_scheme_2 .btQuoteBooking input[type=\"email\"]:focus,
.bt_bb_color_scheme_4 .btQuoteBooking input[type=\"email\"]:focus,
.bt_bb_color_scheme_5 .btQuoteBooking input[type=\"email\"]:focus,
.btLightSkin .btQuoteBooking input[type=\"password\"]:focus,
.bt_bb_color_scheme_2 .btQuoteBooking input[type=\"password\"]:focus,
.bt_bb_color_scheme_4 .btQuoteBooking input[type=\"password\"]:focus,
.bt_bb_color_scheme_5 .btQuoteBooking input[type=\"password\"]:focus,
.btLightSkin .btQuoteBooking textarea:focus,
.bt_bb_color_scheme_2 .btQuoteBooking textarea:focus,
.bt_bb_color_scheme_4 .btQuoteBooking textarea:focus,
.bt_bb_color_scheme_5 .btQuoteBooking textarea:focus,
.btLightSkin .btQuoteBooking .fancy-select .trigger:focus,
.bt_bb_color_scheme_2 .btQuoteBooking .fancy-select .trigger:focus,
.bt_bb_color_scheme_4 .btQuoteBooking .fancy-select .trigger:focus,
.bt_bb_color_scheme_5 .btQuoteBooking .fancy-select .trigger:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt_bb_color_scheme_2 .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt_bb_color_scheme_4 .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt_bb_color_scheme_5 .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btLightSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt_bb_color_scheme_2 .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt_bb_color_scheme_4 .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt_bb_color_scheme_5 .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btDarkSkin .btQuoteBooking input[type=\"text\"]:focus,
.bt_bb_color_scheme_1 .btQuoteBooking input[type=\"text\"]:focus,
.bt_bb_color_scheme_3 .btQuoteBooking input[type=\"text\"]:focus,
.bt_bb_color_scheme_6 .btQuoteBooking input[type=\"text\"]:focus,
.btDarkSkin .btQuoteBooking input[type=\"email\"]:focus,
.bt_bb_color_scheme_1 .btQuoteBooking input[type=\"email\"]:focus,
.bt_bb_color_scheme_3 .btQuoteBooking input[type=\"email\"]:focus,
.bt_bb_color_scheme_6 .btQuoteBooking input[type=\"email\"]:focus,
.btDarkSkin .btQuoteBooking input[type=\"password\"]:focus,
.bt_bb_color_scheme_1 .btQuoteBooking input[type=\"password\"]:focus,
.bt_bb_color_scheme_3 .btQuoteBooking input[type=\"password\"]:focus,
.bt_bb_color_scheme_6 .btQuoteBooking input[type=\"password\"]:focus,
.btDarkSkin .btQuoteBooking textarea:focus,
.bt_bb_color_scheme_1 .btQuoteBooking textarea:focus,
.bt_bb_color_scheme_3 .btQuoteBooking textarea:focus,
.bt_bb_color_scheme_6 .btQuoteBooking textarea:focus,
.btDarkSkin .btQuoteBooking .fancy-select .trigger:focus,
.bt_bb_color_scheme_1 .btQuoteBooking .fancy-select .trigger:focus,
.bt_bb_color_scheme_3 .btQuoteBooking .fancy-select .trigger:focus,
.bt_bb_color_scheme_6 .btQuoteBooking .fancy-select .trigger:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt_bb_color_scheme_1 .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt_bb_color_scheme_3 .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.bt_bb_color_scheme_6 .btQuoteBooking .ddcommon.borderRadius .ddTitleText:focus,
.btDarkSkin .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt_bb_color_scheme_1 .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt_bb_color_scheme_3 .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus,
.bt_bb_color_scheme_6 .btQuoteBooking .ddcommon.borderRadiusTp .ddTitleText:focus{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{
    -webkit-box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);
    box-shadow: 5px 0 0 {$accentColor} inset,0 2px 10px rgba(0,0,0,.2);}
.btQuoteBooking .ui-slider .ui-slider-handle{
    background: {$accentColor};}
.btQuoteBooking .btQuoteBookingForm .btQuoteTotal{
    background: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError input,
.btQuoteBooking .btContactFieldMandatory.btContactFieldError textarea{-webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    border-color: {$accentColor};}
.btQuoteBooking .btContactFieldMandatory.btContactFieldError .dd.ddcommon.borderRadius .ddTitleText{-webkit-box-shadow: 0 0 0 2px {$accentColor} inset;
    box-shadow: 0 0 0 2px {$accentColor} inset;}
.btQuoteBooking .btSubmitMessage{color: {$accentColor};}
.btDatePicker .ui-datepicker-header{
    background-color: {$accentColor};}
.btQuoteBooking .dd.ddcommon.borderRadiusTp .ddTitleText,
.btQuoteBooking .dd.ddcommon.borderRadiusBtm .ddTitleText{-webkit-box-shadow: 0 0 4px 0 {$accentColor};
    box-shadow: 0 0 4px 0 {$accentColor};}
.btQuoteBooking .btContactSubmit{
    -webkit-box-shadow: 0 0 0 1px {$accentColor} inset;
    box-shadow: 0 0 0 1px {$accentColor} inset;
    color: {$accentColor} !important;}
.btQuoteBooking .btContactSubmit:focus,
.btQuoteBooking .btContactSubmit:hover{-webkit-box-shadow: 0 0 0 2em {$accentColor} inset;
    box-shadow: 0 0 0 2em {$accentColor} inset;}
.btPayPalButton:hover{-webkit-box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);
    box-shadow: 0 0 0 {$accentColor} inset,0 1px 5px rgba(0,0,0,.2);}
.bt_cc_email_confirmation_container [type=\"checkbox\"]:checked + label:before{border-color: {$accentColor};
    background: {$accentColor};}
@media (min-width: 1400px){body.btBoxedPage.btPageBorderStyle_dark .btContent,
body.btBoxedPage.btPageBorderStyle_light .btContent,
body.btBoxedPage.btPageBorderStyle_accent .btContent,
body.btBoxedPage.btPageBorderStyle_alternate .btContent{padding: 0 {$logoHeight}px;}
body:not(.btBoxedMenu).btPageBorderStyle_dark .mainHeader,
body:not(.btBoxedMenu).btPageBorderStyle_light .mainHeader,
body:not(.btBoxedMenu).btPageBorderStyle_accent .mainHeader,
body:not(.btBoxedMenu).btPageBorderStyle_alternate .mainHeader{padding: 0 {$logoHeight}px;}
}body.btPageBorderStyle_accent{border-color: {$accentColor};}
.btMenuHorizontal.btStickyHeaderActive.btStickyHeaderOpen.btPageBorderStyle_accent .mainHeader,
.btMenuVertical.btStickyHeaderActive.btStickyHeaderOpen.btPageBorderStyle_accent .btVerticalHeaderTop{border-color: {$accentColor};}
", array() );