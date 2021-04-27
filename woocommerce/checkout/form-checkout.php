<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}?>
<div class="container-fluid home-container">
    <div class="row">
        <div class="col-12 page_title">
            <h1>checkout</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">


            <?php do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}?>
        </div>
    </div>
    <div class="row container-row">
        <div class="side-column-left col-md-1 col-sm-2 col-2">
            <div class="grid-cell-left-1 bg_color_green"></div>
            <div class="grid-cell-left-2 bg_color_white"></div>
            <div class="grid-cell-left-3 bg_color_black"></div>
            <div class="grid-cell-left-4 bg_color_rose"></div>
            <div class="grid-cell-left-5 bg_color_white"></div>
            <div class="grid-cell-left-6 bg_color_green"></div>
            <div class="grid-cell-left-7 bg_color_rose"></div>
            <div class="grid-cell-left-8 bg_color_red"></div>
            <div class="grid-cell-left-9 bg_color_white"></div>
            <div class="grid-cell-left-10 bg_color_rose last"></div>
        </div>

        <form name="checkout" method="post" class="checkout woocommerce-checkout col-md-10 col-sm-8 col-8"
            action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

            <?php if ( $checkout->get_checkout_fields() ) : ?>
            <?php error_log('checkout' . print_r($checkout,true)); ?>
            <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

            <div class="col2-set  row" id="customer_details">
                <div class="col-md-6 col-sm-12 billing_details_wrapper">
                    <?php do_action( 'woocommerce_checkout_billing' ); ?>
                    <div class="col-2">
                        <?php do_action( 'woocommerce_checkout_shipping' ); ?>
                    </div>
                </div>
                <?php //do_action( 'woocommerce_checkout_after_customer_details' ); ?>

                <?php endif; ?>
                <div class="col-md-6 col-sm-12 cart_details_wrapper">
                    <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

                    <h3 id="order_review_heading"><?php esc_html_e( 'Cart details', 'woocommerce' ); ?></h3>

                    <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                    </div>
					</div>
					<div class="col-12 cart_details_wrapper">
                <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</div>
            </div>

        </form>

        <div class="side-column-right col-md-1 col-sm-2 col-2">
            <div class="grid-cell-right-1 bg_color_rose"></div>
            <div class="grid-cell-right-2 bg_color_blue"></div>
            <div class="grid-cell-right-3 bg_color_rose"></div>
            <div class="grid-cell-right-4 bg_color_green"></div>
            <div class="grid-cell-right-5 bg_color_red"></div>
            <div class="grid-cell-right-6 bg_color_rose"></div>
            <div class="grid-cell-right-7 bg_color_white"></div>
            <div class="grid-cell-right-8 bg_color_blue last"></div>
        </div>
    </div>

</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>