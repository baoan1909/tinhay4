<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arina
 */
get_header();
?>
<section class="page-title">
    <div class="container">
        <h3><?php wp_title(''); ?></h3>        
    </div><!-- /.thm-container -->
</section><!-- /.page-title -->
<div class="breadcumb-wrapper">
    <div class="container">
      <?php echo wp_kses_post(arina_get_the_breadcrumb()); ?>
    </div><!-- /.thm-container -->
</div><!-- /.breadcumb-wrapper -->    
	
<section class="blog-style-one sec-pad blog-page mrmain_blog">
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

								if ( is_home() && ! is_front_page() ) :
									?>
                                    <header>
                                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                    </header>
								<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;?>

                                <div class="dope-pagination text-center">
									<?php the_posts_pagination(); ?>
                                </div>

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
	