<?php
function utune_button($atts, $content = '', $code){
	ob_start();
	$opt = shortcode_atts(array(
		'size'=>'',
		'type'=>'default',
		'url'=>'#',
		'target'=>'_self'
	), $atts);


	$size = '';
	switch($opt['size']){
		case 'extra-small':
			$size = ' btn-xs';
		break;

		case 'small':
			$size = ' btn-sm';
		break;

		case 'large':
			$size = ' btn-lg';
		break;

		default:
			$size = '';
		break;
	}

	$output = '<button type="button" class="btn btn-'.$opt['type'].$size.'">'.do_shortcode($content).'</button>';
	if($code == 'button_to'){
		$output = '<a href="'.$opt['url'].'" class="btn btn-'.$opt['type'].$size.'" target="'.$opt['target'].'">'.do_shortcode($content).'</a>';
	}
	return $output;
}
add_shortcode('button', 'utune_button');
add_shortcode('button_to', 'utune_button');

// bootstrap row.
// must be used before column
function utune_row($atts, $content){
	return '<div class="row">'.do_shortcode($content).'</div>';
}
add_shortcode('row', 'utune_row');

// bootstrap column
// must be wrapped inside column
function utune_column($atts, $content = '', $code){
	$opt = shortcode_atts(array(), $atts);
	$col = array(
		'col_one'=>'col-sm-1 col-md-1 col-lg-1',
		'col_two'=>'col-sm-2 col-md-2 col-lg-2',
		'col_three'=>'col-sm-3 col-md-3 col-lg-3',
		'col_four'=>'col-sm-4 col-md-4 col-lg-4',
		'col_five'=>'col-sm-5 col-md-5 col-lg-5',
		'col_six'=>'col-sm-6 col-md-6 col-lg-6',
		'col_seven'=>'col-sm-7 col-md-7 col-lg-7',
		'col_eight'=>'col-sm-8 col-md-8 col-lg-8',
		'col_nine'=>'col-sm-9 col-md-9 col-lg-9',
		'col_ten'=>'col-sm-10 col-md-10 col-lg-10',
		'col_eleven'=>'col-sm-11 col-md-11 col-lg-11',
		'col_twelve'=>'col-sm-12 col-md-12 col-lg-12'
	);
	return '<div class="'.$col[$code].'">'.do_shortcode($content).'</div>';
}
$col = array(
	'col_one', 'col_two', 'col_three', 'col_four', 'col_five', 'col_six',
	'col_seven', 'col_eight', 'col_nine', 'col_ten', 'col_eleven', 'col_twelve'
);
foreach($col as $code){
	add_shortcode($code, 'utune_column');
}