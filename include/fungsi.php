<?php
if(!function_exists('utune_get_option')){
	function utune_get_option($k){
		$settings = get_option('utune_settings');
		if(is_serialized($settings)){
			$settings = unserialize($settings);
			return $settings[$k];
		}
		return '';
	}
}

if(!function_exists('utune_get_social_link')){
	function utune_get_social_link($social){
		$socials = utune_get_option('social_media');
		if(array_key_exists($social, $socials)){
			return $socials[$social];
		}
		return '';
	}
}