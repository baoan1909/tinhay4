<?php

// Header Menu Position
function newspiper_register_header_customizer( $wp_customize ) {

	$wp_customize->add_panel(
		'newspiper_header_options',
		array(
			'title'       => esc_html__( 'Header Options', 'newspiper' ),
			'description' => esc_html__( 'Customize the site header with the options below.', 'newspiper' ),
		)
	);

	$wp_customize->add_section(
		'primary_menu',
		array(
			'title'       => esc_html__( 'Site Header', 'newspiper' ),
			'description' => esc_html__( 'Customize the way the site header is displayed. The site header in this theme consists of the site title, tagline and the primary menu. Enable transparent header on multiple pages - go pro version.', 'newspiper' ),
			'panel'       => 'newspiper_header_options',
		)
	);
	$wp_customize->add_section(
		'secondary_menu',
		array(
			'title'       => esc_html__( 'Top Bar', 'newspiper' ),
			'description' => esc_html__( 'Display a top bar menu on top of the site header and customize it accordingly. You can add business info to it, social icons, e-commerce icon, etc. You can also display a standard WordPress menu here by creating a menu and linking it to the "top menu" location. (appearance => menus)', 'newspiper' ),
			'panel'       => 'newspiper_header_options',
		)
	);

	$wp_customize->add_section(
		'promo_banner',
		array(
			'title'       => esc_html__( 'Promo Banner', 'newspiper' ),
			'description' => esc_html__( 'Display a promo banner on top of the site header. This is a good place to interact with your audience. You can share important updates, promote your work or attract newspiper customers. To change the promo banner colors, go to "Colors" section.', 'newspiper' ),
			'panel'       => 'newspiper_header_options',
		)
	);

	$wp_customize->add_section(
		'animations',
		array(
			'title'       => esc_html__( 'Animations', 'newspiper' ),
			'panel'       => 'newspiper_header_options',
			'description' => 'Block pattern animations are handled in the Gutenberg Block editor.'
		)
	);

	// Header Presets
	$wp_customize->add_setting(
		'header-menu-presets',
		array(
			'default'           => 'left',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'header-menu-presets',
		array(
			'label'       => esc_html__( 'Header Presets', 'newspiper' ),
			'section'     => 'primary_menu',
			'description' => esc_html__( ' Reorder the way header items (site title, site description, logo and primary menu) are displayed', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'left'   => is_rtl() ? esc_html__( 'right site title and logo', 'newspiper' ) : esc_html__( 'left site title and logo', 'newspiper' ),
				'center' => esc_html__( 'centered site title and logo', 'newspiper' ),
				'right'  => is_rtl() ? esc_html__( 'left site title and logo', 'newspiper' ) : esc_html__( 'right site title and logo', 'newspiper' ),
			),
		)
	);

	$wp_customize->add_setting(
		'header-menu-position',
		array(
			'default'           => 'sticky',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'header-menu-position',
		array(
			'label'       => esc_html__( 'Header Position', 'newspiper' ),
			'section'     => 'primary_menu',
			'description' => esc_html__( ' Position the header on top of the page (static position), show it while scrolling (fixed) or only show it when you scroll up (sticky). The default positon is sticky. ', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'fixed'  => esc_html__( 'fixed', 'newspiper' ),
				'sticky' => esc_html__( 'sticky', 'newspiper' ),
				'static' => esc_html__( 'static', 'newspiper' ),
			),
		)
	);

	$wp_customize->add_setting(
		'homepage_has_transparent_header',
		array(
			'default'           => false,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'homepage_has_transparent_header',
		array(
			'label'       => esc_html__( 'Enable Transparent Header on homepage. If you use this option, the site title and the site menu will become transparent and will be displayed on top of the header image.', 'newspiper' ),
			'section'     => 'primary_menu',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'header-menu-alignment',
		array(
			'default'           => 'right',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'header-menu-alignment',
		array(
			'label'           => esc_html__( 'Site Header Text Alignment', 'newspiper' ),
			'section'         => 'primary_menu',
			'description'     => esc_html__( 'Position the site title and the primary menu in relation to each other.', 'newspiper' ),
			'type'            => 'select',
			'choices'         => array(
				'left'   => esc_html__( 'normal', 'newspiper' ),
				'center' => esc_html__( 'center', 'newspiper' ),
				'right'  => esc_html__( 'space between', 'newspiper' ),
			),
			'active_callback' => function() {
				return get_theme_mod( 'header-menu-presets', 'left' ) !== 'center';
			},
		)
	);

	$wp_customize->add_setting(
		'has_search',
		array(
			'default'           => 1,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'has_search',
		array(
			'label'           => esc_html__( 'Show Search Icon', 'newspiper' ),
			'section'         => 'primary_menu',
			'type'            => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'has_underline',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'has_underline',
		array(
			'label'       => esc_html__( 'Enable Current Menu Item Underline', 'newspiper' ),
			'section'     => 'primary_menu',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'menu_items_animation',
		array(
			'default'           => 'underline',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'menu_items_animation',
		array(
			'label'       => esc_html__( 'Menu Item Hover Animation', 'newspiper' ),
			'section'     => 'primary_menu',
			'description' => esc_html__( 'Choose an animation to display when hovering over a menu item. ', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'underline'   => esc_html__( 'Underline', 'newspiper' ),
				'rollover' => esc_html__( 'Rollover', 'newspiper' )
			)
		)
	);

	// Top menu
	$wp_customize->add_setting(
		'has_secondary_menu',
		array(
			'default'           => false,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'has_secondary_menu',
		array(
			'label'       => esc_html__( 'Enable Top Menu', 'newspiper' ),
			'description' => esc_html__( 'Display a top bar menu on top of the site header. Please note that on mobile this menu gets combined with the primary menu for better user experience.', 'newspiper' ),
			'section'     => 'secondary_menu',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting(
		'top-menu-alignment',
		array(
			'default'           => 'center',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'top-menu-alignment',
		array(
			'label'           => esc_html__( 'Top Bar Text Alignment', 'newspiper' ),
			'section'         => 'secondary_menu',
			'description'     => esc_html__( ' Position the menu to the left, center or right side of the screen', 'newspiper' ),
			'type'            => 'select',
			'choices'         => array(
				'left'   => esc_html__( 'left', 'newspiper' ),
				'center' => esc_html__( 'center', 'newspiper' ),
				'right'  => esc_html__( 'right', 'newspiper' ),
			),
			'active_callback' => 'newspiper_has_secondary_menu',
		)
	);

	$wp_customize->add_setting(
		'location',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'location',
		array(
			'label'           => esc_html__( 'Address', 'newspiper' ),
			'section'         => 'secondary_menu',
			'type'            => 'url',
			'description'     => esc_html__( 'Add your address', 'newspiper' ),
			'active_callback' => 'newspiper_has_secondary_menu',
		)
	);
	$wp_customize->add_setting(
		'phone_control',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'phone_control',
		array(
			'label'           => esc_html__( 'Phone number', 'newspiper' ),
			'section'         => 'secondary_menu',
			'type'            => 'url',
			'description'     => esc_html__( 'Add your phone number', 'newspiper' ),
			'active_callback' => 'newspiper_has_secondary_menu',
		)
	);

	$wp_customize->add_setting(
		'mail_control',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'mail_control',
		array(
			'label'           => esc_html__( 'Email address', 'newspiper' ),
			'section'         => 'secondary_menu',
			'type'            => 'url',
			'description'     => esc_html__( 'Add your mail address', 'newspiper' ),
			'active_callback' => 'newspiper_has_secondary_menu',
		)
	);

	$wp_customize->add_setting(
		'has_wc_icons',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'has_wc_icons',
		array(
			'label'           => esc_html__( 'Show Woocommerce Icons', 'newspiper' ),
			'description' => esc_html__( 'Unchecking this will stick the add to cart and profile icons to the right corner of the screen on page scroll.', 'newspiper' ),
			'section'         => 'secondary_menu',
			'type'            => 'checkbox',
			'active_callback' => function () {
				return class_exists( 'WooCommerce' ) && newspiper_has_secondary_menu();
			},
		)
	);

	$wp_customize->add_setting(
		'newspiper_social_icons_setting',
		array(
			'default'           => 'https://facebook.com/#,https://instagram.com/#,https://twitter.com/#,https://linkedin.com/#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Sortable_Repeater_Custom_Control(
			$wp_customize,
			'newspiper_social_icons_setting',
			array(
				'label'           => esc_html__( 'Social Icons', 'newspiper' ),
				'description'     => esc_html__( 'Add your social media links and their icons will automatically appear in the top bar menu. Drag and drop the urls to rearrange the order of the icons.', 'newspiper' ),
				'section'         => 'secondary_menu',
				'button_labels'   => array(
					'add' => esc_html__( 'Add Row', 'newspiper' ),
				),
				'active_callback' => 'newspiper_has_secondary_menu',
			)
		)
	);

	$wp_customize->add_setting(
		'social_url_icons',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Newspiper_Single_Accordion_Custom_Control(
			$wp_customize,
			'social_url_icons',
			array(
				'label'           => esc_html__( 'View list of available social icons', 'newspiper' ),
				'section'         => 'secondary_menu',
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
				'active_callback' => 'newspiper_has_secondary_menu',
			)
		)
	);

	$wp_customize->add_setting(
		'show_top_bar_icons_mobile',
		array(
			'default'           => false,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'show_top_bar_icons_mobile',
		array(
			'label'       => esc_html__( 'Show social icons on mobile.', 'newspiper' ),
			'description' => esc_html__( 'Enable this if you want to display the social icons under the primary menu on mobile.', 'newspiper' ),
			'section'     => 'secondary_menu',
			'type'        => 'checkbox',
			'active_callback' => 'newspiper_has_secondary_menu',
		)
	);

	// Promo Banner TinyMCE control

	$wp_customize->add_setting(
		'has_promo_banner',
		array(
			'default'           => true,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'has_promo_banner',
		array(
			'label'       => esc_html__( 'Enable Promo Banner', 'newspiper' ),
			'section'     => 'promo_banner',
			'type'        => 'checkbox',
		)
	);

	$wp_customize->add_setting( 'promo_banner_tinymce_editor',
		array(
			'default' =>  '<a href="#" aria-label="' . __( 'promo banner', 'newspiper' ) . '"><img class="size-full aligncenter" src="' . esc_attr( get_template_directory_uri() ) . '/assets/img/patterns/news-banner.png" alt="" width="720" height="90"></a>',
			'sanitize_callback' => 'wp_kses_post'
		)
	);
	
	$wp_customize->add_control( new Newspiper_TinyMCE_Custom_control( $wp_customize, 'promo_banner_tinymce_editor',
		array(
			'label' => __( 'Promo Banner', 'newspiper' ),
			'section' => 'promo_banner',
			'input_attrs' => array(
				'toolbar1' => 'bold italic bullist numlist alignleft aligncenter alignright link',
				'mediaButtons' => true,
			),
			'active_callback' => 'newspiper_has_promo_banner'
		)
	) );

}

add_action( 'customize_register', 'newspiper_register_header_customizer' );

function newspiper_customize_header_menu_options() {

	// get menu colors
	$header_text_color = get_theme_mod( 'newspiper_header_text_color', '#000' );

	// static vs sticky header
	$header_menu_position = get_theme_mod( 'header-menu-position', 'sticky' );

	$top_menu_text_color = get_theme_mod( 'top-menu_text_color', '#334142' );
	$top_menu_bgr_color  = get_theme_mod( 'top-menu_bgr_color', '#fff' );
	$top_bar_height      = is_admin_bar_showing() ? '2rem' : '0';

	$header_menu_alignment = get_theme_mod( 'header-menu-alignment', 'right' );
	$top_menu_alignment    = get_theme_mod( 'top-menu-alignment', 'center' );
	$header_preset         = get_theme_mod( 'header-menu-presets', 'left' );

	$has_underline = get_theme_mod( 'has_underline', 1 );

	$menu_items_animation = get_theme_mod( 'menu_items_animation', 'underline' );

	?>
	<style type="text/css">
	<?php if ( $header_menu_alignment == 'left' ) : ?>
	@media(min-width:54rem){
		.main-navigation-container .header-content-wrapper {
			justify-content: left;
		}
	}
	<?php elseif ( $header_menu_alignment == 'center' ) : ?>
	@media(min-width:54rem){
		.main-navigation {
			flex: 0 0 75%;
		}
	}
		<?php
	endif;

	if ( $top_menu_alignment == 'left' ) :
		?>
	@media(min-width:54rem){
		.top-menu ul {
			justify-content: left;
		}
	}
	<?php elseif ( $top_menu_alignment == 'right' ) : ?>
	@media(min-width:54rem){
		.top-menu ul {
			justify-content: right;
		}
	}
		<?php
	endif;

	if ( $header_preset == 'center' ) :
		?>
	.header-content-wrapper {
		display: block
	}
	.site-branding {
		justify-content: center;
		flex-direction: column;
	}
	.custom-logo-link {
		padding-top: 1rem;
		padding-bottom: 1rem;
		margin: auto;
	}
	.site-meta {
		text-align: center;
	}
	@media(max-width:54rem){
		.main-navigation > .menu-toggle {
			display: table;
			margin: auto;
		}
	}
	<?php elseif ( $header_preset == 'right' ) : ?>
	.site-branding {
		order: 1;
	}
	.custom-logo-link {
		order: 1;
		margin-left: 1rem;
		margin-right: 0;
	}
		<?php
		if ( $header_menu_alignment !== 'center' ) :
			if ( is_rtl() ) :
				?>
			.site-branding {
				justify-content: left;
			}
			<?php else : ?>
			.site-branding {
				justify-content: right;
			}
				<?php
			endif;
		endif;
		?>
		<?php
	endif;

	if ( $header_menu_position == 'static' ) :  // static header

		?>
	.site-header a {
		color: <?php echo esc_attr( $header_text_color ); ?>;
	}
	.top-menu {
		background: <?php echo esc_attr( $top_menu_bgr_color ); ?>;
	}
	.top-menu a {
		color: <?php echo esc_attr( $top_menu_text_color ); ?>;
	}
	.top-menu .feather {
		stroke: <?php echo esc_attr( $top_menu_text_color ); ?>;
	}
	.main-navigation-container {
		background-color: #fff;
		position: relative;
		z-index: 9;
	}
	
	.menu-toggle .burger,
	.menu-toggle .burger:before,
	.menu-toggle .burger:after {
		border-bottom: 2px solid #333;
	}

	.has-transparent-header .main-navigation-container {
		position: absolute;
		background: transparent;
	}
	.has-transparent-header #primary-menu > li > a, 
	.has-transparent-header .site-title a, 
	.has-transparent-header .site-description {
		color: #fff;
	}

	.has-transparent-header:not(.dark-mode):not(.modal-open) .menu-toggle .burger, 
	.has-transparent-header:not(.dark-mode):not(.modal-open) .menu-toggle .burger::before, 
	.has-transparent-header:not(.dark-mode):not(.modal-open) .menu-toggle .burger::after {
		border-bottom: 2px solid #fff;
	}
	
	<?php else : // sticky header

		?>
	.main-navigation-container {
		background: transparent;
		<?php if ( newspiper_has_transparent_header() ) : ?>
		position: absolute;
		<?php endif; ?>
		z-index: 1000;
	}

	.main-navigation-container.fixed-header {
		background-color: #fff;
	}

	.has-transparent-header .menu-toggle .burger,
	.has-transparent-header .menu-toggle .burger:before,
	.has-transparent-header .menu-toggle .burger:after {
		border-bottom: 2px solid #f7f7f7;
	}

	.has-transparent-header:not(.dark-mode) .fixed-header .menu-toggle .burger,
	.has-transparent-header:not(.dark-mode) .fixed-header .burger:before,
	.has-transparent-header:not(.dark-mode) .fixed-header .burger:after {
		border-bottom: 2px solid #333;
	}

	.has-transparent-header .toggled .menu-toggle .burger,
	.has-transparent-header .toggled .menu-toggle .burger:before,
	.has-transparent-header .toggled .menu-toggle .burger:after {
		border-bottom: 2px solid #f7f7f7;
	}

	.has-transparent-header .site-title a, .has-transparent-header p.site-description {
		color: #fff;
	}
	.has-transparent-header .fixed-header .site-title a, .has-transparent-header .fixed-header p.site-description,
	.site-title a, body p.site-description {
		color: <?php echo esc_attr( $header_text_color ); ?>;
	}

	.top-menu {
		background: <?php echo esc_attr( $top_menu_bgr_color ); ?>;
	}

	.top-menu a {
		color: <?php echo esc_attr( $top_menu_text_color ); ?>;
	}

	.top-menu .feather {
		stroke: <?php echo esc_attr( $top_menu_text_color ); ?>;
	}

	.fixed-header {
		top: 0;
	}

	@media (min-width: 54rem) {
		.has-transparent-header .main-navigation a {
			color: #fff;
		}
		.has-transparent-header .main-navigation .feather {
			stroke: #fff;
		}
		.fixed-header {
			top: <?php echo esc_attr( $top_bar_height ); ?>
		}
		.has-transparent-header .fixed-header .main-navigation a {
			color: <?php echo esc_attr( $header_text_color ); ?>;
		}
		.has-transparent-header .fixed-header .main-navigation .feather {
			stroke: <?php echo esc_attr( $header_text_color ); ?>;
		}
		.main-navigation a,
		.main-navigation button {
			color: <?php echo esc_attr( $header_text_color ); ?>;
		}
		.has-transparent-header .main-navigation ul ul a {
			color: <?php echo esc_attr( $header_text_color ); ?>;
		}
	}

		<?php
	endif;

	// Menu Items Current Menu Item Underline
	if ( $has_underline ) : ?>
	@media (min-width: 54rem) {
		#primary-menu > .current_page_item > a > span {
			background: linear-gradient(to right, CurrentColor 0%, CurrentColor 100%);
			background-size: 100% 2px;
			background-repeat: no-repeat;
			background-position: left 100%;
		}
	}
	<?php endif;

	// Menu Items hover animation 
	if ( $menu_items_animation == 'underline' ) : ?>
	@media (min-width: 54rem) {
		#primary-menu > li > a > span{
			background: linear-gradient(to right, CurrentColor 0%, CurrentColor 100%);
			background-size: 0 2px;
			background-repeat: no-repeat;
			background-position: left 100%;
			display: inline-block;
			transition: background-size 0.6s ease-in-out;
		}

		#primary-menu > li > a > span:hover {
			background-size: 100% 2px;
		}
	}
	<?php endif; ?>

	<?php if ($menu_items_animation == 'rollover') : ?>
	@media (min-width: 54rem) {
		#primary-menu > li > a {
			position: relative;
			padding: 0 1rem;
			margin: 0.75rem 0;
			overflow: hidden;
			display: block;
			text-align: center;
		}
		#primary-menu > li > a span {
			display: block;
			transition: transform 700ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
		}
		#primary-menu > li > a:before {
			content: attr(data-text);
			display: inline;
			position: absolute;
			transition: top 700ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
			top: 100%;
			left: 0;
			right: 0;
			text-align: center;
			font-size: inherit
		}
		#primary-menu > li > a:hover span {
			transform: translateY(-100%);
		}
		#primary-menu > li > a:hover:before {
			top: 0;
		}

		#primary-menu > li.page_item_has_children > a::after, 
		#primary-menu > li.menu-item-has-children > a::after {
			position: absolute;
			<?php echo is_rtl() ? esc_attr( 'left: .35rem;' ) : esc_attr( 'right: .35rem;' ); ?>
			top: .65rem;
		}

		<?php endif; ?>
	}
	</style>
	<?php
}

add_action( 'wp_head', 'newspiper_customize_header_menu_options' );
