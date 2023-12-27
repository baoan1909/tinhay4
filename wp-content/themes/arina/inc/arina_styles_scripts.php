<?php

$arina_theme_info = wp_get_theme();
define( 'ARINA_THEME_VERSION', ( WP_DEBUG ) ? time() : $arina_theme_info->get( 'Version' ) );

function arina_enqueue_scripts() {
	
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.css',null,'v4.2.1');
	
	wp_enqueue_style('arina-google-font-css', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');	
	wp_enqueue_style('linearicons', get_template_directory_uri().'/assets/css/linearicons.css');		
	wp_enqueue_style('arina-editor-css', get_template_directory_uri().'/assets/css/style-editor.css',null,ARINA_THEME_VERSION);
	wp_enqueue_style('arina-style', get_stylesheet_uri());
	
	wp_enqueue_script('popper',get_template_directory_uri().'/assets/js/popper.js', array('jquery'),'1.13.0',true);	
	
	wp_enqueue_script('bootstrap',get_template_directory_uri().'/assets/js/bootstrap.js', array('jquery'),'v4.2.1',true);	
	
	wp_enqueue_script( 'arina-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), ARINA_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'arina_enqueue_scripts' );

function arina_block_editor_styles() {
	wp_enqueue_style( 'arina-block-editor-styles', get_template_directory_uri() . '/block-editor.css', null,ARINA_THEME_VERSION);
}
add_action( 'enqueue_block_editor_assets', 'arina_block_editor_styles' );
