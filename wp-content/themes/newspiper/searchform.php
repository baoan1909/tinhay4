<?php
/**
 * Search Form
 *
 * @package Newspiper
 */

?>
<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for='s'>
        <span class="screen-reader-text"><?php esc_html_e( 'Search Here...', 'newspiper' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search Here...', 'newspiper' ); ?>" value="<?php echo esc_attr(the_search_query()); ?>" name="s">
    </label>
	<button type="submit" aria-label="<?php _e('search', 'newspiper')?>">
        <i class="search-icon">
            <?php echo wp_kses( newspiper_get_svg('search') , newspiper_get_kses_extended_ruleset() ); ?>
        </i>
    </button>
</form>