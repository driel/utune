<?php
function utune_button($atts, $content = '', $code){
	ob_start();
	$opt = shortcode_atts(array(
		'size'=>'',
		'type'=>'default',
		'url'=>'#',
		'target'=>'_self',
		'tooltip'=>'',
		'tooltip_placement'=>'top'
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

	$output = '<button type="button" class="btn btn-'.$opt['type'].$size.'"';
	if($code == 'button_to'){
		$output = '<a href="'.$opt['url'].'" class="btn btn-'.$opt['type'].$size.'" target="'.$opt['target'].'"';
	}

	// tooltip
	if(strlen($opt['tooltip']) > 0){
		$output .= ' data-toggle="tooltip" title="'.$opt['tooltip'].'" data-placement="'.$opt['tooltip_placement'].'"';
	}

	$output .= '>';
	$output .= ($code == 'button_to' ? do_shortcode($content).'</a>':do_shortcode($content).'</button>');

	return $output;
}
add_shortcode('button', 'utune_button');
add_shortcode('button_to', 'utune_button');

// bootstrap row.
// must be used before column
function utune_row($atts, $content){
	return '<div class="row utune-row">'.do_shortcode($content).'</div>';
}
add_shortcode('row', 'utune_row');

// bootstrap column
// must be wrapped inside column
function utune_column($atts, $content = '', $code){
	$opt = shortcode_atts(array(
		'border_width'=>'0',
		'border_color'=>'#333'
	), $atts);
	$col = array(
		'col_one'=>'col-xs-1 col-md-1',
		'col_two'=>'col-xs-2 col-md-2',
		'col_three'=>'col-xs-3 col-md-3',
		'col_four'=>'col-xs-4 col-md-4',
		'col_five'=>'col-xs-5 col-md-5',
		'col_six'=>'col-xs-6 col-md-6',
		'col_seven'=>'col-xs-7 col-md-7',
		'col_eight'=>'col-xs-8 col-md-8',
		'col_nine'=>'col-xs-9 col-md-9',
		'col_ten'=>'col-xs-10 col-md-10',
		'col_eleven'=>'col-xs-11 col-md-11',
		'col_twelve'=>'col-xs-12 col-md-12'
	);
	$style = '';
	if((int)$opt["border_width"] > 0){
		$style = 'border: '.$opt["border_width"].'px solid '.$opt["border_color"] ;
	} 
	return '<div class="'.$col[$code].'" style="'.$style.'">'.do_shortcode($content).'</div>';
}
$col = array(
	'col_one', 'col_two', 'col_three', 'col_four', 'col_five', 'col_six',
	'col_seven', 'col_eight', 'col_nine', 'col_ten', 'col_eleven', 'col_twelve'
);
foreach($col as $code){
	add_shortcode($code, 'utune_column');
}

/*
** TABS
*/
function utune_tab_group($atts, $content, $code){
    $GLOBALS['tab_count'] = 0;
    $opt = shortcode_atts(array(
    	'active_tab'=>'0'
	), $atts);

    do_shortcode( $content );

    if( is_array( $GLOBALS['tabs'] ) ){
	    foreach( $GLOBALS['tabs'] as $k=>$tab ){
	    	$target = strtolower(str_replace(' ', '-', $tab['title']));
	        $tabs[] = '<li'.((int)$opt['active_tab'] == $k ? ' class="active"':'').'><a href="#tab-'.$target.'" role="tab" data-toggle="tab">'.$tab['title'].'</a></li>';
	        $panes[] = '<div class="tab-pane'.((int)$opt['active_tab'] == $k ? ' active':'').' fade'.($k == 0 ? ' in':'').'" id="tab-'.$target.'">'.$tab['content'].'</div>';
	    }

	    $return = "\n".'<ul class="nav nav-tabs">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="tab-content">'.implode( "\n", $panes ).'</div>'."\n";
	    if($code == 'vtabgroup'){
	    	$return = "\n".'<div class="row"><div class="col-md-3 col-xs-3"><ul class="vtab nav nav-tabs">'.implode( "\n", $tabs ).'</ul></div>'."\n".'<div class="col-md-9 col-xs-9"><div class="tab-content">'.implode( "\n", $panes ).'</div></div></div>'."\n";
	    }
	}
    return $return;
}
add_shortcode( 'tabgroup', 'utune_tab_group' );
add_shortcode( 'vtabgroup', 'utune_tab_group' );

function utune_tab( $atts, $content ){
    extract(shortcode_atts(array(
            'title' => 'Tab %d'
    ), $atts));

    $x = $GLOBALS['tab_count'];
    $GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  $content );

    $GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'utune_tab' );

/*
** ACCORDION
*/
function utune_accordian_group($atts, $content){
	$GLOBALS['acc_count'] = 0;
	$opt = shortcode_atts(array(
		'active_accordion'=>'0'
	), $atts);

	do_shortcode($content);

	$random = rand(0, 1000000);

	if(is_array($GLOBALS['accs'])){
		foreach($GLOBALS['accs'] as $k=>$tab){
			$target = strtolower(str_replace(' ', '-', $tab['title']));
			$accs[] = '<div class="panel panel-default">
				<div class="panel-heading"><h4 class="panel-title"><a href="#'.$target.'" data-toggle="collapse" data-parent="#accordion-'.$random.'">'.$tab['title'].'</a></h4></div>
				<div id="'.$target.'" class="panel-collapse collapse'.($opt['active_accordion'] == $k ? ' in':'').'"><div class="panel-body">'.$tab['content'].'</div></div>
			</div>';
		}

		$return = '<div class="panel-group" id="accordion-'.$random.'">';
		$return .= implode("\n", $accs);
		$return .= '</div>';
	}
	return $return;
}
add_shortcode('accordion_group', 'utune_accordian_group');

function utune_accordion($atts, $content){
	extract(shortcode_atts(array(
            'title' => 'Tab %d'
    ), $atts));

    $x = $GLOBALS['acc_count'];
    $GLOBALS['accs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['acc_count'] ), 'content' =>  $content );

    $GLOBALS['acc_count']++;
}
add_shortcode('accordion', 'utune_accordion');