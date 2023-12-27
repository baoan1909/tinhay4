<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<section class=" blog-style-one sec-pad blog-page mrsingle">
    <div class="container">
        <div class="row d-flex justify-content-center">
				<?php if(is_active_sidebar('sidebar-left')) : ?> 
			<div class="wp-style content-side col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
			<?php  else : ?>
			<div class="wp-style content-side col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
			<?php  endif ; ?>   

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
							<div class="single-blog-post">
							 <?php while( have_posts() ): the_post();
								?>
							 <div class="blog_post">
								<h1 class="single_title">
										<a href="<?php esc_url( get_permalink() ) ?>"><?php the_title(); ?></a>
									</h1><!-- .entry-header -->
								<div class="img-box">
									<?php arina_post_thumbnail(); ?>		
									<footer class="entry-footer">
										<?php arina_entry_footer(); ?>
									</footer><!-- .entry-footer -->		
								</div><!-- /.img-box -->
								<div class="single_text_block">
								<div class="text">
										<?php the_content(); ?>
										<div class="clearfix"></div>
										<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'arina'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
									
								<!-- /.text-box -->
								
								
								<div class="post-tags left-title pull-left">
									<?php the_tags(); ?>	
								</div>
							
								</div>
								</div>
								</div>
							
							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile; // End of the loop.
							?>
							</div>
                        </main>
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
