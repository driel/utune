	<div class="utune-footer">
		<div class="container">
			<div class="row utune-footer-widgets">
				<div class="col-md-3 col-xs-3">
					<?php if(is_dynamic_sidebar('Footer 1')): ?>
						<?php dynamic_sidebar('Footer 1'); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-3 col-xs-3">
					<?php if(is_dynamic_sidebar('Footer 2')): ?>
						<?php dynamic_sidebar('Footer 2'); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-3 col-xs-3">
					<?php if(is_dynamic_sidebar('Footer 3')): ?>
						<?php dynamic_sidebar('Footer 3'); ?>
					<?php endif; ?>
				</div>
				<div class="col-md-3 col-xs-3">
					<?php if(is_dynamic_sidebar('Footer 4')): ?>
						<?php dynamic_sidebar('Footer 4'); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="utune-copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-xs-4 utune-copyright-text">
					<?php echo utune_get_option('copyright');?>
				</div>
				<div class="col-md-4 col-xs-8 pull-right utune-footer-link">
					<?php
						wp_nav_menu(
							array(
								'theme_location'=>'secondary',
								'menu_class'=>'secondary-menu', 
								'fallback_cb'=>false
							)
						);
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="utune-backto-top">
		<i class="fa fa-angle-up"></i>
		<!-- <img src="<?php echo get_bloginfo('template_url'); ?>/assets/images/arrow-up.png" alt=""> -->
	</div>
	<?php wp_footer(); ?>
</body>
</html>