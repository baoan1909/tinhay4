<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
   
<section class="blog-style-one sec-pad blog-page mrmain_blog mrindex">
    <div class="container">
        <div class="row">
				<?php if(is_active_sidebar('sidebar-left')) : ?> 
			<div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
			<?php  else : ?>
			<div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<?php  endif ; ?> 
                   
				   <div id="primary" class="content-area">
                        <main id="main" class="blog_list site-main ">

							<?php
							if ( have_posts() ) :
							
								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content');

								endwhile;?>

							<?php else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
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
    </section>
<?php
get_footer();