<?php
/**
 * Newspiper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newspiper
 */

if ( ! defined( 'NEWSPIPER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NEWSPIPER_VERSION', '0.3.2' );
}

if ( ! function_exists( 'newspiper_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function newspiper_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'newspiper', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations based on theme customizer options.

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'newspiper' ),
				'menu-2' => esc_html__( 'Top', 'newspiper' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/**
		 * Add support for page excerpts.
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_post_type_support/
		 */
		add_post_type_support( 'page', 'excerpt' );

		// Set default values for the upload media box
		update_option('image_default_align', 'center' );
		update_option('image_default_size', 'large' );

	}
endif;
add_action( 'after_setup_theme', 'newspiper_setup' );

/**
 * Register widget area.
 * Sidebars are thing from the past - this theme does not plan to support them.
 * Use the column block in the WordPress Editor instead.
 * This theme registers one widget area in the footer
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newspiper_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'newspiper' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the first column in the footer.', 'newspiper' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'newspiper' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the second column in the footer.', 'newspiper' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'newspiper' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the third column in the footer.', 'newspiper' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'newspiper' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the fourth column in the footer.', 'newspiper' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'newspiper' ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Widgets in this area will be displayed in the fourth column in the footer.', 'newspiper' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="heading">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'newspiper_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function newspiper_scripts() {
	$script_asset = require get_template_directory() . '/build/js/app.asset.php';
	wp_enqueue_style( 'newspiper-style', get_template_directory_uri() . '/build/css/main.css', array(), filemtime( get_template_directory() . '/build/css/main.css' ) );
	wp_style_add_data( 'newspiper-style', 'rtl', 'replace' );

	wp_enqueue_script( 'newspiper-script', get_template_directory_uri() . '/build/js/app.js', $script_asset['dependencies'], $script_asset['version'], true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$js_customizer_options = array(
		'ajax_url'                  => esc_url( admin_url( 'admin-ajax.php' ) ),
		'address'                   => esc_html( $_SERVER['REMOTE_ADDR'] ),
		'fixed_header'              => newspiper_is_fixed_header(),
		'sticky_header'             => newspiper_is_sticky_header(),
		'has_hero_image'            => newspiper_has_transparent_header(),
		'column'                    => esc_html( get_theme_mod( 'post_archives_columns', '1' ) ),
		'has_masonry_layout'        => esc_html( get_theme_mod( 'post_archives_display', 'grid' ) !== 'grid' ),
		'show_top_bar_icons_mobile' => esc_html( get_theme_mod( 'show_top_bar_icons_mobile', false ) ),
	);
	// theme options
	wp_localize_script( 'newspiper-script', 'newspiper_customizer_object', $js_customizer_options );
	// dark mode object
	wp_localize_script( 'newspiper-script', 'newspiper_theme_mode_object', array( newspiper_default_mode() ) );
}
add_action( 'wp_enqueue_scripts', 'newspiper_scripts' );

// Add scripts and styles for backend
function newspiper_scripts_admin( $hook ) {
	// Styles
	wp_enqueue_style(
		'newspiper-style-admin',
		get_template_directory_uri() . '/admin/css/admin.css',
		'',
		filemtime( get_template_directory() . '/admin/css/admin.css' ),
		'all'
	);
}
add_action( 'admin_enqueue_scripts', 'newspiper_scripts_admin' );

// Add scripts and styles to the frontend and to the block editor at the same time
function newspiper_block_scripts() {
	wp_enqueue_style( 'newspiper-block-styles', get_template_directory_uri() . '/assets/css/core-add.css', '', filemtime( get_template_directory() . '/assets/css/core-add.css' ), 'all' );
	wp_enqueue_script( 'newspiper-block-scripts', get_template_directory_uri() . '/assets/js/core-add.js', '', filemtime( get_template_directory() . '/assets/css/core-add.css' ), true );
}
add_action( 'enqueue_block_assets', 'newspiper_block_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Theme hooks
 */
require get_template_directory() . '/inc/template-hooks.php';

/**
 * Block Patterns
 */

 require get_template_directory() . '/inc/blocks/block-patterns.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom svg icons
 */
require get_template_directory() . '/assets/svg/svg-icons.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/* Include Theme Options Page for Admin */
if ( is_admin() ) {
	require_once 'admin/theme-intro.php';

	if ( current_user_can( 'manage_options' ) ) {
		require_once get_template_directory() . '/admin/notices.php';
		require_once get_template_directory() . '/admin/welcome-notice.php';
	}
}

/**
 * starter content
 */
require get_template_directory() . '/starter-content/init.php';
