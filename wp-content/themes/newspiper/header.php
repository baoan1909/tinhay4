<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newspiper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); 
newspiper_schema_microdata( 'body' );
?>>
<?php do_action( 'wp_body_open' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'newspiper' ); ?></a>
	<header id="masthead" class="site-header" role="banner" <?php newspiper_schema_microdata( 'header' ); ?>>
	<?php
	/**
	 * newspiper_promo_banner_hook
	 * 
	 * @since 1.0.0
	 * @hooked newspiper_promo_banner
	*/
	do_action('newspiper_promo_banner_hook');
	if ( newspiper_has_secondary_menu() ) : ?>
		<nav id="top-navigation" class="top-menu site-menu" aria-label=<?php _e('Secondary navigation', 'newspiper')?>>
			<div class="header-content-wrapper">
				<?php
				/**
				 * newspiper_top menu_hook
				 *
				 * @since 1.0.0
				 * @hooked newspiper_top_menu
				*/
				do_action( 'newspiper_top_menu_hook' ); ?>
			</div>
		</nav>
		<?php endif; ?>
		<div class="main-navigation-container">
			<div class="header-content-wrapper">
				<div class="site-branding">
					<?php the_custom_logo();
					newspiper_dark_mode_logo();
					if ( display_header_text() == true ) : ?>
					<div class="site-meta">
						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php newspiper_schema_microdata( 'site-title' ); ?> rel="home"><?php bloginfo( 'name' ); ?></a></div>
						<?php if ( get_bloginfo( 'description', 'display' ) || is_customize_preview() ) :
							?>
							<p class="site-description" <?php newspiper_schema_microdata( 'site-description' ); ?>><?php echo get_bloginfo( 'description', 'display') // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="main-navigation" class="main-navigation site-menu" aria-label="<?php _e('Main navigation', 'newspiper')?>" <?php newspiper_schema_microdata( 'menu' ); ?>>
					<button class="menu-toggle" data-toggle="collapse" aria-controls="site-menu" aria-expanded="false" aria-label="<?php _e('Toggle Navigation', 'newspiper')?>">
						<span class="menu-toggle-icon">
							<input class="burger-check" id="burger-check" type="checkbox"><label for="burger-check" class="burger"></label>
						</span>
					</button>
					<?php
					/**
					 * newspiper_primary_menu_hook
					 * 
					 * @since 1.0.0
					 * @hooked newspiper_primary_menu
					 */
					do_action( 'newspiper_primary_menu_hook' ); ?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	<?php
	/**
	 * newspiper_header_image_hook
	 * 
	 * @since 1.1.2
	 * @hooked newspiper_header_image
	 */
	do_action( 'newspiper_header_image_hook' ); ?>
	</header><!-- #masthead -->
	<?php if ( class_exists( 'Woocommerce' ) && !newspiper_topmenu_has_wc_items() ) : /*Woocommerce fixed menu */ ?>
	<div id="scroll-cart" class="topcorner">
		<ul>
			<?php
				/**
				 * newspiper_fixed_menu_hook
				 * 
				 * @since 1.0.0
				 * @hooked newspiper_woocommerce_my_account
				 * @hooked newspiper_woocommerce_header_cart
				 */
				do_action( 'newspiper_fixed_menu_hook' ); ?>
		</ul>
	</div>
	<?php endif; ?>