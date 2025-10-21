<?php

require_once (get_template_directory() . '/inc/projects.php');
require_once (get_template_directory() . '/inc/services.php');




// style load css
function nedahost_load_css() {
    wp_register_style('mystyle', get_template_directory_uri() . '/assets/public/css/mystyle.css', array(), false, 'all');
    wp_enqueue_style('mystyle');
//    wp_register_style('responsive', get_template_directory_uri() . '/assets/public/css/responsive.css', array(), false, 'all');
//    wp_enqueue_style('responsive');
   // wp_register_style('fatNav', get_template_directory_uri() . '/assets/public/css/jquery.fatNav.css', array(), false, 'all');
    //wp_enqueue_style('fatNav');
    //wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/public/css/responsive.css', '', '', 'all');
    //wp_enqueue_style('style' , get_stylesheet_uri(), '', '', 'all');    
}

add_action( 'wp_enqueue_scripts', 'nedahost_load_css' );

//  Javascripts load js

function load_js(){
    wp_enqueue_script('JQuery', 'https://code.jquery.com/jquery-3.6.4.min.js', array(), null, true);
    //wp_enqueue_script('slick', '//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js?ver=1.5', array(), null, true);
    wp_enqueue_script('myjs', get_template_directory_uri() . '/assets/js/myjs.js', array('jquery'), false, true);

    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}

add_action( 'wp_enqueue_scripts', 'load_js' );


add_action('after_setup_theme', 'nedahost_setup');
function nedahost_setup(){
    
    
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    
    // Menu 
    register_nav_menus(array(
        'primary' => __('Primary Navigation', 'nedahost'),
        'footermenu' => __('Footer Navigation', 'nedahost')
    )); 
    
    // Default image and If want change theme logo 
    $args = array(
	'width'         => 251,
	'height'        => 40,
	'default-image' => get_template_directory_uri() . '/assets/images/logo.png',
	'uploads'       => true,
    );
    add_theme_support( 'custom-header', $args );
    
    
    $newsletter = array(
	'name'          => 'newsletter',
	'description'   => 'Είναι η περιοχή που εμφανίζεται αριστερά στις κατηγορίες',
	'before_widget' => '<div id="%1$s" class="module_cat %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3 class="widgettitle">',
	'after_title'   => '</h3>' );


        register_sidebar($newsletter);
}


add_filter( 'wp_title', 'nedahost_wp_title', 10, 2 );

function nedahost_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'nedahost' ), max( $paged, $page ) );

	return $title;
}



//if( !defined(THEME_IMG_PATH)){
  // define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/assets/images' );
//}

// add a favicon to your site
function nedahost_favicon() {
	echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/assets/images/nedahost-favicon.jpg" />' . "\n";
}
add_action('wp_head', 'nedahost_favicon');
add_action('admin_head', 'nedahost_favicon');


function home_body_class($classes) {
    if ( is_home() ) {
        $classes[] = 'home';
    }

    return $classes;
}

add_filter( 'body_class', 'home_body_class' );




//popup cart
// 1. Προσθήκη Admin Menu
add_action('admin_menu', 'promotional_banner_admin_menu');
function promotional_banner_admin_menu() {
    add_menu_page(
        'Promotional Banner',
        'Promotional Banner',
        'manage_options',
        'promotional-banner',
        'promotional_banner_admin_page',
        'dashicons-format-image',
        30
    );
}

// 2. Εγγραφή Settings
add_action('admin_init', 'promotional_banner_settings_init');
function promotional_banner_settings_init() {
    register_setting('promotional_banner_settings', 'promotional_banner_options', 'promotional_banner_sanitize_options');
    
    add_settings_section(
        'promotional_banner_section',
        'Promotional Banner Settings',
        'promotional_banner_section_callback',
        'promotional_banner_settings'
    );
    
    // Enable Promotional Banner
    add_settings_field(
        'enable_promotional_banner',
        'Ενεργοποίηση Banner',
        'enable_promotional_banner_callback',
        'promotional_banner_settings',
        'promotional_banner_section'
    );
    
    // Upload Banner Image
    add_settings_field(
        'promotional_banner_image',
        'Εικόνα Banner',
        'promotional_banner_image_callback',
        'promotional_banner_settings',
        'promotional_banner_section'
    );
    
    // Banner URL
    add_settings_field(
        'promotional_banner_url',
        'URL Προορισμού',
        'promotional_banner_url_callback',
        'promotional_banner_settings',
        'promotional_banner_section'
    );
}

// 3. Sanitization function
function promotional_banner_sanitize_options($input) {
    $sanitized = array();
    
    $sanitized['enable_promotional_banner'] = isset($input['enable_promotional_banner']) ? 1 : 0;
    $sanitized['promotional_banner_image'] = isset($input['promotional_banner_image']) ? sanitize_url($input['promotional_banner_image']) : '';
    $sanitized['promotional_banner_url'] = isset($input['promotional_banner_url']) ? sanitize_url($input['promotional_banner_url']) : '';
    
    return $sanitized;
}

// 4. Callbacks για Settings Fields
function promotional_banner_section_callback() {
    echo '<p>Ρυθμίστε το promotional banner με image upload.</p>';
}

function enable_promotional_banner_callback() {
    $options = get_option('promotional_banner_options', array());
    $checked = isset($options['enable_promotional_banner']) ? intval($options['enable_promotional_banner']) : 0;
    ?>
    <label>
        <input type="checkbox" name="promotional_banner_options[enable_promotional_banner]" value="1" <?php checked(1, $checked); ?> />
        Ενεργοποίηση promotional banner
    </label>
    <?php
}

function promotional_banner_image_callback() {
    $options = get_option('promotional_banner_options', array());
    $image_url = isset($options['promotional_banner_image']) ? $options['promotional_banner_image'] : '';
    ?>
    <div class="promotional-banner-upload">
        <input type="url" name="promotional_banner_options[promotional_banner_image]" value="<?php echo esc_attr($image_url); ?>" 
               id="promotional_banner_image" class="large-text" placeholder="https://example.com/banner.jpg" />
        <button type="button" class="button" id="upload_banner_button">Επιλογή Εικόνας</button>
        
        <?php if ($image_url): ?>
            <div class="banner-preview" style="margin-top: 10px;">
                <p><strong>Προεπισκόπηση:</strong></p>
                <img src="<?php echo esc_url($image_url); ?>" style="max-width: 300px; height: auto; border: 1px solid #ddd;" />
            </div>
        <?php endif; ?>
    </div>
    <p class="description">Ανεβάστε την εικόνα του banner. Προτεινόμενες διαστάσεις: 400x300px.</p>
    
    <script>
    jQuery(document).ready(function($) {
        $('#upload_banner_button').click(function(e) {
            e.preventDefault();
            
            var custom_uploader = wp.media({
                title: 'Επιλογή Banner Εικόνας',
                button: {
                    text: 'Χρήση αυτής της εικόνας'
                },
                multiple: false
            });
            
            custom_uploader.on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('#promotional_banner_image').val(attachment.url);
                
                // Ενημέρωση preview
                $('.banner-preview').remove();
                $('.promotional-banner-upload').append(
                    '<div class="banner-preview" style="margin-top: 10px;">' +
                    '<p><strong>Προεπισκόπηση:</strong></p>' +
                    '<img src="' + attachment.url + '" style="max-width: 300px; height: auto; border: 1px solid #ddd;" />' +
                    '</div>'
                );
            });
            
            custom_uploader.open();
        });
    });
    </script>
    <?php
}

function promotional_banner_url_callback() {
    $options = get_option('promotional_banner_options', array());
    $banner_url = isset($options['promotional_banner_url']) ? $options['promotional_banner_url'] : '';
    ?>
    <input type="url" name="promotional_banner_options[promotional_banner_url]" value="<?php echo esc_attr($banner_url); ?>" 
           class="large-text" placeholder="https://example.com/sale-page" />
    <p class="description">URL όπου θα μεταφέρεται ο χρήστης όταν κάνει κλικ στο banner.</p>
    <?php
}

// 5. Admin Page HTML
function promotional_banner_admin_page() {
    if (isset($_GET['settings-updated'])) {
        add_settings_error('promotional_banner_messages', 'promotional_banner_message', 'Οι ρυθμίσεις αποθηκεύτηκαν επιτυχώς!', 'updated');
    }
    
    settings_errors('promotional_banner_messages');
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <form action="options.php" method="post">
            <?php
            settings_fields('promotional_banner_settings');
            do_settings_sections('promotional_banner_settings');
            submit_button('Αποθήκευση Ρυθμίσεων');
            ?>
        </form>
    </div>
    <?php
}

// 6. Enqueue media scripts
add_action('admin_enqueue_scripts', 'promotional_banner_admin_scripts');
function promotional_banner_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_promotional-banner') return;
    
    wp_enqueue_media();
}

// 7. Βοηθητικές συναρτήσεις
function is_promotional_banner_enabled() {
    $options = get_option('promotional_banner_options', array());
    return isset($options['enable_promotional_banner']) ? intval($options['enable_promotional_banner']) : 0;
}

function get_promotional_banner_image() {
    $options = get_option('promotional_banner_options', array());
    return isset($options['promotional_banner_image']) ? $options['promotional_banner_image'] : '';
}

function get_promotional_banner_url() {
    $options = get_option('promotional_banner_options', array());
    return isset($options['promotional_banner_url']) ? $options['promotional_banner_url'] : '';
}

// 8. Frontend - Εμφάνιση Banner
add_action('wp_footer', 'add_promotional_banner');
function add_promotional_banner() {
    if (!is_promotional_banner_enabled()) return;
    
    $banner_image = get_promotional_banner_image();
    $banner_url = get_promotional_banner_url();
    
    if (empty($banner_image)) return;
    
    ?>
    <style>
    #promotional-banner {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 999999;
    }
    
    .banner-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        box-sizing: border-box;
    }
    
    .banner-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .banner-close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 28px;
        font-weight: bold;
        color: #666;
        cursor: pointer;
        z-index: 10;
        background: rgba(255,255,255,0.9);
        width: 35px;
        height: 35px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    
    .banner-close:hover {
        background: rgba(231, 76, 60, 0.9);
        color: white;
        transform: scale(1.1);
    }
    
    .banner-image {
        display: block;
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }
    
    .banner-link {
        display: block;
        cursor: pointer;
        transition: transform 0.2s ease;
    }
    
    .banner-link:hover {
        transform: scale(1.02);
    }
    
    @media (max-width: 768px) {
        .banner-content {
            max-width: 95%;
            max-height: 80%;
            margin: 10px;
        }
        
        .banner-close {
            top: 5px;
            right: 5px;
            font-size: 24px;
            width: 30px;
            height: 30px;
        }
    }
    </style>
    
    <div id="promotional-banner" style="display:none;">
        <div class="banner-overlay">
            <div class="banner-content">
                <span class="banner-close">&times;</span>
                <?php if (!empty($banner_url)): ?>
                    <a href="<?php echo esc_url($banner_url); ?>" class="banner-link" target="_blank">
                        <img src="<?php echo esc_url($banner_image); ?>" alt="Promotional Banner" class="banner-image" />
                    </a>
                <?php else: ?>
                    <img src="<?php echo esc_url($banner_image); ?>" alt="Promotional Banner" class="banner-image" />
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Helper functions για cookies
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + value + expires + "; path=/";
        }
        
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }
        
        // Έλεγχος αν έχει δει το banner τις τελευταίες 3 μέρες
        var bannerSeen = getCookie('promotional_banner_seen');
        
        if (!bannerSeen) {
            // Εμφάνιση banner μετά από 2 δευτερόλεπτα
            setTimeout(function() {
                $('#promotional-banner').fadeIn(300);
            }, 2000);
        }
        
        // Κλείσιμο banner
        $(document).on('click', '.banner-close', function() {
            $('#promotional-banner').fadeOut(200);
            // Αποθήκευση cookie για 3 μέρες
            setCookie('promotional_banner_seen', '1', 3);
        });
        
        // Κλείσιμο με ESC key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27 && $('#promotional-banner').is(':visible')) {
                $('.banner-close').click();
            }
        });
        
        // Κλείσιμο με κλικ στο background
        $(document).on('click', '.banner-overlay', function(e) {
            if (e.target === this) {
                $('.banner-close').click();
            }
        });
        
        // Κλείσιμο αυτόματα μετά από 30 δευτερόλεπτα
        setTimeout(function() {
            if ($('#promotional-banner').is(':visible')) {
                $('.banner-close').click();
            }
        }, 30000);
    });
    </script>
    <?php
}