<?php

function register_types(){
	$labels = array(
		'name' => 'Samochód',
		'all_items' => 'Samochody',
		'singular_name' => 'Samochód',
		'add_new' => 'Dodaj nowy samochód',
		'add_new_item' => 'Dodaj nowy samochód',
		'edit_item' => 'Edytuj samochód',
		'new_item' => 'Nowy samochód',
		'view_item' => 'Zobacz samochód',
		'search_items' => 'szukaj w samochodach',
		'not_found' => 'nie znaleziono',
		'not_found_in_trash' => 'kosz jest pusty'
	);

	$args = array(
		'labels' => $labels,
		'singular_label' => 'Samochody',
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => false,
		'capability_type' => 'car',
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
    'map_meta_cap' => true,
    // 'show_in_rest' => true,
		'menu_icon' => 'dashicons-welcome-write-blog'
	);

	register_post_type('car', $args);

}
add_action('init', 'register_types');

function set_mechanic_role() {
  remove_role('mechanic');
  $result = add_role('mechanic', 'Mechanik', array(
    'view_admin_dashboard' => false,
    'read' => true,
    'read_post' => false,
    'read_posts' => false,
    'edit_post' => false,
    'read_car' => true,
    'edit_car' => true,
    'delete_car' => true,

    'edit_cars' => true,
    'edit_others_cars' => true,
    'publish_cars' => true,
    'read_private_cars' => true,

    'publish_car' => true,
    'delete_cars' => true,
    'delete_private_cars' => true,
    'delete_published_cars' => true,
    'delete_others_cars' => true,
    'edit_private_cars' => true,
    'edit_published_cars' => true,
  ));

  $user = wp_get_current_user();
  if(in_array('mechanic', (array)$user->roles)) {
    remove_menu_page('index.php');
  }
}
add_action('admin_init', 'set_mechanic_role');

if(function_exists('acf_add_local_field_group')):

  acf_add_local_field_group(array(
  	'key' => 'group_61d1f55640325',
  	'title' => 'Car settings',
  	'fields' => array(
  		array(
  			'key' => 'field_61d1f56339947',
  			'label' => 'Grafika',
  			'name' => 'img',
  			'type' => 'image',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'return_format' => 'id',
  			'preview_size' => 'medium',
  			'library' => 'all',
  			'min_width' => '',
  			'min_height' => '',
  			'min_size' => '',
  			'max_width' => '',
  			'max_height' => '',
  			'max_size' => '',
  			'mime_types' => '',
  		),
  		array(
  			'key' => 'field_61d1f57639948',
  			'label' => 'Marka',
  			'name' => 'brand',
  			'type' => 'text',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'prepend' => '',
  			'append' => '',
  			'maxlength' => '',
  		),
  		array(
  			'key' => 'field_61d1f59639949',
  			'label' => 'Model',
  			'name' => 'model',
  			'type' => 'text',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'prepend' => '',
  			'append' => '',
  			'maxlength' => '',
  		),
  		array(
  			'key' => 'field_61d1f5a03994a',
  			'label' => 'Rocznik',
  			'name' => 'year_of_production',
  			'type' => 'number',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
  			'prepend' => '',
  			'append' => '',
  			'min' => '',
  			'max' => '',
  			'step' => '',
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'car',
  			),
  		),
  	),
  	'menu_order' => 0,
  	'position' => 'normal',
  	'style' => 'default',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => true,
  	'description' => '',
  ));

endif;
