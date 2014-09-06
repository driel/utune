<div class="block">
	<div class="block-title"><?php echo __('Show Search', 'utune'); ?></div>
	<input type="checkbox" name="utune[show_search]" class="checkSwitch" <?php echo utune_get_option('show_search') == 'on' ? 'checked':'' ?>>
</div>
<div class="block">
	<div class="block-title"><?php echo __('Show Social Icons', 'utune'); ?></div>
	<input type="checkbox" name="utune[show_social_icons]" class="checkSwitch" <?php echo utune_get_option('show_social_icons') == 'on' ? 'checked':'' ?>>
</div>