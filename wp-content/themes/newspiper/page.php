<?php
/**
 * The default template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * This theme uses another page template for more customization options. 
 * It is located in the page-templates folder.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newspiper
 */

get_header();
newspiper_featured_categories();
?>
<!--Site wrapper-->
<div class="site-wrapper">
    <main id="primary" class="site-main">

        <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', newspiper_get_page_template_part() );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>

    </main><!-- #main -->
    <?php if ( class_exists( 'Woocommerce' ) && is_shop() ) :
        if ( ! newspiper_is_shop_fullwidth() ) : 
            get_sidebar(); 
        endif;

    elseif ( ! newspiper_is_page_fullwidth() ) : 
        get_sidebar();
    endif; ?>
</div>

<?php
get_footer();
