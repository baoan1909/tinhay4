<?php

function newspiper_customize_colors( $wp_customize ) {

	$wp_customize->get_section( 'colors' )->description = esc_html__( 'Customze the colors of the light theme mode. To customize the dark theme mode, go to the Night Mode section. Colors that are selected in the Gutenberg Block editor will not be affected.', 'newspiper' );

	$wp_customize->add_setting(
		'primary_accent_color',
		array(
			'default'           => '#0e40f7',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_accent_color',
			array(
				'label'   => esc_html__( 'Primary Accent Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'secondary_accent_color',
		array(
			'default'           => '#ffd100',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'secondary_accent_color',
			array(
				'label'   => esc_html__( 'Secondary Accent Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	// Headings Text Color
	$wp_customize->add_setting(
		'headings_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'headings_text_color',
			array(
				'label'   => esc_html__( 'Headings Text Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	// links_headings_text_color

	// Body Text Color
	$wp_customize->add_setting(
		'body_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_text_color',
			array(
				'label'   => esc_html__( 'Body Text Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	// Headings Text Color
	$wp_customize->add_setting(
		'link_headings_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_headings_text_color',
			array(
				'label'   => esc_html__( 'Link Headings Text Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'links_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'links_text_color',
			array(
				'label'   => esc_html__( 'Links Text Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'buttons_bgr_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buttons_bgr_color',
			array(
				'label'   => esc_html__( 'Buttons Background Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	$wp_customize->add_setting(
		'buttons_text_color',
		array(
			'default'           => '#404040',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'buttons_text_color',
			array(
				'label'   => esc_html__( 'Buttons Text Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	// Header text color
	$wp_customize->add_setting(
		'newspiper_header_text_color',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'newspiper_header_text_color',
			array(
				'label'   => esc_html__( 'Primary Menu Text Color', 'newspiper' ),
				'section' => 'colors',
			)
		)
	);

	// top menu background color
	$wp_customize->add_setting(
		'top-menu_bgr_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'top-menu_bgr_color',
			array(
				'label'           => esc_html__( 'Top Bar Background Color', 'newspiper' ),
				'section'         => 'colors',
				'active_callback' => 'newspiper_has_secondary_menu',
			)
		)
	);

	// top menu text color
	$wp_customize->add_setting(
		'top-menu_text_color',
		array(
			'default'           => '#334142',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'top-menu_text_color',
			array(
				'label'           => esc_html__( 'Top Bar Text Color', 'newspiper' ),
				'section'         => 'colors',
				'active_callback' => 'newspiper_has_secondary_menu',
			)
		)
	);

	$wp_customize->add_setting(
		'promo_banner_background_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'promo_banner_background_color',
			array(
				'label'           => esc_html__( 'Promo Banner Background Color', 'newspiper' ),
				'section'         => 'colors',
				'active_callback' => 'newspiper_has_promo_banner',
			)
		)
	);

	$wp_customize->add_setting(
		'promo_banner_text_color',
		array(
			'sanitize_callback' => 'sanitize_hex_color',
			'default'           => '#404040',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'promo_banner_text_color',
			array(
				'label'           => esc_html__( 'Promo Banner Text Color', 'newspiper' ),
				'section'         => 'colors',
				'active_callback' => 'newspiper_has_promo_banner',
			)
		)
	);

}

add_action( 'customize_register', 'newspiper_customize_colors', 10 );

function newspiper_customize_colors_css() {

	$body_text_color               = get_theme_mod( 'body_text_color' );
	$headings_text_color           = get_theme_mod( 'headings_text_color' );
	$link_headings_text_color      = get_theme_mod( 'link_headings_text_color' );
	$links_text_color              = get_theme_mod( 'links_text_color' );
	$buttons_bgr_color             = get_theme_mod( 'buttons_bgr_color' );
	$buttons_text_color            = get_theme_mod( 'buttons_text_color', '#404040' );
	$primary_accent_color          = get_theme_mod( 'primary_accent_color', '#1656d1' );
	$secondary_accent_color        = get_theme_mod( 'secondary_accent_color', '#ffd100' );
	$promo_banner_background_color = get_theme_mod( 'promo_banner_background_color', '#fff' );
	$promo_banner_text_color       = get_theme_mod( 'promo_banner_text_color', '#404040' );

	?>
	
	<style>
	body:not(.dark-mode) {
	<?php if ( $links_text_color ) : ?>
	--wp--preset--color--links: <?php echo esc_attr( $links_text_color )?>;
	--wp--preset--color--links-hover: <?php echo esc_attr( newspiper_brightness( $links_text_color, -25 ) );?>;
	<?php endif; ?>
	<?php if ( $link_headings_text_color ) : ?>
	--wp--preset--color--link-headings: <?php echo esc_attr( $link_headings_text_color )?>;
	--wp--preset--color--link-headings-hover: <?php echo esc_attr( newspiper_brightness( $link_headings_text_color, -25 ) );?>;
	<?php endif; ?>
	}

	<?php if ( $body_text_color ) : ?> 
	body {
		color: <?php echo esc_attr( $body_text_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $headings_text_color ) : ?>
	h1, h2, h3, h4, h5, h6 {
		color: <?php echo esc_attr( $headings_text_color ); ?>;
	}
	<?php endif; ?>

	body:not(.dark-mode) input[type="button"], 
	body:not(.dark-mode) input[type="reset"], 
	body:not(.dark-mode) [type="submit"]:not(.header-search-form button),
	.wp-block-button > .slider-button,
	.newspiper-featured-products-wrapper .button {
		background-color: <?php echo $buttons_bgr_color ? esc_attr( $buttons_bgr_color ) : esc_attr( $secondary_accent_color ); ?>;
		color: <?php echo esc_attr( $buttons_text_color ); ?>;
	}

	<?php if ( $buttons_bgr_color ) : ?>
	.wp-element-button, .wp-block-button__link {
		background-color: <?php echo esc_attr( $buttons_bgr_color ); ?>;
	}
	<?php endif; ?>
	.back-to-top,
	.dark-mode .back-to-top,
	.navigation .page-numbers:hover,
	.navigation .page-numbers.current  {
		background-color: <?php echo $buttons_bgr_color ? esc_attr( newspiper_brightness( $buttons_bgr_color, -50 ) ) : esc_attr( newspiper_brightness( $secondary_accent_color, -25 ) ); ?>
	}

	body:not(.dark-mode) .promo-banner-wrapper {
		background-color: <?php echo esc_attr( $promo_banner_background_color ); ?>;
		color: <?php echo esc_attr( $promo_banner_text_color ); ?>;
	}
	.preloader .bounce1, .preloader .bounce2, .preloader .bounce3 {
		background-color: <?php echo esc_attr( newspiper_brightness( $primary_accent_color, -25 ) ); // WPCS: XSS ok. ?>;
	}

	.top-meta a:nth-of-type(3n+1),
	.recent-posts-pattern .taxonomy-category a:nth-of-type(3n+1) {
		background-color:  <?php echo esc_attr( $primary_accent_color ); ?>;
		z-index: 1;
	}

	.categories-section .category-meta {
		background-color: <?php echo esc_attr( newspiper_hex_to_rgba( $primary_accent_color, .6 ) ); ?>;
		z-index: 1;
	}

	.categories-section .category-meta:hover {
		background-color: <?php echo esc_attr( newspiper_hex_to_rgba( $primary_accent_color, .75 ) ); ?>;
		z-index: 1;
	}

	.top-meta a:nth-of-type(3n+1):hover,
	.recent-posts-pattern .taxonomy-category a:nth-of-type(3n+1):hover {
		background-color: <?php echo esc_attr( newspiper_brightness( $primary_accent_color, -50 ) ); // WPCS: XSS ok. ?>;
	}

	@media (max-width: 54em) {
		.slide-menu, .site-menu.toggled > .menu-toggle {
			background-color:  <?php echo esc_attr( $primary_accent_color ); ?>;
		}
	}

	@media (min-width:54em){
		#secondary .tagcloud a:hover {
			background-color: <?php echo esc_attr( $secondary_accent_color ); ?>;
		}
	}

	.section-features figure::before {
		background-color: <?php echo esc_attr( $primary_accent_color ); ?>;
		opacity: .85;
	}
	</style>
	
	<?php
}

add_action( 'wp_head', 'newspiper_customize_colors_css' );
