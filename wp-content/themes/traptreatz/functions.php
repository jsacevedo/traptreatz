<?php

// Disable default WooCommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function traptreatz_files() {
  wp_enqueue_script( 'polyfill-io', '//polyfill.io/v3/polyfill.js?features=Element.prototype.scrollIntoView', NULL, microtime(), true );
  wp_enqueue_script( 'traptreatz-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true );
  wp_enqueue_style( 'traptreatz_styles', get_stylesheet_uri(), NULL, microtime() );
  wp_enqueue_style( 'font-awesome-free', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css', NULL, microtime() );
  wp_localize_script( 'traptreatz-js', 'traptreatzData', array(
    'root_url' => get_site_url()
  ));
}

add_action( 'wp_enqueue_scripts','traptreatz_files');

function traptreatz_features() {
  register_nav_menu( 'headerNavMenu', 'Header Navigation Menu' );
}

add_action( 'after_setup_theme', 'traptreatz_features' );

/* 
 * Add WooCommerce support to theme
 * 
 * */
function traptreatz_add_woocommerce_support() {
  add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'traptreatz_add_woocommerce_support' );

/*
 * Edit 'Add To Cart' text on buttons
 * 1. Change 'Add To Cart' to 'Add To Bag'
 * 2. Change 'Selected Options' text on variable product button to 'Choose Flavors'
 *
 * */

// Change 'Add To Cart' text on button to read 'Add To Bag' for single product views
add_filter( 'woocommerce_product_single_add_to_cart_text', 'traptreatz_custom_single_add_to_cart_text' );
function traptreatz_custom_single_add_to_cart_text() {
  return __( 'Add To Bag', 'woocommerce' );
}

// Change 'Selected Options' text on variable product button to 'Choose Flavors'
// If not a variable product, change it to 'Add To Bag'
add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		$text = $product->is_purchasable() ? __( 'Choose Flavor', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
	} else {
    $text = $product->is_purchasable() ? __( 'Add To Bag', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
  }
	return $text;
}, 10 );

/*
 * Edit single-product.php page
 * 
 * */

 // Remove breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Remove sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

// Reorder items in the product description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

// Add product-description-container
add_action( 'woocommerce_single_product_summary', 'traptreatz_product_description', 7 );
function traptreatz_product_description() {
  echo '
    <div class="product-description-container">
      <h2>Description</h2>';
  echo the_content() . '</div>';
}

// Open full-details-container div
add_action( 'woocommerce_single_product_summary', 'open_traptreatz_full_details', 10 );
function open_traptreatz_full_details() {
  echo '<div class="full-details-container">';
}

// Open product-details-container div
add_action( 'woocommerce_single_product_summary', 'open_traptreatz_product_details', 15 );
function open_traptreatz_product_details() {
  echo '<div class="product-details-container">';
}

// Create the product-sharing-container div
add_action( 'woocommerce_single_product_summary', 'traptreatz_product_sharing', 20 );
function traptreatz_product_sharing() {
  echo '
    <div class="product-sharing-container">
      <h2>Share</h2>
      <div class="social-media-icons">
        <button type="button" class="social-media-icon"><i class="fab fa-facebook-f"></i></button>
        <button type="button" class="social-media-icon"><i class="fab fa-instagram"></i></button>
        <button type="button" class="social-media-icon"><i class="fab fa-twitter"></i></button>
      </div>
    </div>
  ';
}

  // Add the price into the template
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

// Close product-details-container div
add_action( 'woocommerce_single_product_summary', 'close_traptreatz_product_details', 26 );
function close_traptreatz_product_details() {
  echo '</div>';
}

add_action( 'woocommerce_before_add_to_cart_quantity', 'traptreatz_display_quantity_minus', 29 );
function traptreatz_display_quantity_minus() {
  echo '<div class="quantity-container">';
  echo '<h2>qty</h2>';
  echo '<div class="quantity-display">';
  echo '<button type="button" class="quantity-minus"><i class="fas fa-minus"></i></button>';
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'traptreatz_display_quantity_plus', 32 );
function traptreatz_display_quantity_plus() {
  echo '<button type="button" class="quantity-plus"><i class="fas fa-plus"></i></button>';
  echo '</div>';
  echo '</div>';
}

// Close the full-details-container div
add_action( 'woocommerce_single_product_summary', 'close_traptreatz_full_details', 40 );
function close_traptreatz_full_details() {
  echo '</div>';
}

include get_theme_file_path('./includes/cart_customizations.php');

/* // Add contact Information heading
add_action( 'woocommerce_before_checkout_form', 'traptreatz_checkout_contact_info_heading' );

function traptreatz_checkout_contact_info_heading() {
  echo '<h2>Contact Information</h2>';
} */

// Removes Order Notes Title - Additional Information & Notes Field
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// Add placeholders to fields
add_filter( 'woocommerce_checkout_fields' , 'traptreatz_custom_checkout_fields', 9999 );

function traptreatz_custom_checkout_fields( $fields ) {
  // Remove labels from all fields (billing and shipping)
  $fields['billing']['billing_first_name']['label'] = '';
  $fields['billing']['billing_last_name']['label'] = '';
  $fields['billing']['billing_company']['label'] = '';
  $fields['billing']['billing_address_1']['label'] = '';
  $fields['billing']['billing_address_2']['label'] = '';
  $fields['billing']['billing_city']['label'] = '';
  $fields['billing']['billing_country']['label'] = '';
  $fields['billing']['billing_state']['label'] = '';
  $fields['billing']['billing_postcode']['label'] = '';
  $fields['billing']['billing_phone']['label'] = '';
  $fields['billing']['billing_email']['label'] = '';
  $fields['shipping']['shipping_first_name']['label'] = '';
  $fields['shipping']['shipping_last_name']['label'] = '';
  $fields['shipping']['shipping_company']['label'] = '';
  $fields['shipping']['shipping_address_1']['label'] = '';
  $fields['shipping']['shipping_address_2']['label'] = '';
  $fields['shipping']['shipping_city']['label'] = '';
  $fields['shipping']['shipping_postcode']['label'] = '';
  $fields['shipping']['shipping_country']['label'] = '';
  $fields['shipping']['shipping_state']['label'] = '';

  // Add placeholders to all fields (billing and shipping)
  $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
  $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
  $fields['billing']['billing_company']['placeholder'] = 'Company Name';
  $fields['billing']['billing_address_2']['placeholder'] = 'Apartment, Suite, etc. (optional)';
  $fields['billing']['billing_city']['placeholder'] = 'City';
  $fields['billing']['billing_country']['placeholder'] = 'Country/Region';
  $fields['billing']['billing_state']['placeholder'] = 'State';
  $fields['billing']['billing_postcode']['placeholder'] = 'Zip Code';
  $fields['billing']['billing_phone']['placeholder'] = 'Phone';
  $fields['billing']['billing_email']['placeholder'] = 'Email';
  $fields['shipping']['shipping_first_name']['placeholder'] = 'First Name';
  $fields['shipping']['shipping_last_name']['placeholder'] = 'Last Name';
  $fields['shipping']['shipping_company']['placeholder'] = 'Company Name';
  $fields['shipping']['shipping_address_2']['placeholder'] = 'Apartment, Suite, etc. (optional)';
  $fields['shipping']['shipping_city']['placeholder'] = 'City';
  $fields['shipping']['shipping_postcode']['placeholder'] = 'Zip Code';
  $fields['shipping']['shipping_country']['placeholder'] = 'Country/Region';
  $fields['shipping']['shipping_state']['placeholder'] = 'State';

  // Change priorities of Email and Country fields
  $fields['billing']['billing_email']['priority'] = 5;
  $fields['billing']['billing_company']['priority'] = 30;
  $fields['billing']['billing_country']['priority'] = 95;
  $fields['shipping']['shipping_company']['priority'] = 25;
  $fields['shipping']['shipping_country']['priority'] = 95;

  // Remove Order Comments field
  unset($fields['order']['order_comments']);

  // Set the second address line to optional
  $fields['billing']['billing_address_2']['required'] = false;
  $fields['shipping']['shipping_address_2']['required'] = false;

  return $fields;
}

// Used to overwrite 'shipping_address_1' placeholder
add_filter( 'woocommerce_default_address_fields', 'traptreatz_checkout_custom_default' );
 
function traptreatz_checkout_custom_default( $fields ) {
  $fields['address_1']['placeholder'] = 'Address';
	// $fields['country']['priority'] = 72;
	
	return $fields;
}

add_action( 'woocommerce_form_field_text','traptreatz_custom_heading', 10, 2 );

function traptreatz_custom_heading( $field, $key ){
  // will only execute if the field is billing_company and we are on the checkout page...
  if ( is_checkout() && ( $key == 'billing_address_1' ) ) {
      $field = '<h2>' . __('Billing Address') . '</h2>' . $field;
  }
  return $field;
}

function woocommerce_button_proceed_to_checkout() {
  $checkout_url = WC()->cart->get_checkout_url(); ?>

  <a href="<?php echo $checkout_url; ?>" class="checkout-button button alt wc-forward"><?php _e( 'Check Out', 'woocommerce' ); ?></a>
<?php }

// Disable coupon code field from top of checkout page
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

// Add coupon code field after list of items in cart
add_action( 'woocommerce_checkout_order_review', 'traptreatz_display_coupon_form', 15 );
 
function traptreatz_display_coupon_form() { ?> 
  <form class="woocommerce-coupon-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php if ( wc_coupons_enabled() ) { ?>
      <div class="coupon under-checkout-form">
        <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" style="width: 100%" /> 
        <button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" style="width: 100%"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
      </div>
    <?php } ?>
  </form>
<?php }

// Open div for shipping in checkout
add_filter( 'woocommerce_review_order_before_shipping', 'traptreatz_open_shipping_div' );
function traptreatz_open_shipping_div() {
  echo '<div class="checkout-shipping-wrapper">';
}

// Change "Shipping" string text to <h2>Shipping</h2>
add_filter( 'woocommerce_shipping_package_name', 'traptreatz_shipping_package_name' );
function traptreatz_shipping_package_name( $name ) {
  return '<h3>Shipping</h3>';
}

// Close div for shipping in checkout
add_filter( 'woocommerce_review_order_after_shipping', 'traptreatz_close_shipping_div' );
function traptreatz_close_shipping_div() {
  echo '</div>';
}