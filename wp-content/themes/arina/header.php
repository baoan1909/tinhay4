<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arina
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

<body <?php body_class(); ?>>
<?php 
if ( function_exists( "wp_body_open" ) ) {
wp_body_open();
}
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'arina' ); ?></a>
    <div class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <header id="masthead" class="site-header">
                        <div class="site-branding">
						    <?php
						    the_custom_logo();?>
                                
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							
							<?php bloginfo( 'name' ); ?>
							
							</a></h1>
								
						  
                        </div><!-- .site-branding -->
                        <div class="hamburger-menu cursor-pointer">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                        <nav id="site-navigation" class="main-navigation slide-in transition-5s ">
                            <div class="close-navigation position-absolute transition-5s cursor-pointer">
                                <span class="lnr lnr-cross"></span>
                            </div>
		                    <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_id' => 'primary-menu', 'container' => 'ul', 'menu_class' => 'primary-menu site-description' ) ); ?>
                        </nav><!-- #site-navigation -->
                    </header>
                </div>
            </div>
        </div>
    </div>
	<div id="content" class="site-content">
