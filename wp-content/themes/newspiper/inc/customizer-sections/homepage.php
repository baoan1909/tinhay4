<?php
/**
 * Homepage sections
 *
 * @author Adore Themes
 * @package Newspiper
 */

function newspiper_customizer_homepage_options( $wp_customize ) {

	// Featured Categories
	$wp_customize->add_setting(
		'newspiper_categories_section_enable',
		array(
			'default'           => true,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'newspiper_categories_section_enable',
		array(
			'label'   => esc_html__( 'Enable Post Categories Section', 'newspiper' ),
			'type'    => 'checkbox',
			'section' => 'static_front_page',
		)
	);

	// Categories Section title settings.
	$wp_customize->add_setting(
		'newspiper_categories_title',
		array(
			'default'           => __( 'Post Categories', 'newspiper' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'newspiper_categories_title',
		array(
			'label'           => esc_html__( 'Post Categories Title', 'newspiper' ),
			'section'         => 'static_front_page',
			'active_callback' => 'newspiper_has_categories_enabled',
		)
	);

	// Categories Section subtitle settings.
	$wp_customize->add_setting(
		'newspiper_categories_subtitle',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'newspiper_categories_subtitle',
		array(
			'label'           => esc_html__( 'Post Categories Subtitle', 'newspiper' ),
			'section'         => 'static_front_page',
			'active_callback' => 'newspiper_has_categories_enabled',
		)
	);

	// View All button label setting.
	$wp_customize->add_setting(
		'newspiper_categories_view_all_button_label',
		array(
			'default'           => __( 'View All', 'newspiper' ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'newspiper_categories_view_all_button_label',
		array(
			'label'           => esc_html__( 'View All Button Label', 'newspiper' ),
			'section'         => 'static_front_page',
			'settings'        => 'newspiper_categories_view_all_button_label',
			'type'            => 'text',
			'active_callback' => 'newspiper_has_categories_enabled',
		)
	);

	// View All button URL setting.
	$wp_customize->add_setting(
		'newspiper_categories_view_all_button_url',
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		'newspiper_categories_view_all_button_url',
		array(
			'label'           => esc_html__( 'View All Button Link', 'newspiper' ),
			'section'         => 'static_front_page',
			'settings'        => 'newspiper_categories_view_all_button_url',
			'type'            => 'url',
			'active_callback' => 'newspiper_has_categories_enabled',
		)
	);

	for ( $i = 1; $i <= 4; $i++ ) {

		// categories category setting.
		$wp_customize->add_setting(
			'newspiper_categories_category_' . $i,
			array(
				'sanitize_callback' => 'newspiper_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'newspiper_categories_category_' . $i,
			array(
				'label'           => sprintf( esc_html__( 'Category %d', 'newspiper' ), $i ),
				'section'         => 'static_front_page',
				'settings'        => 'newspiper_categories_category_' . $i,
				'type'            => 'select',
				'choices'         => newspiper_get_post_cat_choices(),
				'active_callback' => 'newspiper_has_categories_enabled',
			)
		);

		   // categories bg image.
		$wp_customize->add_setting(
			'newspiper_categories_image_' . $i,
			array(
				'default'           => '',
				'sanitize_callback' => 'newspiper_sanitize_image',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'newspiper_categories_image_' . $i,
				array(
					'label'           => sprintf( esc_html__( 'Category Image %d', 'newspiper' ), $i ),
					'section'         => 'static_front_page',
					'settings'        => 'newspiper_categories_image_' . $i,
					'active_callback' => 'newspiper_has_categories_enabled',
				)
			)
		);

	}

	// ========== You Missed Settings ===============//

	$wp_customize->add_setting(
		'you_missed_enable',
		array(
			'default'           => true,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'you_missed_enable',
		array(
			'label'   => esc_html__( 'Show "You Missed" Section', 'newspiper' ),
			'section' => 'static_front_page',
			'type'    => 'checkbox',
		)
	);

	// Title
	$wp_customize->add_setting(
		'you_missed_title',
		array(
			'default'           => esc_html__( 'You Might Have Missed', 'newspiper' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'you_missed_title',
		array(
			'label'   => __( 'Title', 'newspiper' ),
			'section' => 'static_front_page',
			'type'    => 'text',
		)
	);

}

add_action( 'customize_register', 'newspiper_customizer_homepage_options' );

function newspiper_customize_homepage_css() {
	$primary_accent_color = get_theme_mod( 'primary_accent_color', '#1656d1' );
	$header_wrapper       = get_theme_mod( 'header_width', 1180 );

	?>

<style type="text/css">
	.fallback-svg {
		background: <?php echo esc_attr( newspiper_hex_to_rgba( $primary_accent_color, .1 ) ); ?>;
	}
	.featured-content-wrapper {
		max-width: <?php echo esc_attr( $header_wrapper ); ?>px;
	}
</style>

	<?php

}
add_action( 'wp_head', 'newspiper_customize_homepage_css' );
