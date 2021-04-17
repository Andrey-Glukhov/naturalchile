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
		<div class="side-column-left col-md-1 col-sm-2 col-2" >
			<div class="grid-cell-left-1 bg_color_red" ></div>
			<div class="grid-cell-left-2 bg_color_white" ></div>
			<div class="grid-cell-left-3 bg_color_black"></div>
			<div class="grid-cell-left-4 bg_color_rose"></div>
			<div class="grid-cell-left-5 bg_color_white"></div>
			<div class="grid-cell-left-6 bg_color_green"></div>
			<div class="grid-cell-left-7 bg_color_rose"></div>
			<div class="grid-cell-left-8 bg_color_red"></div>
			<div class="grid-cell-left-9 bg_color_white"></div>
			<div class="grid-cell-left-10 bg_color_rose last"></div>        
		</div>
		<div class="content-column col-md-10 col-sm-8 col-8">
			<div class="row">
			<?php 
			do_action( 'woocommerce_account_navigation' ); ?>
			<div class="woocommerce-MyAccount-content col-md-9">
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



