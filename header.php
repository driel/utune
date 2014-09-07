<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body>
	<div class="utune-head">
		<div class="container">
			<div class="row utune-inner-head">
				<div class="container">
					<div class="utune-logo col-md-3 col-xs-6">
						<a href=""><img src="<?php echo get_bloginfo('template_url').'/assets/images/utune-logo.png'; ?>" alt="site-logo"></a>
					</div>
					<div class="col-md-3 utune-head-widget"></div>
					<div class="col-md-3 utune-head-widget"></div>
					<div class="utune-social-icons col-md-3 col-xs-6">
						<div class="pull-right">
							<?php 
							if(utune_get_option('show_social_icons')){
								get_template_part('social', 'icons');
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<?php wp_nav_menu(array('theme_location'=>'primary', 'container'=>'', 'menu_class'=>'nav navbar-nav parent-menu')); ?>
			</div>
		</div>
	</div>