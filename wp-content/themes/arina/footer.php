<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arina
 */

?>
	</div><!-- #content -->
<footer class="footer">
	<div class="container">
	<?php if ( is_active_sidebar( 'footer-sidebar' ) ): ?>
	<div class="widgets-section">
		<div class="row">
		   <?php dynamic_sidebar( 'footer-sidebar' );?>   
		</div>
	</div>
	<?php endif; ?>
	</div>
</footer>
	
	<div class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <footer id="colophon" class="site-footer">
                        <div class="site-info" id="copyright-txt">
						    <?php
						        if(get_theme_mod('copyright_txt')){
						            echo esc_html(get_theme_mod('copyright_txt'));
                                }
						    ?>							
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scroll-top">
    <span class="lnr lnr-chevron-up"></span>
</div>

<?php wp_footer(); ?>

</body>
</html>
