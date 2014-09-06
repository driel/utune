<div class="clear"></div>
<div class="wrap">
	<h2 id="utune-heading"><?php echo __('Theme Settings', 'utune'); ?></h2>
	
	<ul class="utune-tabs">
		<li><a href="#general" class="active"><?php echo __('General', 'utune'); ?></a></li>
		<li><a href="#social"><?php echo __('Social Links', 'utune'); ?></a></li>
		<li><a href="#header"><?php echo __('Header', 'utune'); ?></a></li>
		<li><a href="#footer"><?php echo __('Footer', 'utune'); ?></a></li>
		<li><a href="#analytic"><?php echo __('Analytic', 'utune'); ?></a></li>
		<li><a href="#advanced" class="last-tab"><?php echo __('Advanced', 'utune'); ?></a></li>
	</ul>
	<form action="" method="post">
	<div class="tab-content">
		<div class="tab-pane active" id="general"><?php require_once('options-generals.php'); ?></div>
		<div class="tab-pane" id="social"><?php require_once('options-social.php'); ?></div>
		<div class="tab-pane" id="header"><?php require_once('options-header.php'); ?></div>
		<div class="tab-pane" id="footer"><?php require_once('options-footer.php'); ?></div>
		<div class="tab-pane" id="analytic"><?php require_once('options-analytic.php'); ?></div>
		<div class="tab-pane" id="advanced"><?php require_once('options-advanced.php'); ?></div>
	</div>
	<div class="tab-footer">
		<input type="submit" class="utune-button" name="utune_save" value="Save Setttings">
	</div>
	</form>
</div>