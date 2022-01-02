<?php

function custom_load_scripts() {
    // wp_deregister_script('wp-embed');
    // wp_deregister_style('wp-block-library');
    // wp_deregister_style('wp-block-library-theme');
    // wp_deregister_script('jquery');
    //
    // wp_register_script('jquery', "https://code.jquery.com/jquery-3.4.1.min.js", array(), '3.4.1');

    // wp_enqueue_style('bootstrap-4-custom', get_template_directory_uri().'/css/bootstrap-4-custom.css', array(), '4.5.3');
    wp_enqueue_style('main-style', get_stylesheet_uri(), null, '1.2.0');
    wp_enqueue_script('filterizr', get_template_directory_uri().'/js/vendor/jquery.filterizr.min.js', array('jquery'), '1.2.0', true);
    wp_enqueue_script('main-script', get_template_directory_uri().'/js/dist/main.min.js', array('jquery'), '1.2.0', true);
}
add_action('wp_enqueue_scripts', 'custom_load_scripts');

function custom_js_defer_attr($tag){
  if(!is_admin()) return str_replace(' src', ' defer="defer" src', $tag);
  else return $tag;
}
add_filter('script_loader_tag', 'custom_js_defer_attr', 10);
