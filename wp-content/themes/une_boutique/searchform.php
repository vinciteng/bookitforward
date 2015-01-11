<?php
/**
 * The template for displaying search forms in Une Boutique
 *
 * @package Une Boutique
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'une_boutique' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search&hellip;', 'placeholder', 'une_boutique' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'une_boutique' ); ?>">
	</label>
	<input style="font-family:capital_icofonts;" type="submit" class="search-submit" value="<?php echo esc_attr_x( '&#x26;', 'submit button', 'une_boutique' ); ?>">
</form>
