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