<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package arina
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <div class="single-blog-post">
  <div class="blog_post">
	<div class="img-box">
		<?php arina_post_thumbnail(); ?>		
		<footer class="entry-footer">
		    <?php arina_entry_footer(); ?>
        </footer><!-- .entry-footer -->		
	</div><!-- /.img-box -->
	<div class="text-box hvr-bounce-to-bottom">
	<div class="text">
		 <div class="entry-content">
		    <?php
			
		    if(is_home()|| is_front_page()|| is_search() || is_archive()){?>
                <p class="m-0"><?php the_excerpt(); ?></p>
			    <?php
		    }else{
			    the_content( sprintf(
				    wp_kses(
				    /* translators: %s: Name of current post. Only visible to screen readers */
					    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'arina' ),
					    array(
						    'span' => array(
							    'class' => array(),
						    ),
					    )
				    ),
				    get_the_title()
			    ) );
		    }

		    wp_link_pages( array(
			    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'arina' ),
			    'after'  => '</div>',
		    ) );
		    ?>
        </div><!-- .entry-content -->

	</div>	
	
	<div data-animation-child="" class="arrow-btn-box top-margin-30 fade-anim-box tr-delay05 animated fade-anim" data-animation="fade-anim">
		<a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="arrow-btn pointer-large animsition-link"><?php esc_html_e('Continue Reading', 'arina');?> </a>
	</div>	
	
	</div>
	</div>
</div><!-- /.single-blog-post -->
</article>

