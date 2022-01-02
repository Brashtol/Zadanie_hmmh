<?php

function registerTypes(){
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
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title', 'editor'),
    'map_meta_cap' => true,
    // 'show_in_rest' => true,
		'menu_icon' => 'dashicons-welcome-write-blog'
	);

	register_post_type('car', $args);
}
add_action('init', 'registerTypes');

add_role('mechanic', 'Mechanik', array(
  'read_car',
  'edit_car',
  'edit_cars',
  'edit_others_cars',
  'edit_private_cars',
  'edit_published_cars',
  'publish__cars',
  'delete_car',
  'delete_cars',
  'delete_private_cars',
  'delete_published_cars',
  'delete_others_cars',
));

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
  				'value' => 'post',
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
