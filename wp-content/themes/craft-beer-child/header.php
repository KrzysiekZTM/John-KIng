<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> <?php boldthemes_theme_data(); ?>>
<head>

<?php

	boldthemes_set_override();
	boldthemes_header_init();
	boldthemes_header_meta();

	$body_style = '';

	$page_background = boldthemes_get_option( 'page_background' );
	if ( $page_background ) {
		if ( is_numeric( $page_background ) ) {
			$page_background = wp_get_attachment_image_src( $page_background, 'full' );
			$page_background = $page_background[0];
		}
		$body_style = ' style="background-image:url(' . $page_background . ')"';
	}

	$header_extra_class = '';

	if ( boldthemes_get_option( 'boxed_menu' ) ) {
		$header_extra_class .= 'gutter ';
	}

	wp_head(); ?>

</head>

<body <?php body_class(); ?> <?php echo wp_kses_post( $body_style ); ?>>
<?php

echo boldthemes_preloader_html(); ?>

<div class="btPageWrap" id="top">
	<?php if(is_user_logged_in()): ?>
    <div class="btVerticalHeaderTop">
		<?php if ( has_nav_menu( 'primary' ) ) { ?>
		<div class="btVerticalMenuTrigger"><?php echo boldthemes_get_icon_html( array( "icon" => "fa_f0c9", "url" => "#" ) ); ?></div>
		<?php } ?>
		<div class="btLogoArea">
			<div class="logo">
				<span>
					<?php boldthemes_logo( 'header' ); ?>
				</span>
			</div><!-- /logo -->
		</div><!-- /btLogoArea -->
	</div>
<?php endif;?>
	<?php if(is_user_logged_in()): ?>
	<header class="mainHeader btClear <?php echo esc_attr( $header_extra_class ); ?>">
		<div class="mainHeaderInner">
			<?php echo boldthemes_top_bar_html( 'top' ); ?>
			<div class="btLogoArea menuHolder btClear">
				<div class="port">
					<?php if ( has_nav_menu( 'primary' ) ) { ?>
						<div class="btHorizontalMenuTrigger">&nbsp;<?php echo boldthemes_get_icon_html( array( "icon" => "fa_f0c9", "url" => "#" ) ); ?></div>
					<?php } ?>
					<div class="logo">
						<span>
							<?php boldthemes_logo( 'header' ); ?>
						</span>
					</div><!-- /logo -->
					<?php
						if ( boldthemes_get_option( 'menu_type' ) == 'horizontal-below-right' || boldthemes_get_option( 'menu_type' ) == 'horizontal-below-center' || boldthemes_get_option( 'menu_type' ) == 'horizontal-below-left' || boldthemes_get_option( 'menu_type' ) == 'vertical-left' || boldthemes_get_option( 'menu_type' ) == 'vertical-right' ) {
							echo boldthemes_top_bar_html( 'logo' );
							echo '</div><!-- /port --></div><!-- /menuHolder -->';
							echo '<div class="btBelowLogoArea btClear"><div class="port">';
						}
					?>
					<div class="menuPort">
						<div class="cart_myaccount_container">
								<div class="cart_myaccount">
									<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') );?>"><i class="icon-user"></i></a>
									<a href="<?php echo wc_get_cart_url() ?>">
										<i class="icon-basket"></i>
										<?php if(WC()->cart->get_cart_contents_count() > 0 && !is_cart()): ?>
											<div class="number_of_items_in_cart">
												<?php echo WC()->cart->get_cart_contents_count(); ?>
											</div>
										<?php endif; ?>
									</a>
								</div>
						</div>
						<?php echo boldthemes_top_bar_html( 'menu' ); ?>
						<nav>
							<?php boldthemes_nav_menu(); ?>
						</nav>
					</div><!-- .menuPort -->
				</div><!-- /port -->
			</div><!-- /menuHolder / btBelowLogoArea -->
		</div><!-- / inner header for scrolling -->
    </header><!-- /.mainHeader -->
	<?php endif; ?>
	<div class="btContentWrap btClear">
		<?php
		$hide_headline = boldthemes_get_option( 'hide_headline' );
		if ( ( ( !$hide_headline && !is_404() ) || is_search() ) ) {
			boldthemes_header_headline( array( 'breadcrumbs' => true ) );
		}
		?>
		<?php if ( BoldThemesFramework::$page_for_header_id != '' && ! is_search() ) { ?>
			<?php
				$content = get_post( BoldThemesFramework::$page_for_header_id );
				$top_content = $content->post_content;
				if ( $top_content != '' ) {
					$top_content = apply_filters( 'the_content', $top_content );
					$top_content = preg_replace( '/data-edit_url="(.*?)"/s', 'data-edit_url="' . get_edit_post_link( BoldThemesFramework::$page_for_header_id, '' ) . '"', $top_content );
					echo '<div class = "btBlogHeaderContent">' . str_replace( ']]>', ']]&gt;', $top_content ) . '</div>';
				}
			?>
		<?php } ?>
		<div class="btContentHolder">

			<div class="btContent">
