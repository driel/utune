<?php
define('UTUNE_OPT_SLUG', 'theme-settings');
define('UTUNE_ROOT_DIR', get_template_directory());

require_once(get_template_directory().'/include/widgets.php');
require_once(get_template_directory().'/include/shortcodes.php');
require_once(get_template_directory().'/include/fungsi.php');
require_once(get_template_directory().'/admin/options.php');
// require_once('include/custom-post.php');

register_nav_menu('primary', 'Primary Menu');
register_nav_menu('secondary', 'Secondary Menu');

if(!function_exists('utune_head')){
	function utune_head(){
		echo '<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->';
    
		$font = utune_get_option('font');

		if(strlen($font) > 0){
			?>
			<style type="text/css">
			body *{
				font: 12px '<?php echo $font; ?>';
			}
			</style>
			<?php
		}

		if(strlen(utune_get_option('color')) > 0){
			$rgb = utune_hex2rgb(utune_get_option('color'));
			?>
			<style type="text/css">
				a,
				.utune-search-button{
					color: <?php echo utune_get_option('color'); ?>!important;
				}

				.utune-head ul.parent-menu>li>a{
					color: #eee!important;
				}

				.utune-head ul.parent-menu>li:hover>a, 
				.utune-head ul.parent-menu>li.current-menu-item>a,
				.utune-backto-top:hover{
					color: #eee;
					background-color: <?php echo utune_get_option('color'); ?>;
					-webkit-transition: background .2s;
					-moz-transition: background .2s;
					-ms-transition: background .2s;
					-o-transition: background .2s;
					transition: background .2s;
				}

				.utune-head ul.parent-menu>li:hover>a.utune-home{
					background-color: transparent;
				}

				.utune-head{
					border-bottom: 5px solid <?php echo utune_get_option('color'); ?>!important;
				}

				.utune-breadcrumb .utune-breadcrumb-inner{
					background-color: rgba(<?php echo $rgb; ?>, 0.63);
				}

				.utune-blog-date,
				.pagination span.current{
					background-color: <?php echo utune_get_option('color'); ?>!important;
				}

				.utune-footer,
				.utune-head ul.parent-menu>li ul.sub-menu{
					border-top: 5px solid <?php echo utune_get_option('color'); ?>;
				}

				.utune-widget-tittle{
					color: <?php echo utune_get_option('color'); ?>!important;
					border-bottom: 2px solid <?php echo utune_get_option('color'); ?>!important;
				}

				.utune-sidebar .utune-widget table td#today,
				.utune-readmore:hover{
					background: <?php echo utune_get_option('color'); ?>!important;
				}

				.utune-footer .utune-widget input[type=button], 
				.utune-footer .utune-widget input[type=submit], 
				.utune-footer .utune-widget button, .utune-sidebar 
				.utune-widget input[type=button], 
				.utune-sidebar .utune-widget input[type=submit], 
				.utune-sidebar .utune-widget button{
					background: <?php echo utune_get_option('color'); ?>!important;
					border: 1px solid <?php echo utune_get_option('color'); ?>!important;
					color: #eee;
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
			$home_link = '<li><a href="'.esc_url(home_url('/')).'" class="utune-home">&nbsp;</a></li>';
			$items = substr_replace($items, $home_link, 0, 0);
		}
		return $items;
	}
}
add_filter('wp_nav_menu_items', 'utune_add_custom_link', 10, 2);

function utune_excerpt_more( $more ){
	global $post;
	return ' <a href="" class="utune-more"> ...</a>';
}
add_filter('excerpt_more', 'utune_excerpt_more');

