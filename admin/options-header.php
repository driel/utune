<div class="block">
	<div class="block-title"><?php echo __('Show Search', 'utune'); ?></div>
	<input type="checkbox" name="utune[show_search]" class="checkSwitch" <?php echo utune_get_option('show_search') == 'on' ? 'checked':'' ?>>
</div>
<div class="block">
	<div class="block-title"><?php echo __('Show Social Icons', 'utune'); ?></div>
	<input type="checkbox" name="utune[show_social_icons]" class="checkSwitch" <?php echo utune_get_option('show_social_icons') == 'on' ? 'checked':'' ?>>
</div>
<div class="block">
	<div class="block-title"><?php echo __('Tagline', 'utune'); ?></div>
	<input type="text" name="utune[tagline]" class="utune-input" value="<?php echo utune_get_option('tagline')?>"><br />
	<small><i>you can use this feature for qtranslate language selector as well, just put the HTML here.</i></small>
</div>