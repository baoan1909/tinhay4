<?php

/*
 ** Allow users to change page layout via Theme Customizer
 */

function newspiper_register_theme_layout_options( $wp_customize ) {

	$wp_customize->add_panel(
		'newspiper_layout_options',
		array(
			'title'       => esc_html__( 'Site Layout', 'newspiper' ),
			'description' => esc_html__( 'Set custom width for the header, container and the footer. Wrap posts and pages into beatiful containers.', 'newspiper' ),
		)
	);

	$wp_customize->add_section(
		'header_layout',
		array(
			'title'       => esc_html__( 'Header Layout', 'newspiper' ),
			'description' => esc_html__( 'Set custom width for the header.', 'newspiper' ),
			'panel'       => esc_html__( 'newspiper_layout_options', 'newspiper' ),
		)
	);

	$wp_customize->add_section(
		'container_layout',
		array(
			'title'       => esc_html__( 'Container Layout', 'newspiper' ),
			'description' => esc_html__( 'Set custom width for posts and pages. Wrap posts and pages into beatiful containers.', 'newspiper' ),
			'panel'       => esc_html__( 'newspiper_layout_options', 'newspiper' ),
		)
	);

	$wp_customize->add_section(
		'sidebar_layout',
		array(
			'title'       => esc_html__( 'Sidebar Layout', 'newspiper' ),
			'description' => esc_html__( 'More sidebar layout options - go pro version.', 'newspiper' ),
			'panel'       => esc_html__( 'newspiper_layout_options', 'newspiper' ),
		)
	);

	$wp_customize->add_section(
		'footer_layout',
		array(
			'title'       => esc_html__( 'Footer Layout', 'newspiper' ),
			'description' => esc_html__( 'Set custom width for the footer.', 'newspiper' ),
			'panel'       => esc_html__( 'newspiper_layout_options', 'newspiper' ),
		)
	);

	// Header
	$wp_customize->add_setting(
		'header_width',
		array(
			'default'           => '1180',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Range_Slider_Control(
			$wp_customize,
			'header_width',
			array(
				'type'     => 'newspiper-range-slider',
				'label'    => __( 'Header Width', 'newspiper' ),
				'section'  => 'header_layout',
				'settings' => array(
					'desktop' => 'header_width',
				),
				'choices'  => array(
					'desktop' => array(
						'min'  => 700,
						'max'  => 2000,
						'step' => 5,
						'edit' => true,
						'unit' => 'px',
					),
				),
			)
		)
	);

	// Container
	$wp_customize->add_setting(
		'container_width',
		array(
			'default'           => '980',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Range_Slider_Control(
			$wp_customize,
			'container_width',
			array(
				'type'        => 'newspiper-range-slider',
				'label'       => __( 'Page Content Width', 'newspiper' ),
				'description' => __( 'Adjust the width of the page container', 'newspiper' ),
				'section'     => 'container_layout',
				'settings'    => array(
					'desktop' => 'container_width',
				),
				'choices'     => array(
					'desktop' => array(
						'min'  => 700,
						'max'  => 2000,
						'step' => 5,
						'edit' => true,
						'unit' => 'px',
					),
				),
			)
		)
	);

	$wp_customize->add_setting(
		'post_container_width',
		array(
			'default'           => '1100',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Range_Slider_Control(
			$wp_customize,
			'post_container_width',
			array(
				'type'        => 'newspiper-range-slider',
				'label'       => __( 'Post Content Width', 'newspiper' ),
				'description' => __( 'Adjust the width of the container in single posts and post archives', 'newspiper' ),
				'section'     => 'container_layout',
				'settings'    => array(
					'desktop' => 'post_container_width',
				),
				'choices'     => array(
					'desktop' => array(
						'min'  => 700,
						'max'  => 2000,
						'step' => 5,
						'edit' => true,
						'unit' => 'px',
					),
				),
			)
		)
	);

	// Page wrap
	$wp_customize->add_setting(
		'page_content_layout',
		array(
			'default'           => 'one_container',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'page_content_layout',
		array(
			'label'       => esc_html__( 'Page Content Wrap', 'newspiper' ),
			'section'     => 'container_layout',
			'description' => esc_html__( 'Wrap posts in a card or leave them as plain text.', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'one_container'       => esc_html__( 'No Wrap', 'newspiper' ),
				'seperate_containers' => esc_html__( 'Seperate Containers', 'newspiper' ),
			),
		)
	);

	//Post wrap
	$wp_customize->add_setting(
		'content_layout',
		array(
			'default'           => 'seperate_containers',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'content_layout',
		array(
			'label'       => esc_html__( 'Post Content Wrap', 'newspiper' ),
			'section'     => 'container_layout',
			'description' => esc_html__( 'Wrap posts in a card or leave them as plain text.', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'one_container'       => esc_html__( 'No Wrap', 'newspiper' ),
				'seperate_containers' => esc_html__( 'Seperate Containers', 'newspiper' ),
			),
		)
	);

	// Footer

	$wp_customize->add_setting(
		'footer_width',
		array(
			'default'           => '1180',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new Newspiper_Range_Slider_Control(
			$wp_customize,
			'footer_width',
			array(
				'type'     => 'newspiper-range-slider',
				'label'    => __( 'Footer Width', 'newspiper' ),
				'section'  => 'footer_layout',
				'settings' => array(
					'desktop' => 'footer_width',
				),
				'choices'  => array(
					'desktop' => array(
						'min'  => 700,
						'max'  => 2000,
						'step' => 5,
						'edit' => true,
						'unit' => 'px',
					),
				),
			)
		)
	);

    /* Single Page Layout */
    $wp_customize->add_setting('page_layout', array(
        'default' => 'none',
        'sanitize_callback' => 'newspiper_sanitize_select',
    ));
    $wp_customize->add_control('page_layout', array(
        'label' => esc_html__('Page Sidebar', 'newspiper') ,
        'section' => 'sidebar_layout',
        'type' => 'select',
        'choices' => array(
            'right' => esc_html__('Right Sidebar', 'newspiper') ,
            'none' => esc_html__('None', 'newspiper') ,
            'left' => esc_html__('Left Sidebar', 'newspiper') ,
        ) ,
        'description' => esc_html__("Choose the sidebar position on the site's pages, including the static home page.", 'newspiper')
    ));

    /* Single Post Layout */
    $wp_customize->add_setting('post_layout', array(
        'default' => 'right',
        'sanitize_callback' => 'newspiper_sanitize_select',
    ));
    $wp_customize->add_control('post_layout', array(
        'label' => esc_html__('Post Sidebar', 'newspiper') ,
        'section' => 'sidebar_layout',
        'type' => 'select',
        'choices' => array(
            'right' => esc_html__('Right Sidebar', 'newspiper') ,
            'none' => esc_html__('None', 'newspiper') ,
            'left' => esc_html__('Left Sidebar', 'newspiper') ,
        ) ,
        'description' => esc_html__("Choose the sidebar position on the blog posts, including the post archives.", 'newspiper')
    ));

    /* Shop Page Layout */
    if( class_exists('Woocommerce') ) :
        $wp_customize->add_setting('shop_page_layout', array(
            'default' => 'right',
            'sanitize_callback' => 'newspiper_sanitize_select',
        ));
        $wp_customize->add_control('shop_page_layout', array(
            'label' => esc_html__('Woocommerce Sidebar', 'newspiper') ,
            'section' => 'container_layout',
            'type' => 'select',
            'choices' => array(
                'right' => esc_html__('Right Sidebar', 'newspiper') ,
                'none' => esc_html__('None', 'newspiper') ,
                'left' => esc_html__('Left Sidebar', 'newspiper') ,
            ) ,
            'description' => esc_html__('Choose the sidebar position on the page that lists products.', 'newspiper')
        ));
    endif;

}

add_action( 'customize_register', 'newspiper_register_theme_layout_options' );

function newspiper_customize_css() {
	$header_wrapper = get_theme_mod( 'header_width', 1180 );
	$page_wrapper   = get_theme_mod( 'container_width', 980 );
	$post_wrapper   = get_theme_mod( 'post_container_width', 1100 );
	$footer_wrapper = get_theme_mod( 'footer_width', 1180 );
	// post wrap
	$post_content_layout   = get_theme_mod( 'content_layout', 'seperate_containers' );
	$page_content_layout   = get_theme_mod( 'page_content_layout', 'one_container' );
	// sidebar
    $page_layout = get_theme_mod('page_layout', 'none');
    $post_layout = get_theme_mod('post_layout', 'right');
    $post_archives_layout = get_theme_mod('post_archives_layout', 'right');
	$shop_layout = get_theme_mod('shop_page_layout', 'none');
	?>

<style type="text/css">
	.header-content-wrapper {
		max-width: <?php echo esc_attr( $header_wrapper ); ?>px;
	}
	.page .site-wrapper, .woocommerce .site-wrapper {
		max-width: <?php echo esc_attr( $page_wrapper ); ?>px;
	}
	.site-wrapper {
		max-width: <?php echo esc_attr( $post_wrapper ); ?>px;
	}
	.footer-content {
		max-width: <?php echo esc_attr( $footer_wrapper ); ?>px;
	}

	<?php // Post wrap
	if ( ( is_single() || newspiper_is_blog() ) && $post_content_layout == 'seperate_containers' ) : ?>
	.hentry,
	#secondary > section {
		box-shadow: var(--p-box-shadow);
		margin: 	1.25rem 0 2em;
		padding: 1em 1.25em;
	}
	body:not(.page):not(.single) .hentry:hover {
		box-shadow: var(--p-box-shadow-hover);
	}
	body:not(.dark-mode) {
		background-color: #f7f8f9
	}
	body:not(.dark-mode) .main-navigation-container, body:not(.dark-mode).has-transparent-header .main-navigation-container.fixed-header {
		background-color: #fff;
	}
	.comment-body,
	.comment-form {
		box-shadow: 0 20px 80px 0 rgba(193, 199, 212, 0.1);
		margin: 1.25em 0 2em;
		padding: 1em;
		background-color: #fff;
	}
	body.has-transparent-header .main-navigation-container {
		background-color: transparent;
	}
	body:not(.dark-mode) .hentry,
	body:not(.dark-mode) #secondary > section {
		background-color: #fff;
	}
	.about-author {
			padding: 1em;
		}
		@media (min-width: 40em){

			.about-author {
				padding: 2em;
			}
		}
	<?php // Page wrap
	elseif ( ( is_page() ) && $page_content_layout == 'seperate_containers' ) : ?>
	.hentry, #secondary > section {
		box-shadow: var(--p-box-shadow);
		margin: 2.5rem 0 2em;
		padding: 1em 1.25em;
	}
	body:not(.dark-mode) {
		background-color: #f7f8f9
	}
	body:not(.dark-mode) .main-navigation-container, body:not(.dark-mode).has-transparent-header .main-navigation-container.fixed-header {
		background-color: #fff;
	}
	.page.has-transparent-header .main-navigation-container {
		background-color: transparent;
	}
	body:not(.dark-mode) .hentry, 
	body:not(.dark-mode) #secondary > section {
		background-color: #fff;
	}
	.comment-body,
	.comment-form {
		box-shadow: 0 20px 80px 0 rgba(193, 199, 212, 0.1);
		margin: 1.25em 0 2em;
		padding: 1em;
		background-color: #fff;
	}
	<?php endif;
	// no wrap for posts and post archives
	if ( ( is_single() || newspiper_is_blog() ) && $post_content_layout == 'one_container' ) :
		?>
		.hentry {
			padding-bottom: 1rem;
			margin-bottom: 1.75rem;
		}

		.top-meta {
			margin-top: 1rem;
		}
		body:not(.single) .hentry:not(:last-child) {
			border-bottom: 1px solid var(--p-border-color);
		}
		.comment:not(:last-child) {
			border-bottom: 1px solid var(--p-border-color);
		}
		.single .entry-footer {
			border-bottom: 1px solid var(--p-line-light);
		}
		.about-author.hentry {
			border-bottom: 1px solid var(--p-line-light);
			margin-top: -1rem;
		}
	<?php elseif ( is_page() && $page_content_layout == 'one_container' ) : ?>
		.page .post-thumbnail {
			margin-top: 2rem;
		}
		.hentry {
			padding-bottom: 1rem;
			margin-bottom: 1.75rem;
		}
	<?php endif;
	
// Sidebar layout
if ($post_content_layout == 'seperate_containers' ) : ?>
#secondary section:not(:last-child) {
	padding-bottom: 2.5rem;
}
<?php endif;
if ($page_layout == 'left'): ?>
	.page:not(.woocommerce) .site-wrapper {
		flex-direction: row-reverse;
	}

<?php endif;

if ($shop_layout == 'left'): ?>
	.page.woocommerce .site-wrapper {
		flex-direction: row-reverse;
	}

<?php endif;

if ($post_layout == 'left'): ?>
	 .single .site-wrapper {
		 flex-direction: row-reverse;
	 }
	 .archive .site-wrapper, .home.blog .site-wrapper, .blog .site-wrapper, .search .site-wrapper, .error404 .site-wrapper {
		flex-direction: row-reverse;
	}
	 
<?php endif; ?>

</style>

	<?php
}
add_action( 'wp_head', 'newspiper_customize_css' );
