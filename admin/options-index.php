<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/admin/css/select2.css">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/admin/css/admin.css">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_url'); ?>/admin/css/checkswitch.css">
<script src="<?php echo get_bloginfo('template_url'); ?>/admin/js/checkswitch.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/admin/js/select2.min.js"></script>
<script>
	jQuery(function($){
		var media_uploader;
		$('.utune-tabs li a').on('click', function(e){
			e.preventDefault();
			var pane = $(this).attr('href');
			$('.utune-tabs li a').removeClass('active');
			$(this).addClass('active');

			$('.tab-pane').removeClass('active');
			$(pane).addClass('active');
		});

		$('.select').select2({
			width: '250px'
		});

		$('.media-uploader').on('click', function(){
			var title = $(this).data('title');
			var btn_text = $(this).data('button-text');
			var target = $(this).data('target');
			if(media_uploader){
				media_uploader.open();
				return;
			}

			media_uploader = wp.media.frames.file_frame = wp.media({
				title: title,
				button: {
					text: btn_text
				},
				multiple: false
			});

			media_uploader.on('select', function(){
				var file = media_uploader.state().get('selection').first().toJSON();
				console.log(target);
				$(target).val(file.url);
			});

			media_uploader.open();
		});

		checkSwitch();
	});
</script>
<div class="clear"></div>
<div class="wrap">
	<h2 id="utune-heading">Theme Settings</h2>
	
	<ul class="utune-tabs">
		<li><a href="#general" class="active">General</a></li>
		<li><a href="#social">Social</a></li>
		<li><a href="#header">Header</a></li>
		<li><a href="#footer">Footer</a></li>
		<li><a href="#analytic" class="last-tab">Analytic</a></li>
	</ul>
	
	<div class="tab-content">
		<div class="tab-pane active" id="general">
			<?php require_once('options-generals.php'); ?>
		</div>
		<div class="tab-pane" id="social">this is social</div>
		<div class="tab-pane" id="header"><?php require_once('options-header.php'); ?></div>
		<div class="tab-pane" id="footer">this is footer</div>
		<div class="tab-pane" id="analytic"><?php require_once('options-analytic.php'); ?></div>
	</div>
	<div class="tab-footer">
		<input type="submit" class="utune-button" value="Save">
	</div>
</div>