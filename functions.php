<?php
require_once('include/widgets.php');
require_once('include/shortcodes.php');
require_once('admin/options.php');
// require_once('include/custom-post.php');

if(!function_exists('utune_setup')){
	function utune_setup(){
		add_theme_support('post-thumbnails');
	}
}
add_action('after_setup_theme', 'utune_setup');

if(!function_exists('utune_head')){
	function utune_head(){
		echo 'jhah';
	}
}
add_action('wp_head', 'utune_head');