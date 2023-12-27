<?php
/**
 * Right Sidebar starter content.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$default_content = sprintf(
	'
    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group">

    <!-- wp:image {"id":353,"sizeSlug":"large","linkDestination":"none"} -->
    <figure class="wp-block-image size-large"><img src="%1$s" alt="" class="wp-image-353"/></figure>
    <!-- /wp:image --></div>
    <!-- /wp:group -->
    ',
	esc_url( get_template_directory_uri() . '/assets/img/patterns/sidebar-banner.png' )
);

return array(
	'search',
    'categories',
	'newspiper_banner'    => array(
		'text',
		array(
			'title' => esc_html_x( 'Advertisement', 'Theme starter content', 'newspiper' ),
			'text'  => $default_content,
		),
	),
	'archives',
	'meta'
);
