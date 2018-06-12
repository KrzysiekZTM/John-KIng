<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

global $post, $product, $terms;

$cat_count = sizeof( wc_get_product_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( wc_get_product_terms( $post->ID, 'product_tag' ) );

$style_html = '';
$boldthemes_shop_share_settings = apply_filters( 'boldthemes_shop_share_settings', array( 'small', 'outline', 'circle' ) );
$share_html = boldthemes_get_share_html( get_permalink(), 'shop', $boldthemes_shop_share_settings[0], $boldthemes_shop_share_settings[1], $boldthemes_shop_share_settings[2] );
if ( ! empty( $tabs ) ) {
	if ( count( $tabs ) == 1 ) {
		$style_html = 'display:none;" ';
	}
?>

	<div class="product-description">
		<div class="product-info">
			<h3>Informacje</h3>
			<div class="all-atributes">
				<?php foreach($product->get_attributes() as $attribute):
					$attr_name = explode("_", $attribute['name']);
					$attr_name = array_slice($attr_name, 1);
				?>
					<div class="single-attribute">
						<div class="atribute-name">
							<?php echo implode("-", $attr_name).":"; ?>
						</div>
						<div class="attribute-value">
							<?php echo implode(", ",  wc_get_product_terms($product->ID, $attribute['name'])); ?>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="product-dsc">
			<h3>Opis</h3>
			<?php echo $product->get_data()['description']; ?>
		</div>
	</div>

<?php } ?>

<div class="product-meta">
	<div class="btArticleShareEtc">
		<div class="btTagsColumn">
			<?php do_action( 'woocommerce_product_meta_start' ); ?>
			<?php echo '<div class="btTags"><ul>' . wp_kses_post( wc_get_product_tag_list( $product->get_id(), '</li><li> ', '<li>', '</li>' ) ) . '</ul></div>'; ?>
			<?php do_action( 'woocommerce_product_meta_end' ); ?>
		</div>
		<?php if ( $share_html != '' ) echo '<div class="btShareColumn">' . $share_html . '</div>'; ?>
	</div>
</div>
