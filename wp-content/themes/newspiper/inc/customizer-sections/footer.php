<?php

function newspiper_register_footer_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'custom_footer',
		array(
			'title'       => __( 'Footer Options', 'newspiper' ),
			'description' => __( 'Change footer styles. Add copyright info and remove default theme credits - go pro version.', 'newspiper' ),
		)
	);
	/* Footer Background Color */
	$wp_customize->add_setting(
		'footer_background_color',
		array(
			'default'           => '#27274c',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background_color',
			array(
				'label'   => esc_html__( 'Footer Background Color', 'newspiper' ),
				'section' => 'custom_footer',
			)
		)
	);
	// Footer text color
	$wp_customize->add_setting(
		'footer_text_color',
		array(
			'default'           => '#999',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_text_color',
			array(
				'label'   => esc_html__( 'Footer Text Color', 'newspiper' ),
				'section' => 'custom_footer',
			)
		)
	);
	/* Footer Links Color */
	$wp_customize->add_setting(
		'footer_link_color',
		array(
			'default'           => '#f9f9f9',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_link_color',
			array(
				'label'   => esc_html__( 'Footer Links Color', 'newspiper' ),
				'section' => 'custom_footer',
			)
		)
	);

	$wp_customize->add_setting(
		'show_footer_social_icons',
		array(
			'default'           => true,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'show_footer_social_icons',
		array(
			'label'       => esc_html__( 'Show Social icons', 'newspiper' ),
			'description' => esc_html__( 'Add your social media links and their icons will automatically appear in the footer. Drag and drop the urls to rearrange the order of the icons.', 'newspiper' ),
			'section'     => 'custom_footer',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'newspiper_social_icons_footer',
		array(
			'default'           => 'https://facebook.com/#,https://instagram.com/#,https://twitter.com/#,https://linkedin.com/#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Sortable_Repeater_Custom_Control(
			$wp_customize,
			'newspiper_social_icons_footer',
			array(
				'label'           => esc_html__( 'Social Icons', 'newspiper' ),
				'description'     => esc_html__( 'Add your social media links and their icons will automatically appear in the top bar menu. Drag and drop the urls to rearrange the order of the icons.', 'newspiper' ),
				'section'         => 'custom_footer',
				'button_labels'   => array(
					'add' => esc_html__( 'Add Row', 'newspiper' ),
				),
				'active_callback' => function() {
					return get_theme_mod( 'show_footer_social_icons' );
				},
			)
		)
	);


	$wp_customize->add_setting(
		'social_url_icons_footer',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Single_Accordion_Custom_Control(
			$wp_customize,
			'social_url_icons_footer',
			array(
				'label'           => esc_html__( 'View list of available social icons', 'newspiper' ),
				'section'         => 'custom_footer',
				'description'     => array(
					esc_html__( 'Behance', 'newspiper' )    => newspiper_get_svg( 'behance' ),
					esc_html__( 'Dribble', 'newspiper' )    => newspiper_get_svg( 'dribble' ),
					esc_html__( 'Facebook', 'newspiper' )   => newspiper_get_svg( 'facebook' ),
					esc_html__( 'Flickr', 'newspiper' )     => newspiper_get_svg( 'flickr' ),
					esc_html__( 'Github', 'newspiper' )     => newspiper_get_svg( 'github' ),
					esc_html__( 'Instagram', 'newspiper' )  => newspiper_get_svg( 'instagram' ),
					esc_html__( 'Linkedin', 'newspiper' )   => newspiper_get_svg( 'linkedin' ),
					esc_html__( 'Pinterest', 'newspiper' )  => newspiper_get_svg( 'pinterest' ),
					esc_html__( 'Snapchat', 'newspiper' )   => newspiper_get_svg( 'snapchat' ),
					esc_html__( 'Soundcloud', 'newspiper' ) => newspiper_get_svg( 'soundcloud' ),
					esc_html__( 'Tiktok', 'newspiper' )     => newspiper_get_svg( 'tiktok' ),
					esc_html__( 'Tumblr', 'newspiper' )     => newspiper_get_svg( 'tumblr' ),
					esc_html__( 'Twitch', 'newspiper' )     => newspiper_get_svg( 'twitch' ),
					esc_html__( 'Twitter', 'newspiper' )    => newspiper_get_svg( 'twitter' ),
					esc_html__( 'Youtube', 'newspiper' )    => newspiper_get_svg( 'youtube' ),
					esc_html__( 'WordPress', 'newspiper' )  => newspiper_get_svg( 'wordpress' ),
				),
				'active_callback' => function() {
					return get_theme_mod( 'show_footer_social_icons' );
				},
			)
		)
	);

}

add_action( 'customize_register', 'newspiper_register_footer_customizer' );

function newspiper_footer_customize_css() {    ?>
	
<style type="text/css">
body:not(.dark-mode) .site-footer {
	background: <?php echo esc_attr( get_theme_mod( 'footer_background_color', '#27274c' ) );?>;
	color: <?php echo esc_attr( get_theme_mod( 'footer_text_color', '#999' ) );?>;
}
.site-footer a {
	color: <?php echo esc_attr( get_theme_mod( 'footer_link_color', '#f9f9f9' ) );?>;
}
</style>

	<?php
}

add_action( 'wp_footer', 'newspiper_footer_customize_css' );
