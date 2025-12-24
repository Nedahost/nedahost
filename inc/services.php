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
    wp_nonce_field('services_meta_box', 'services_meta_box_nonce');
    
    $service_number = get_post_meta($post->ID, 'service_number', true);
    $service_color = get_post_meta($post->ID, 'service_color', true);
    $text_color = get_post_meta($post->ID, 'text_color', true);
    $service_link = get_post_meta($post->ID, 'service_link', true);
    $card_title = get_post_meta($post->ID, 'card_title', true);
    $show_on_frontpage = get_post_meta($post->ID, 'show_on_frontpage', true);
    
    // Νέα πεδία για single page
    $hero_subtitle = get_post_meta($post->ID, 'hero_subtitle', true);
    $hero_color = get_post_meta($post->ID, 'hero_color', true);
    $sections = get_post_meta($post->ID, 'service_sections', true);
    if (!is_array($sections)) $sections = array();
    ?>
    
    <h3>📋 Ρυθμίσεις Κάρτας (Αρχική Σελίδα)</h3>
    <hr>
    
    <p>
        <label for="card_title"><strong>Τίτλος κάρτας:</strong></label><br>
        <input type="text" id="card_title" name="card_title" value="<?php echo esc_attr($card_title); ?>" style="width: 100%;" placeholder="Αν είναι κενό, χρησιμοποιείται ο κύριος τίτλος">
    </p>
    
    <p>
        <label for="service_number"><strong>Αριθμός (01, 02, κλπ):</strong></label><br>
        <input type="text" id="service_number" name="service_number" value="<?php echo esc_attr($service_number); ?>" style="width: 100px;">
    </p>
    
    <p>
        <label for="service_color"><strong>Χρώμα κάρτας:</strong></label><br>
        <input type="text" id="service_color" name="service_color" value="<?php echo esc_attr($service_color); ?>" placeholder="#0d0d1a" style="width: 150px;">
    </p>
    
    <p>
        <label for="text_color"><strong>Χρώμα κειμένου:</strong></label><br>
        <select id="text_color" name="text_color" style="width: 150px;">
            <option value="light" <?php selected($text_color, 'light'); ?>>Λευκό (για σκούρο background)</option>
            <option value="dark" <?php selected($text_color, 'dark'); ?>>Μαύρο (για ανοιχτό background)</option>
        </select>
    </p>

    <p>
        <label for="service_link"><strong>Σύνδεση με σελίδα:</strong></label><br>
        <?php $pages = get_pages(); ?>
        <select id="service_link" name="service_link" style="width: 300px;">
            <option value="">-- Επιλέξτε σελίδα --</option>
            <?php foreach ($pages as $page) : ?>
                <option value="<?php echo get_permalink($page->ID); ?>" <?php selected($service_link, get_permalink($page->ID)); ?>>
                    <?php echo esc_html($page->post_title); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    
    <p>
        <label for="show_on_frontpage">
            <input type="checkbox" id="show_on_frontpage" name="show_on_frontpage" value="1" <?php checked($show_on_frontpage, 1); ?>>
            <strong>Εμφάνιση στην αρχική</strong>
        </label>
    </p>
    
    <br><br>
    <h3>📄 Ρυθμίσεις Single Page (Σελίδα Service)</h3>
    <hr>
    
    <p>
        <label for="hero_subtitle"><strong>Hero Υπότιτλος:</strong></label><br>
        <textarea id="hero_subtitle" name="hero_subtitle" rows="3" style="width:100%;"><?php echo esc_textarea($hero_subtitle); ?></textarea>
    </p>
    
    <p>
        <label for="hero_color"><strong>Hero Background Color:</strong></label><br>
        <input type="text" id="hero_color" name="hero_color" value="<?php echo esc_attr($hero_color); ?>" placeholder="#5B4EF0" style="width: 150px;">
    </p>
    
    <br>
    <h4>Content Sections</h4>
    <p><em>Πρόσθεσε sections με εικόνα και κείμενο (εναλλάσσονται αριστερά/δεξιά αυτόματα)</em></p>
    
    <div id="sections-container">
        <?php if (!empty($sections)) : foreach ($sections as $i => $section) : ?>
            <div class="section-item" style="background:#f5f5f5; padding:15px; margin:10px 0; border:1px solid #ddd; border-radius:5px;">
                <p>
                    <label><strong>Τίτλος Section:</strong></label><br>
                    <input type="text" name="sections[<?php echo $i; ?>][title]" value="<?php echo esc_attr($section['title']); ?>" style="width:100%;">
                </p>
                <p>
                    <label><strong>Περιγραφή:</strong></label><br>
                    <textarea name="sections[<?php echo $i; ?>][description]" rows="4" style="width:100%;"><?php echo esc_textarea($section['description']); ?></textarea>
                </p>
                <p>
                    <label><strong>Εικόνα:</strong></label><br>
                    <input type="text" name="sections[<?php echo $i; ?>][image]" value="<?php echo esc_url($section['image']); ?>" style="width:80%;" class="section-image-input">
                    <button type="button" class="button upload-image-btn">Επιλογή</button>
                </p>
                <p>
                    <label><strong>Επιπλέον κείμενο (προαιρετικό):</strong></label><br>
                    <textarea name="sections[<?php echo $i; ?>][extra_text]" rows="2" style="width:100%;"><?php echo esc_textarea($section['extra_text'] ?? ''); ?></textarea>
                </p>
                <button type="button" class="button remove-section" style="color:red;">✕ Αφαίρεση</button>
            </div>
        <?php endforeach; endif; ?>
    </div>
    
    <button type="button" class="button button-primary" id="add-section">+ Προσθήκη Section</button>
    
    <script>
    jQuery(document).ready(function($) {
        var sectionIndex = <?php echo count($sections); ?>;
        
        $('#add-section').on('click', function() {
            var html = '<div class="section-item" style="background:#f5f5f5; padding:15px; margin:10px 0; border:1px solid #ddd; border-radius:5px;">' +
                '<p><label><strong>Τίτλος Section:</strong></label><br>' +
                '<input type="text" name="sections[' + sectionIndex + '][title]" style="width:100%;"></p>' +
                '<p><label><strong>Περιγραφή:</strong></label><br>' +
                '<textarea name="sections[' + sectionIndex + '][description]" rows="4" style="width:100%;"></textarea></p>' +
                '<p><label><strong>Εικόνα:</strong></label><br>' +
                '<input type="text" name="sections[' + sectionIndex + '][image]" style="width:80%;" class="section-image-input">' +
                '<button type="button" class="button upload-image-btn">Επιλογή</button></p>' +
                '<p><label><strong>Επιπλέον κείμενο (προαιρετικό):</strong></label><br>' +
                '<textarea name="sections[' + sectionIndex + '][extra_text]" rows="2" style="width:100%;"></textarea></p>' +
                '<button type="button" class="button remove-section" style="color:red;">✕ Αφαίρεση</button>' +
                '</div>';
            $('#sections-container').append(html);
            sectionIndex++;
        });
        
        $(document).on('click', '.remove-section', function() {
            $(this).closest('.section-item').remove();
        });
        
        $(document).on('click', '.upload-image-btn', function(e) {
            e.preventDefault();
            var button = $(this);
            var input = button.siblings('.section-image-input');
            
            var frame = wp.media({
                title: 'Επιλογή εικόνας',
                button: { text: 'Χρήση εικόνας' },
                multiple: false
            });
            
            frame.on('select', function() {
                var attachment = frame.state().get('selection').first().toJSON();
                input.val(attachment.url);
            });
            
            frame.open();
        });
    });
    </script>
    
    <?php
}

function save_custom_section_fields($post_id) {
    if (!isset($_POST['services_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['services_meta_box_nonce'], 'services_meta_box')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    // Αποθήκευση πεδίων κάρτας
    if (isset($_POST['card_title'])) {
        update_post_meta($post_id, 'card_title', sanitize_text_field($_POST['card_title']));
    }
    
    if (isset($_POST['service_number'])) {
        update_post_meta($post_id, 'service_number', sanitize_text_field($_POST['service_number']));
    }
    
    if (isset($_POST['service_color'])) {
        update_post_meta($post_id, 'service_color', sanitize_text_field($_POST['service_color']));
    }
    
    if (isset($_POST['text_color'])) {
        update_post_meta($post_id, 'text_color', sanitize_text_field($_POST['text_color']));
    }

    if (isset($_POST['service_link'])) {
        update_post_meta($post_id, 'service_link', esc_url_raw($_POST['service_link']));
    }
    
    $show_on_frontpage = isset($_POST['show_on_frontpage']) ? 1 : 0;
    update_post_meta($post_id, 'show_on_frontpage', $show_on_frontpage);
    
    // Αποθήκευση πεδίων single page
    if (isset($_POST['hero_subtitle'])) {
        update_post_meta($post_id, 'hero_subtitle', sanitize_textarea_field($_POST['hero_subtitle']));
    }
    
    if (isset($_POST['hero_color'])) {
        update_post_meta($post_id, 'hero_color', sanitize_text_field($_POST['hero_color']));
    }
    
    // Αποθήκευση sections
    if (isset($_POST['sections']) && is_array($_POST['sections'])) {
        $sections = array();
        foreach ($_POST['sections'] as $section) {
            if (!empty($section['title'])) {
                $sections[] = array(
                    'title' => sanitize_text_field($section['title']),
                    'description' => sanitize_textarea_field($section['description']),
                    'image' => esc_url_raw($section['image']),
                    'extra_text' => sanitize_textarea_field($section['extra_text'] ?? '')
                );
            }
        }
        update_post_meta($post_id, 'service_sections', $sections);
    } else {
        delete_post_meta($post_id, 'service_sections');
    }
}
add_action('save_post_nedahost_services', 'save_custom_section_fields');



// Προσθέστε αυτό το κομμάτι κώδικα στο functions.php του θέματός σας ή σε ένα πρόσθετο

add_filter( 'manage_nedahost_services_posts_columns', 'custom_add_custom_columns_to_services' );

function custom_add_custom_columns_to_services( $columns ) {
    $columns['show_on_frontpage'] = 'Display on Front Page'; // Προσθήκη ενός νέου πεδίου "Display on Front Page" στη λίστα διαχείρισης
    return $columns;
}

add_action( 'manage_nedahost_services_posts_custom_column' , 'custom_custom_columns_content_for_services', 10, 2 );

function custom_custom_columns_content_for_services( $column, $post_id ) {
    // Εάν το $column είναι το πεδίο "Display on Front Page"
    if ( 'show_on_frontpage' === $column ) {
        // Ανάκτηση της κατάστασης του checkbox "show_on_frontpage" για το συγκεκριμένο post
        $show_on_frontpage = get_post_meta( $post_id, 'show_on_frontpage', true );

        // Εάν το service έχει επιλεγεί για εμφάνιση στην αρχική σελίδα, εμφάνιση ενός εικονιδίου "Ναι", διαφορετικά εμφάνιση "Όχι"
        if ( $show_on_frontpage == 1 ) {
            echo '<span style="color:green;">Ναι</span>';
        } else {
            echo '<span style="color:red;">Όχι</span>';
        }
    }
}
