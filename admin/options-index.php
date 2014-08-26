<div class="clear"></div>
<div class="wrap">
	<h2 id="utune-heading">Theme Settings</h2>
	
	<ul class="utune-tabs">
		<li><a href="#general" class="active">General</a></li>
		<li><a href="#social">Social Links</a></li>
		<li><a href="#header">Header</a></li>
		<li><a href="#footer">Footer</a></li>
		<li><a href="#analytic" class="last-tab">Analytic</a></li>
	</ul>
	
	<div class="tab-content">
		<div class="tab-pane active" id="general"><?php require_once('options-generals.php'); ?></div>
		<div class="tab-pane" id="social"><?php require_once('options-social.php'); ?></div>
		<div class="tab-pane" id="header"><?php require_once('options-header.php'); ?></div>
		<div class="tab-pane" id="footer"><?php require_once('options-footer.php'); ?></div>
		<div class="tab-pane" id="analytic"><?php require_once('options-analytic.php'); ?></div>
	</div>
	<div class="tab-footer">
		<input type="submit" class="utune-button" value="Save">
	</div>
</div>