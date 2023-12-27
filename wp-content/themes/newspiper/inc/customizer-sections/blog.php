<?php

/**
 * Register Blog Settings Section in the theme customizer.
 *
 * @package newspiper
 */
function newspiper_register_blog_theme_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'blog_options',
		array(
			'title'       => esc_html__( 'Blog Settings', 'newspiper' ),
			'description' => esc_html__( 'Customize the way blog posts are displayed. Show post likes, number of views and more amazing features - go pro version.', 'newspiper' ),
		)
	);

	// Post Categories
	$wp_customize->add_setting(
		'show_post_categories',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'show_post_categories',
		array(
			'label'       => esc_html__( 'Show post categories', 'newspiper' ),
			'description' => esc_html__( 'Show post categories on top of the post.', 'newspiper' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	// Post thumbnail
	$wp_customize->add_setting(
		'get_post_thumbnail_from_content',
		array(
			'default'           => true,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'get_post_thumbnail_from_content',
		array(
			'label'       => esc_html__( 'Display post content image as a fallback featured image in post archives', 'newspiper' ),
			'description' => esc_html__( 'If there is no featured image assigned to the post, try to get the first image from the post content.', 'newspiper' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	// Show featured image placeholder
	$wp_customize->add_setting(
		'show_default_featured_image',
		array(
			'default'           => true,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'show_default_featured_image',
		array(
			'label'       => esc_html__( 'Show placeholder as a fallback featured image inside Gutenberg blocks', 'newspiper' ),
			'section'     => 'blog_options',
			'description' => 'This adds a placeholder for posts that do not have a featured image assigned to them. Note: It works only for featured images inside the Block editor.',
			'type'        => 'checkbox',
		)
	);

	// Post Meta Before Post Content
	$wp_customize->add_setting(
		'show_post_meta_before_post_content',
		array(
			'default'           => 'show_post_date,show_post_author',
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Newspiper_Pill_Checkbox_Custom_Control(
			$wp_customize,
			'show_post_meta_before_post_content',
			array(
				'label'       => esc_html__( 'Show Post Meta Before Post Content', 'newspiper' ),
				'description' => esc_html__( 'Customize the way blog posts meta information in post archives and single blog posts are displayed. You can choose to show or hide the post meta before the post content. Drag and drop the boxes to chage the post meta order.', 'newspiper' ),
				'section'     => 'blog_options',
				'input_attrs' => array(
					'sortable'  => true,
					'fullwidth' => true,
				),
				'choices'     => array(
					'show_post_date'       => esc_html__( 'Show Post Date', 'newspiper' ),
					'show_post_author'     => esc_html__( 'Show Post Author', 'newspiper' ),
					'show_post_categories' => esc_html__( 'Show Post Categories', 'newspiper' ),
					'show_post_tags'       => esc_html__( 'Show Post Tags', 'newspiper' ),
					'show_post_comments'   => esc_html__( 'Show Number of Comments', 'newspiper' ),
					'show_time_to_read'    => esc_html__( 'Show Time to Read', 'newspiper' )
				),
			)
		)
	);

	// Post Meta After Post Content
	$wp_customize->add_setting(
		'show_post_meta_after_post_content',
		array(
			'default'           => 'show_post_tags,show_post_comments,show_time_to_read',
			'transport' 		=> 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new Newspiper_Pill_Checkbox_Custom_Control(
			$wp_customize,
			'show_post_meta_after_post_content',
			array(
				'label'       => esc_html__( 'Show Post Meta After Post Content', 'newspiper' ),
				'description' => esc_html__( 'Customize the way blog posts meta information in post archives and single blog posts are displayed. You can choose to show or hide the post meta after the post content. Drag and drop the boxes to chage the post meta order.', 'newspiper' ),
				'section'     => 'blog_options',
				'input_attrs' => array(
					'sortable'  => true,
					'fullwidth' => true,
				),
				'choices'     => array(
					'show_post_date'       => esc_html__( 'Show Post Date', 'newspiper' ),
					'show_post_author'     => esc_html__( 'Show Post Author', 'newspiper' ),
					'show_post_categories' => esc_html__( 'Show Post Categories', 'newspiper' ),
					'show_post_tags'       => esc_html__( 'Show Post Tags', 'newspiper' ),
					'show_post_comments'   => esc_html__( 'Show Number of Comments', 'newspiper' ),
					'show_time_to_read'    => esc_html__( 'Show Time to Read', 'newspiper' )
				),
			)
		)
	);

	// Add Settings and Controls for blog content.
	$wp_customize->add_setting(
		'post_archives_content',
		array(
			'default'           => true,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'post_archives_content',
		array(
			'label'       => esc_html__( 'Blog Excerpts', 'newspiper' ),
			'description' => esc_html__( 'Show post excerpts instead of full content for your post archives.', 'newspiper' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
			'active_callback' => 'newspiper_has_one_column_layout',
		)
	);
	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting(
		'newspiper_excerpt_length',
		array(
			'default'           => 15,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'newspiper_excerpt_length',
		array(
			'label'           => esc_html__( 'Post Excerpt Length', 'newspiper' ),
			'section'         => 'blog_options',
			'type'            => 'number',
			'input_attrs'     => array(
				'min'  => 10,
				'max'  => 55,
				'step' => 1,
			),
			'description'     => esc_html__( 'Enter a number between 10 and 55. Default is 55.', 'newspiper' ),
			'active_callback' => 'newspiper_is_excerpt',
		)
	);

	$wp_customize->add_setting(
		'post_archives_columns',
		array(
			'default'           => '1',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'post_archives_columns',
		array(
			'label'           => esc_html__( 'Post Archives Layout', 'newspiper' ),
			'section'         => 'blog_options',
			'description'     => esc_html__( 'Display posts in post archives in a single or multi-column layout', 'newspiper' ),
			'type'            => 'select',
			'choices'         => array(
				'1' => esc_html__( 'One Column', 'newspiper' ),
				'2' => esc_html__( 'Two Columns', 'newspiper' ),
				'3' => esc_html__( 'Three Columns', 'newspiper' ),
				'4' => esc_html__( 'Four Columns', 'newspiper' ),
			),
			'active_callback' => 'newspiper_is_excerpt',
		)
	);

	$wp_customize->add_setting(
		'post_archives_display',
		array(
			'default'           => 'grid',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'post_archives_display',
		array(
			'label'           => esc_html__( 'Post Archives Display', 'newspiper' ),
			'section'         => 'blog_options',
			'description'     => esc_html__( 'Display post columns in a grid or masonry layout', 'newspiper' ),
			'type'            => 'select',
			'choices'         => array(
				'grid'    => esc_html__( 'Grid', 'newspiper' ),
				'masonry' => esc_html__( 'Masonry', 'newspiper' ),
			),
			'active_callback' => 'newspiper_has_multicolumn_layout',
		)
	);

	$wp_customize->add_setting(
		'post_loop_animation',
		array(
			'default'           => 'slide_up',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'post_loop_animation',
		array(
			'label'       => esc_html__( 'Post Loop Animation', 'newspiper' ),
			'section'     => 'blog_options',
			'description' => esc_html__( 'Animate blog posts in post archives.', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'zoom_in'  => esc_html__( 'Zoom In Animation', 'newspiper' ),
				'slide_up' => esc_html__( 'Slide Up Animation', 'newspiper' ),
				'rotate'   => esc_html__( 'Rotate Text Animation', 'newspiper' ),
				'disabled' => esc_html__( 'Disabled', 'newspiper' ),
			),
		)
	);

	$wp_customize->add_setting(
		'post_archives_title_hover_animation',
		array(
			'default'           => 'underline',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'post_archives_title_hover_animation',
		array(
			'label'       => esc_html__( 'Post Archives Title Hover Animation', 'newspiper' ),
			'section'     => 'blog_options',
			'description' => esc_html__( 'Choose an animation to display when hovering over a menu item. ', 'newspiper' ),
			'type'        => 'select',
			'choices'     => array(
				'underline' => esc_html__( 'Underline', 'newspiper' ),
				'disabled'  => esc_html__( 'Disabled', 'newspiper' ),
			),
		)
	);

	$wp_customize->add_setting(
		'featured_image_display',
		array(
			'default'           => '2',
			'sanitize_callback' => 'newspiper_sanitize_select',
		)
	);
	$wp_customize->add_control(
		'featured_image_display',
		array(
			'label'           => esc_html__( 'Featured Image Display', 'newspiper' ),
			'section'         => 'blog_options',
			'description'     => esc_html__( 'Display the post featured image as a fullwidth header above post content or inside the post', 'newspiper' ),
			'type'            => 'select',
			'choices'         => array(
				'1' => esc_html__( 'Fullwidth header', 'newspiper' ),
				'2' => esc_html__( 'Inside post', 'newspiper' ),
			)
		)
	);

	//Show author box
	$wp_customize->add_setting(
		'show_author_box',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_author_box',
		array(
			'label'       => esc_html__( 'Show post author box', 'newspiper' ),
			'description' => esc_html__( 'Display post author box after post content on single blog posts', 'newspiper' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	// Related posts
	$wp_customize->add_setting(
		'show_social_share_icons',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_social_share_icons',
		array(
			'label'       => esc_html__( 'Show social share icons', 'newspiper' ),
			'description' => esc_html__( 'Display social share icons inside blog posts.', 'newspiper' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

	// Related posts
	$wp_customize->add_setting(
		'show_related_posts',
		array(
			'default'           => 1,
			'sanitize_callback' => 'newspiper_sanitize_checkbox',
			'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control(
		'show_related_posts',
		array(
			'label'       => esc_html__( 'Show related posts', 'newspiper' ),
			'description' => esc_html__( 'Display related posts after post content in single blog posts', 'newspiper' ),
			'section'     => 'blog_options',
			'type'        => 'checkbox',
		)
	);

}

add_action( 'customize_register', 'newspiper_register_blog_theme_customizer' );

function newspiper_customize_blog_css() {

	$post_archives_columns = get_theme_mod( 'post_archives_columns', '1' );
	$post_animation        = get_theme_mod( 'post_loop_animation', 'slide_up' );
	$post_title_animation  = get_theme_mod( 'post_archives_title_hover_animation', 'underline' );
	?>

<style type="text/css">

	<?php
	// Post title hover animation
	if ( $post_title_animation == 'underline' ) :
		?>
	@media (min-width: 54rem) {
		.newspiper-post-container .entry-title a{
			background: linear-gradient(to right, CurrentColor 0%, CurrentColor 100%);
			background-size: 0 3px;
			background-repeat: no-repeat;
			background-position: left 100%;
			display: inline;
			transition: background-size 0.6s ease-in-out;
		}

		.newspiper-post-container .entry-title a:hover {
			background-size: 100% 3px;
		}
	}
	<?php endif;

	if ( ! is_single() && $post_archives_columns == 1 && newspiper_is_excerpt() ) : ?>
	@media(min-width:54rem){
		.newspiper-post-inner .hentry {
			display: flex;
			align-items: center;
		}

		.post-thumbnail {
			flex: 0 0 39%;
			<?php echo is_rtl() ? 'margin-left: 1rem' : 'margin-right: 1rem';?>
		}
		.post-thumbnail figure {
			margin: 0;
		}
		.post-thumbnail img {
			height: 280px;
		}
	}

	<?php elseif ( $post_archives_columns == 2 ) : ?>
	@media(min-width:54rem){
		.newspiper-post-inner {
			display: grid;
			grid-template-columns: auto auto;
			grid-gap: 2rem;
		}
		<?php
		if ( ! is_single() ) : ?>
		.post-thumbnail img {
			height: 360px;
		}
		.has-sidebar .post-thumbnail img {
			height: 280px;
		}
		<?php endif; ?>
	}
	<?php elseif ( $post_archives_columns == 3 ) : ?>
	@media(min-width:54rem){
		.newspiper-post-inner {
			display: grid;
			grid-template-columns: auto auto auto;
			grid-gap: 2rem;
		}
		<?php if ( ! is_single() ) : ?>
		.post-thumbnail img {
			height: 280px;
		}
		.has-sidebar .post-thumbnail img {
			height: 180px;
		}
		<?php endif; ?>
	}
	<?php elseif ( $post_archives_columns == 4 ) : ?>
	@media(min-width:54rem){
		.newspiper-post-inner {
			display: grid;
			grid-template-columns: auto auto auto auto;
			grid-gap: 2rem;
		}
		<?php if ( ! is_single() ) : ?>
		.post-thumbnail img {
			height: 220px;
		}
		.has-sidebar .post-thumbnail img {
			height: 160px;
		}
		<?php endif; ?>
	}
	<?php endif;

	/* Post Loop Animation */
	if ( $post_animation !== 'disabled' ) :
		?>
	body:not(.page):not(.single) .hentry.animated {
		opacity: 1;
		<?php echo esc_attr( $post_animation == 'slide_up' ? 'transform: translate(0, 0);' : ( $post_animation == 'zoom_in' ? 'transform: scale3d(1, 1, 1);' : 'transform: rotateX(0);' ) ); ?>
		transform: rotateX(0);
	}

	body:not(.page):not(.single) .hentry {
		transition: all 0.5s ease-in-out;
		opacity: 0.4;
		<?php echo esc_attr( $post_animation == 'slide_up' ? 'transform: translate(0px, 3em);' : ( $post_animation == 'zoom_in' ? 'transform: scale3d(0.9, 0.9, 0.9);' : 'transform: perspective(2000px) rotateX(12deg);' ) ); ?>
	}

	<?php endif; ?>

</style>

	<?php

}
add_action( 'wp_head', 'newspiper_customize_blog_css' );
