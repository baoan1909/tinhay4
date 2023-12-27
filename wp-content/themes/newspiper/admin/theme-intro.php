<?php

/**
 * Define Constants
 */
if ( ! defined( 'NEWSPIPER_PAGE_BASENAME' ) ) {
	define( 'NEWSPIPER_PAGE_BASENAME', 'newspiper-doc' );
}
if ( ! defined( 'NEWSPIPER_THEME_DETAILS' ) ) {
	define( 'NEWSPIPER_THEME_DETAILS', 'https://nasiothemes.com/themes/newspiper/' );
}
if ( ! defined( 'NEWSPIPER_THEME_DEMO' ) ) {
	define( 'NEWSPIPER_THEME_DEMO', 'https://newspiper-demo.nasiothemes.com/' );
}
if ( ! defined( 'NEWSPIPER_THEME_OPTIONS' ) ) {
	define( 'NEWSPIPER_THEME_OPTIONS', esc_url ( admin_url( '/customize.php' ) ) );
}
if ( ! defined( 'NEWSPIPER_THEME_VIDEO_GUIDE' ) ) {
	define( 'NEWSPIPER_THEME_VIDEO_GUIDE', 'https://www.youtube.com/watch?v=-fwW9z3Pjbs' );
}
if ( ! defined( 'NEWSPIPER_THEME_FEATURES' ) ) {
	define( 'NEWSPIPER_THEME_FEATURES', 'https://nasiothemes.com/themes/newspiper/#features' );
}
if ( ! defined( 'NEWSPIPER_THEME_DOCUMENTATION_URL' ) ) {
	define( 'NEWSPIPER_THEME_DOCUMENTATION_URL', 'https://nasiothemes.com/newspiper-theme-documentation/' );
}
if ( ! defined( 'NEWSPIPER_THEME_SUPPORT_FORUM_URL' ) ) {
	define( 'NEWSPIPER_THEME_SUPPORT_FORUM_URL', 'https://wordpress.org/support/theme/newspiper/' );
}
if ( ! defined( 'NEWSPIPER_THEME_REVIEW_URL' ) ) {
	define( 'NEWSPIPER_THEME_REVIEW_URL', 'https://wordpress.org/support/theme/newspiper/reviews/#new-post' );
}
if ( ! defined( 'NEWSPIPER_THEME_UPGRADE_URL' ) ) {
	define( 'NEWSPIPER_THEME_UPGRADE_URL', 'https://nasiothemes.com/themes/newspiper/' );
}
if ( ! defined( 'NEWSPIPER_THEME_DEMO_IMPORT_URL' ) ) {
	define( 'NEWSPIPER_THEME_DEMO_IMPORT_URL', false );
}
/**
 * Specify Hooks/Filters
 */
add_action( 'admin_menu', 'newspiper_add_menu' );
/**
 * The admin menu pages
 */
function newspiper_add_menu() {
	add_theme_page(
		__( 'Newspiper Theme', 'newspiper' ),
		__( 'Newspiper Theme', 'newspiper' ),
		'edit_theme_options',
		NEWSPIPER_PAGE_BASENAME,
		'newspiper_settings_page_doc'
	);
}

/*
 * Theme Documentation Page HTML
 *
 * @return echoes output
 */
function newspiper_settings_page_doc() {
	// get the settings sections array
	$theme_data = wp_get_theme();
	?>
	
	<div class="nasiothemes-wrapper">
		<div class="nasiothemes-header">
			<div id="nasiothemes-theme-info">
				<div class="nasiothemes-message-image">
					<img class="nasiothemes-screenshot" src="
					<?php echo esc_url( get_template_directory_uri() ); ?>/admin/img/theme-logo.jpg" alt="
					<?php esc_attr_e( 'Newspiper Theme Screenshot', 'newspiper' ); ?>" />
				</div><!-- ws fix
				--><p>
						<?php
						echo sprintf(
								/* translators: Theme name and version */
							__( '<span class="theme-name">%1$s Theme</span> <span class="theme-version">(version %2$s)</span>', 'newspiper' ),
							esc_html( $theme_data->name ),
							esc_html( $theme_data->version )
						);
						?>
					</p>
					<p class="theme-buttons">
						<a class="button button-primary" href="<?php echo esc_url( NEWSPIPER_THEME_DETAILS ); ?>" rel="noopener" target="_blank">
							<?php esc_html_e( 'Theme Homepage', 'newspiper' ); ?>
						</a>
						<a class="button button-primary" href="<?php echo esc_url( NEWSPIPER_THEME_OPTIONS ); ?>" rel="noopener" target="_blank">
							<?php esc_html_e( 'Theme Options', 'newspiper' ); ?>
						</a>
						<a class="button button-primary nasiothemes-button nasiothemes-button-youtube" href="
							<?php echo esc_url( NEWSPIPER_THEME_VIDEO_GUIDE ); ?>" rel="noopener" target="_blank"><span class="dashicons dashicons-youtube"></span> 
							<?php esc_html_e( 'Theme Video Tutorial', 'newspiper' ); ?>
						</a>
					</p>
			</div><!-- .nasiothemes-header -->
		
		<div class="nasiothemes-documentation">

			<ul class="nasiothemes-doc-columns clearfix">
				<li class="nasiothemes-doc-column nasiothemes-doc-column-1">
					<div class="nasiothemes-doc-column-wrapper">
						<div class="doc-section">
							<h3 class="column-title"><span class="nasiothemes-icon dashicons dashicons-editor-help"></span><span class="nasiothemes-title-text">
							<?php
							esc_html_e( 'Documentation and Support', 'newspiper' );
							?>
							</span></h3>
							<div class="nasiothemes-doc-column-text-wrapper">
								<p>
								<?php echo sprintf(
									/* translators: Theme name and link to WordPress.org Support forum for the theme */
									__( 'Please check the theme documentation before using the theme. Support for %1$s Theme is provided in the official WordPress.org community support forum. ', 'newspiper' ),
									esc_html( $theme_data->name )
								);?>
								</p>
								<p class="doc-buttons">
									<a class="button button-primary" href="<?php echo esc_url( NEWSPIPER_THEME_DOCUMENTATION_URL );?>" rel="noopener" target="_blank">
									<?php esc_html_e( 'View Newspiper Documentation', 'newspiper' ); ?>
									</a>
								<?php if ( NEWSPIPER_THEME_SUPPORT_FORUM_URL ) { ?>
									 <a class="button button-secondary" href="<?php echo esc_url( NEWSPIPER_THEME_SUPPORT_FORUM_URL ); ?>" rel="noopener" target="_blank">
									<?php esc_html_e( 'Go to Newspiper Support Forum', 'newspiper' );
									?>
									</a>
									<?php
								} ?>
								</p>
							</div><!-- .nasiothemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
						<div class="doc-section">
							<h3 class="column-title"><span class="nasiothemes-icon dashicons dashicons-editor-help"></span><span class="nasiothemes-title-text">
								<?php esc_html_e( 'FAQ', 'newspiper' ); ?></span>
							</h3>
							<div class="nasiothemes-doc-column-text-wrapper">
								<strong><?php esc_html_e( '1. Where are the theme options?', 'newspiper' ); ?></strong>
								<p><i><?php esc_html_e( 'Please navigate to Appearance => Customize and customize the theme to taste.', 'newspiper' ); ?></i></p>
								<br>
								<strong><?php esc_html_e( '2. Can I add demo content for an easier start with the theme?', 'newspiper' ); ?></strong>
								<p><i><?php esc_html_e( 'Yes, in the pro version of the theme, there is a demo import button that does all the heavy lifting for you. If you are using the free version, you can take advantage of the block patterns that are included in this theme.', 'newspiper' ); ?></i></p>
								<br>
								<strong><?php esc_html_e( '3. Where are the custom block patterns?', 'newspiper' ); ?></strong>
								<p><i><?php esc_html_e( 'In the WordPress admin, create or edit a page, then click on the plus icon in the top left corner of the Gutenberg editor. From there, navigate to the "Patterns" tab and select "Newspiper" from the pattern dropdown.', 'newspiper' ); ?></i></p>
								<br>
								<strong><?php esc_html_e( '4. Can I make a website that looks exactly like the theme demo?', 'newspiper' ); ?></strong>
								<p><i><?php esc_html_e( 'Absolutely! all you need to do is upgrade to Newspiper PRO and run the one-click demo import.', 'newspiper' ); ?></i></p>
								<br>
								<strong><?php esc_html_e( '5. I have already purchased the premium version. How do I install and activate it?', 'newspiper' ); ?></strong>
								<p><i><?php esc_html_e( 'To install the Newspiper Pro theme, go to Appearance => Themes => Add new and upload the zip file that you have received upon theme purchase. To activate it, hover over Newspiper Pro theme from the theme list on the same page and click "Activate". Finally, you will be asked to enter a license key that you have received by email.', 'newspiper' ); ?></i></p>
								<br>
							</div><!-- .nasiothemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
						<div class="doc-section">
							<h3 class="column-title"><span class="nasiothemes-icon dashicons dashicons-youtube"></span><span class="nasiothemes-title-text">
							    <?php esc_html_e( 'Theme Video Tutorial', 'newspiper' ); ?></span>
                            </h3>
							<div class="nasiothemes-doc-column-text-wrapper">
								<p><strong><?php esc_html_e('Click the image below to open the video guide in a new browser tab.','newspiper'); ?></strong></p>
								<p><a href="<?php echo esc_url(NEWSPIPER_THEME_VIDEO_GUIDE); ?>" rel="noopener" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/admin/img/video-preview.jpg" class="video-preview" alt="<?php esc_attr_e('Newspiper Theme Video Tutorial','newspiper'); ?>" /></a></p>
							</div><!-- .nasiothemes-doc-column-text-wrapper-->

						</div><!-- .doc-section -->
						
                        <div class="doc-section">
							<h3 class="column-title"><span class="nasiothemes-icon dashicons dashicons-awards"></span><span class="nasiothemes-title-text">
							<?php esc_html_e( 'Leave a Review', 'newspiper' );?>
							</span></h3>
							<div class="nasiothemes-doc-column-text-wrapper">
								<p><?php esc_html_e( 'If you enjoy using Newspiper Theme, please leave a review for it on WordPress.org. It encourages us to continue providing updates and support for it.', 'newspiper' );?></p>
								<p class="doc-buttons">
                                    <a class="button button-primary" href="<?php echo esc_url( NEWSPIPER_THEME_REVIEW_URL );?>" rel="noopener" target="_blank">
                                        <?php esc_html_e( 'Write a Review for Newspiper', 'newspiper' );?>
                                    </a>
                                </p>
							</div><!-- .nasiothemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
					</div><!-- .nasiothemes-doc-column-wrapper -->
				</li><!-- .nasiothemes-doc-column --><li class="nasiothemes-doc-column nasiothemes-doc-column-2">
				<div class="nasiothemes-doc-column-wrapper">
						<?php

						if ( NEWSPIPER_THEME_UPGRADE_URL ) {
							?>
						<div class="doc-section">
							<h3 class="column-title"><span class="nasiothemes-icon dashicons dashicons-cart"></span><span class="nasiothemes-title-text">
							<?php esc_html_e( 'Upgrade to Newspiper PRO', 'newspiper' );
							?>
							</span>
                            </h3>
							<div class="nasiothemes-doc-column-text-wrapper">
								<p>
                                    <?php echo sprintf(
                                        /* translators: Theme name and link to WordPress.org Support forum for the theme */
                                        __( 'If you like the free version of %1$s Theme, you will love the PRO version!', 'newspiper' ),
                                        esc_html( $theme_data->name )
                                    );
                                    ?>
								</p>
								<p>
								<?php esc_html_e( 'You will be able to create an even more unique website using the additional functionalities and customization options available in the pro version.', 'newspiper' );
								?>
								<br>
								<p class="doc-buttons"><a class="button button-primary" href="
								<?php echo esc_url( NEWSPIPER_THEME_UPGRADE_URL );
								?>
								" rel="noopener" target="_blank">
								<?php esc_html_e( 'Upgrade to Newspiper PRO', 'newspiper' );
								?>
								</a>
								<?php

								if ( NEWSPIPER_THEME_FEATURES ) {
									?>
									<a class="button button-primary nasiothemes-button nasiothemes-button-youtube" href="
									<?php echo esc_url( NEWSPIPER_THEME_FEATURES );
									?>
									" rel="noopener" target="_blank">
									<?php esc_html_e( 'View Full List of Features', 'newspiper' );
									?>
									</a>
									<?php
								}

								?>
								</p>

								<table class="theme-comparison-table">
									<tr>
										<th class="table-feature-title">
											<?php esc_html_e( 'Feature', 'newspiper' ); ?>
										</th>
										<th class="table-lite-value">
											<?php esc_html_e( 'Newspiper', 'newspiper' ); ?>
										</th>
										<th class="table-pro-value">
											<?php esc_html_e( 'Newspiper PRO', 'newspiper' ); ?>
										</th>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
											<?php esc_html_e( 'Import demo content with predefined posts, pages and images for an easier start with the theme.', 'newspiper' ); ?></span></div>
												<?php esc_html_e( 'One Click Demo Import', 'newspiper' );?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
                                            <?php esc_html_e( 'Seamless integration with Mailchimp to grow and foster a thriving community of subscribers', 'newspiper' );
                                            ?>
                                            </span></div>
                                            <?php esc_html_e( 'Mailchimp integration', 'newspiper' );
                                            ?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
                                            <?php esc_html_e( 'Seamless integration with Paid Memberships Pro plugin to put specific content under paywall or set a limit to monthly views for non-registered or non-paying audience.', 'newspiper' );
                                            ?>
                                            </span></div>
                                            <?php esc_html_e( 'Paywall integration', 'newspiper' );
                                            ?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
										<?php esc_html_e( 'Show a beautiful heart icon on top of each post that displays the number of viewers who liked the post.', 'newspiper' );
										?>
										</span></div>
										<?php esc_html_e( 'Show post likes', 'newspiper' );
										?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
										<?php esc_html_e( 'Display the number of post views for each post.', 'newspiper' );
										?>
										</span></div>
										<?php esc_html_e( 'Show post views', 'newspiper' );
										?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
										<?php esc_html_e( 'Remove theme author credits and add your own copyright notice there. Customize the colors of the footer elements directly from the theme customizer. No coding skills needed!', 'newspiper' );
										?>
										</span></div>
										<?php esc_html_e( 'Remove Footer Credits', 'newspiper' );
										?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
											<?php esc_html_e( 'Filter posts in the "You might have missed" section" by specific criteria.', 'newspiper' ); ?>
											</span></div>
											<?php esc_html_e( 'Custom "You might have missed" section.', 'newspiper' ); ?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
											<?php esc_html_e( 'Make header menu items appear on top part of the featured image. Choose per page.', 'newspiper' ); ?>
											</span></div>
											<?php esc_html_e( 'Transparent Header', 'newspiper' ); ?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><span class="nasio-tooltiptext">
                                            <?php esc_html_e( 'Impress your visitors by adding an artistic flavor to your website. Convert your cursor into a beautiful transparent or filled circle, similar to sites featured in Awwwards.', 'newspiper' );
                                            ?>
                                            </span></div>
                                            <?php esc_html_e( 'Custom cursor', 'newspiper' );
                                            ?>
										</td>
										<td><span class="dashicons dashicons-minus"></span></td>
										<td><span class="dashicons dashicons-yes-alt"></span></td>
									</tr>
									<tr>
										<td>
										<?php esc_html_e( 'Support', 'newspiper' );
										?>
										</td>
										<td><div class="nasio-tooltip">
											<span class="dashicons dashicons-editor-help"></span>
                                            <?php esc_html_e( 'Nonpriority', 'newspiper' );
                                            ?>
                                            <span class="nasio-tooltiptext">
                                            <?php esc_html_e( 'Support is provided only in the WordPress.org community forums.', 'newspiper' );
                                            ?>
                                            </span></div>
                                        </td>
										<td><div class="nasio-tooltip"><span class="dashicons dashicons-editor-help"></span><strong>
                                            <?php esc_html_e( 'Priority', 'newspiper' );
                                            ?>
                                            </strong><span class="nasio-tooltiptext">
                                            <?php esc_html_e( 'Quick and friendly support is available via email', 'newspiper' );
                                            ?>
                                            </span></div>
                                        </td>
									</tr>
									<tr>
										<td colspan="3" style="text-align: center;"><a class="button button-primary" href="
										<?php echo esc_url( NEWSPIPER_THEME_UPGRADE_URL );
										?>
											" rel="noopener" target="_blank">
											<?php esc_html_e( 'Upgrade to Newspiper PRO', 'newspiper' );
											?>
											</a>
										</td>
									</tr>
								</table>

							</div><!-- .nasiothemes-doc-column-text-wrapper-->
						</div><!-- .doc-section -->
							<?php
						}

						?>
					</div><!-- .nasiothemes-doc-column-wrapper -->
				</li><!-- .nasiothemes-doc-column -->
			</ul><!-- .nasiothemes-doc-columns -->

		</div><!-- .nasiothemes-documentation -->

	</div><!-- .nasiothemes-wrapper -->

	<?php
}
