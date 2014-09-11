<?php
if(!function_exists('utune_widgets')){
	function utune_widgets(){

		register_sidebar(array(
			'name'          => __( 'Sidebar', 'utune' ),
			'id'            => 'utune_sidebar',
			'description'   => 'Main sidebar',
		    'class'         => 'utune-widget',
			'before_widget' => '<div class="utune-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="utune-widget-tittle">',
			'after_title'   => '</h2>'
		));

		register_sidebar(array(
			'name'          => __( 'Footer 1', 'utune' ),
			'id'            => 'utune_footer_1',
			'description'   => 'Sidebar in footer area',
		    'class'         => 'utune-widget',
			'before_widget' => '<div class="utune-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="utune-widget-tittle">',
			'after_title'   => '</h2>'
		));

		register_sidebar(array(
			'name'          => __( 'Footer 2', 'utune' ),
			'id'            => 'utune_footer_2',
			'description'   => 'Sidebar in footer area',
		    'class'         => 'utune-widget',
			'before_widget' => '<div class="utune-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="utune-widget-tittle">',
			'after_title'   => '</h2>'
		));

		register_sidebar(array(
			'name'          => __( 'Footer 3', 'utune' ),
			'id'            => 'utune_footer_3',
			'description'   => 'Sidebar in footer area',
		    'class'         => 'utune-widget',
			'before_widget' => '<div class="utune-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="utune-widget-tittle">',
			'after_title'   => '</h2>'
		));

		register_sidebar(array(
			'name'          => __( 'Footer 4', 'utune' ),
			'id'            => 'utune_footer_4',
			'description'   => 'Sidebar in footer area',
		    'class'         => 'utune-widget',
			'before_widget' => '<div class="utune-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="utune-widget-tittle">',
			'after_title'   => '</h2>'
		));
	}
}
add_action('widgets_init', 'utune_widgets');