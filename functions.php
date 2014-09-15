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
			.utune-readmore:hover,
			.comment-respond #submit:hover{
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

			.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{
				border-top: 3px solid <?php echo utune_get_option('color'); ?>;
			}

			.vtab.nav-tabs>li.active>a, .vtab.nav-tabs>li.active>a:hover, .vtab.nav-tabs>li.active>a:focus{
				border-left: 3px solid <?php echo utune_get_option('color'); ?>;
			}

			@media screen and (max-width: 768px){
				.utune-head ul.parent-menu>li ul.sub-menu{
					border: 0!important;
				}

				.utune-footer, .utune-head ul.parent-menu>li ul.sub-menu a{
					color: #eee!important;
				}

				.utune-head ul.parent-menu>li>ul.sub-menu>li>a:hover, 
				.utune-head ul.parent-menu>li ul.sub-menu>li:hover>a, 
				.utune-head ul.parent-menu>li ul.sub-menu>li ul.sub-menu>li:hover>a{
					background: <?php echo utune_get_option('color'); ?>;
				}
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

if(!function_exists('utune_theme_activation')){
	function utune_theme_activation(){
		$default_options = array(
			'site_logo'=>get_bloginfo('template_url').'/utune-logo.png',
			'favicon'=>'',
			'blog_heading'=>'uTune Blog',
			'blog_subheading'=>'everyone is uniqeu',
			'color'=>'#007cb9',
			'social_media'=>array(
				'facebook'=>'#',
				'twitter'=>'#',
				'gplus'=>'#',
				'youtube'=>'#'
				),
			'show_search'=>'on',
			'show_social_icons'=>'on',
			'tagline'=>'Call us +62 821 1997 6569',
			'copyright'=>'&copy; copyright 2014',
			'analytic'=>'',
			'advance_js'=>'',
			'advance_css'=>''
			);
		update_option('utune_settings', serialize($default_options));
	}
}
add_action('after_switch_theme', 'utune_theme_activation');

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
		wp_enqueue_script('hoverizr', get_template_directory_uri().'/assets/js/jquery.hoverizr.js', array('jquery'));
		wp_enqueue_script('utune-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'));
	}
}
add_action('wp_enqueue_scripts', 'utune_register_script');

function utune_comment_reply(){
	if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')){
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_print_scripts', 'utune_comment_reply');

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
	return ' ...';
}
add_filter('excerpt_more', 'utune_excerpt_more');


function utune_comment_template($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
		<div class="comment-meta">
			<i class="fa fa-clock-o"></i>
			<?php
			/* translators: 1: date, 2: time */
			printf( __(' %1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
	<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
	<br />
	<?php endif; ?>
	<div class="clearfix"></div>

	<?php comment_text(); ?>

	<div class="reply">
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
	<?php
}

// remove <\/?p> and <br />
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );
