<?php
function google_fonts($name, $selected = ''){
	$googlefonts = array(
		"Arvo"=>"Arvo",
		"Droid Sans" => "Droid+Sans",
		"Droid Serif" => "Droid+Serif",
		"Josefin Slab" => "Josefin+Slab",
		"Lato" => "Lato",
		"Libre Baskerville" => "Libre+Baskerville",
		"Lobster" => "Lobster",
		"Lobster Two" => "Lobster+Two",
		"Lora" => "Lora",
		"Open Sans" => "Open+Sans",
		"Open Sans Condensed" => "Open+Sans+Condensed",
		"Oswald" => "Oswald",
		"PT Serif" => "PT+Serif",
		"Raleway" => "Raleway",
		"Roboto" => "Roboto",
		"Roboto Condensed" => "Roboto+Condensed",
		"Source Sans Pro" => "Source+Sans+Pro",
		"Ubuntu" => "Ubuntu",
		"Ubuntu Condensed" => "Ubuntu+Condensed",
		"Vollkorn" => "Vollkorn"
	);

	$html = '<select name="'.$name.'" class="select">';
	foreach($googlefonts as $k=>$v){
		if($selected == $v){
			$html .= '<option value="'.$v.'" selected>'.$k.'</option>';
		}else{
			$html .= '<option value="'.$v.'">'.$k.'</option>';
		}
	}
	$html .= '</select>';
	return $html;
}