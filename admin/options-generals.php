<div class="block">
	<div class="block-title"><?php echo __('Site Logo', 'utune'); ?></div>
	<input type="text" name="utune[site_logo]" id="utune-site-logo" class="utune-input" value="<?php echo utune_get_option('site_logo'); ?>" />
	<input type="button" class="media-uploader utune-button" data-target="#utune-site-logo" data-title="Select Logo" data-button-text="Use this image" value="browse">
</div>
<div class="block">
	<div class="block-title"><?php echo __('Favicon', 'utune'); ?></div>
	<input type="text" name="utune[favicon]" id="utune-favicon" class="utune-input" value="<?php echo utune_get_option('favicon'); ?>" />
	<input type="button" class="media-uploader utune-button" data-target="#utune-favicon" data-title="Select Favicon" data-button-text="Use this image" value="browse">
</div>
<div class="block">
	<div class="block-title"><?php echo __('Font', 'utune'); ?></div>
	<?php echo google_fonts('utune[font]', utune_get_option('font')); ?>
</div>