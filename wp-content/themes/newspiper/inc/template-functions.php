<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Newspiper
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newspiper_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	if ( newspiper_has_transparent_header() ) {
		$classes[] = 'has-transparent-header';
	}
	if ( newspiper_is_static_header() ) {
		$classes[] = 'static-header';
	}
	if ( newspiper_default_mode() == 'dark' ) {
		$classes[] = 'dark-mode';
	}
	if ( class_exists( 'Woocommerce' ) && is_active_sidebar( 'sidebar-2-1' ) && is_woocommerce() && ! newspiper_is_shop_fullwidth() ) {
		$classes[] = 'has-sidebar';
	}
	if ( class_exists( 'Woocommerce' ) && is_woocommerce() ) {
		return $classes;
	} elseif ( is_active_sidebar( 'sidebar-1' ) ) {
		if ( is_page() && ! newspiper_is_page_fullwidth() ) {
			$classes[] = 'has-sidebar';
		} elseif ( is_single() && ! newspiper_is_post_fullwidth() ) {
			$classes[] = 'has-sidebar';
		} elseif ( newspiper_is_blog() && ! newspiper_is_post_archives_fullwidth() ) {
			$classes[] = 'has-sidebar';
		}
	}
	return $classes;
}
add_filter( 'body_class', 'newspiper_body_classes' );

/**
 * Check if it is a content type that lists blog posts, including the taxonomy archives (categories, tags, etc.).
 */
function newspiper_is_blog() {
	return ( is_archive() || is_search() || is_author() || is_category() || is_home() || is_tag() );
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newspiper_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'newspiper_pingback_header' );

/* Primary Menu Custom Markup */
function newspiper_primary_menu() {
	wp_nav_menu(
		array(
			'container'      => '',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'nav-menu',
			'link_before'    => '<span>',
			'link_after'     => '</span>',
			'theme_location' => 'menu-1',
			'show_toggles'   => true,
			'items_wrap'     => '<div class="slide-menu slide-section"><ul id="%s" class="%s">%s</ul></div>',
			'fallback_cb'    => 'newspiper_pages_menu',
		)
	);
}

/* Secondary Menu */
function newspiper_top_menu() {
	$menu_class = get_theme_mod( 'show_top_bar_icons_mobile', false ) ? '' : 'hide';
	wp_nav_menu(
		array(
			'container'      => '',
			'theme_location' => 'menu-2',
			'menu_id'        => 'top-menu',
			'menu_class'     => 'nav-menu ' . $menu_class,
			'fallback_cb'    => 'newspiper_secondary_menu_fallback',
		)
	);
}

// Display only customizer items to the top menu by default

function newspiper_secondary_menu_fallback( $args ) {
	?>
		<ul> <?php newspiper_secondary_menu_markup(); ?> </ul>
	<?php
}

/* WP Pages Custom Markup */
function newspiper_pages_menu() {
	wp_page_menu(
		array(
			'menu_class'   => 'slide-menu slide-section',
			'before'       => '<ul id="primary-menu" class="nav-menu">',
			'after'        => '</ul>',
			'link_before'  => '<span>',
			'link_after'   => '</span>',
			'show_toggles' => true,
		)
	);
}

/**
 * Change default excerpt length
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */
function newspiper_default_excerpt_length( $length ) {
	// Get excerpt length from database.
	$excerpt_length = esc_attr( get_theme_mod( 'newspiper_excerpt_length', 15 ) );
	// Return excerpt text.

	if ( $excerpt_length >= 0 ) {
		return absint( $excerpt_length );
	} else {
		return 55;
		// Number of words.
	}
}

add_filter( 'excerpt_length', 'newspiper_default_excerpt_length' );

/**
 * Set custom excerpt length
 *
 * @param int $length Length of excerpt in number of words.
 * @return int
 */

// Custom Excerpt Length to be used on post archives
function newspiper_the_excerpt( $limit ) {
    $excerpt = explode( ' ', get_the_excerpt(), $limit );
    
    if ( count( $excerpt ) >= $limit ) {
        array_pop( $excerpt );
        $excerpt = implode( " ", $excerpt ) . '...';
    } else {
        $excerpt = implode( " ", $excerpt );
    }
    
    $excerpt = preg_replace( '`\\[[^\\]]*\\]`', '', $excerpt );
    echo esc_attr($excerpt);
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Read More' link.
 *
 * @since newspiper 0.0.1
 *
 * @param string $link Link to single post/page.
 * @return string 'Read More' link prepended with an ellipsis.
 */
function newspiper_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	return '&hellip;';
}

add_filter( 'excerpt_more', 'newspiper_excerpt_more' );

// Add very simple breadcrumps
if ( ! function_exists( 'newspiper_breadcrumbs' ) ) :
	function newspiper_breadcrumbs() {
		if ( ! newspiper_has_breadcrumbs() || is_front_page() ) {
			return;
		}

		echo '<div class="breadcrumbs"' . newspiper_schema_microdata( 'breadcrumbs', 0 )  . '>';
		?>
		<a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Home', 'newspiper' ); ?></a>
	
		<?php
		if ( is_category() || is_single() ) {
			$categories = get_the_category();
			echo '/&nbsp;';
			echo '<a href="' . esc_url( get_category_link( $categories[0]->cat_ID ) ) . '">' 
			. esc_html( $categories[0]->cat_name ) . 
			'</a>';
			if ( is_single() ) {
				echo '&nbsp;/&nbsp;';
				the_title();
			}
		} elseif ( is_page() ) {
			echo '/&nbsp;';
			echo the_title();
		} elseif ( is_search() ) {
			echo '&nbsp;/&nbsp;Search Results for... ';
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
		}
		echo '</div>';
	}
endif;

/**
 * Properly escape svg output
 *
 * @link https://wordpress.stackexchange.com/questions/312625/escaping-svg-with-kses
 */
function newspiper_get_kses_extended_ruleset() {
	$kses_defaults = wp_kses_allowed_html( 'post' );
	$svg_args      = array(
		'svg'      => array(
			'class'               => true,
			'aria-hidden'         => true,
			'aria-labelledby'     => true,
			'role'                => true,
			'xmlns'               => true,
			'width'               => true,
			'height'              => true,
			'stroke'              => true,
			'stroke-width'        => true,
			'fill'                => true,
			'stroke-linecap'      => true,
			'stroke-linejoin'     => true,
			'viewbox'             => true,
			'preserveaspectratio' => true,
		),
		'circle'   => array(
			'cx' => true,
			'cy' => true,
			'r'  => true,
		),
		'line'     => array(
			'x1' => true,
			'y1' => true,
			'x2' => true,
			'y2' => true,
		),
		'polyline' => array(
			'points' => true,
		),
		'g'        => array(
			'fill' => true,
		),
		'title'    => array(
			'title' => true,
		),
		'path'     => array(
			'd'    => true,
			'fill' => true,
		),
		'rect'     => array(
			'x'      => true,
			'y'      => true,
			'width'  => true,
			'height' => true,
		),
		'polygon'  => array(
			'points' => true,
		),
	);
	return array_merge( $kses_defaults, $svg_args );
}

/**
 * Adds Schema.org structured data (microdata) to the HTML markup
 * More details at http://schema.org
 * Testing tools at https://developers.google.com/structured-data/testing-tool/
 */
function newspiper_schema_microdata( $location = '', $echo = 1 ) {
	$output = '';
   switch ( $location ) {
	   case 'body':
		   $output = 'itemscope itemtype="http://schema.org/WebPage"';
		   break;
	   case 'header':
		   $output = 'itemscope itemtype="http://schema.org/WPHeader"';
		   break;
	   case 'blog':
		   $output = 'itemscope itemtype="http://schema.org/Blog"';
		   break;
	   case 'element':
		   $output = 'itemscope itemtype="http://schema.org/WebPageElement"';
		   break;
	   case 'sidebar':
		   $output = 'itemscope itemtype="http://schema.org/WPSideBar"';
		   break;
	   case 'footer':
		   $output = 'itemscope itemtype="http://schema.org/WPFooter"';
		   break;
	   case 'mainEntityOfPage':
		   $output = 'itemprop="mainEntityOfPage"';
		   break;
	   case 'breadcrumbs':
		   $output = 'itemprop="breadcrumb"';
		   break;
	   case 'menu':
		   $output = 'itemscope itemtype="http://schema.org/SiteNavigationElement"';
		   break;
		   /*
	   /* SITE HEADER */
	   case 'site-title':
		   $output = 'itemprop="name"';
		   break;
	   case 'site-description':
		   $output = 'itemprop="description"';
		   break;
		/* POSTS */
		case 'blog':
			// post archives
			$output = 'itemscope itemtype="http://schema.org/Blog"';
			break;
		case 'blogposts':
			$output = 'itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPosts"';
			break;
	   case 'blogpost':
		   // single post
		   $output = 'itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost"';
		   break;
	   case 'page':
		   // single pages
		   $output = 'itemscope itemtype="http://schema.org/Article" itemprop="mainEntity"';
		   break;
	   case 'entry-title':
		   $output = 'itemprop="headline"';
		   break;
	   case 'url':
		   $output = 'itemprop="url"';
		   break;
	   case 'entry-summary':
		   $output = 'itemprop="description"';
		   break;
	   case 'entry-content':
		   $output = 'itemprop="articleBody"';
		   break;
	   case 'text':
		   $output = 'itemprop="text"';
		   break;
	   case 'comment':
		   $output = 'itemscope itemtype="http://schema.org/Comment"';
		   break;
	   case 'comment-author':
		   $output = 'itemscope itemtype="http://schema.org/Person" itemprop="creator"';
		   break;
	   /* POST META */
	   case 'author':
		   $output = 'itemscope itemtype="http://schema.org/Person" itemprop="author"';
		   break;
	   case 'author-url':
		   $output = 'itemprop="url"';
		   break;
	   case 'author-name':
		   $output = 'itemprop="name"';
		   break;
	   case 'author-description':
		   $output = 'itemprop="description"';
		   break;
	   case 'time':
		   $output = 'itemprop="datePublished"';
		   break;
	   case 'time-modified':
		   $output = 'itemprop="dateModified"';
		   break;
	   case 'category':
		   $output = '';
		   break;
	   case 'tags':
		   $output = 'itemprop="keywords"';
		   break;
	   case 'comment-meta':
		   $output = 'itemprop="discussionURL"';
		   break;
	   case 'image':
		   $output = 'itemprop="image" itemscope itemtype="http://schema.org/ImageObject"';
		   break;
   }
   // switch
   $output = ' ' . $output;

   if ( $echo ) {
	   echo $output;
   } else {
	   return $output;
   }

}

function newspiper_has_transparent_header() {
	return is_front_page() && get_theme_mod( 'homepage_has_transparent_header', false );
}

function newspiper_get_page_template_part() {
	return newspiper_has_transparent_header() || is_front_page() ? 'empty' : 'page';
}

// Simple pagination in post archives
function newspiper_numeric_posts_nav() {
	return the_posts_pagination(
		array(
			'mid_size'  => 2,
			'prev_text' => '&#x00AB;',
			'next_text' => '&#x00BB;',
		)
	);
}

// compute post read time
function newspiper_convert_read_time( $seconds ) {

	$string = '';
	$days    = intval( $seconds / ( 3600 * 24 ) );
	$hours   = intval( $seconds / 3600 ) % 24;
	$minutes = intval( $seconds / 60 ) % 60;
	$seconds = intval( $seconds ) % 60;

	if ( $days > 0 ) {
		$string .= "$days " . esc_html__( 'days read', 'newspiper' );
		return $string;
	}
	if ( $hours > 0 ) {
		$string .= "$hours " . esc_html__( 'hrs read', 'newspiper' );
		return $string;
	}
	if ( $minutes > 0 ) {
		$string .= "$minutes " . esc_html__( 'min read', 'newspiper' );
		return $string;
	}
	if ( $seconds > 0 ) {
		$string .= "$seconds " . esc_html__( 'sec read', 'newspiper' );
		return $string;
	}

	return $string;
}

function newspiper_get_post_meta_before_post_content() {
	// check user settings in theme customizer
	$post_meta       = get_theme_mod( 'show_post_meta_before_post_content', 'show_post_date,show_post_author' );
	$saved_post_meta = explode( ',', esc_attr( $post_meta ) );
	return $saved_post_meta;
}

function newspiper_get_post_meta_after_post_content() {
	// check user settings in theme customizer
	$post_meta       = get_theme_mod( 'show_post_meta_after_post_content','show_post_tags,show_post_comments,show_time_to_read' );
	$saved_post_meta = explode( ',', esc_attr( $post_meta ) );
	return $saved_post_meta;
}

/**
 * Enable dark theme mode
 * Hook css and js right after the dark mode markup to avoid light flash of unstyled content.
 */
function newspiper_dark_mode_loader() {
	?>
	<script>
	(function(){
	var switchers = document.getElementsByClassName('dark-mode-widget');
	for (var i = 0; i < switchers.length; i++) {
		var switcher = switchers[i];
		if (localStorage.getItem('newNightMode')) {
			document.body.className +=' dark-mode';
			switcher.className += ' js-toggle--checked';
		}
		if (localStorage.getItem('newLightMode')) {
			document.body.className = document.body.className.replace('dark-mode', '');
			switcher.className = switcher.className.replace('js-toggle--checked', '');
		}
		if(document.body.className.indexOf('dark-mode')> -1){
			switcher.className += ' js-toggle--checked';
		}
	}
	})();
	</script>
	<?php
}

/**
 * Facebook Open Graph Compatibility.
 *
 * @since 1.0.0
 * Display the featured post image as og:image on the single post page
 * @see   https://stackoverflow.com/questions/28735174/wordpress-ogimage-featured-image
 */
function newspiper_fb_open_graph() {
	if ( is_single() && has_post_thumbnail() ) {
		echo '<meta property="og:image" content="' . esc_attr( get_the_post_thumbnail_url( get_the_ID() ) ) . '" />';
	}
}

add_action( 'wp_head', 'newspiper_fb_open_graph' );

function newspiper_add_menu_item_data_text( $atts, $item, $args ) {
	$atts['data-text'] = $item->title;
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'newspiper_add_menu_item_data_text', 10, 3 );

function newspiper_add_page_item_data_text( $atts, $page, $args ) {
	$atts['data-text'] = $page->post_title;
	return $atts;
}
add_filter( 'page_menu_link_attributes', 'newspiper_add_page_item_data_text', 10, 3 );

function newspiper_change_logo_class( $html ) {

	$html = str_replace( 'custom-logo-link', 'custom-logo-link light-mode-logo', $html );

	return $html;
}

add_filter( 'get_custom_logo', 'newspiper_change_logo_class' );


/* Dark Mode logo version */

function newspiper_dark_mode_logo() {
	if ( get_theme_mod( 'dark_mode_logo' ) ) :
		?>
		<a class="custom-logo-link dark-mode-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img class="custom-logo" alt="<?php esc_attr_e( 'Newspiper dark mode logo ', 'newspiper' ); ?>" src="<?php echo esc_attr( get_theme_mod( 'dark_mode_logo' ) ); ?>" />
		</a>
		<?php
	endif;
}

/** Add Spinner */

/**
 * Add spinner
 */
function newspiper_preloader() {
	$preloader = get_theme_mod( 'has_loader', 1 );
	if ( $preloader && ( is_front_page() || is_home() || is_customize_preview() ) ) {
		?>
		<div class="preloader">
		<div class="bounce-loader">
			<div class="bounce1"></div>
			<div class="bounce2"></div>
			<div class="bounce3"></div>
		</div>
		</div>
		<?php
	}
}

add_action( 'wp_body_open', 'newspiper_preloader' );


/* Post navigation in single.php */
function newspiper_the_post_navigation() {
	$newspiper_prev_arrow = '&#60;';
	$newspiper_next_arrow = '&#62;';
	the_post_navigation(
		array(
			'prev_text'          => '<span class="nav-subtitle">' . $newspiper_prev_arrow . '</span> <span class="nav-title">%title</span>',
			'next_text'          => '<span class="nav-title">%title </span>' . '<span class="nav-subtitle">' . $newspiper_next_arrow . '</span>',
			'screen_reader_text' => __( 'Posts navigation', 'newspiper' ),
		)
	);
}

/**
 * Get an array of cat id and title.
 */
function newspiper_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'newspiper' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$id             = $cat->term_id;
		$title          = $cat->name;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Post Author box
 * @package Newspiper
 * @since 0.0.4
 */
function newspiper_auhor_box_markup() {
	$author_box = get_theme_mod( 'show_author_box', 1 );

	if ( $author_box ) {
		?>
		<div class="about-author hentry">
			<div class="about-author-image">
				<figure>
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 );?>
				</figure>
			</div>
			<div class="about-author-text">
				<div class="about-author-inner">
					<h2>
						<?php echo esc_html( __( 'Author: ', 'newspiper' ) ), esc_html( get_the_author_meta( 'display_name' ) );?>
					</h2>
					<?php echo wpautop( esc_html( get_the_author_meta( 'description' ) ) ); ?>
				</div>
				<a href="<?php echo esc_html( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>">
					<?php _e( 'View all posts by', 'newspiper' );?>
					<?php the_author();?>&nbsp;&#62;
				</a>
			</div>
		</div>
		<?php
	}

}

/**
 * Related Posts
 * $value - (optional) either name or locale or slug.
 * Defaults to slug.
 * @package Newspiper
 * @since 0.0.1
 */
function newspiper_display_related_posts() {
	$show_related_posts = get_theme_mod( 'show_related_posts', 1 );

	if ( $show_related_posts ) {
		?>
		<?php
		$related = new WP_Query(
			array(
				'category__in'   => wp_get_post_categories( get_the_ID() ),
				'posts_per_page' => 3,
				'post__not_in'   => array( get_the_ID() ),
			)
		);

		if ( $related->have_posts() ) {
			?>
		<div class="related-posts-wrapper">        
			<h2><?php _e( 'Related Posts', 'newspiper' ); ?></h2>
			<div class="related-posts featured-content">
				<?php
				while ( $related->have_posts() ) {
					$related->the_post();
				    // Get the categories for the current post
					$categories_list = get_the_category_list( esc_html( ' ' ) );

					?>
				<div class="related-post featured-element">
					<a href="<?php the_permalink(); ?>">
						<?php
						if ( ! has_post_thumbnail() ) {
							echo '<figure>';
							newspiper_default_post_thumbnail();
						} else {
							echo '<figure>';
							the_post_thumbnail( 'medium' , 
							array(
								'alt' => the_title_attribute(
									array(
										'echo' => false,
										)
									),
								)
							);
						}

						echo '</figure>'; ?>
					</a>
					<div class="top-meta">
					<?php
					if (!empty($categories_list)) {
						echo '<span class="cat-links">' . $categories_list . '</span>';
					} 
					?>
					</div>
					<div class="related-posts-link">        
						<a rel="external" 
							href="<?php the_permalink(); ?>"><?php the_title(); ?>
						</a>        
					</div>
				</div>
					<?php
				}
				wp_reset_postdata();
				?>
			</div> 
		</div>
			<?php
		}
	}

}

/**
 * Show featured image inside the_Block Editor that can be toggled on or off 
 * @package Newspiper
 * @since 0.0.1
*/

function newspiper_default_featured_image_fallback( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
	$default_image = get_theme_mod( 'show_default_featured_image', true );
    if ( ! is_admin() && ( ! $post_thumbnail_id && $size != 'full' ) && $default_image ) {
        $html = wp_kses( newspiper_get_svg( 'fallback-svg' ), newspiper_get_kses_extended_ruleset() );;
    }
    return $html;
}

add_filter( 'post_thumbnail_html', 'newspiper_default_featured_image_fallback', 10, 5 );