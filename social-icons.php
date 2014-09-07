<?php
$icons = array('facebook'=>'fa-facebook', 'twitter'=>'fa-twitter', 'gplus'=>'fa-google-plus', 'youtube'=>'fa-youtube');
$socials = utune_get_option('social_media');
foreach($socials as $k=>$v){
	echo '<a href="'.$v.'"><span class="fa '.$icons[$k].' utune-social-icon social-'.$k.'"></span></a>';
}