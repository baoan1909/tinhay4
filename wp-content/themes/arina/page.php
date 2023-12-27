<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arina
 */

get_header();
?>
<div class="breadcumb-wrapper">
    <div class="container">
      <?php echo wp_kses_post(arina_get_the_breadcrumb()); ?>
    </div><!-- /.thm-container -->
</div><!-- /.breadcumb-wrapper -->   	
	<div class="main-content-section main_page">
        <div class="wp-style container">
            <div class="row d-flex justify-content-center">
                <?php if(is_active_sidebar('sidebar-left')) : ?> 
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
			<?php  else : ?>
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<?php  endif ; ?> 
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
							<?php
                                while ( have_posts() ) :
                                    the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
							?>
                        </main><!-- #main -->
                    </div>
                </div>
				<?php if(is_active_sidebar('sidebar-left')) { ?>
			<div class="col-lg-4 col-md-4 col-sm-12">
                <div class="sidebar">
				<?php dynamic_sidebar('sidebar-left'); ?>
				</div>
			</div>
			<?php } ?>
            <!--Sidebar-->
            </div>
        </div>
    </div>
<?php
get_footer();