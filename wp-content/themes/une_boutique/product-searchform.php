<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'une_boutique' ); ?></label>
	<input type="search" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search products...', 'une_boutique' ); ?>" />
	<input style="font-family:capital_icofonts;" type="submit" id="searchsubmit" value="<?php echo esc_attr_x( '&#x26;', 'submit button', 'une_boutique' ); ?>" />
	<input type="hidden" name="post_type" value="product" />
</form>