<?php

function traptreatz_files() {
  wp_enqueue_script('traptreatz-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
  wp_enqueue_style('traptreatz_styles', get_stylesheet_uri(), NULL, microtime());
  wp_localize_script('traptreatz-js', 'traptreatzData', array(
    'root_url' => get_site_url()
  ));

}

add_action('wp_enqueue_scripts','traptreatz_files');

function traptreatz_features() {
  register_nav_menu('headerNavMenu', 'Header Navigation Menu');
}

add_action('after_setup_theme', 'traptreatz_features');

?>