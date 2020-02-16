<?php

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
 * Make changes to the archive-product.php page in the theme
 * 
 * */
// Remove breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
// Add description to product listing
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt' );
?>