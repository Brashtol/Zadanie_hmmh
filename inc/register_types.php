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

function custom_unregister_tags() {
  // unregister_taxonomy_for_object_type('category', 'post');
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'custom_unregister_tags');

function custom_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'Case Study';
  $submenu['edit.php'][5][0] = 'Case Study';
  $submenu['edit.php'][10][0] = 'Dodaj Case Study';
}
add_action('init', 'custom_post_object_label');

function custom_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'Case Study';
  $labels->singular_name = 'Case Study';
  $labels->add_new = 'Dodaj Case Study';
  $labels->add_new_item = 'Dodaj Case Study';
  $labels->edit_item = 'Edytuj Case Study';
  $labels->new_item = 'Case Study';
  $labels->view_item = 'Zobacz Case Study';
  $labels->search_items = 'Szukaj Case Study';
  $labels->not_found = 'Nie znaleziono Case Study';
  $labels->not_found_in_trash = 'Kosz jest pusty';
  $labels->all_items = 'Wszystkie Case Study';
  $labels->menu_name = 'Case Study';
  $labels->name_admin_bar = 'Case Study';
}
add_action('admin_menu', 'custom_post_menu_label');

function custom_change_cat_object() {
  global $wp_taxonomies;
  $labels = &$wp_taxonomies['category']->labels;
  $labels->name = 'Typ';
  $labels->singular_name = 'Typ';
  $labels->add_new = 'Dodaj Typ';
  $labels->add_new_item = 'Dodaj Typ';
  $labels->edit_item = 'Edytuj Typ';
  $labels->new_item = 'Typ';
  $labels->view_item = 'Zobacz Typ';
  $labels->search_items = 'Szukaj Typu';
  $labels->not_found = 'Nie znaleziono Typ';
  $labels->not_found_in_trash = 'Kosz jest pusty';
  $labels->all_items = 'Wszystkie Typy';
  $labels->menu_name = 'Typ';
  $labels->name_admin_bar = 'Typ';
}
add_action('init', 'custom_change_cat_object');

function custom_term_radio_checklist($args) {
  if(!empty( $args['taxonomy']) && $args['taxonomy'] === 'category') {
    if(empty($args['walker']) || is_a($args['walker'], 'Walker')) { // Don't override 3rd party walkers.
      if(!class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist')) {
        /**
         * Custom walker for switching checkbox inputs to radio.
         *
         * @see Walker_Category_Checklist
         */
        class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
          function walk( $elements, $max_depth, ...$args ) {
            $output = parent::walk( $elements, $max_depth, ...$args );
            $output = str_replace(
                array('type="checkbox"', "type='checkbox'"),
                array('type="radio"', "type='radio'"),
                $output
            );

            return $output;
          }
        }
      }

      $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
    }
  }

  return $args;
}

add_filter('wp_terms_checklist_args', 'custom_term_radio_checklist', 99, 1);
