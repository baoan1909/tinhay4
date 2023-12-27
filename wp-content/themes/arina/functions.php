<?php

	if ( ! function_exists( 'arina_setup' ) ) :
		function arina_setup() {

	        // Make theme available for translation.
			load_theme_textdomain( 'arina', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );


			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );


			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Enable Wide angle image in gutenberg

			add_theme_support( 'align-wide' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus( array(
				'primary-menu' => esc_html__( 'Primary Menu', 'arina' ),
			) );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				array(
					'comment-form',
					'comment-list',
					'caption',
				)
			);

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'arina_custom_background_args', array(
				'default-color' => 'f4f7f6',
			) ) );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			// Custom Thumbnail Image Size
			add_image_size("arina-landscape",730,400,true);

			//Add support for core custom logo.
			add_theme_support( 'custom-logo', array(
				'height'      => 94,
				'width'       => 200,
				'flex-width'  => true,
				'flex-height' => true,
			) );
		}
	endif;
	add_action( 'after_setup_theme', 'arina_setup' );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', arina_fonts_url() ) );
	
	
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 */
	function arina_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'arina_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'arina_content_width', 0 );

	/**
	 * Enqueue scripts and styles.
	 */

	require get_template_directory() .'/inc/arina_styles_scripts.php';

	/**
	 * arina Widgets.
	 */
	require get_template_directory() .'/inc/arina_widgets.php';

	/**
	 * Custom template tags for this theme.
	 */
	require get_template_directory() . '/inc/template-tags.php';

	/**
	 * Functions which enhance the theme by hooking into WordPress.
	 */
	require get_template_directory() . '/inc/template-functions.php';

	/**
	 * Custom Functions for the Theme.
	 */
	require get_template_directory() . '/inc/custom-functions.php';
	
	/**
	 * Customizer additions.
	 */
	require get_template_directory() . '/inc/customizer/customizer.php';

	/**
	 * Implement the Custom Header feature.
	 */
	require get_template_directory() . '/inc/customizer/custom-header.php';

	/**
	 * Load Jetpack compatibility file.
	 */
	if ( defined( 'JETPACK__VERSION' ) ) {
		require get_template_directory() . '/inc/compatibility/jetpack.php';
	}

function arina_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}