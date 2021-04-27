<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<div class="container-fluid home-container">
    <div class="row">
        <div class="col-12 page_title">
            <h1>PRODUCT</h1>
        </div>
    </div>
    <div class="row">
	<div class="col-md-2 col-sm-1 col-1 contact-grid-left">
        <div class="contact-cell-left-1 bg_color_black" ></div>
        <div class="contact-cell-left-2 bg_color_red" ></div>
        <div class="contact-cell-left-3 bg_color_white"></div>
        <div class="contact-cell-left-4 bg_color_rose"></div>
        <div class="contact-cell-left-5 bg_color_green"></div>
        <div class="contact-cell-left-6 bg_color_blue"></div>
        <div class="contact-cell-left-7 bg_color_black"></div>
        </div>

        <div class="col-md-8 col-sm-10 col-10 single_product_content">

            <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

            <?php while ( have_posts() ) : ?>
            <?php the_post(); ?>

            <?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endwhile; // end of the loop. ?>

            <?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

            <?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
        </div>
		<div class="col-md-2 col-sm-1 col-1 contact-grid-right">
        <div class="contact-cell-right-1 bg_color_white" ></div>
        <div class="contact-cell-right-2 bg_color_blue" ></div>
        <div class="contact-cell-right-3 g_color_green"></div>
        <div class="contact-cell-right-4 g_color_green"></div>
        <div class="contact-cell-right-5 bg_color_rose"></div>
        <div class="contact-cell-right-6 bg_color_red"></div>
        <div class="contact-cell-right-7 bg_color_black"></div>
        </div>
    </div>
</div>

<?php
get_footer( 'shop' );


/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */