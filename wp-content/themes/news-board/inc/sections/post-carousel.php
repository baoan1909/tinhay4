<?php
if ( ! get_theme_mod( 'news_board_enable_post_carousel_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'news_board_post_carousel_content_type', 'category' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$content_ids[] = get_theme_mod( 'news_board_post_carousel_content_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);

} else {
	$cat_content_id = get_theme_mod( 'news_board_post_carousel_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

$args = apply_filters( 'news_board_post_carousel_section_args', $args );

news_board_render_post_carousel_section( $args );

/**
 * Render Post Carousel Section.
 */
function news_board_render_post_carousel_section( $args ) {
	$section_title = get_theme_mod( 'news_board_post_carousel_title', __( 'Post Carousel', 'news-board' ) );
	$button_label  = get_theme_mod( 'news_board_post_carousel_button_label', __( 'View All', 'news-board' ) );
	$button_link   = get_theme_mod( 'news_board_post_carousel_button_link' );
	$button_link   = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="news_board_post_carousel_section" class="magazine-frontpage-section magazine-post-carousel-section">
			<?php
			if ( is_customize_preview() ) :
				news_board_section_link( 'news_board_post_carousel_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $button_label ) ) { ?>
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<a href="<?php echo esc_url( $button_link ); ?>" class="mag-view-all-link"><?php echo esc_html( $button_label ); ?></a>
					</div>
				<?php } ?>
				<div class="magazine-section-body">
					<div class="magazine-post-carousel-section-wrapper post-carousel magazine-carousel-slider-navigation">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="carousel-item">
								<div class="mag-post-single has-image tile-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
									<div class="mag-post-detail">
										<div class="mag-post-category with-background">
											<?php flash_news_categories_list( true ); ?>
										</div>
										<h3 class="mag-post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="mag-post-meta">
											<span class="post-author">
												<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
											</span>
											<span class="post-date">
												<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
											</span>
										</div>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
}
