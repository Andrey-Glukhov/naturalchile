<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 page_title">
            <h1>PRODUCT</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-sm-2 col-2 side-column-left">
            <div class="grid-cell-left-1 bg_color_red"></div>
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
        <div class="col-md-10 col-sm-8 col-8 single-product-wrapper">
            <ul class="row products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">