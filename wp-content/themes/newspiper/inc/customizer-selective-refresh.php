<?php
/**
 * Add selective refresh and postMessage support for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newspiper_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'newspiper_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'newspiper_customize_partial_blogdescription',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'newspiper_header_title',
			array(
				'selector'            => '.header-image-container h1',
				'settings'            => 'newspiper_header_title',
				'container_inclusive' => false,
				'fallback_refresh'    => true,
				'render_callback'     => 'newspiper_header_title_text_partial',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'newspiper_header_description',
			array(
				'selector'            => '.header-image-container p',
				'settings'            => 'newspiper_header_description',
				'container_inclusive' => false,
				'fallback_refresh'    => true,
				'render_callback'     => 'newspiper_header_description_text_partial',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'newspiper_call_to_action',
			array(
				'selector'            => '.header-image-container p',
				'settings'            => 'newspiper_header_description',
				'container_inclusive' => false,
				'fallback_refresh'    => true,
				'render_callback'     => 'newspiper_header_description_text_partial',
			)
		);


		$wp_customize->selective_refresh->add_partial(
			'location',
			array(
				'selector'            => '.location',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_location',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'phone_control',
			array(
				'selector'            => '.phone',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_phone',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'mail_control',
			array(
				'selector'            => '.mail',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_mail',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'has_search',
			array(
				'selector'            => '.search-icon',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_search_icon',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'has_wc_icons',
			array(
				'selector'         => '.site-header-account',
				'fallback_refresh' => true,
				'render_callback'  => 'newspiper_customize_partial_wc_icons',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'enable_dark_mode',
			array(
				'selector'         => '.dark-mode-menu-item',
				'fallback_refresh' => true,
				'render_callback'  => 'newspiper_customize_partial_dark_mode',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'newspiper_categories_title',
			array(
				'selector'            => '.categories-section h3.section-title',
				'settings'            => 'newspiper_categories_title',
				'container_inclusive' => false,
				'fallback_refresh'    => true,
				'render_callback'     => 'newspiper_categories_title_text_partial',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'newspiper_categories_view_all_button_label',
			array(
				'selector'            => '.categories-section .view-all',
				'settings'            => 'newspiper_categories_view_all_button_label',
				'container_inclusive' => false,
				'fallback_refresh'    => true,
				'render_callback'     => 'newspiper_categories_view_all_button_label_text_partial',
			)
		);

		$wp_customize->selective_refresh->add_partial('you_missed_title', 
		array(
            'selector'        => '.missed-posts-section .entry-widget-title .title',
            'render_callback' => 'newspiper_customize_you_missed_title',
        ));

		$wp_customize->selective_refresh->add_partial(
			'show_post_meta_before_post_content',
			array(
				'selector'            => '.entry-meta',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_get_post_meta_before_post_content',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'show_post_meta_after_post_content',
			array(
				'selector'            => '.entry-footer .entry-meta',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_get_post_meta_after_post_content',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'show_related_posts',
			array(
				'selector'            => '.related-posts-wrapper',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_show_related_posts',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'show_author_box',
			array(
				'selector'            => '.about-author',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_show_author_box',
			)
		);

		//social_url_icons_footer
		$wp_customize->selective_refresh->add_partial(
			'show_footer_social_icons',
			array(
				'selector'            => '.social-icons',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_customize_partial_social_icons_footer',
			)
		);
		// social share in single.php
		$wp_customize->selective_refresh->add_partial(
			'show_social_share_icons',
			array(
				'selector'            => '.post-share-wrap',
				'fallback_refresh'    => true,
				'container_inclusive' => true,
				'render_callback'     => 'newspiper_social_posts_share',
			)
		);

	}
}
add_action( 'customize_register', 'newspiper_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newspiper_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newspiper_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function newspiper_header_title_text_partial() {
	return get_theme_mod( 'newspiper_header_title' );
}

function newspiper_header_description_text_partial() {
	return get_theme_mod( 'newspiper_header_description' );
}

/* Render top menu with selective refresh */
function newspiper_customize_partial_location() {
	newspiper_location_icon();
}

function newspiper_customize_partial_phone() {
	newspiper_phone_icon();
}

function newspiper_customize_partial_mail() {
	newspiper_mail_icon();
}

function newspiper_customize_partial_search_icon() {
	newspiper_search_icon();
}

function newspiper_customize_partial_wc_icons() {
	newspiper_wc_icons();
}

function newspiper_customize_partial_dark_mode() {
	newspiper_primary_menu_dark_mode_markup();
}

function newspiper_customize_partial_social_icons_footer() {
	return get_theme_mod( 'show_footer_social_icons' );
}

function newspiper_categories_title_text_partial() {
	return get_theme_mod( 'newspiper_categories_title' );
}

function newspiper_categories_view_all_button_label_text_partial() {
	return get_theme_mod( 'newspiper_categories_view_all_button_label' );
}

function newspiper_customize_you_missed_title() {
	return get_theme_mod( 'you_missed_title' ); 
}

function newspiper_customize_partial_show_related_posts() {
	return get_theme_mod( 'show_related_posts', 1 );
}

function newspiper_customize_partial_show_post_author() {
	return get_theme_mod( 'show_author_box', 1 );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newspiper_customize_preview_js() {
	wp_enqueue_script( 'newspiper-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), NEWSPIPER_VERSION, true );
	wp_enqueue_style( 'newspiper-customizer', get_template_directory_uri() . '/assets/css/customizer.css', array( 'customize-preview' ), NEWSPIPER_VERSION );
}
add_action( 'customize_preview_init', 'newspiper_customize_preview_js' );
