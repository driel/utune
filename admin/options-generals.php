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
	<div class="block-title"><?php echo __('Blog Heading', 'utune'); ?></div>
	<input type="text" name="utune[blog_heading]" class="utune-input" value="<?php echo utune_get_option('blog_heading'); ?>" />
</div>
<div class="block">
	<div class="block-title"><?php echo __('Blog Subheading', 'utune'); ?></div>
	<input type="text" name="utune[blog_subheading]" class="utune-input" value="<?php echo utune_get_option('blog_subheading'); ?>" />
</div>
<div class="block">
	<div class="block-title"><?php echo __('Font', 'utune'); ?></div>
	<?php echo google_fonts('utune[font]', utune_get_option('font')); ?>
</div>
<div class="block">
	<div class="block-title"><?php echo __('Color Scheme', 'utune'); ?></div>
	<input type="hidden" name="utune[color]" id="utune-color" value="<?php echo utune_get_option('color'); ?>">
	<input type="text" id="utune-color-picker" value="<?php echo utune_get_option('color'); ?>" />
</div>