<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspiper
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php newspiper_schema_microdata( 'page' )?>>
	<header class="entry-header">
	<?php if( ! has_post_thumbnail( ) ) :
		/**
		 * newspiper_breadcrumbs_hook
		 * 
		 * @since 0.0.1
		 * @hooked newspiper_breadcrumbs
		 */
		do_action( 'newspiper_breadcrumbs_hook' );
		the_title( '<h1 class="entry-title"' . newspiper_schema_microdata( 'entry-title', 0 ) . '>' , '</h1>' );
	endif; ?>
	</header><!-- .entry-header -->
		<div class="entry-content" <?php newspiper_schema_microdata( 'entry-content' ); ?>>
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newspiper' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'newspiper' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->