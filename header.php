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
					<div class="utune-logo col-md-6 col-xs-6">
						<a href=""><img src="<?php echo get_bloginfo('template_url').'/assets/images/utune-logo.png'; ?>" alt="site-logo"></a>
					</div>
					<div class="utune-social-icons col-md-6 col-xs-6">
						<div class="pull-right">
							<div class="utune-tagline">
								<?php echo utune_get_option('tagline'); ?>
							</div>
							<div class="pull-right"><?php 
								if(utune_get_option('show_social_icons') == 'on'){
									get_template_part('social', 'icons');
								}
								?>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"><?php echo __('Toggle Navigation', 'utune'); ?></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav parent-menu">
				<?php 
					wp_nav_menu(array(
						'theme_location'=>'primary', 
						'container'=>'', 
						'items_wrap'=>'%3$s',
						//'menu_class'=>'nav navbar-nav parent-menu', 
						'fallback_cb'=>false)
					); 
				?>
				<li class="pull-right utune-search">
					<div>
						<?php
						if(utune_get_option('show_search') == 'on'){
							get_template_part('search', 'form');
						}
						?>
					</div>
				</li>
				</ul>
			</div>
		</div>
	</div><!-- /.utune-head -->
	<?php if(is_front_page() && is_home()){ // default home page ?>
		<div class="utune-breadcrumb">
			<div class="utune-breadcrumb-inner utune-static">
				<div class="container">
					<h3 class="utune-page-heading"><?php echo utune_get_option('blog_heading') ?></h3>
					<div class="utune-trail">
						<?php echo utune_get_option('blog_subheading') ?>
					</div>
				</div>
			</div>
		</div>
	<?php }else if( is_category() || is_tag()){ // catergory or tag ?>
		<div class="utune-breadcrumb">
			<div class="utune-breadcrumb-inner utune-static">
				<div class="container">
					<h3 class="utune-page-heading"><?php echo utune_get_option('blog_heading') ?></h3>
					<?php dimox_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	<?php }else if(is_front_page()){ // static front page ?>
		<!-- doing something here for static home page -->
	<?php }else if(is_page() || is_single()){ // single page/post ?>
		<div class="utune-breadcrumb">
			<?php if(has_post_thumbnail()): ?>
			<div class="utune-post-image">
				<?php the_post_thumbnail(); ?>
			</div>
			<?php endif; ?>
			<div class="utune-breadcrumb-inner<?php echo has_post_thumbnail() == false ? ' utune-static"':''; ?>">
				<div class="container">
					<h3 class="utune-page-heading"><?php echo the_title(); ?></h3>
					<?php dimox_breadcrumbs(); ?>
				</div>
			</div>
		</div>
	<?php } ?>