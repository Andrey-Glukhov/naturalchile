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

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

//Remove shop page ???
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
// Hide shop page title
add_filter('woocommerce_show_page_title', 'hide_shop_page_title');

function hide_shop_page_title(){
	return false;
}

// add_filter('single_product_archive_thumbnail_size', 'set_picture_size');

//  function set_picture_size()
// {
// 	$result = 'full_size';
// 	return $result;
// }
// Move checkout payment form order review to after order review
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_checkout_after_order_review', 'woocommerce_checkout_payment', 10 );

// Add product thumbnail to checkout order review
add_filter( 'woocommerce_cart_item_name', 'n_chile_image_on_checkout', 10, 3 );

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
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
  	/**
	 * Make quantity inputs fot add to cart link 
	 *
	 */
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price',10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price',6);


if ( ! function_exists( 'n_chile_cart_link' ) ) {
	/**
	 * Get  cart link including number of items and sum
	 *
	 */
	function n_chile_cart_link() {
		if ( ! n_chile_cart_available() ) {
			return;
		}
		?>

<li id="menu-item-999" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-7 current_page_item menu-item-999">
  <a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-current="page">
    <svg class="svg-inline--fa fa-shopping-basket fa-w-18 dashicons after-menu-image-icons" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-basket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M576 216v16c0 13.255-10.745 24-24 24h-8l-26.113 182.788C514.509 462.435 494.257 480 470.37 480H105.63c-23.887 0-44.139-17.565-47.518-41.212L32 256h-8c-13.255 0-24-10.745-24-24v-16c0-13.255 10.745-24 24-24h67.341l106.78-146.821c10.395-14.292 30.407-17.453 44.701-7.058 14.293 10.395 17.453 30.408 7.058 44.701L170.477 192h235.046L326.12 82.821c-10.395-14.292-7.234-34.306 7.059-44.701 14.291-10.395 34.306-7.235 44.701 7.058L484.659 192H552c13.255 0 24 10.745 24 24zM312 392V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm112 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24zm-224 0V280c0-13.255-10.745-24-24-24s-24 10.745-24 24v112c0 13.255 10.745 24 24 24s24-10.745 24-24z"></path></svg><!-- <span class="dashicons fas fa-shopping-basket after-menu-image-icons"></span> Font Awesome fontawesome.com -->
    <span class="menu-image-title-after menu-image-title">Cart</span>
    <?php if (WC()->cart->get_cart_contents_count() > 0) { ?>
                <span class="count"> <?php echo wp_kses_data( sprintf( '%d', WC()->cart->get_cart_contents_count())  ); ?></span>
    <?php } ?>
  </a>
</li>
<?php
	}
}
if ( ! function_exists( 'n_chile_cart_available' ) ) {
	/**
	 * Check if  Woo Cart instance is available
	 */
	function n_chile_cart_available() {
		$woo = WC();
		return $woo instanceof \WooCommerce && $woo->cart instanceof \WC_Cart;
	}
}
// add menu cart fragment
add_filter('woocommerce_add_to_cart_fragments', 'n_chile_add_refreshed_fragments');

function n_chile_add_refreshed_fragments($fragments) {
  /**
	 * Get Html fragments to update cart icon
	 */
  ob_start();

  n_chile_cart_link();

  $cart_part = ob_get_clean();
  $new_fragments = [];
  $new_fragments['a.cart-contents'] = $cart_part;
  return $new_fragments;
}

function n_chile_about_link() {
  $about_page = get_page_by_path('my-account');
  
  if ( ! $about_page ) {
    return;
  }?>
<li id="menu-item-998" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-26">
  <a href="<?php echo get_permalink($about_page->ID); ?>">
    <span class="dashicons dashicons-admin-users after-menu-image-icons"></span>
    <span class="menu-image-title-after menu-image-title">My account</span>
  </a>
</li>
<?php }


add_filter( 'wp_nav_menu_items', 'child_theme_menu_items', 10, 2);

function child_theme_menu_items($items, $args) {
  /**
	 * Insert  items to menu fragment 
	 */
    // get array of '<li> ... </li>' strings
    preg_match_all('/<\s*?li\b[^>]*>(.*?)<\/li\b[^>]*>/s', $items, $items_array );
    ob_start();
    n_chile_about_link();
    n_chile_cart_link();
        $cart_part = ob_get_clean();
    $items_array[0][] = $cart_part;
    $items = implode('', $items_array[0]);
    
    return $items;
}

?>
