<?php

// Disable default WooCommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function traptreatz_files() {
  wp_enqueue_script( 'traptreatz-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true );
  wp_enqueue_style( 'traptreatz_styles', get_stylesheet_uri(), NULL, microtime() );
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
 * Change 'Selected Options' text on variable product button to 'Choose Flavors'
 *
 **/
add_filter( 'woocommerce_product_add_to_cart_text', function( $text ) {
	global $product;
	if ( $product->is_type( 'variable' ) ) {
		$text = $product->is_purchasable() ? __( 'Choose Flavor', 'woocommerce' ) : __( 'Read more', 'woocommerce' );
	}
	return $text;
}, 10 );

?>