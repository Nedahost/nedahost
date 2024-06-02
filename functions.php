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


/*
function add_my_submenu() {
    add_menu_page(
        'Framework',          // page title 
        'Framework',          // menu title
        'manage_options',     // capability
        'my-menu-slug',       // menu slug
        'my_menu_page',       // function that will render its output
        '',                   // link to the icon that will be displayed in the sidebar
        2                     // position of the menu option
    );
}
add_action('admin_menu', 'add_my_submenu');


function my_menu_page() {
    // Check if form is submitted
    if (isset($_POST['submit'])) {
        // Get the submitted data
        $title = sanitize_text_field($_POST['title']);
        $content = $_POST['content']; // No need for sanitization as wp_editor handles this
        $meta_title = sanitize_text_field($_POST['meta_title']);
        $meta_description = wp_kses_post($_POST['meta_description']); // Allow HTML in Meta Description

        // Save the data or do something else with it
        // For example, you can save it in the options table:
        update_option('custom_title', $title);
        update_option('custom_content', $content);
        update_option('custom_meta_title', $meta_title);
        update_option('custom_meta_description', $meta_description);

        echo '<div class="updated"><p>Data saved successfully!</p></div>';
    }

    // Get the existing data
    $existing_title = get_option('custom_title');
    $existing_content = get_option('custom_content');
    $existing_meta_title = get_option('custom_meta_title');
    $existing_meta_description = get_option('custom_meta_description');

    echo '<div class="wrap">';
    echo '<h2>Custom Menu Page</h2>';

    echo '<form method="post" action="">';
    echo '<h3>Περιεχόμενο αρχικής σελίδας</h3>';
    echo '<label for="title">Title:</label>';
    echo '<input type="text" id="title" name="title" value="' . esc_attr($existing_title) . '"><br>';
    echo '<label for="content">Content:</label>';
    echo '<div class="wp-editor">';
    wp_editor($existing_content, 'content', array(
        'textarea_name' => 'content',
        'textarea_rows' => 10,
        'media_buttons' => true,
        'teeny' => false,
        'tinymce' => true,
    ));
    echo '</div>';

    echo '<h3>Meta tags</h3>';
    // Separate each Meta tags field with its own title
    echo '<label for="meta_title">Meta Title:</label>';
    echo '<input type="text" id="meta_title" name="meta_title" value="' . esc_attr($existing_meta_title) . '" style="display: block; width: 100%; margin-bottom: 10px;"><br>';

    echo '<label for="meta_description">Meta Description:</label>';
    echo '<div class="wp-editor">';
    wp_editor($existing_meta_description, 'meta_description', array(
        'textarea_name' => 'meta_description',
        'textarea_rows' => 4,
        'media_buttons' => false,
        'teeny' => true,
        'tinymce' => true,
    ));
    echo '</div>';

    echo '<input type="submit" name="submit" value="Save">';
    echo '</form>';
    echo '</div>';
}

*/
