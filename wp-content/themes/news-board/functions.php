<?php
/**
 * News Board functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package News Board
 */

if ( ! function_exists( 'news_board_setup' ) ) :
	function news_board_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'news-board', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'news_board_setup' );

if ( ! function_exists( 'news_board_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function news_board_enqueue_styles() {
		$parenthandle = 'flash-news-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'flash-news-slick-style',
				'flash-news-fontawesome-style',
				'flash-news-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'news-board-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'news_board_enqueue_styles' );

function admin_style() {
	?>
	<style type="text/css">
		.ocdi .notice.flash-news-demo-data {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'admin_style' );

require get_theme_file_path() . '/inc/customizer.php';

// Custom Controls
require get_theme_file_path() . '/inc/custom-controls.php';

// Widgets.
require get_theme_file_path() . '/inc/widgets/widgets.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}

function news_board_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'flash_news_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '1093ea',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'flash_news_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'news_board_custom_header_setup' );

function news_board_dynamic_css() {

	$custom_css = '
	/* Color */
	:root {
		--header-text-color: ' . esc_attr( '#' . get_header_textcolor() ) . ';
	}
	';

	wp_add_inline_style( 'news-board-style', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'news_board_dynamic_css', 99 );

/**
 * Renders customizer section link
 */
function news_board_section_link( $section_id ) {
	$section_name      = str_replace( 'news_board_', ' ', $section_id );
	$section_name      = str_replace( '_', ' ', $section_name );
	$starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $starting_notation . $section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}
