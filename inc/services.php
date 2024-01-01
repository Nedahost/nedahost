<?php
add_action('init', 'nedahost_services');

function nedahost_services(){
    
    $labels = array(
    'name'               => 'Services',
    'singular_name'      => 'Services',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new Service',
    'edit_item'          => 'Edit Service',
    'new_item'           => 'New Service',
    'all_items'          => 'All Services',
    'view_item'          => 'View Services',
    'search_items'       => 'Search',
    'not_found'          => 'No Slides found',
    'not_found_in_trash' => 'No Slides found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Services'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'services' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'menu_icon' => 'dashicons-schedule',
    'supports'           => array( 'title', 'thumbnail','slug' ,'editor', 'page-attributes')
  );

    register_post_type( 'nedahost_services', $args );
    
    register_taxonomy(
		'nedahost_servicescategories',
		'nedahost_services',
		array(
                    'label' => 'Services categories',
                    'hierarchical' => true,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'show_in_nav_menus' => true,
                    'query_var' => true,
                    'show_tagcloud' => true,
                    'rewrite' => array( 'slug' => 'services_categories' )
		)
	);
    
}

function custom_section_fields() {
  add_meta_box(
      'custom_section_fields',
      'Πρόσθετα Πεδία',
      'custom_section_fields_callback',
      'nedahost_services',
      'normal',
      'high'
  );
}
add_action('add_meta_boxes', 'custom_section_fields');

function custom_section_fields_callback($post) {
  $extra_field_1_value = get_post_meta($post->ID, 'extra_field_1', true);
  $extra_field_2_value = get_post_meta($post->ID, 'extra_field_2', true);
  $extra_field_3_value = get_post_meta($post->ID, 'extra_field_3', true);

  echo '<label for="extra_field_1">Πρόσθετο Πεδίο 1:</label>';
  echo '<input type="text" id="extra_field_1" name="extra_field_1" value="' . esc_attr($extra_field_1_value) . '"><br>';

  echo '<label for="extra_field_1_link">Σύνδεσμος Πεδίου 1:</label>';
  echo '<input type="url" id="extra_field_1_link" name="extra_field_1_link" value="' . esc_attr(get_post_meta($post->ID, 'extra_field_1_link', true)) . '"><br>';


  echo '<label for="extra_field_2">Πρόσθετο Πεδίο 2:</label>';
  echo '<input type="text" id="extra_field_2" name="extra_field_2" value="' . esc_attr($extra_field_2_value) . '"><br>';

  echo '<label for="extra_field_3">Πρόσθετο Πεδίο 3:</label>';
  echo '<input type="text" id="extra_field_3" name="extra_field_3" value="' . esc_attr($extra_field_3_value) . '">';
}

function save_custom_section_fields($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if (isset($_POST['extra_field_1'])) {
      update_post_meta($post_id, 'extra_field_1', sanitize_text_field($_POST['extra_field_1']));
  }

  if (isset($_POST['extra_field_2'])) {
      update_post_meta($post_id, 'extra_field_2', sanitize_text_field($_POST['extra_field_2']));
  }

  if (isset($_POST['extra_field_3'])) {
      update_post_meta($post_id, 'extra_field_3', sanitize_text_field($_POST['extra_field_3']));
  }
}
add_action('save_post', 'save_custom_section_fields');
