<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Newspiper
 */

get_header();
?>
<!--Site wrapper-->
<div class="site-wrapper">
	<main id="primary" class="site-main">
		<section class="error-404 not-found">
			<div class="wp-block-columns">
				<div class="wp-block-column">
					<header class="page-header">
						<h1 class="page-title"><?php esc_html_e( 'Page not Found', 'newspiper' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'The requested url was not found on this server. Maybe try one of the links below or a search?', 'newspiper' ); ?></p>

							<?php
							get_search_form();

							the_widget( 'WP_Widget_Recent_Posts' );
							?>

							<div class="widget widget_categories">
								<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'newspiper' ); ?></h2>
								<ul>
									<?php
									wp_list_categories(
										array(
											'orderby'    => 'count',
											'order'      => 'DESC',
											'show_count' => 1,
											'title_li'   => '',
											'number'     => 10,
										)
									);
									?>
								</ul>
							</div><!-- .widget -->

							<?php
							/* translators: %1$s: smiley */
							$newspiper_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'newspiper' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$newspiper_archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
							?>

					</div><!-- .page-content -->
				</div>
				<div class="wp-block-column">
					<img src="<?php echo esc_url(get_template_directory_uri( ) )?>/assets/img/404.png"/>
				</div>
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->
</div>

<?php get_footer();