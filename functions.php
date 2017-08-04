<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {

        wp_deregister_script('jquery');
		wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery.js', false, false, true);
        wp_register_script('bootstrap', ASSETS_URL . '/assets/bootstrap/js/bootstrap.min.js', false, false, true);
		wp_register_script('stellar', ASSETS_URL . '/assets/js/jquery.stellar.min.js', false, false, true);
		wp_register_script('sticky', ASSETS_URL . '/assets/js/jquery.sticky.js', false, false, true);
		wp_register_script('scroll', ASSETS_URL . '/assets/js/smoothscroll.js', false, false, true);
		wp_register_script('wow', ASSETS_URL . '/assets/js/wow.min.js', false, false, true);
		wp_register_script('count', ASSETS_URL . '/assets/js/jquery.countTo.js', false, false, true);
		wp_register_script('inview', ASSETS_URL . '/assets/js/jquery.inview.min.js', false, false, true);
		wp_register_script('pie', ASSETS_URL . '/assets/js/jquery.easypiechart.js', false, false, true);
		wp_register_script('shuffle', ASSETS_URL . '/assets/js/jquery.shuffle.min.js', false, false, true);
		wp_register_script('magnific', ASSETS_URL . '/assets/js/jquery.magnific-popup.min.js', false, false, true);
		wp_register_script('vimeo', 'http://a.vimeocdn.com/js/froogaloop2.min.js', false, false, true);
		wp_register_script('fitvids', ASSETS_URL . '/assets/js/jquery.fitvids.js', false, false, true);
		wp_register_script('gmaps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&key=AIzaSyDtNO_IlvXWdcSjOJO-2hzcUF3WlJmtbmE', false, false, true);
		wp_register_script('scripts', ASSETS_URL . '/assets/js/scripts.js', array('jquery','bootstrap','stellar','sticky','scroll','wow','count','inview','pie','shuffle','magnific','vimeo','fitvids','gmaps'), false, true);
        wp_enqueue_script('scripts');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/responsive.css';

	if( $styles_path ) {
	
		wp_register_style('font-roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,300,500,700', array(), false, 'all');
		wp_register_style('bootstarp', ASSETS_URL . '/assets/bootstrap/css/bootstrap.min.css', array(), false, 'screen');
		wp_register_style('font-awesome', ASSETS_URL . '/assets/css/font-awesome.min.css', array(), false, 'screen');
		wp_register_style('animate', ASSETS_URL . '/assets/css/animate.css', array(), false, 'all');
		wp_register_style('magnific', ASSETS_URL . '/assets/css/magnific-popup.css', array(), false, 'all');
		wp_register_style('custom', ASSETS_URL . '/assets/css/style.css', array(), false, 'all');
		wp_register_style('responsive', ASSETS_URL . '/assets/css/responsive.css', array('font-roboto','bootstarp','font-awesome','animate','magnific','custom'), false, 'all');
		wp_enqueue_style('responsive');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation' ),
		'second-navigation' => __( 'Second Navigation' )
    ));
}

add_action( 'init', 'register_theme_menus' );

// Navigacijos iškvietimas

function custom_nav($menu, $classes){
	
	wp_nav_menu(array(
			
		'container' => 'ul',
		'menu_class' => $classes,
		'theme_location' => $menu,
		'menu' => $menu

	));
}

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
	'Education' => 'Education',
	'Experience' => 'Experience',
	'Works' => 'Work'

);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

// ACF Options Page

if( function_exists('acf_add_options_page') ) {
 
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title' 	=> 'Theme Settings',
		'menu_slug' 	=> 'general-settings',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
	
	$option_page = acf_add_options_page(array(
		'page_title' 	=> 'Facts',
		'menu_title' 	=> 'Facts',
		'menu_slug' 	=> 'facts',
		'capability' 	=> 'edit_posts',
		'redirect' 	=> false
	));
 
}

?>