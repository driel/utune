<div class="block">
	<div class="block-title"><?php echo __('Custom Javascript', 'utune');?> <small><i>don't use &lt;script&gt;&lt;/script&gt;</i></small></div>
	<textarea name="utune[custom_js]" class="utune-textarea" cols="100" rows="7"><?php echo stripslashes_deep(utune_get_option('custom_js')); ?></textarea>
</div>
<div class="block">
	<div class="block-title"><?php echo __('Custom CSS', 'utune'); ?> <small><i>don't use &lt;style&gt;&lt;/style&gt;</i></small></div>
	<textarea name="utune[custom_css]" class="utune-textarea" cols="100" rows="7"><?php echo stripslashes_deep(utune_get_option('custom_css')); ?></textarea>
</div>