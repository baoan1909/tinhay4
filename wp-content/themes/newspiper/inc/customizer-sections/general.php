<?php
function newspiper_register_general_settings_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'general_settings',
		array(
			'title'       => esc_html__( 'General Settings', 'newspiper' ),
			'description' => esc_html__( 'Customize the way the website is displayed. Enable custom cursor - go pro version.', 'newspiper' ),
		)
	);

	$wp_customize->add_setting(
		'has_back_to_top',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'has_back_to_top',
		array(
			'label'   => esc_html__( 'Show Back to Top Button', 'newspiper' ),
			'section' => 'general_settings',
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'has_loader',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'has_loader',
		array(
			'label'   => esc_html__( 'Enable Page Loader on Homepage', 'newspiper' ),
			'section' => 'general_settings',
			'description' => esc_html__( 'Show a loading spinner while the page is loaded', 'newspiper' ),
			'type'    => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_post_breadcrumbs',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'show_post_breadcrumbs',
		array(
			'label'       => esc_html__( 'Show breadcrumbs on single posts', 'newspiper' ),
			'section'     => 'general_settings',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'show_page_breadcrumbs',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'show_page_breadcrumbs',
		array(
			'label'       => esc_html__( 'Show breadcrumbs on single pages', 'newspiper' ),
			'section'     => 'general_settings',
			'type'        => 'checkbox',
		)
	);

}

add_action( 'customize_register', 'newspiper_register_general_settings_customizer' );