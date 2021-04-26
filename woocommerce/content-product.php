<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li class="col-md-6 col-sm-12 col-12 product-list changed" <?php wc_product_class( '', $product ); ?>>
    <div class="row no_margin_row">
        <?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	?>
        <div class="product_image_wrapper col-sm-6 col-12">
            <?php do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	if (!empty($product->get_id())) { 
		
		$wr360config = esc_url(get_post_meta($product->get_id(), "_wr360config", true));
    	$wr360root = esc_url(get_post_meta($product->get_id(), "_wr360root", true));
		 	
		if (!empty($wr360config)) {
			$code_srt = '[wr360embed name="' . $product->get_slug() . '" width="100%" height="500px" config="' . $wr360root . $wr360config . '"]';
			
			echo do_shortcode($code_srt);
			
		} else {
			do_action( 'woocommerce_before_shop_loop_item_title' );
		}

	} else {
		do_action( 'woocommerce_before_shop_loop_item_title' );
	}

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	//do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	?>
        </div>
        <div class="product_description_wrapper col-sm-6 col-12">
            <div class="product_content_wraper">
                <?php do_action( 'woocommerce_shop_loop_item_title' );
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
            </div>
			<?php do_action( 'woocommerce_after_shop_loop_item_description' ); ?>
        </div>
    </div>
</li>