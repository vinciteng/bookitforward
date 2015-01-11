<?php
/**
 * Une Boutique functions and definitions
 *
 * @package Une Boutique
 */

/*-----------------------------------------------------------------------------------*/
/*   Load Option Tree Theme Mode (theme options)
/*-----------------------------------------------------------------------------------*/

/**
 * Optional: set 'ot_show_options_ui' filter to false.
 * This will hide the settings & documentation pages.
 */
add_filter( 'ot_show_options_ui', '__return_false' );
add_filter( 'ot_show_docs', '__return_false' );

/**
 * Optional: set 'ot_show_new_layout' filter to false.
 * This will hide the "New Layout" section on the Theme Options page.
 */
add_filter( 'ot_show_new_layout', '__return_true' );

/**
 * Required: set 'ot_theme_mode' filter to true.
 */
add_filter( 'ot_theme_mode', '__return_true' );

/**
 * Required: include OptionTree.
 */
load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );

/**
 * Theme Options
 */
load_template( trailingslashit( get_template_directory() ) . 'theme-options/theme-options.php' );

function ot_get_option( $option_id, $default = '' ) {
    /* get the saved options */ 
    $options = get_option( 'option_tree' );
    /* look for the saved value */
    if ( isset( $options[$option_id] ) && '' != $options[$option_id] ) {
      return ot_wpml_filter( $options, $option_id );
    }
    return $default;
}

if ( ! function_exists( 'ot_wpml_filter' ) ) {
  function ot_wpml_filter( $options, $option_id ) {
    // Return translated strings using WMPL
    if ( function_exists('icl_t') ) {
      $settings = get_option( 'option_tree_settings' );
      if ( isset( $settings['settings'] ) ) {
        foreach( $settings['settings'] as $setting ) {
          // List Item & Slider
          if ( $option_id == $setting['id'] && in_array( $setting['type'], array( 'list-item', 'slider' ) ) ) {
            foreach( $options[$option_id] as $key => $value ) {
              foreach( $value as $ckey => $cvalue ) {
                $id = $option_id . '_' . $ckey . '_' . $key;
                $_string = icl_t( 'Theme Options', $id, $cvalue );
                if ( ! empty( $_string ) ) {
                  $options[$option_id][$key][$ckey] = $_string;
                }
              }
            }
          // All other acceptable option types
          } else if ( $option_id == $setting['id'] && in_array( $setting['type'], apply_filters( 'ot_wpml_option_types', array( 'text', 'textarea', 'textarea-simple' ) ) ) ) {
            $_string = icl_t( 'Theme Options', $option_id, $options[$option_id] );
            if ( ! empty( $_string ) ) {
              $options[$option_id] = $_string; 
            }
          }
        }
      }
    }
    return $options[$option_id];
  }
}
// end of theme options

// adding fonts to the theme

load_template( trailingslashit( get_template_directory() ) . 'theme-options/theme-fonts.php' );


/*-------------------------------------------------------------------------------------------*/
/*    Auto Plugin Setup and Activation upon theme activation
/*-------------------------------------------------------------------------------------------*/

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'ub_register_required_plugins' );

function ub_register_required_plugins() {
    $plugins = array(
        array(
            'name'                => 'Capital Shortcodes',
            'slug'                => 'capital-shortcodes',
            'source'              => get_stylesheet_directory() . '/lib/plugins/capital-shortcodes.zip',
            'required'            => true,
            'version'             => '2.0',
            'force_activation'    => false,
            'force_deactivation'  => false,
            'external_url'        => '',
        ),

        array(
            'name'			      => 'WPBakery Visual Composer',
            'slug'                => 'js_composer',
            'source'              => get_stylesheet_directory() . '/lib/plugins/js_composer.zip',
            'required'            => true,
            'version'             => '3.7',
            'force_activation'    => true,
            'force_deactivation'  => false,
            'external_url'        => '',
        ),

        array(
            'name'                => 'Revolution Slider',
            'slug'                => 'revslider',
            'source'              => get_stylesheet_directory() . '/lib/plugins/revslider.zip',
            'required'            => true,
            'version'             => '4.1',
            'force_activation'    => true,
            'force_deactivation'  => false,
            'external_url'        => '',
        ),

        array(
            'name'                => 'Envato WordPress Toolkit',
            'slug'                => 'envato-wordpress-toolkit-master',
            'source'              => 'https://github.com/envato/envato-wordpress-toolkit/archive/master.zip',
            'required'            => false,
            'version'             => '1.6.2',
            'force_activation'    => false,
            'force_deactivation'  => false,
            'external_url'        => '',
        ),

        array(
            'name'                => 'WooCommerce',
            'slug'                => 'woocommerce',
            'required'            => true,
            'version'             => '2.1.1',
            'force_activation'    => true,
        ),

        array(
            'name'                => 'YITH WooCommerce Wishlist',
            'slug'                => 'yith-woocommerce-wishlist',
            'required'            => false,
            'version'             => '1.0.6',
            'force_activation'    => false,
        ),

        array(
            'name'                => 'WordPress Importer',
            'slug'                => 'wordpress-importer',
            'required'            => true,
            'version'             => '0.6.1',
            'force_activation'    => true,
        ),

        array(
            'name'                => 'Regenerate Thumbnails',
            'slug'                => 'regenerate-thumbnails',
            'required'            => false,
            'version'             => '2.2.4',
            'force_activation'    => false,
        ),
        array(
            'name'                => 'Breadcrumb NavXT',
            'slug'                => 'breadcrumb-navxt',
            'required'            => true,
            'version'             => '5.0',
            'force_activation'    => false,
        ),
        array(
            'name'                => 'bbPress',
            'slug'                => 'bbpress',
            'required'            => false,
            'version'             => '2.3.2',
        ),
        array(
            'name'                => 'Limit Login Attempts',
            'slug'                => 'limit-login-attempts',
            'required'            => false,
            'version'             => '1.7.1',
        ),
        array(
            'name'                => 'Contact Form 7',
            'slug'                => 'contact-form-7',
            'required'            => false,
            'version'             => '3.6',
        ),
        array(
            'name'                => 'Black Studio TinyMCE Widget',
            'slug'                => 'black-studio-tinymce-widget',
            'required'            => false,
            'version'             => '1.2.0',
        ),
        array(
            'name'                => 'WooSidebars',
            'slug'                => 'woosidebars',
            'required'            => false,
            'version'             => '1.3.1',
        ),
    );

    $theme_text_domain = 'une_boutique';

    $config = array(
        'domain'            => $theme_text_domain,
        'default_path'      => '',
        'parent_menu_slug'  => 'themes.php',
        'parent_url_slug'   => 'themes.php',
        'menu'              => 'install-required-plugins',
        'has_notices'       => true,
        'is_automatic'      => false,
        'message'           => '',
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ),
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ),
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ),
            'nag_type'                                  => 'updated'
        )
    );

    tgmpa( $plugins, $config );
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1140; /* pixels */

if ( ! function_exists( 'une_boutique_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function une_boutique_setup() {

    // CHANGE LOCAL LANGUAGE
    // must be called before load_theme_textdomain()
    add_filter( 'locale', 'ub_theme_localized' );
    function ub_theme_localized( $locale )
    {
        if ( isset( $_GET['l'] ) )
    {
        return esc_attr( $_GET['l'] );
    }
        return $locale;
    }

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Une Boutique, use a find and replace
	 * to change 'une_boutique' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'une_boutique', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in three locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'une_boutique' ),
		'toolbar_right' => __( 'Toolbar Right', 'une_boutique' ),
		'toolbar_left' => __( 'Toolbar Left', 'une_boutique' ),
	) );

	if ( ot_get_option( 'header_layout') == 'header-v3' ) {
		register_nav_menu( 'secondary_nav', 'Secondary Nav' );
	}

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'gallery', 'video', 'quote', 'link', 'audio', 'status' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'une_boutique_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // une_boutique_setup
add_action( 'after_setup_theme', 'une_boutique_setup' );

/**
 * Enqueue scripts and styles
 */
function une_boutique_scripts() {
	wp_register_style( 'ub-woocommerce', get_template_directory_uri() . '/layouts/css/woocommerce.css', null, '1.0', 'screen' );
	wp_enqueue_style( 'ub-woocommerce' );

	wp_enqueue_style( 'une_boutique-style', get_stylesheet_uri() );
	wp_register_style( 'ub_foundation', get_template_directory_uri() . '/layouts/css/foundation.css', null, '4.3.1', 'screen' );
	wp_enqueue_style( 'ub_foundation' );

	// enqueue color presets
	if ( ot_get_option('color_presets') == 'green-preset' ) {
		wp_register_style( 'green-preset', get_template_directory_uri() . '/layouts/css/color-presets/green.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'green-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'orange-preset' ) {
		wp_register_style( 'orange-preset', get_template_directory_uri() . '/layouts/css/color-presets/orange.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'orange-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'turquoise-preset' ) {
		wp_register_style( 'turquoise-preset', get_template_directory_uri() . '/layouts/css/color-presets/turquoise.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'turquoise-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'dark-grey-preset' ) {
		wp_register_style( 'dark-grey-preset', get_template_directory_uri() . '/layouts/css/color-presets/dark-grey.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'dark-grey-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'red-preset' ) {
		wp_register_style( 'red-preset', get_template_directory_uri() . '/layouts/css/color-presets/red.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'red-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'silver-preset' ) {
		wp_register_style( 'silver-preset', get_template_directory_uri() . '/layouts/css/color-presets/silver.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'silver-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'pink-preset' ) {
		wp_register_style( 'pink-preset', get_template_directory_uri() . '/layouts/css/color-presets/pink.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'pink-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'teal-preset' ) {
		wp_register_style( 'teal-preset', get_template_directory_uri() . '/layouts/css/color-presets/teal.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'teal-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'purple-preset' ) {
		wp_register_style( 'purple-preset', get_template_directory_uri() . '/layouts/css/color-presets/purple.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'purple-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'navy-preset' ) {
		wp_register_style( 'navy-preset', get_template_directory_uri() . '/layouts/css/color-presets/navy.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'navy-preset', 998 );
	}

	if ( ot_get_option('color_presets') == 'brown-preset' ) {
		wp_register_style( 'brown-preset', get_template_directory_uri() . '/layouts/css/color-presets/brown.css', null, '1.0', 'screen' );
		wp_enqueue_style( 'brown-preset', 998 );
	}

	wp_enqueue_script( 'une_boutique-foundation.min', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '20134.3.1', true );

	wp_enqueue_script( 'ilightbox.packed', get_template_directory_uri() . '/js/ilightbox.packed.js', array(), '2.1.4', true );

	wp_enqueue_script( 'owl-carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '1.2.6', true );

	wp_enqueue_script( 'jquery.footable', get_template_directory_uri() . '/js/footable.js', array(), '1.0', true );

	wp_enqueue_script( 'une_boutique-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'une_boutique-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
	wp_enqueue_script( 'une_boutique-template.js', get_template_directory_uri() . '/js/template.js', array('jquery'), '2013.1.0', true );


    // loads styles and scripts for one pager template only

if ( is_page_template( 'page-templates/one-pager.php' ) ) {

    wp_register_style( 'fullPage', get_template_directory_uri() . '/layouts/css/jquery.fullPage.css', null, '1.4.5', 'screen' );
    wp_enqueue_style( 'fullPage' );

    wp_enqueue_script( 'jquery.slimscroll.min', get_template_directory_uri() . '/js/jquery.slimscroll.min.js', array('jquery', 'jquery-ui-core', 'jquery-effects-core', 'jquery-ui-draggable'), '1.1.0', true );

    wp_enqueue_script( 'jquery.fullPage.min', get_template_directory_uri() . '/js/jquery.fullPage.min.js', array('jquery', 'jquery-ui-core', 'jquery-effects-core' , 'jquery-ui-draggable'), '1.6.1', true );

    wp_enqueue_script( 'one-pager.js', get_template_directory_uri() . '/js/one-pager.js', array('jquery'), '2014.1.0', true );
}

}
add_action( 'wp_enqueue_scripts', 'une_boutique_scripts' );

//make woocommerce price widget mobile touch ready
add_action( 'wp_enqueue_scripts', 'ub_load_touch_punch_js' , 35 );
function ub_load_touch_punch_js() {
	global $version;

	wp_enqueue_script( 'jquery-ui-widget','','','',true );
	wp_enqueue_script( 'jquery-ui-mouse','','','',true );
	wp_enqueue_script( 'jquery-ui-slider','','','',true );
	wp_register_script( 'woo-jquery-touch-punch', get_stylesheet_directory_uri() . "/js/jquery.ui.touch-punch.min.js", array('jquery'), $version, true );
	wp_enqueue_script( 'woo-jquery-touch-punch' );
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load widget positions
 */
require get_template_directory() . '/inc/widget-positions.php';

/**
 * Load custom widgets
 */
require get_template_directory() . '/inc/custom_widgets.php';

/*-----------------------------------------------------------------------------------*/
/*  Change bbPress bread crumb separator.
/*-----------------------------------------------------------------------------------*/

function ub_filter_bbPress_breadcrumb_separator() {
//$sep = ' &raquo; ';
$sep = is_rtl() ? __( ' / ', 'bbpress' ) : __( ' / ', 'bbpress' );
return $sep;
}

add_filter('bbp_breadcrumb_separator', 'ub_filter_bbPress_breadcrumb_separator');

/*-----------------------------------------------------------------------------------*/
/*   Disable admin bar for all
/*-----------------------------------------------------------------------------------*/

if ( ot_get_option('display_admin_bar') == 'off' ) {
	show_admin_bar(false);
}

/*-----------------------------------------------------------------------------------*/
/*   Remove Paranthese from categories widgets post count 
/*-----------------------------------------------------------------------------------*/
// categories widgets (wordpress and woocommerce)
function ub_categories_postcount_filter ($remove_parentheses) {
   $remove_parentheses = str_replace('(', '<span class="post-count">', $remove_parentheses);
   $remove_parentheses = str_replace(')', '</span>', $remove_parentheses);
   return $remove_parentheses;
}
add_filter('wp_list_categories','ub_categories_postcount_filter');

// archives (wordpress)
function ub_archive_postcount_filter ($remove_parentheses) {
   $remove_parentheses = str_replace('(', '<span class="post-count">', $remove_parentheses);
   $remove_parentheses = str_replace(')', '</span>', $remove_parentheses);
   return $remove_parentheses;
}
add_filter('get_archives_link', 'ub_archive_postcount_filter');

/*-----------------------------------------------------------------------------------*/
/*   adds css class to parent menu items
/*-----------------------------------------------------------------------------------*/

add_filter( 'wp_nav_menu_objects', 'ub_add_menu_parent_class' );
function ub_add_menu_parent_class( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'menu-parent-item has-dropdown not-click';
		}
	}
	return $items;
}

/*-----------------------------------------------------------------------------------*/
/*   Add styles chooser to the visual editor
/*-----------------------------------------------------------------------------------*/

require get_template_directory() . '/inc/style-formats.php';


/*-----------------------------------------------------------------------------------*/
/* get featured image url function
/*-----------------------------------------------------------------------------------*/

function ub_featured_img_url( $ub_featured_img_size ) {
	$ub_image_id = get_post_thumbnail_id();
	$ub_image_url = wp_get_attachment_image_src( $ub_image_id, $ub_featured_img_size );
	$ub_image_url = $ub_image_url[0];
	return $ub_image_url;
}

/*-----------------------------------------------------------------------------------*/
/*   matches the CSS style of the text in the visual editor to the out put result
/*-----------------------------------------------------------------------------------*/

function ub_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'ub_theme_add_editor_styles' );

/*-------------------------------------------------------------------------------------------*/
/*    Set Une Boutique theme image dimensions upon theme activation
/*-------------------------------------------------------------------------------------------*/

/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'une_boutique_theme_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function une_boutique_theme_image_dimensions() {
  	$thumbnail = array(
		'width' 	=> '350',	// px
		'height'	=> '350',	// px
		'crop'		=> 1 		// true
	);
 
	$medium = array(
		'width' 	=> '640',	// px
		'height'	=> '320',	// px
		'crop'		=> 0 		// true
	);
 
	$large = array(
		'width' 	=> '1024',	// px
		'height'	=> '600',	// px
		'crop'		=> 0 		// true
	);
 
	// Image sizes
	update_option( 'thumbnail_size', $thumbnail );		// Product category thumbs
	update_option( 'medium_size', $medium );			// Single product image
	update_option( 'large_size', $large );	// Image gallery thumbs
}

add_filter( 'image_size_names_choose', 'ub_custom_image_choose' );
function ub_custom_image_choose( $args ) {

  global $_wp_additional_image_sizes;

  // make the names human friendly by removing dashes and capitalising
  foreach( $_wp_additional_image_sizes as $key => $value ) {
    $custom[ $key ] = ucwords( str_replace( '-', ' ', $key ) );
  }

  return array_merge( $args, $custom );
}

/*-----------------------------------------------------------------------------------*/
/* Hook in on activation */
/*-----------------------------------------------------------------------------------*/
 
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action('init', 'une_boutique_wp_image_dimensions', 1);

/* Define image sizes */
function une_boutique_wp_image_dimensions() {
	update_option('thumbnail_size_w', 350, true);
	update_option('thumbnail_size_h', 350, true);
	update_option('medium_size_w', 640);
	update_option('medium_size_h', 320);
	update_option('large_size_w', 1024);
	update_option('large_size_h', 600);
}

/*-------------------------------------------------------------------------------------------*/
/*    Set WooCommerce image dimensions upon theme activation
/*-------------------------------------------------------------------------------------------*/

/**
 * Hook in on activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'une_boutique_woocommerce_image_dimensions', 1 );
 
/**
 * Define image sizes
 */
function une_boutique_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '280',	// px
		'height'	=> '334',	// px
		'crop'		=> 1 		// true
	);
 
	$single = array(
		'width' 	=> '600',	// px
		'height'	=> '400',	// px
		'crop'		=> 1 		// true
	);
 
	$thumbnail = array(
		'width' 	=> '72',	// px
		'height'	=> '72',	// px
		'crop'		=> 1 		// true
	);
 
	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog );		// Product category thumbs
	update_option( 'shop_single_image_size', $single );			// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail );	// Image gallery thumbs
}

/*-----------------------------------------------------------------------------------*/
/*   woocommerce functions
/*-----------------------------------------------------------------------------------*/

// add theme support for woocommerce

add_action( 'after_setup_theme', 'ub_woocommerce_support' );
function ub_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/*-----------------------------------------------------------------------------------*/
/*   Disable WooCommerce styles
/*-----------------------------------------------------------------------------------*/

if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );
} else {
    define( 'WOOCOMMERCE_USE_CSS', false );
}

/*-------------------------------------------------------------------------------------------*/
/*    Unregister woocommerce default lightbox (pretty photo) to rplace it with iLightbox
/*-------------------------------------------------------------------------------------------*/

//DISABLE WOOCOMMERCE PRETTY PHOTO SCRIPTS
add_action( 'wp_print_scripts', 'ub_deregister_prettyphoto_scripts', 100 );

function ub_deregister_prettyphoto_scripts() {
	wp_deregister_script( 'prettyPhoto' );
	wp_deregister_script( 'prettyPhoto-init' );
}

//DISABLE WOOCOMMERCE PRETTY PHOTO STYLE
add_action( 'wp_print_styles', 'ub_deregister_prettyphoto_styles', 100 );

function ub_deregister_prettyphoto_styles() {
	wp_deregister_style( 'woocommerce_prettyPhoto_css' );
}

/*-----------------------------------------------------------------------------------*/
/*   Number of WooCommerce Products Per Page
/*-----------------------------------------------------------------------------------*/

$products_per_mian_page = ot_get_option('products_per_page');

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$products_per_mian_page.';' ), 20 );

/*-----------------------------------------------------------------------------------*/
/*   Change number or products per row based on the page template (with or without sidebar)
/*-----------------------------------------------------------------------------------*/

if ( ot_get_option('shop_column_count') ) {
  $ub_shop_columns = ot_get_option('shop_column_count');
}

if ( ot_get_option('shop_layout') == 'full-width' && !ot_get_option('shop_column_count') ) {
	$ub_shop_columns = "4";
} elseif ( !ot_get_option('shop_layout') == 'full-width' && !ot_get_option('shop_column_count') ) {
	$ub_shop_columns = "2";
}

add_filter('loop_shop_columns', 'ub_loop_columns');
if ( !function_exists('ub_loop_columns') ) {
	function ub_loop_columns() {
		global $ub_shop_columns;
		return $ub_shop_columns;
	}
}

/*-----------------------------------------------------------------------------------*/
/*   Redefine woocommerce_output_related_products()
/*-----------------------------------------------------------------------------------*/

function woocommerce_output_related_products() {
	woocommerce_related_products(4,1);
}

/*-----------------------------------------------------------------------------------*/
/*   Add product category under product name
/*-----------------------------------------------------------------------------------*/

function ub_wc_category_title_archive_products(){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

    	<a class="product_category_title" href="<?php echo get_term_link( $single_cat->slug, 'product_cat' ); ?>"><?php echo $single_cat->name; ?></a>

<?php }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'ub_wc_category_title_archive_products', 5 );


/*-------------------------------------------------------------------------------------------*/
/*    Renames default woocommerce tabs
/*-------------------------------------------------------------------------------------------*/

add_filter( 'woocommerce_product_tabs', 'ub_rename_tabs', 98 );
function ub_rename_tabs( $tabs ) {

if ( isset($tabs['description']) ) {
$tabs['description']['title'] = '<span class="tab-name">'.__( 'More Information', 'une_boutique' ).'</span><small>'.__( 'more about this product', 'une_boutique' ).'</small>';   // Rename the description tab
}

if ( isset($tabs['reviews']) ) {
$tabs['reviews']['title'] = '<span class="tab-name">'.__( 'Ratings', 'une_boutique' ).'</span><small>'.__( 'rate and review it', 'une_boutique' ).'</small>';        // Rename the reviews tab
}

if ( isset($tabs['additional_information']) ) {
$tabs['additional_information']['title'] = '<span class="tab-name">'.__( 'Product Specifications', 'une_boutique' ).'</span><small>'.__( 'product details table', 'une_boutique' ).'</small>';  // Rename the additional information tab
}
  return $tabs;
}

/*-------------------------------------------------------------------------------------------*/
/*    Adds social sharing tab to products single pages
/*-------------------------------------------------------------------------------------------*/

if ( ot_get_option('product_social_share') ) {
	add_filter( 'woocommerce_product_tabs', 'ub_woo_new_share_tab');
	function une_boutique_product_share_tab() {
	 echo '<h3 class="no-margin-top">'.__( 'Share this product', 'une_boutique' ).'</h3>';
	 echo '<div id="share-my-product"></div>
		<script>jQuery(document).ready(function(e){"use strict";e("#share-my-product").share({networks:["facebook","twitter","googleplus","linkedin","pinterest","tumblr","email","stumbleupon","digg","in1"]})});</script>';
	}

	function ub_woo_new_share_tab($tabs) {
	 $tabs['share_tab'] = array(
	 'title' => '<span class="tab-name">'.__( 'Share this product', 'une_boutique' ).'</span><small>'.__( 'tell others about it', 'une_boutique' ).'</small>',
	 'priority' => 50,
	 'callback' => 'une_boutique_product_share_tab'
	 );
	 return $tabs;
	}
}

/*-------------------------------------------------------------------------------------------*/
/*    Adds video tabs to single products
/*    based on WooCommerce Video Product Tab (http://www.sebs-studio.com/wp-plugins/woocommerce-video-product-tab)
/*-------------------------------------------------------------------------------------------*/
 
// Required minimum version of WordPress.
if(!function_exists('ub_woo_video_tab_min_required')){
	function ub_woo_video_tab_min_required(){
		global $wp_version;
		$plugin = plugin_basename(__FILE__);
		$plugin_data = get_plugin_data(__FILE__, false);

		if(version_compare($wp_version, "3.3", "<")){
			if(is_plugin_active($plugin)){
				deactivate_plugins($plugin);
				wp_die("'".$plugin_data['Name']."' requires WordPress 3.3 or higher, and has been deactivated! Please upgrade WordPress and try again.<br /><br />Back to <a href='".admin_url()."'>WordPress Admin</a>.");
			}
		}
	}
	add_action('admin_init', 'ub_woo_video_tab_min_required');
}
// Checks if the WooCommerce plugins is installed and active.
if(in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){

if(!class_exists('WooCommerce_Video_Product_Tab')){
class WooCommerce_Video_Product_Tab{

public static $plugin_prefix;
public static $plugin_url;
public static $plugin_path;
public static $plugin_basefile;

private $tab_data = false;

/**
* Gets things started by adding an action to initialize this plugin once
* WooCommerce is known to be active and initialized
*/
public function __construct(){
WooCommerce_Video_Product_Tab::$plugin_prefix = 'wc_video_tab_';
WooCommerce_Video_Product_Tab::$plugin_basefile = plugin_basename(__FILE__);
WooCommerce_Video_Product_Tab::$plugin_url = plugin_dir_url(WooCommerce_Video_Product_Tab::$plugin_basefile);
WooCommerce_Video_Product_Tab::$plugin_path = trailingslashit(dirname(__FILE__));
add_action('woocommerce_init', array(&$this, 'init'));
}

/**
* Init WooCommerce Video Product Tab extension once we know WooCommerce is active
*/
public function init(){
// backend stuff
add_action('woocommerce_product_write_panel_tabs', array($this, 'ub_product_write_panel_tab'));
add_action('woocommerce_product_write_panels', array($this, 'ub_product_write_panel'));
add_action('woocommerce_process_product_meta', array($this, 'ub_product_save_data'), 10, 2);
// frontend stuff
if(version_compare(WOOCOMMERCE_VERSION, "2.0", '>=')){
// WC >= 2.0
add_filter('woocommerce_product_tabs', array($this, 'ub_video_product_tabs_two'));
}
else{
add_action('woocommerce_product_tabs', array($this, 'ub_video_product_tabs'), 25);
// in between the attributes and reviews panels.
add_action('woocommerce_product_tab_panels', array($this, 'ub_video_product_tabs_panel'), 25);
}
}

/**
* Write the video tab on the product view page for WC 2.0+.
* In WooCommerce these are handled by templates.
*/
public function ub_video_product_tabs_two($tabs){
global $product;

if($this->product_has_video_tabs($product)){
foreach($this->tab_data as $tab){
	$tabs[$tab['id']] = array(
		'title'    => '<span class="tab-name">'.$tab['title'].'</span><small>'.__( 'in depth videos', 'une_boutique' ).'</small>',
		'priority' => 25,
		'callback' => array($this, 'ub_video_product_tabs_panel_content'),
		'content'  => $tab['video']
	);
}
}
return $tabs;
}

/**
* Write the video tab on the product view page for WC 1.6.6 and below.
* In WooCommerce these are handled by templates.
*/
public function ub_video_product_tabs(){
global $product;

if($this->product_has_video_tabs($product)){
foreach($this->tab_data as $tab){
	echo "<li><a href=\"#{$tab['id']}\"><span class=\"tab-name\">".$tab['title']."</span></a></li>";
}
}
}

/**
* Write the video tab panel on the product view page WC 2.0+.
* In WooCommerce these are handled by templates.
*/
public function ub_video_product_tabs_panel_content(){
global $product;

$embed = new WP_Embed(); // Since version 1.2

if($this->product_has_video_tabs($product)){
foreach($this->tab_data as $tab){
	if($tab['hide_title'] == '') echo '<h2>'.$tab['title'].'</h2>';
	echo '<div class="flex-video">';
	echo $embed->autoembed(apply_filters('woocommerce_video_product_tab', $tab['video'], $tab['id']));
	echo '</div>';
}
}
}

/**
* Write the video tab panel on the product view page for WC 1.6.6 and below.
* In WooCommerce these are handled by templates.
*/
public function ub_video_product_tabs_panel(){
global $product;

$embed = new WP_Embed(); // Since version 1.2

if($this->product_has_video_tabs($product)){
foreach($this->tab_data as $tab){
	echo '<div class="panel flex-video" id="'.$tab['id'].'">';
	if($tab['hide_title'] == '') echo '<h2>'.$tab['title'].'</h2>';
	echo $embed->autoembed(apply_filters('woocommerce_video_product_tab', $tab['video'], $tab['id'])); // Altered in version 1.2
	echo '</div>';
}
}
}
/**
* Lazy-load the product_tabs meta data, and return true if it exists,
* false otherwise.
* 
* @return true if there is video tab data, false otherwise.
*/
private function product_has_video_tabs($product){
if($this->tab_data === false){
$this->tab_data = maybe_unserialize(get_post_meta($product->id, 'woo_video_product_tab', true));
}
// tab must at least have a embed code inserted.
return !empty($this->tab_data) && !empty($this->tab_data[0]) && !empty($this->tab_data[0]['video']);
}

/**
* Adds a new tab to the Product Data postbox in the admin product interface
*/
public function ub_product_write_panel_tab(){
$tab_icon = get_template_directory_uri() . '/images/play.png';

if(version_compare(WOOCOMMERCE_VERSION, "2.0.0") >= 0 ){
$style = 'padding:5px 5px 5px 28px; background-image:url('.$tab_icon.'); background-repeat:no-repeat; background-position:5px 7px;';
$active_style = '';
}
else{
$style = 'padding:9px 9px 9px 34px; line-height:16px; border-bottom:1px solid #d5d5d5; text-shadow:0 1px 1px #fff; color:#555555; background-image:url('.$tab_icon.'); background-repeat:no-repeat; background-position:9px 9px;';
$active_style = '#woocommerce-product-data ul.product_data_tabs li.my_plugin_tab.active a { border-bottom: 1px solid #F8F8F8; }';
}
?>
<style type="text/css">
#woocommerce-product-data ul.product_data_tabs li.video_tab a { <?php echo $style; ?> }
<?php echo $active_style; ?>
</style>
<?php
echo "<li class=\"video_tab\"><a href=\"#video_tab\">".__('Video', 'wc_video_product_tab')."</a></li>";
}

/**
* Adds the panel to the Product Data postbox in the product interface
*/
public function ub_product_write_panel(){
global $post;

// Pull the video tab data out of the database
$tab_data = maybe_unserialize(get_post_meta($post->ID, 'woo_video_product_tab', true));

if(empty($tab_data)){
$tab_data[] = array('title' => '', 'hide_title' => '', 'video' => '');
}

// Display the video tab panel
foreach($tab_data as $tab){
echo '<div id="video_tab" class="panel woocommerce_options_panel">';
$this->ub_wc_video_product_tab_text_input(
	array(
		'id' => '_tab_video_title', 
		'label' => __('Video Title', 'wc_video_product_tab'), 
		'placeholder' => __('Enter your title here.', 'wc_video_product_tab'), 
		'value' => $tab['title'], 
		'style' => 'width:70%;',
	)
);
woocommerce_wp_checkbox( array(
	'id' => '_hide_title', 
	'label' => __('Hide Title ?', 'wc_video_product_tab'), 
	'description' => __('Enable this option to hide the title in the video tab.', 'wc_video_product_tab'), 
	'value' => $tab['hide_title'], 
)
);
$this->ub_wc_video_product_tab_textarea_input(
	array(
		'id' => '_tab_video', 
		'label' => __('Embed Code', 'wc_video_product_tab'), 
		'placeholder' => __('Place your video embed code here.', 'wc_video_product_tab'), 
		'value' => $tab['video'], 
		'style' => 'width:70%;height:140px;',
	)
);
echo '</div>';
}
}

/**
* Output a text input box.
*/
public function ub_wc_video_product_tab_text_input($field){
global $thepostid, $post, $woocommerce;

$thepostid              = empty( $thepostid ) ? $post->ID : $thepostid;
$field['placeholder']   = isset( $field['placeholder'] ) ? $field['placeholder'] : '';
$field['class']         = isset( $field['class'] ) ? $field['class'] : 'short';
$field['wrapper_class'] = isset( $field['wrapper_class'] ) ? $field['wrapper_class'] : '';
$field['value']         = isset( $field['value'] ) ? $field['value'] : get_post_meta( $thepostid, $field['id'], true );
$field['name']          = isset( $field['name'] ) ? $field['name'] : $field['id'];
$field['type']          = isset( $field['type'] ) ? $field['type'] : 'text';

echo '<p class="form-field '.esc_attr($field['id']).'_field '.esc_attr($field['wrapper_class']).'"><label for="'.esc_attr($field['id']).'">'.wp_kses_post($field['label']).'</label><input type="'.esc_attr($field['type']).'" class="'.esc_attr($field['class']).'" name="'.esc_attr($field['name']).'" id="'.esc_attr($field['id']).'" value="'.esc_attr($field['value']).'" placeholder="'.esc_attr($field['placeholder']).'"'.(isset($field['style']) ? ' style="'.$field['style'].'"' : '').' /> ';

if(!empty($field['description'])){
if(isset($field['desc_tip'])){
	echo '<img class="help_tip" data-tip="'.esc_attr($field['description']).'" src="'.$woocommerce->plugin_url().'/assets/images/help.png" height="16" width="16" />';
}
else{
	echo '<span class="description">'.wp_kses_post($field['description']).'</span>';
}
}
echo '</p>';
}

/**
* Output a textarea box.
*/
public function ub_wc_video_product_tab_textarea_input($field){
global $thepostid, $post;

if(!$thepostid) $thepostid = $post->ID;
if(!isset($field['placeholder'])) $field['placeholder'] = '';
if(!isset($field['class'])) $field['class'] = 'short';
if(!isset($field['value'])) $field['value'] = get_post_meta($thepostid, $field['id'], true);

echo '<p class="form-field '.$field['id'].'_field"><label for="'.$field['id'].'">'.$field['label'].'</label><textarea class="'.$field['class'].'" name="'.$field['id'].'" id="'.$field['id'].'" placeholder="'.$field['placeholder'].'" rows="2" cols="20"'.(isset($field['style']) ? ' style="'.$field['style'].'"' : '').'">'.esc_textarea( $field['value']).'</textarea>';

if(isset($field['description']) && $field['description']) echo '<span class="description">' .$field['description'] . '</span>';

echo '</p>';
}

/**
* Saves the data inputed into the product boxes, as post meta data
* identified by the name 'woo_video_product_tab'
* 
* @param int $post_id the post (product) identifier
* @param stdClass $post the post (product)
*/
public function ub_product_save_data($post_id, $post){

$tab_title = stripslashes($_POST['_tab_video_title']);
if($tab_title == ''){
$tab_title = __('Video', 'wc_video_product_tab');
}
$hide_title = stripslashes($_POST['_hide_title']);
$tab_video = stripslashes($_POST['_tab_video']);

if(empty($tab_video) && get_post_meta($post_id, 'woo_video_product_tab', true)){
// clean up if the video tabs are removed
delete_post_meta($post_id, 'woo_video_product_tab');
}
elseif(!empty($tab_video)){
$tab_data = array();

$tab_id = '';
// convert the tab title into an id string
$tab_id = strtolower($tab_title);
$tab_id = preg_replace("/[^\w\s]/",'',$tab_id); // remove non-alphas, numbers, underscores or whitespace 
$tab_id = preg_replace("/_+/", ' ', $tab_id); // replace all underscores with single spaces
$tab_id = preg_replace("/\s+/", '-', $tab_id); // replace all multiple spaces with single dashes
$tab_id = 'tab-'.$tab_id; // prepend with 'tab-' string

// save the data to the database
$tab_data[] = array('title' => $tab_title, 'hide_title' => $hide_title, 'id' => $tab_id, 'video' => $tab_video);
update_post_meta($post_id, 'woo_video_product_tab', $tab_data);
}
}
}
}

/* 
* Instantiate plugin class and add it to the set of globals.
*/
$woocommerce_video_tab = new WooCommerce_Video_Product_Tab();
}
else{
    add_action('admin_notices', 'ub_wc_video_tab_error_notice');
    function ub_wc_video_tab_error_notice(){
        global $current_screen;
        if($current_screen->parent_base == 'plugins'){
            echo '<div class="error"><p>WooCommerce Video Product Tab '.__('requires <a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a> to be activated in order to work. Please install and activate <a href="'.admin_url('plugin-install.php?tab=search&type=term&s=WooCommerce').'" target="_blank">WooCommerce</a> first.', 'wc_video_product_tab').'</p></div>';
        }
    }
}

/*-------------------------------------------------------------------------------------------*/
/*    Reset VC default CSS classes
/*-------------------------------------------------------------------------------------------*/

function ub_custom_css_classes_for_vc_row_and_vc_column($class_string, $tag) {
    if ( !is_page_template( 'page-templates/one-pager.php' ) ) {
        if ($tag=='vc_row') {
            $class_string = str_replace('vc_row-fluid', 'row', $class_string);
        }
        if ( $tag=='vc_row_inner' ) {
            $class_string = str_replace('vc_row-fluid', 'row', $class_string);
        }
        if ($tag=='vc_column' || $tag=='vc_column_inner') {
            $class_string = preg_replace('/vc_span(\d{1,2})/', 'columns large-$1', $class_string);
        }
        return $class_string;
    } else {
        if ($tag=='vc_row') {
            $class_string = str_replace('vc_row-fluid', 'row', $class_string);
        }
        if ( $tag=='vc_row_inner' ) {
            $class_string = str_replace('vc_row-fluid', 'row', $class_string);
        }
        if ($tag=='vc_column' || $tag=='vc_column_inner') {
            $class_string = preg_replace('/vc_span(\d{1,2})/', 'columns large-$1', $class_string);
        }
        return $class_string;
    }
}
// Filter to Replace default css class for vc_row shortcode and vc_column
add_filter('vc_shortcodes_css_class', 'ub_custom_css_classes_for_vc_row_and_vc_column', 10, 2);

/*-------------------------------------------------------------------------------------------*/
/*    shortcodes to extend visual composer
/*-------------------------------------------------------------------------------------------*/

if ( function_exists('vc_map') ) {
    require get_template_directory() . '/inc/vc_extend/shortcodes.php';
}

/*-------------------------------------------------------------------------------------------*/
/*    Removes the default image carousel shortcode
/*-------------------------------------------------------------------------------------------*/

if ( function_exists('vc_map') ) {
    vc_remove_element("vc_images_carousel");
}

/*-------------------------------------------------------------------------------------------*/
/*    Adds custom css styles to wp admin
/*-------------------------------------------------------------------------------------------*/

function ub_admin_theme_style() {
    wp_enqueue_style('ub-admin-style', get_template_directory_uri() . '/layouts/admin/css/admin.css');
}
add_action('admin_enqueue_scripts', 'ub_admin_theme_style');


/*-------------------------------------------------------------------------------------------*/
/*   Capital Testimonials
/*-------------------------------------------------------------------------------------------*/

load_template( trailingslashit( get_template_directory() ) . 'inc/capital-testimonials.php' );


/*-------------------------------------------------------------------------------------------*/
/*   set the shop to catalog mode 
/*-------------------------------------------------------------------------------------------*/

if ( ot_get_option('catalog_mode') ) {

  function remove_loop_button(){
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
  remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
  }
  add_action('init','remove_loop_button');

  add_filter('woocommerce_get_price_html','no_price');

  function no_price($price){

      return null;

  }

}