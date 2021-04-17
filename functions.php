<?php
function n_chile_script_enqueue(){
//css
	wp_enqueue_style( 'n_chile-stylesheet', get_template_directory_uri() . '/css/n_chile.css', array(), '1.0.0', 'all' );
  //js
  // unregister jQuery
  wp_deregister_script('jquery-core');
  wp_deregister_script('jquery');

  // register
  wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
  wp_register_script( 'jquery', false, array('jquery-core'), null, true );

  // enqueue
  wp_enqueue_script( 'jquery' );
  // Bootstrap
  wp_enqueue_script( 'bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', array('jquery'), null, true );
  // ScrollMagic
  wp_enqueue_script( 'scroll-magic-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.js', array('jquery'), null, true );
  wp_enqueue_script( 'add-indicators-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array('jquery', 'scroll-magic-js'), null, true );
  // GSAP
  wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.0/gsap.min.js', array('jquery'), null, true );
  wp_enqueue_script( 'gsap-animation-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', array('jquery', 'gsap-js'), null, true );


  wp_enqueue_script( 'n_chile-js', get_template_directory_uri() . '/js/n_chile.js', array('jquery', 'scroll-magic-js', 'gsap-js', 'bootstrap-js'), null, true );

}
add_action( 'wp_enqueue_scripts', 'n_chile_script_enqueue' );

function n_chile_theme_setup(){
  add_theme_support('menus');
  register_nav_menu('primary', 'Primary Header Navigation');
}
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


add_action('init', 'n_chile_theme_setup');
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-formats', array('aside', 'chat', 'gallery','link','image','quote','status','video'));
add_theme_support('post-thumbnails');
add_theme_support('widgets');

// Remove woocommerce breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
// Remove shop page result count
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
// Remove shop page catalog ordering
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
//Remove shop page ???
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
// Hide shop page title
add_filter('woocommerce_show_page_title', 'hide_shop_page_title');

function hide_shop_page_title(){
	return false;
}

add_filter('single_product_archive_thumbnail_size', 'set_picture_size');

 function set_picture_size()
{
	$result = 'full_size';
	return $result;
}
// Move checkout payment form order review to after order review
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_after_order_review', 'woocommerce_checkout_payment', 10 );

// Add product thumbnail to checkout order review
add_filter( 'woocommerce_cart_item_name', 'bv_image_on_checkout', 10, 3 );

function n_chile_image_on_checkout( $name, $cart_item, $cart_item_key ) {  

    /* Return if not checkout page */
    if ( ! is_checkout() ) {
        return $name;
    }

    /* Get product object */
    $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

    /* Get product thumbnail */
    $thumbnail = $_product->get_image();

    /* Add wrapper to image and add some css */
    $image = '<div class="ts-product-image" style="width: 52px; height: 45px; display: inline-block; padding-right: 7px; vertical-align: middle;">'
                . $thumbnail .
            '</div>';

    /* Prepend image to name and return it */
    return $image . $name;

}
?>
