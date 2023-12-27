<?php
/**
 * Night Mode
 *
 * @since version 0.0.1
 */

function newspiper_night_mode_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'night_mode',
		array(
			'title'       => esc_html( __( 'Night Mode', 'newspiper' ) ),
			'description' => esc_html(
				__( 'Customize the dark theme mode. For additional customizations, you can use the "dark-mode" body class and add the code to the Additional Css tab.', 'newspiper' )
			),
		)
	);

	// Enable Dark Mode
	$wp_customize->add_setting(
		'enable_dark_mode',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'enable_dark_mode',
		array(
			'label'       => esc_html__( 'Enable Dark Mode Switcher', 'newspiper' ),
			'section'     => 'night_mode',
			'description' => esc_html__( 'Enable site visitors to switch to dark or light theme mode in the header menu.', 'newspiper' ),
			'type'        => 'checkbox',
		)
	);

	// Default mode dark

	$wp_customize->add_setting(
		'default_dark_mode',
		array(
			'default'           => 0,
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'default_dark_mode',
		array(
			'label'       => esc_html__( 'Make the dark mode default', 'newspiper' ),
			'section'     => 'night_mode',
			'description' => esc_html__( 'Make the dark mode the default theme mode.', 'newspiper' ),
			'type'        => 'checkbox',
		)
	);

	// Change Dark Mode Colors

	$wp_customize->add_setting(
		'dark_mode_background_color',
		array(
			'default'           => '#262626',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'dark_mode_background_color',
			array(
				'label'   => __( 'Background', 'newspiper' ),
				'section' => 'night_mode',
			)
		)
	);

}

add_action( 'customize_register', 'newspiper_night_mode_customizer' );

function newspiper_customize_night_mode_css() {
	$secondary_accent_color = get_theme_mod( 'secondary_accent_color', '#ffd100' );
	$isDarkMode = get_theme_mod( 'enable_dark_mode', 1 ) == 1;

	?>

<style type="text/css">
	<?php if ( $isDarkMode || newspiper_default_mode() == 'dark' ) : ?>
.dark-mode, .dark-mode #search-open, .dark-mode #search-open .search-field {
	background-color: <?php echo esc_attr( get_theme_mod( 'dark_mode_background_color', '#262626' ) ); ?>;
}
.dark-mode .main-navigation-container.fixed-header, .dark-mode .top-menu {
	background-color: <?php echo esc_attr( get_theme_mod( 'dark_mode_background_color', '#262626' ) ); ?>;
}
.dark-mode .comment-form, .dark-mode .comment-body, .dark-mode .comment-form textarea {
	background-color: <?php echo esc_attr( get_theme_mod( 'dark_mode_background_color', '#262626' ) ); ?> !important;
}
.dark-mode .shopping-cart-additional-info .widget_shopping_cart {
	background-color: <?php echo esc_attr( get_theme_mod( 'dark_mode_background_color', '#262626' ) ); ?>;
}
@media (min-width: 54rem){
	.dark-mode .site-menu ul ul a {
		background-color: <?php echo esc_attr( get_theme_mod( 'dark_mode_background_color', '#262626' ) ); ?>;
	}
}
@media (max-width: 54rem){
	.dark-mode .slide-menu,
	.dark-mode .site-menu.toggled > .menu-toggle {
		background-color: <?php echo esc_attr( get_theme_mod( 'dark_mode_background_color', '#262626' ) ); ?>;
	}
}
	<?php endif; ?>
</style>

<script>
	<?php if ( newspiper_default_mode() == 'dark' ) : // clean up localstorage ?>
	localStorage.removeItem('newNightMode');
	<?php else : ?>
	localStorage.removeItem('newLightMode');
	<?php endif; ?>
</script> 

	<?php
}

add_action( 'wp_head', 'newspiper_customize_night_mode_css' );
