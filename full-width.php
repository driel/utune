<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
<div class="utune-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12 utune-main-content">
				<?php 
				get_template_part('content', 'loop'); 
				get_template_part('comment', 'form');
				?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>