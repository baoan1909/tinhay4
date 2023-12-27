<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newspiper
 */

if (class_exists( 'Woocommerce' )  && is_active_sidebar( 'sidebar-2-1' ) && (is_woocommerce() ) )  { 
	?>
	<aside id="secondary" class="widget-area" role="complementary" <?php newspiper_schema_microdata( 'sidebar' );?>>
		<?php
		if (is_active_sidebar('sidebar-2-1')) {
				dynamic_sidebar('sidebar-2-1');
		}
		?>
	</aside><!-- #secondary --> <?php 
}
else if(is_active_sidebar( 'sidebar-1' )) { ?>
	<aside id="secondary" class="widget-area" role="complementary" <?php newspiper_schema_microdata( 'sidebar' );?>>
		<?php dynamic_sidebar('sidebar-1'); ?>
	</aside><!-- #secondary --> <?php 
}