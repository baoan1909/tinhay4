<?php 
// Top Banner Hook
add_action('newspiper_promo_banner_hook', 'newspiper_promo_banner');
//Primary Menu hook
add_action( 'newspiper_primary_menu_hook', 'newspiper_primary_menu' );
//Top Menu hook
add_action( 'newspiper_top_menu_hook', 'newspiper_top_menu' );
// WC Fixed Menu Hook
if ( class_exists( 'Woocommerce' ) ) { 
    add_action( 'newspiper_fixed_menu_hook', 'newspiper_woocommerce_my_account', 10 );
    add_action( 'newspiper_fixed_menu_hook', 'newspiper_woocommerce_header_cart', 20 ); 
}
// Header image
add_action( 'newspiper_header_image_hook', 'newspiper_header_image' );
// Breadcrumbs
add_action( 'newspiper_breadcrumbs_hook', 'newspiper_breadcrumbs' );
// Social Share Above post content
add_action( 'newspiper_social_posts_share_hook_top', 'newspiper_social_posts_share' );
// Social Share Below post content
add_action( 'newspiper_social_posts_share_hook_bottom', 'newspiper_social_posts_share' );
//Full-width header search
add_action('newspiper_footer', 'newspiper_full_screen_search', 10);
add_action('newspiper_footer', 'newspiper_back_to_top', 20);
// Footer credits
add_action ('newspiper_theme_footer_credits_hook','newspiper_footer_default_theme_credits');
// After title edit post hook
add_action('newspiper_header_edit_link_hook', 'newspiper_edit_link');
// Pagination
add_action( 'newspiper_pagination_hook', 'newspiper_numeric_posts_nav' );