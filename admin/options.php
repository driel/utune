<?php
require_once('options-functions.php');
add_action('admin_enqueue_scripts', 'my_admin_scripts');

function my_admin_scripts() {
	if(isset($_GET['page']) && $_GET['page'] == 'theme-settings')wp_enqueue_media();
}

if(!defined('UTUNE_OPT_SLUG')){
	define('UTUNE_OPT_SLUG', 'theme-settings');
}
add_action('admin_menu', 'utune_options');
function utune_options(){
	add_submenu_page('themes.php', 'Theme Settings', 'Theme Settings', 'manage_options', UTUNE_OPT_SLUG, 'utune_options_page');
}

function utune_options_page(){
	require_once('options-index.php');
}


function utune_admin_head(){
	require_once('options-admin-head.php');
}
add_action('admin_head', 'utune_admin_head');