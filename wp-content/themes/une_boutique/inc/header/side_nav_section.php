<aside class="side-panel hide-for-print">
<a href="javascript:void(0)" title="<?php _e( 'Start Here', 'une_boutique' ); ?>" class="sidepanel-title alignleft relative clearfix">
	<p class="no-margin">
		<i class="icon-color-home"></i>
		<span><?php _e( 'Start Here', 'une_boutique' ); ?></span><i class="ub-icon-arrow-right7"></i>
	</p>
</a>
<div class="side-panel-container fixed">
	<form role="search" method="get" id="product_searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<div class="row collapse">
			<div class="small-10 columns">
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search products...', 'une_boutique' ); ?>" />
			</div>
			<div class="small-2 columns">
				<span class="postfix"><i class="ub-icon-search2"></i></span>
			</div>
			<input type="hidden" name="post_type" value="product" />
		</div>
	</form> <!-- ./end of product search form -->
	<div class="base-links">
		<ul class="no-bullet no-margin">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="icon-color-home"></i><?php _e( 'Home', 'une_boutique' ); ?></a></li>

			<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>
			<li><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"><i class="icon-color-store"></i><?php _e( 'Store', 'une_boutique' ); ?></a></li>
			<?php } ?>
			
		</ul>
	</div>

	<?php if ( is_active_sidebar( 'start-here' ) ) { 
		dynamic_sidebar( 'start-here' );
	} ?>
	
</div>
</aside>