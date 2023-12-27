<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package arina
 */

if ( ! function_exists( 'arina_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function arina_posted_on() {?>	
		<a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>"><i class="lnr lnr-calendar-full "></i><?php echo get_the_date()?></a>
	<?php }
endif;

if ( ! function_exists( 'arina_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function arina_posted_by() {?>				
			<a class="author_meta" href=" <?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>"><i class="lnr lnr-users "></i><?php echo esc_html( get_the_author() )?></a>        
	<?php }
endif;

if ( ! function_exists( 'arina_comments_number' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function arina_comments_number() {?>				
			<a class="comment_meta" href=" <?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>"><i class="lnr lnr-bubble "></i><?php echo esc_html( comments_number() )?></a>        
	<?php }
endif;



if ( ! function_exists( 'arina_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function arina_entry_footer() {
		// Hide category and tag text for pages.
	
			if (is_single()) {
								
				echo wp_kses_post('<div class="meta-info">');
				arina_posted_by();
				arina_posted_on();
				arina_comments_number();
				echo wp_kses_post('</div>');
			
			}else{
				
				echo wp_kses_post('<div class="meta-info">');
				arina_posted_by();
				arina_posted_on();
				arina_comments_number();
				echo wp_kses_post( '</div>');
				
			}
		
		
		
	}
endif;

if ( ! function_exists( 'arina_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function arina_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
			
			<div class="image">
				<?php the_post_thumbnail('arina-landscape'); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>
<div class="image">
		<a class="overlay-link" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'arina-landscape', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>
</div>
		<?php
		endif; // End is_singular().
	}
endif;
