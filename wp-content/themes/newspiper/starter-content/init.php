<?php

function newspiper_starter_content_setup() {

	add_theme_support(
		'starter-content',
		array(

			'widgets' => array(
				'sidebar-1' => require __DIR__ . '/sidebar-1.php',
				'sidebar-2' => require __DIR__ . '/footer-1.php',
				'sidebar-3' => require __DIR__ . '/footer-2.php',
				'sidebar-4' => require __DIR__ . '/footer-3.php',
				'sidebar-5' => require __DIR__ . '/footer-4.php',
			)
		)
	);
}
add_action( 'after_setup_theme', 'newspiper_starter_content_setup' );
