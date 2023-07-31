<?php

add_action('init', 'nedahost_projects');

function nedahost_projects(){
    
    $labels = array(
    'name'               => 'Projects',
    'singular_name'      => 'Projects',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new Project',
    'edit_item'          => 'Edit Project',
    'new_item'           => 'New Project',
    'all_items'          => 'All Projects',
    'view_item'          => 'View Projects',
    'search_items'       => 'Search',
    'not_found'          => 'No Slides found',
    'not_found_in_trash' => 'No Slides found in Trash',
    'parent_item_colon'  => '',
    'menu_name'          => 'Projects'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'projects' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => null,
    'menu_icon' => 'dashicons-schedule',
    'supports'           => array( 'title', 'thumbnail','slug' ,'editor', 'page-attributes')
  );

    register_post_type( 'nedahost_projects', $args );
    
    register_taxonomy(
		'nedahost_projectscategories',
		'nedahost_projects',
		array(
                    'label' => 'Projects categories',
                    'hierarchical' => true,
                    'show_ui' => true,
                    'show_admin_column' => true,
                    'show_in_nav_menus' => true,
                    'query_var' => true,
                    'show_tagcloud' => true,
                    'rewrite' => array( 'slug' => 'categories' )
		)
	);
    
}


add_action('add_meta_boxes', 'nedahost_details_meta_extra');
add_action('save_post', 'nedahost_details_savemeta_extra');
function nedahost_details_meta_extra() {
    add_meta_box('nedahost_details', 'Σύντομες περιγραφές για το Project', 'nedahost_extra_details_function', 'nedahost_projects', 'normal', 'default');
}


function nedahost_extra_details_function($post){
     $nedahost_checklove = get_post_meta($post->ID, 'nedahost_checklove', true);
     $nedahost_number = get_post_meta($post->ID, 'nedahost_number', true);
     
     $nedahost_headertext = get_post_meta($post->ID, 'nedahost_headertext', true);
     $nedahost_services = get_post_meta($post->ID, 'nedahost_services', true);
     $nedahost_urlservices = get_post_meta($post->ID, 'nedahost_urlservices', true);
     $nedahost_meta_value_num = get_post_meta($post->ID, 'nedahost_meta_value_num', true);
     $nedahost_smartdetails = get_post_meta($post->ID, 'nedahost_smartdetails', true);
     
     $nedahost_description1 = get_post_meta($post->ID, 'nedahost_description1', true);
     $nedahost_description2 = get_post_meta($post->ID, 'nedahost_description2', true);
     $nedahost_description3 = get_post_meta($post->ID, 'nedahost_description3', true);
     $nedahost_description4 = get_post_meta($post->ID, 'nedahost_description4', true);
     $nedahost_description5 = get_post_meta($post->ID, 'nedahost_description5', true);
     ?>

    <p>
        <input type="checkbox" id="nedahost_checklove" name="nedahost_checklove" <?php if (esc_attr($nedahost_checklove) != ''): echo 'checked'; endif;?> value="<?php echo 'on'; ?>" />
        <label for="nedahost_checklove">Προτεινόμενα Προϊόντα</label>
    </p>
    
    <p>
        <label for="nedahost_number">Αριθμός project home page:</label>
        <input type="text" id="nedahost_number" name="nedahost_number" value="<?php echo esc_attr($nedahost_number); ?>" />
    </p>
    
    <p>
        <label for="nedahost_meta_value_num">Αρίθμηση αρχική:</label>
        <input type="text" id="nedahost_meta_value_num" name="nedahost_meta_value_num" value="<?php echo esc_attr($nedahost_meta_value_num); ?>" />
    </p>
    
    <p>
        <label for="nedahost_headertext">Background Header Text:</label>
        <input type="text" id="nedahost_headertext" name="nedahost_headertext" value="<?php echo esc_attr($nedahost_headertext); ?>" />
    </p>
    
    <p>
        <label for="nedahost_services">Project services:</label>
        <input type="text" id="nedahost_services" name="nedahost_services" value="<?php echo esc_attr($nedahost_services); ?>" />
    </p>
    
    <p>
        <label for="nedahost_urlservices">url services:</label>
        <input type="text" id="nedahost_urlservices" name="nedahost_urlservices" value="<?php echo esc_attr($nedahost_urlservices); ?>" />
    </p>
    
    <p>
        <label for="nedahost_smartdetails">Λεπτομέρειες Brand:</label>
        <input type="text" id="nedahost_smartdetails" name="nedahost_smartdetails" value="<?php echo esc_attr($nedahost_smartdetails); ?>" />
    </p>
    
    
    
    <p>
        <label for="nedahost_description1"><b>Περιγραφή πρώτης φωτογραφίας:</b></label> <br />
        <?php 
        wp_editor( $nedahost_description1, 'nedahost_description1' , array(
                        'wpautop'       => true,
                        'media_buttons' => true,
                        'textarea_name' => 'nedahost_description1',
                        'textarea_rows' => 15,
                        'tinymce' => true ,
                        'quicktags' => true,
                        'teeny'     => false
                    ) );
        ?>
    </p>
    <p>
        <label for="nedahost_description2"><b>Περιγραφή δεύτερης φωτογραφίας:</b></label> <br />
        <?php 
        wp_editor( $nedahost_description2, 'nedahost_description2' , array(
                        'wpautop'       => true,
                        'media_buttons' => true,
                        'textarea_name' => 'nedahost_description2',
                        'textarea_rows' => 15,
                        'tinymce' => true ,
                        'quicktags' => true,
                        'teeny'     => false
                    ) );
        ?>
    </p>
    <p>
        <label for="nedahost_description3"><b>Περιγραφή τρίτης φωτογραφίας:</b></label> <br />
        <?php 
        wp_editor( $nedahost_description3, 'nedahost_description3' , array(
                        'wpautop'       => true,
                        'media_buttons' => true,
                        'textarea_name' => 'nedahost_description3',
                        'textarea_rows' => 15,
                        'tinymce' => true ,
                        'quicktags' => true,
                        'teeny'     => false
                    ) );
        ?>
    </p>
    <p>
        <label for="nedahost_description4"><b>Περιγραφή τέταρτης φωτογραφίας:</b></label> <br />
        <?php 
        wp_editor( $nedahost_description4, 'nedahost_description4' , array(
                        'wpautop'       => true,
                        'media_buttons' => true,
                        'textarea_name' => 'nedahost_description4',
                        'textarea_rows' => 15,
                        'tinymce' => true ,
                        'quicktags' => true,
                        'teeny'     => false
                    ) );
        ?>
    </p>
    <p>
        <label for="nedahost_description5"><b>Περιγραφή πέμπτης φωτογραφίας:</b></label> <br />
        <?php 
        wp_editor( $nedahost_description5, 'nedahost_description5' , array(
                        'wpautop'       => true,
                        'media_buttons' => true,
                        'textarea_name' => 'nedahost_description5',
                        'textarea_rows' => 15,
                        'tinymce' => true ,
                        'quicktags' => true,
                        'teeny'     => false
                    ) );
        ?>
    </p>
    <?php
 }
 
 function nedahost_details_savemeta_extra($post_ID) {
   global $post;
    if ($post->post_type == "nedahost_projects") {
        if (isset($_POST)) {
            update_post_meta($post_ID, 'nedahost_checklove', $_POST['nedahost_checklove']);
            update_post_meta($post_ID, 'nedahost_number', $_POST['nedahost_number']);
            update_post_meta($post_ID, 'nedahost_headertext', $_POST['nedahost_headertext']);
            update_post_meta($post_ID, 'nedahost_services', $_POST['nedahost_services']);
            update_post_meta($post_ID, 'nedahost_urlservices', $_POST['nedahost_urlservices']);
            update_post_meta($post_ID, 'nedahost_meta_value_num', $_POST['nedahost_meta_value_num']);
            update_post_meta($post_ID, 'nedahost_smartdetails', $_POST['nedahost_smartdetails']);
            update_post_meta($post_ID, 'nedahost_description1', $_POST['nedahost_description1']);
            update_post_meta($post_ID, 'nedahost_description2', $_POST['nedahost_description2']);
            update_post_meta($post_ID, 'nedahost_description3', $_POST['nedahost_description3']);
            update_post_meta($post_ID, 'nedahost_description4', $_POST['nedahost_description4']);
            update_post_meta($post_ID, 'nedahost_description5', $_POST['nedahost_description5']);
        }
    }
 }