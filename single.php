<?php get_header(); ?>
<div class="utune-content">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-xs-9 utune-main-content">
				<?php 
				get_template_part('content', 'loop'); 
				get_template_part('comment', 'form');
				?>
			</div>
			<div class="col-md-3 col-xs-3 utune-sidebar">
				<?php if(is_active_sidebar('Sidebar')): ?>
					<?php dynamic_sidebar('Sidebar'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>