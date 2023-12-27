<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newspiper
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php newspiper_schema_microdata( 'blogpost' )?>>
	<header class="entry-header">
		<?php
		/**
		 * newspiper_breadcrumbs_hook
		 * 
		 * @since 0.0.1
		 * @hooked newspiper_breadcrumbs
		 */
		if ( !has_post_thumbnail() ) {
			do_action( 'newspiper_breadcrumbs_hook' );
		}
		if ( ! newspiper_has_fullwidth_featured_image() ) {
			newspiper_post_thumbnail();
			do_action( 'newspiper_breadcrumbs_hook' );
		}

		if ( 'post' === get_post_type() ) :
			newspiper_posted_in( get_theme_mod('show_post_categories', 1) ); 
		endif;
		if ( ! newspiper_has_fullwidth_featured_image() ) {
			the_title( '<h1 class="entry-title"' . newspiper_schema_microdata( 'entry-title', 0 ) . '>' , '</h1>' );
		}
		if ( is_singular() ) :
			if ( !has_post_thumbnail() ) :
				the_title( '<h1 class="entry-title"' . newspiper_schema_microdata( 'entry-title', 0 ) . '>' , '</h1>' );
			endif;
		else :
			the_title( '<h2 class="entry-title"' . newspiper_schema_microdata( 'entry-title', 0 ) . '>' . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				newspiper_entry_header();
				do_action( 'newspiper_header_edit_link_hook' );
				?>
			</div><!-- .entry-meta -->
			<?php do_action( 'newspiper_social_posts_share_hook_top' );
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content" <?php newspiper_schema_microdata( 'entry-content' ); ?>>
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'newspiper' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newspiper' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php do_action( 'newspiper_social_posts_share_hook_bottom' ); ?>
		<div class="entry-meta">
			<?php newspiper_entry_footer(); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
