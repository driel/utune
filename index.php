<?php get_header(); ?>
<div class="utune-content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-xs-8 utune-main-content">
				<?php get_template_part('blog', 'loop'); ?>
			</div>
			<div class="col-md-4 col-xs-4 utune-sidebar">
				<?php if(is_active_sidebar('Sidebar')): ?>
					<?php dynamic_sidebar('Sidebar'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>