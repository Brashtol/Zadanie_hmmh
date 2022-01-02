<?php

include("inc/enqueue_scripts.php");
include("inc/register_types.php");
include("inc/acf_backend_task.php");
include("inc/acf_frontend_task.php");

//usuwanie śmieci
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

add_action(
    'after_setup_theme',
    function() {
        add_theme_support('post-thumbnails');
        add_theme_support('title-tag');
        add_theme_support('html5', ['script', 'style']);
    }
);

if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
      'primary' => 'Menu Główne',
		)
	);
}

function custom_gutenberg_register_files() {
    // script file
    wp_register_script(
        'custom-block-script',
        get_stylesheet_directory_uri().'/js/dist/hide_block.min.js',
        array('wp-blocks', 'wp-edit-post')
    );
    // register block editor script
    register_block_type('custom/ma-block-files', array(
        'editor_script' => 'custom-block-script'
    ));
}
add_action('init', 'custom_gutenberg_register_files');
