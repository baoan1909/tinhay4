<?php

// Posts Tile Widgets.
require get_theme_file_path() . '/inc/widgets/posts-tile-widget.php';

// Trending Posts Carousel Widgets.
require get_theme_file_path() . '/inc/widgets/trending-posts-carousel-widget.php';

/**
 * Register Widgets
 */
function news_board_register_widgets() {

	register_widget( 'Flash_News_Posts_Tile_Widget' );

	register_widget( 'Flash_News_Trending_Posts_Carousel_Widget' );

}
add_action( 'widgets_init', 'news_board_register_widgets' );
