<?php
/**
 * Theme Customizer
 *
 * @package News_Board
 */

function news_board_customize_register( $wp_customize ) {

	require get_theme_file_path() . '/inc/customizer/post-carousel.php';

	// Upsell Section.
	$wp_customize->add_section(
		new News_Board_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'News Board Pro', 'news-board' ),
				'button_text'      => __( 'Buy Pro', 'news-board' ),
				'url'              => 'https://ascendoor.com/themes/news-board-pro/',
				'background_color' => '#3e8de3',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

}
add_action( 'customize_register', 'news_board_customize_register' );

function news_board_customize_preview_js() {
	wp_enqueue_script( 'news-board-customizer', get_stylesheet_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview', 'flash-news-customizer' ), FLASH_NEWS_VERSION, true );
}
add_action( 'customize_preview_init', 'news_board_customize_preview_js' );

function news_board_custom_control_scripts() {
	wp_enqueue_style( 'news-board-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls.css', array( 'flash-news-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'news-board-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls.js', array( 'flash-news-custom-controls-js', 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'news_board_custom_control_scripts' );

/*=====================Active Callback=================*/

// Posts Carousel section.
function news_board_is_post_carousel_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'news_board_enable_post_carousel_section' )->value() );
}
function news_board_is_post_carousel_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_board_post_carousel_content_type' )->value();
	return ( news_board_is_post_carousel_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function news_board_is_post_carousel_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'news_board_post_carousel_content_type' )->value();
	return ( news_board_is_post_carousel_section_enabled( $control ) && ( 'category' === $content_type ) );
}
