<?php
define('UTUNE_OPT_SLUG', 'theme-settings');
define('UTUNE_ROOT_DIR', get_template_directory());

require_once('include/widgets.php');
require_once('include/shortcodes.php');
require_once('include/fungsi.php');
require_once('admin/options.php');
// require_once('include/custom-post.php');

register_nav_menu('primary', 'Primary Menu');

if(!function_exists('utune_head')){
	function utune_head(){
		$font = utune_get_option('font');

		if(strlen($font) > 0){
			?>
			<style type="text/css">
			body *{
				font: 14px '<?php echo $font; ?>';
			}
			</style>
			<?php
		}
	}
}
add_action('wp_head', 'utune_head');

if(!function_exists('utune_setup')){
	function utune_setup(){
		add_theme_support('post-thumbnails');
	}
}
add_action('after_setup_theme', 'utune_setup');

if(!function_exists('utune_register_script')){
	function utune_register_script(){
		$font = utune_get_option('font');
		wp_enqueue_style('utune-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
		wp_enqueue_style('utune-fa', get_template_directory_uri().'/assets/css/font-awesome.min.css');

		if(strlen($font) > 0){
			wp_enqueue_style('utune-font', 'http://fonts.googleapis.com/css?family='.$font);
		}else{
			wp_enqueue_style('utune-font', 'http://fonts.googleapis.com/css?family=Lato');
		}

		wp_enqueue_style('utune-style', get_stylesheet_uri());

		wp_enqueue_script('jquery');
		wp_enqueue_script('utune-bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.min.js', array('jquery'));
		wp_enqueue_script('utune-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'));
	}
}
add_action('wp_enqueue_scripts', 'utune_register_script');

if(!function_exists('utune_add_custom_link')){
	function utune_add_custom_link($items, $args){
		if($args->theme_location == 'primary'){
			$home_link = '<li><a href="'.esc_url(home_url('/')).'" class="utune-home">Home</a></li>';
			$items = substr_replace($items, $home_link, 0, 0);
		}

		if(utune_get_option('show_search') == 'on'){
			ob_start();
			get_template_part('search', 'form');
			$search_form = ob_get_clean();
			$items .= '<li class="pull-right utune-search">'.$search_form.'</li>';
		}
		return $items;
	}
}
add_filter('wp_nav_menu_items', 'utune_add_custom_link', 10, 2);

