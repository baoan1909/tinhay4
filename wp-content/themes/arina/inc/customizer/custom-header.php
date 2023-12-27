<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package arina
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses arina_header_style()
 */


if ( ! function_exists( 'arina_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see arina_custom_header_setup().
	 */
	function arina_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
<?php
	}
endif;
