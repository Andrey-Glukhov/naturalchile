<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
?>
<div class="container-fluid home-container">
    <div class="row">
        <div class="col-12 page_title">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row container-row">
        <div class="col-md-2 col-sm-1 col-1 contact-grid-left">
            <div class="contact-cell-left-1 bg_color_black"></div>
            <div class="contact-cell-left-2 bg_color_red"></div>
            <div class="contact-cell-left-3 bg_color_white"></div>
            <div class="contact-cell-left-4 bg_color_rose"></div>
            <div class="contact-cell-left-5 bg_color_green"></div>
            <div class="contact-cell-left-6 bg_color_blue"></div>
            <div class="contact-cell-left-7 bg_color_black"></div>
        </div>
        <div class="col-md-8 col-sm-10 col-10 my_account_content_wrapper">
            <div class="row">
                <div class="col-12 nav_icons_wrapper">
                    <?php 
			do_action( 'woocommerce_account_navigation' ); ?>
                </div>
                <div class="woocommerce-MyAccount-content col-12">
                    <?php
					/**
					 * My Account content.
					 *
					 * @since 2.6.0
					 */
					do_action( 'woocommerce_account_content' );
				?>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-1 col-1 contact-grid-right">
            <div class="contact-cell-right-1 bg_color_white"></div>
            <div class="contact-cell-right-2 bg_color_blue"></div>
            <div class="contact-cell-right-3 g_color_green"></div>
            <div class="contact-cell-right-4 g_color_green"></div>
            <div class="contact-cell-right-5 bg_color_rose"></div>
            <div class="contact-cell-right-6 bg_color_red"></div>
            <div class="contact-cell-right-7 bg_color_black"></div>
        </div>
    </div>

</div>