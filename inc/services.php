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