<?php
require_once(UTUNE_ROOT_DIR.'/include/fungsi.php');
require_once('options-fonts.php');
add_action('admin_enqueue_scripts', 'my_admin_scripts');

function my_admin_scripts() {
	if(isset($_GET['page']) && $_GET['page'] == 'theme-settings') wp_enqueue_media();
}

add_action('admin_menu', 'utune_options');
function utune_options(){
	add_submenu_page('themes.php', 'Theme Settings', 'Theme Settings', 'manage_options', UTUNE_OPT_SLUG, 'utune_options_page');
}

function utune_options_page(){
	utune_save_settings();
	require_once('options-index.php');
}


function utune_admin_head(){
	require_once('options-admin-head.php');
}
add_action('admin_head', 'utune_admin_head');

function utune_save_settings(){
	if(isset($_POST['utune_save'])){
		$settings = serialize($_POST['utune']);
		update_option('utune_settings', $settings);
	}
}