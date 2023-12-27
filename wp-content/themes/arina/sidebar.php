<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arina
 */

if ( is_active_sidebar( 'sidebar-left' ) ) :?>
    <div class="col-lg-4">
        <aside id="secondary" class="widget-area">
            <?php dynamic_sidebar( 'sidebar-left' ); ?>
        </aside><!-- widget area -->
    </div>
<?php endif; ?>