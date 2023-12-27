<?php
/**
 * Registers block patterns categories, and type.
 */

function newspiper_register_block_patterns() {
	$block_pattern_categories = array(
		'newspiper' => array( 'label' => esc_html__( 'Newspiper', 'newspiper' ) ),
	);

	$block_pattern_categories = apply_filters( 'newspiper_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}
}

add_action( 'init', 'newspiper_register_block_patterns', 9 );
