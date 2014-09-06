<?php
define('UTUNE_OPT_SLUG', 'theme-settings');
define('UTUNE_ROOT_DIR', get_template_directory());

require_once('include/widgets.php');
require_once('include/shortcodes.php');
require_once('include/fungsi.php');
require_once('admin/options.php');
// require_once('include/custom-post.php');

if(!function_exists('utune_setup')){
	function utune_setup(){
		add_theme_support('post-thumbnails');
	}
}
add_action('after_setup_theme', 'utune_setup');

if(!function_exists('utune_register_script')){
	function utune_register_script(){
		wp_enqueue_style('utune-style', get_stylesheet_uri());
		wp_enqueue_style('utune-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array('utune-style'));
		wp_enqueue_style('utune-fa', get_template_directory_uri().'/assets/css/font-awesome.min.css', array('utune-style'));

		wp_enqueue_script('jquery');
	}
}
add_action('wp_enqueue_scripts', 'utune_register_script');

if(!function_exists('utune_head')){
	function utune_head(){
		
	}
}
add_action('wp_head', 'utune_head');