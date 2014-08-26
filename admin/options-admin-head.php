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