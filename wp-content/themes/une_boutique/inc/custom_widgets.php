<?php
/*-----------------------------------------------------------------------------------*/
/*   Ajaxifies Custom Cart Widget
/*-----------------------------------------------------------------------------------*/

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

    add_filter('add_to_cart_fragments', 'une_boutique_header_add_to_cart_fragment');

    function une_boutique_header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <div class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
  <?php

    $fragments['.cart-count' ] = ob_get_clean();

    return $fragments;
    }
}

/*-------------------------------------------------------------------------------------------*/
/*    adds dropdown cart widget if woocommerce is enabled
/*-------------------------------------------------------------------------------------------*/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
/**
 * Example Widget Class
 */
class ub_dropdown_cart_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function ub_dropdown_cart_widget() {
        parent::WP_Widget(false, $name = 'Capital DropDown Cart');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
			<?php echo $before_widget; ?>
				<?php global $woocommerce; 
				if ( sizeof( $woocommerce->cart->get_cart() ) == 0 ) { $cart_class = "empty"; } else $cart_class =""; ?>
				<div class="woo-mini-cart-container <?php echo $cart_class; ?>">
				<div class="cart-count"><?php echo $woocommerce->cart->cart_contents_count; ?></div>
				<a <?php if ($title){echo 'title="'.$title.'"';}else{?>title="<?php _e('Your Cart', 'une_boutique');}?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>">
				<i class="ub-icon-bag-short"></i></a>
				<!-- Insert cart widget placeholder - code in woocommerce.js will update this on page load -->

				<div class="cart_content_wrapper">
				<div class="widget_shopping_cart_content"></div>
				</div>
				</div>
			<?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title = isset($instance['title']) ? $instance['title'] : "";
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
		<input class="widefat" placeholder="<?php _e( 'Your Cart', 'une_boutique' ) ?>" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <?php 
    }

} // end class ub_dropdown_cart_widget
add_action('widgets_init', create_function('', 'return register_widget("ub_dropdown_cart_widget");'));

} // end of if ( in_array( 'woocommerce/woocommerce.php...


/*-------------------------------------------------------------------------------------------*/
/*    adds woocommerce customer menu as a widget to your widgets list
/*-------------------------------------------------------------------------------------------*/

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
/**
 * Example Widget Class
 */
class ub_custome_user_menu extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function ub_custome_user_menu() {
        parent::WP_Widget(false, $name = 'Capital WC User Menu');   
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) { 
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
            <?php echo $before_widget; ?>
                <div class="user-area-container">
                    <?php
                    if ( is_user_logged_in() ) { // if the use is logged in

                    $user = wp_get_current_user(); ?>
                    <a class="user_name" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><span aria-hidden="true" class="ub-icon-user"></span>
                        <?php echo _e('Hello ', 'une_boutique').'<span>'.$user->display_name.'</span>'; ?> <i class="ub-icon-arrow-down6"></i>
                    </a>

                    <div class="user-login-signup-dropdown logedin">
                        <ul class="no-bullet unstyled">
                        <li class="clearfix">
                        <p class="alignleft gravatar"><?php echo get_avatar( $user->ID, 36 ); ?></p>
                        <p><?php _e('Thanks for signing in.<br> Review your account:','une_boutique'); ?></p></li>
                            <li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><?php _e('Your Account','une_boutique'); ?></a></li>
                            <li><a href="<?php echo wc_customer_edit_account_url(); ?>"><?php _e('Edit Account','une_boutique'); ?></a></li>
                            <li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>order-track"><?php _e('Track Your Orders','une_boutique'); ?></a></li>
                            <li class="not-user">
                            <?php _e('Not','une_boutique'); ?> <?php echo $user->display_name; ?>? <a href="<?php echo wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) );?>"><?php _e('Sign Out','une_boutique'); ?></a>
                            </li>
                        </ul>
                    </div>

                    <?php } else { //if the user is NOT logged in ?>

                    <div class="user-login-signup">
                    <a class="user_account" href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>"><span aria-hidden="true" class="ub-icon-user"></span>
                        <?php if ( $title ) { echo '<span class="user_menu_widget_title">'. $title .'</span>'; } else {echo '<span class="user_menu_widget_title">' . __( 'Your Account', 'une_boutique' ) . '</span>' ; } ?>
                        <i class="ub-icon-arrow-down6"></i>
                    </a>
                    <div class="user-login-signup-dropdown register">
                        <p class="buttons button-group round even-2 secondary">
                            <a href="#"  data-reveal-id="login_modal" class="button small secondary"><?php _e('Login','une_boutique'); ?></a><span class="or">or</span>
                            <a href="#" data-reveal-id="register_modal" class="button small secondary"><?php _e('Sign up','une_boutique'); ?></a>
                        </p>
                        <ul class="no-bullet unstyled">
                            <li><a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ); ?>order-track"><?php _e('Track Your Orders','une_boutique'); ?></a></li>
                            <li><a href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e('Lost Password?','une_boutique'); ?></a></li>
                        </ul>
                    </div>
                    </div> <!-- end of user-login-signup -->

                    <?php   } // end of if user is not logged in ?>
                    </div> <!-- end of user-area-container -->
            <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {     
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {  
 
        $title = isset($instance['title']) ? $instance['title'] : "";
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
        <input class="widefat" placeholder="<?php _e( 'Your Account', 'une_boutique' ) ?>" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <?php 
    }

} // end class ub_custome_user_menu
add_action('widgets_init', create_function('', 'return register_widget("ub_custome_user_menu");'));

} // end of if ( in_array( 'woocommerce/woocommerce.php...

/*-------------------------------------------------------------------------------------------*/
/*    adds the wishlist dropdown widget
/*-------------------------------------------------------------------------------------------*/

if ( in_array( 'yith-woocommerce-wishlist/init.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
/**
 * Example Widget Class
 */
class ub_wishlist_dropdown_widget extends WP_Widget {
    /** constructor -- name this the same as the class above */
    function ub_wishlist_dropdown_widget() {
        parent::WP_Widget(false, $name = 'Capital Wishlist DropDown');  
    }
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) { 
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?> 
        <?php echo $before_widget; ?>
        <div class="wishlist-dropdown-container">
            <!-- <script>//jQuery(document).ready(function($){"use strict";var wishlist_count=$('ul.wishlist_list > li').length;$("#counter").html(wishlist_count);});</script>
            <span id="counter"></span> -->
            <?php global $yith_wcwl; $redirect_url = $yith_wcwl->get_wishlist_url(); ?>
            <a href="<?php echo $redirect_url; ?>">
            <span class="ub-icon-star2"></span>
            <?php if ( $title ) {
            echo '<span class="cart_widget_title">'. $title .'</span>'; } else {echo '<span class="cart_widget_title">' . __( 'Wish List', 'une_boutique' ) . '</span>' ; } ?>
            <i class="ub-icon-arrow-down6"></i></a>
            <?php global $wpdb, $yith_wcwl, $woocommerce;
            if( isset( $_GET['user_id'] ) && !empty( $_GET['user_id'] ) ) {
                $user_id = $_GET['user_id'];
            } elseif( is_user_logged_in() ) {
                $user_id = get_current_user_id();
            }
        $current_page = 1;
        $limit_sql = '';

    if( is_user_logged_in() )
        { $wishlist = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM `" . YITH_WCWL_TABLE . "` WHERE `user_id` = %s" . $limit_sql, $user_id ), ARRAY_A ); }
    elseif( yith_usecookies() )
        { $wishlist = yith_getcookie( 'yith_wcwl_products' ); }
    else
        { $wishlist = isset( $_SESSION['yith_wcwl_products'] ) ? $_SESSION['yith_wcwl_products'] : array(); }
?>
<form id="yith-wcwl-form" action="<?php echo esc_url( $yith_wcwl->get_wishlist_url() ) ?>" method="post">
    <ul class="no-bullet wishlist_list">
        <?php            
        if( count( $wishlist ) > 0 ) :
            foreach( $wishlist as $values ) :   
                if( !is_user_logged_in() ) {
                    if( isset( $values['add-to-wishlist'] ) && is_numeric( $values['add-to-wishlist'] ) ) {
                        $values['prod_id'] = $values['add-to-wishlist'];
                        $values['ID'] = $values['add-to-wishlist'];
                    } else {
                        $values['prod_id'] = $values['product_id'];
                        $values['ID'] = $values['product_id'];
                    }
                }
                $product_obj = get_product( $values['prod_id'] );
                
                if( $product_obj !== false && $product_obj->exists() ) : ?>
                <li id="yith-wcwl-row-<?php echo $values['ID'] ?>" class="clearfix">
                    <a href="javascript:void(0)" onclick="remove_item_from_wishlist( '<?php echo esc_url( $yith_wcwl->get_remove_url( $values['ID'] ) )?>', 'yith-wcwl-row-<?php echo $values['ID'] ?>');"  class="product-remove alignright" title="<?php _e( 'Remove this product', 'yit' ) ?>"><span class="ub-icon-trashcan"></span></a>
                    <div class="alignleft product-thumbnail">
                        <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $values['prod_id'] ) ) ) ?>">
                            <?php echo $product_obj->get_image() ?>
                        </a>
                    </div>
                    <div class="product-name alignleft">
                        <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $values['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product_obj->get_title(), $product_obj ) ?></a>
                    </div>
                    <?php if( get_option( 'yith_wcwl_price_show' ) == 'yes' ) : ?>
                    <div class="product-price">
                        <?php
                        if( get_option( 'woocommerce_display_cart_prices_excluding_tax' ) == 'yes' )
                            { echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price_excluding_tax() ), $values, '' ); }
                        else
                            { echo apply_filters( 'woocommerce_cart_item_price_html', woocommerce_price( $product_obj->get_price() ), $values, '' ); }    
                        ?>
                    </div>
                    <?php endif ?>
                </li>
                <?php endif; endforeach; else: ?>
                <div class="wishlist-empty"><?php _e( 'No products were added to the wishlist', 'une_boutique' ) ?></div>  
        <?php endif; ?>
    </ul>
</form>
</div>
        <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {     
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

        $title = isset($instance['title']) ? $instance['title'] : "";
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
        <input class="widefat" placeholder="<?php _e( 'Wish List', 'une_boutique' ) ?>" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <?php 
    }

} // end class ub_wishlist_dropdown_widget
add_action('widgets_init', create_function('', 'return register_widget("ub_wishlist_dropdown_widget");'));

} // end of if ( in_array( 'yith-woocommerce-wishlist/init.php'...

/*-------------------------------------------------------------------------------------------*/
/*   language chooser widget
/*   based on No Function Language Widget (http://wordpress.org/extend/plugins/no-function-language-widget)
/*-------------------------------------------------------------------------------------------*/

function contains($substring, $string) {
    $pos = strpos($string, $substring);
    
    if($pos === false) {
        // string needle NOT found in haystack
        return false;}
    else {
        // string needle found in haystack
        return true;
    }
}
 
class ub_no_function_language_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'ub_no_function_language_widget', // Base ID
            'NFWL', // Name
            array( 'description' => __( 'A No Function Language Changer', 'une_boutique' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', __($instance['title'] ));
        $all_languages = $instance['nflw_languages'];
        $nflw_languages = explode(",", $all_languages);
        $langbase= $instance['nflw_language_base'];
        

        echo $before_widget;
        if ( ! empty( $title ) )
            echo $before_title . $title . $after_title;
            
            $lansum=count($nflw_languages);
            $i=0;
            if ($langbase=="?lang=")
            {
            
        while ($i<$lansum ){
        ?><a href="?lang=<?php echo $nflw_languages[$i]; ?>"> <img src="<?php echo ''.get_template_directory_uri().'/images/flags/'.$nflw_languages[$i].'.png'; ?>"></a> <?php
        $i++;}
        }
        else {

            while ($i<$lansum ){

            $this_wp = ''.get_bloginfo('wpurl').'';
            $this_url ="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $this_post = str_replace($this_wp ,"", $this_url);
            
            
    
        //checkblock 1.5
            $j=0;
            while($j<$lansum) {
            $this_url_lang=''.$this_wp.'/'.$nflw_languages[$j].'/';
            
            if ($this_url_lang==$this_url)
            {$language_set=true;}
            else {$language_set=false;}
            
            $current_language = "/".$nflw_languages[$j]."/";
            if (contains($current_language, $this_url))
            {$language_set=true;}
            else {$language_set=false;}
            
            if($language_set==true)
            {$choozen_language_URL=="";
            $this_post = str_replace($this_url_lang ,"", $this_url);
            //$this_post = str_replace($current_language ,"", $this_post);
            }
            else {}
            $j++;
            }
            

            if($nflw_languages[$i]==$nflw_languages[0])
            {
            $choozen_language_URL=''.site_url().'/';
            //default language hack
            }
            else
            {
            $choozen_language_URL=''.site_url().'/'.$nflw_languages[$i].'';//.$this_post;
            //Artikel nicht in Landessprache Hack
            }
            $language_set=false;


        ?><a href="<?php echo $choozen_language_URL ?>"> <img src="<?php echo ''.get_template_directory_uri().'/images/flags/'.$nflw_languages[$i].'.png'; ?>"></a> <?php
        $i++;}
        
        }
        //echo ' -> your url '.$this_post.'';
        echo $after_widget;
    }


    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['nflw_languages'] = strip_tags( $new_instance['nflw_languages'] );
        $instance['nflw_language_base'] = strip_tags( $new_instance['nflw_language_base'] );
        return $instance;
    }


    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] )) {
            $title = __($instance[ 'title' ]);
            $nflw_languages = $instance[ 'nflw_languages' ];
            $nflw_language_base = $instance[ 'nflw_language_base' ];
        }
        else {
            $title = __( 'New title', 'une_boutique' );
            $nflw_languages = __( 'en,de,tr,cz,nl,fi', 'une_boutique' );
            $nflw_language_base = __( '/', 'une_boutique' );
        }
        ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'nflw_languages' ); ?>">nfwl Languages</label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'nflw_languages' ); ?>" name="<?php echo $this->get_field_name( 'nflw_languages' ); ?>" type="text" value="<?php echo esc_attr( $nflw_languages ); ?>" />
        </p>
        <p>
        <label for="<?php echo $this->get_field_id( 'nflw_language_base' ); ?>">nfwl Language base</label> <br>
        <input  id="<?php echo $this->get_field_id( 'nflw_language_base' ); ?>" name="<?php echo $this->get_field_name( 'nflw_language_base' ); ?>" type="radio" value="/" <?php if($nflw_language_base=="/"){echo ' checked';}?>/> /de <br>
        <input id="<?php echo $this->get_field_id( 'nflw_language_base' ); ?>" name="<?php echo $this->get_field_name( 'nflw_language_base' ); ?>" type="radio" value="?lang=" <?php if($nflw_language_base=="?lang="){echo ' checked';}?>/> ?lang=de
        </p>
        <?php 
    }

} // class ub_no_function_language_widget
add_action( 'widgets_init', create_function( '', 'register_widget( "ub_no_function_language_widget" );' ) );


/*-------------------------------------------------------------------------------------------*/
/*  Capital Recent Posts Widget
/*-------------------------------------------------------------------------------------------*/

add_action( 'widgets_init', create_function( '', 'register_widget( "Capital_Widget_Recent_Posts" );' ) );
class Capital_Widget_Recent_Posts extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'capital_widget_recent_entries', 'description' => __( "Your site&#8217;s most recent Posts with thumnail image.") );
        parent::__construct('recent-posts', __('Capital Recent Posts'), $widget_ops);
        $this->alt_option_name = 'capital_widget_recent_entries';

        add_action( 'save_post', array($this, 'flush_widget_cache') );
        add_action( 'deleted_post', array($this, 'flush_widget_cache') );
        add_action( 'switch_theme', array($this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo $cache[ $args['widget_id'] ];
            return;
        }

        ob_start();
        extract($args);

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 10;
        if ( ! $number )
            $number = 10;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if ($r->have_posts()) :
?>
        <?php echo $before_widget; ?>
        <?php if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
        <?php while ( $r->have_posts() ) : $r->the_post(); ?>
            <li>
                <a href="<?php the_permalink(); ?>">

                    <?php 
                    if ( has_post_thumbnail() ) {
                        global $post; echo get_the_post_thumbnail($post->ID, 'thumbnail');
                    } else { ?>
                        <img src="<?php echo ''.get_template_directory_uri().'/images/post-thumb-small.png'; ?>">
                    <?php }
                    get_the_title() ? the_title() : the_ID();
                    ?>

                </a>
            <?php if ( $show_date ) : ?>
                <div class="post-date"><?php echo get_the_date(); ?></div>
            <?php endif; ?>
            </li>
        <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
<?php
        // Reset the global $the_post as this query will have stomped on it
        wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
        <input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
        <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
    }
}

/*-------------------------------------------------------------------------------------------*/
/*  Capital Recent Posts Widget
/*-------------------------------------------------------------------------------------------*/

// the output function

function get_categories_list( $limit = '10', $orderby = 'none', $order = 'asc' ) {
    $args = array(
        'limit'          => (int) $limit,
        'orderby'        => $orderby,
        'order'          => $order,
        'no_found_rows'  => true,
    );

    $categories_list = '<div id="list_categories">';

    $catTerms = get_terms('product_cat', array( 'parent' => '', 'hide_empty' => 1, 'number' => '', 'order' => 'asc', 'orderby' => 'name',));
    $categories_list .= '<ul class="no-bullet no-margin">';

    foreach($catTerms as $catTerm) :

    $thumbnail_id = get_woocommerce_term_meta( $catTerm->term_id, 'thumbnail_id', true );
    $image = wp_get_attachment_url( $thumbnail_id );

    $categories_list .= '<li>';
        $categories_list .= '<a href="' . get_term_link( $catTerm->slug, 'product_cat' ) . '">';
    
    if ( $image ) {
        $categories_list .= wp_get_attachment_image( $thumbnail_id, 'thumbnail' );
    }

    $categories_list .= $catTerm->name;

    $categories_list .= '</a>';
    $categories_list .= '</li>';

    endforeach;

    $categories_list .= '</ul>';
    $categories_list .= '</div>';

    // end of outpu

    return $categories_list;
}

class Capital_Product_Categories_List extends WP_Widget {
  
    /** constructor -- name this the same as the class above */
    function __construct() {
        parent::__construct(
            'Capital_Product_Categories_List', // Base ID
            __('Capital Product Categories List', 'une_boutique'), // Name
            array( 'description' => __( 'Capital Product Categories List with thumbnails', 'une_boutique' ), ) // Args
        );
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) { 
        extract( $args );
        $title = $instance['title'];
        $limit = (int) $instance['limit'];
        $orderby = strip_tags( $instance['orderby'] );
        $order = strip_tags( $instance['order'] );
        
        echo $before_widget;

        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

        echo get_categories_list( $limit, $orderby, $order );

        echo $after_widget;
    }
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {   
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    $instance['limit'] = (int) $new_instance['limit'];
    $instance['orderby'] = strip_tags( $new_instance['orderby'] );
    $instance['order'] = strip_tags( $new_instance['order'] );
      return $instance;
    }
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : "";
        $limit = isset($instance['limit']) ? (int) $instance['limit'] : "10";
        $orderby = isset( $instance['orderby'] ) ? strip_tags( $instance['orderby'] ) : "";
        $order = isset( $instance['order'] ) ? strip_tags( $instance['order'] ) : "";?>

        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','une_boutique'); ?></label> 
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:', 'une_boutique' ) ?> </label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>" />
        </p>

        <p><label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', 'une_boutique' ) ?></label>
        <select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
            <option value="none" <?php selected( $orderby, 'none' ); ?>><?php _e( 'None', 'une_boutique' ) ?></option>
            <option value="ID" <?php selected( $orderby, 'ID' ); ?>><?php _e( 'ID', 'une_boutique' ) ?></option>
            <option value="date" <?php selected( $orderby, 'date' ); ?>><?php _e( 'Date', 'une_boutique' ) ?></option>
            <option value="modified" <?php selected( $orderby, 'modified' ); ?>><?php _e( 'Modified', 'une_boutique' ) ?></option>
            <option value="rand" <?php selected( $orderby, 'rand' ); ?>><?php _e( 'Random', 'une_boutique' ) ?></option>
        </select></p>

        <p><label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Order By', 'une_boutique' ) ?></label>
        <select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
            <option value="asc" <?php selected( $order, 'none' ); ?>><?php _e( 'Ascending', 'une_boutique' ) ?></option>
            <option value="desc" <?php selected( $order, 'ID' ); ?>><?php _e( 'Descending', 'une_boutique' ) ?></option>
        </select></p>

        </select>
        </p>
        <?php 
    }

} // end class Capital_Product_Categories_List
add_action('widgets_init', create_function( '', 'return register_widget("Capital_Product_Categories_List");' ) );