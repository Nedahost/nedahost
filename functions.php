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