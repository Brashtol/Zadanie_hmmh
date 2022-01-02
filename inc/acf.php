<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
  if(function_exists('acf_register_block_type')) {
    acf_register_block_type(array(
      'name'              => 'case-studies',
      'title'             => __('Case studies'),
      'description'       => __('A custom case studies block.'),
      'render_template'   => 'template-parts/blocks/case-studies.php',
      'category'          => 'formatting',
      'icon'              => 'admin-comments',
      'keywords'          => array('case studies'),
    ));
  }
}

add_filter('allowed_block_types_all', 'my_acf_case_studies_display', 10, 2);
function my_acf_case_studies_display($allowed_blocks, $context){
  // Get widget blocks and registered by plugins blocks
  $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

  $post = $context->post;
  if($post->post_type !== 'page') {
    unset($registered_blocks['acf/case-studies']);
  }

  return array_keys($registered_blocks);
}

if(function_exists('acf_add_local_field_group')):
  acf_add_local_field_group(array(
  	'key' => 'group_61ccbb50eca8b',
  	'title' => 'Blok case studies',
  	'fields' => array(
  		array(
  			'key' => 'field_61ccbb57676dd',
  			'label' => 'Case studies',
  			'name' => 'case_studies',
  			'type' => 'post_object',
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'post_type' => array(
  				0 => 'post',
  			),
  			'taxonomy' => '',
  			'allow_null' => 0,
  			'multiple' => 1,
  			'return_format' => 'id',
  			'ui' => 1,
  		),
  	),
  	'location' => array(
  		array(
  			array(
  				'param' => 'block',
  				'operator' => '==',
  				'value' => 'acf/case-studies',
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

  acf_add_local_field_group(array(
  	'key' => 'group_61d16a32b9831',
  	'title' => 'Case study settings',
  	'fields' => array(
  		array(
  			'key' => 'field_61d16a44c6046',
  			'label' => 'Typ',
  			'name' => 'type',
  			'type' => 'taxonomy',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'taxonomy' => 'category',
  			'field_type' => 'radio',
  			'allow_null' => 0,
  			'add_term' => 1,
  			'save_terms' => 1,
  			'load_terms' => 1,
  			'return_format' => 'id',
  			'multiple' => 0,
  		),
  		array(
  			'key' => 'field_61d16ac40ef0a',
  			'label' => 'Rodzaj odnośnika',
  			'name' => 'is_external_url',
  			'type' => 'radio',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => 0,
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'choices' => array(
  				0 => 'Wewnętrzny',
  				1 => 'Zewnętrzny',
  			),
  			'allow_null' => 0,
  			'other_choice' => 0,
  			'default_value' => '',
  			'layout' => 'vertical',
  			'return_format' => 'value',
  			'save_other_choice' => 0,
  		),
  		array(
  			'key' => 'field_61d16b470ef0b',
  			'label' => 'Odnośnik zewnętrzny',
  			'name' => 'external_url',
  			'type' => 'url',
  			'instructions' => '',
  			'required' => 1,
  			'conditional_logic' => array(
  				array(
  					array(
  						'field' => 'field_61d16ac40ef0a',
  						'operator' => '==',
  						'value' => '1',
  					),
  				),
  			),
  			'wrapper' => array(
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'default_value' => '',
  			'placeholder' => '',
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
  	'position' => 'acf_after_title',
  	'style' => 'seamless',
  	'label_placement' => 'top',
  	'instruction_placement' => 'label',
  	'hide_on_screen' => '',
  	'active' => true,
  	'description' => '',
  ));

endif;
