<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'admin_init', 'custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general',
        'title'       => 'General'
      ),
      array(
        'id'          => 'shop_setting',
        'title'       => 'Shop Setting'
      ),
      array(
        'id'          => 'blog_settings',
        'title'       => 'Blog Settings'
      ),
      array(
        'id'          => 'forum_settings',
        'title'       => 'Forum Settings'
      ),
      array(
        'id'          => 'color_and_styles',
        'title'       => 'Color/Type/Styles'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'color_presets',
        'label'       => 'Color Presets',
        'desc'        => 'Select a color peset for your theme, generally changes the primary button color and links color. You can customize your colors more using <strong>Color/Type/Styles</strong> panel.',
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'default-preset',
            'label'       => 'Default',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/default.png'
          ),
          array(
            'value'       => 'green-preset',
            'label'       => 'Green',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/green.png'
          ),
          array(
            'value'       => 'orange-preset',
            'label'       => 'Orange',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/orange.png'
          ),
          array(
            'value'       => 'turquoise-preset',
            'label'       => 'Turquoise',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/turquoise.png'
          ),
          array(
            'value'       => 'dark-grey-preset',
            'label'       => 'Dark Grey',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/dark-grey.png'
          ),
          array(
            'value'       => 'red-preset',
            'label'       => 'Red',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/red.png'
          ),
          array(
            'value'       => 'silver-preset',
            'label'       => 'Silver',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/silver.png'
          ),
          array(
            'value'       => 'pink-preset',
            'label'       => 'Pink',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/pink.png'
          ),
          array(
            'value'       => 'teal-preset',
            'label'       => 'Teal',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/teal.png'
          ),
          array(
            'value'       => 'purple-preset',
            'label'       => 'Purple',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/purple.png'
          ),
          array(
            'value'       => 'navy-preset',
            'label'       => 'Navy',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/navy.png'
          ),
          array(
            'value'       => 'brown-preset',
            'label'       => 'Brown',
            'src'         =>  get_template_directory_uri() . '/images/color-presets/brown.png'
          ),
        ),
      ),
      array(
        'id'          => 'default_layout',
        'label'       => 'Default Layout',
        'desc'        => 'select the default layout for the theme. (The default is stretched)',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'stretched',
            'label'       => 'Streched',
            'src'         => ''
          ),
          array(
            'value'       => 'boxed',
            'label'       => 'Boxed',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'header_layout',
        'label'       => 'Header Layout',
        'desc'        => 'select the main header layout for the theme.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array(
          array(
            'value'       => 'default-header',
            'label'       => 'Default Header',
            'src'         => ''
          ),
          array(
            'value'       => 'header-v2',
            'label'       => 'Header V2',
            'src'         => ''
          ),
          array(
            'value'       => 'header-v3',
            'label'       => 'Header V3',
            'src'         => ''
          ),
          array(
            'value'       => 'header-v4',
            'label'       => 'Header V4',
            'src'         => ''
          ),
        ),
      ),
      array(
        'id'          => 'main_logo',
        'label'       => 'Main Logo',
        'desc'        => 'Upload your main logo here. This logo is displayed on top left of all pages.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_favicon',
        'label'       => 'Custom Favicon',
        'desc'        => 'upload your custom favicon to replace the default one.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'sticky_navigation_bar',
        'label'       => 'Sticky Navigation Bar',
        'desc'        => 'check this option to enable the sticky navigation bar.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'hide_start_here',
        'label'       => 'Hide Start Here SideNav',
        'desc'        => 'check this option to hide start here side nav section.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Hide',
            'src'         => ''
          )
        ),
      ),
      array(
        'label'       => 'Main Container Max Width',
        'id'          => 'main_container_max_width',
        'type'        => 'measurement',
        'desc'        => 'Change the default width of the theme container. <strong>The best measurement unit to use is <i>em</i> based, please note that making the max width too narrow might affect the layout in a bad way.</strong> The default width is 74em',
        'std'         => '',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'section'     => 'general'
      ),
      array(
        'id'          => 'google_analytics_code',
        'label'       => 'Google Analytics Code',
        'desc'        => 'paste your google analytics code here, this code will be added to the footer of every page in your site.',
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'display_admin_bar',
        'label'       => 'Display Admin Bar',
        'desc'        => 'select this option to display wordpress adminbar on the front end while user is logged in. It\'s turned off by default.',
        'std'         => '',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'shop_layout',
        'label'       => 'Shop Layout',
        'desc'        => 'Choose the shop layout that best suites you.',
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'shop_setting',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right-sidebar',
            'label'       => 'Right Sidebar',
            'src'         => OT_URL . 'assets/images/layout/right-sidebar.png'
          ),
          array(
            'value'       => 'left-sidebar',
            'label'       => 'Left Sidebar',
            'src'         => OT_URL . 'assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'full-width',
            'label'       => 'Full Width',
            'src'         => OT_URL . 'assets/images/layout/full-width.png'
          )
        ),
      ),
      array(
        'id'          => 'products_per_page',
        'label'       => 'Products Per Page',
        'desc'        => 'define the number of the products displayed per page (main shop page).',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'shop_setting',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'shop_column_count',
        'label'       => 'Shop Column Count',
        'desc'        => 'Set the number of columns in your main shop page. Ranges from 2 to 4 columns. <strong>setting the number of columns to 4 while the shop page has sidebars in not recommended.</strong>',
        'std'         => '',
        'type'        => 'numeric-slider',
        'section'     => 'shop_setting',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '2,4,1',
        'class'       => ''
      ),
      array(
        'id'          => 'product_social_share',
        'label'       => 'Product Social Share',
        'desc'        => 'enable or disable the social sharing tab for wc products. turn this off if you want to use the default sharing functionality of woocommerce.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_setting',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'catalog_mode',
        'label'       => 'Catalog Mode',
        'desc'        => 'If you plan to use woocommerce on catalog mode, which means no add to cart buttons, and no prices etc, then select this option. <b>Make sure disable WishList Plugin too.</b>',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'shop_setting',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'blog_layout',
        'label'       => 'Blog Layout',
        'desc'        => 'Customize the layout for the blog pages.',
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'blog_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right-sidebar',
            'label'       => 'Right Sidebar',
            'src'         => OT_URL . 'assets/images/layout/right-sidebar.png'
          ),
          array(
            'value'       => 'left-sidebar',
            'label'       => 'Left Sidebar',
            'src'         => OT_URL . 'assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'full-width',
            'label'       => 'Full Width',
            'src'         => OT_URL . 'assets/images/layout/full-width.png'
          )
        ),
      ),
      array(
        'id'          => 'forum_layout',
        'label'       => 'Forum Layout',
        'desc'        => 'Customize the layout for the forum pages.',
        'std'         => '',
        'type'        => 'radio-image',
        'section'     => 'forum_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'right-sidebar',
            'label'       => 'Right Sidebar',
            'src'         => OT_URL . 'assets/images/layout/right-sidebar.png'
          ),
          array(
            'value'       => 'left-sidebar',
            'label'       => 'Left Sidebar',
            'src'         => OT_URL . 'assets/images/layout/left-sidebar.png'
          ),
          array(
            'value'       => 'full-width',
            'label'       => 'Full Width',
            'src'         => OT_URL . 'assets/images/layout/full-width.png'
          )
        ),
      ),
      array(
        'id'          => 'display_forum_search_form',
        'label'       => 'Display Forum Search Form',
        'desc'        => 'Choose whether to display the search form above the main forum page or not.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'forum_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'display-search-form',
            'label'       => 'Display Search Form',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'enable_google_webfonts',
        'label'       => 'Enable Google Webfonts',
        'desc'        => 'check this option to add google fonts. only enable this if you plan to use the typography options and custom fonts you see on this tab.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'enable',
            'label'       => 'enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'custom_css',
        'label'       => 'Custom CSS',
        'desc'        => 'To make color and font styles work on your theme, you need this field. You also need a file named <strong>dynamic.css</strong> in the root folder of the theme, and it shoul be writable (CHOMD 777). In the Assets folder, there is a file named dynamic.css.txt, make sure you copy and paste all the codes in that file into this field, save the options and start customizing colors, fonts and backgrounds.',
        'std'         => '',
        'type'        => 'css',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'boxed_layout_body_background',
        'label'       => 'Boxed Layout Body Background',
        'desc'        => 'change the main background color or even upload and use your own pattern to have a patterned or image background.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'main_background',
        'label'       => 'Main Background',
        'desc'        => 'change the main background color or even upload and use your own pattern to have a patterned or image background.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'general_typography',
        'label'       => 'General Typography',
        'desc'        => 'Change the general typography settings. You can enable google fonts (on top of this page) and use the extera google fonts.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'link_typography',
        'label'       => 'Links Typography',
        'desc'        => 'Change the links typography settings.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'toolbar_background',
        'label'       => 'Toolbar Section Background',
        'desc'        => 'Change the background of toolbar section (top menu with dark background).',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_background',
        'label'       => 'Main Header Background',
        'desc'        => 'Change the background of main header.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'site_navigation',
        'label'       => 'Main Navigation Background',
        'desc'        => 'Change the background of main navigation. (works on default header style)',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'navigation_typography',
        'label'       => 'Main Navigation Typography',
        'desc'        => 'Change the typography settings for your main navigation. You can enable google fonts (on top of this page) and use the extera google fonts.',
        'std'         => '',
        'type'        => 'typography',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'breadcrumbs_background',
        'label'       => 'Breadcrumbs Bar Background',
        'desc'        => 'Change the background the breadcrumbs bar (page info bar).',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'single_products_background',
        'label'       => 'Single Products Background',
        'desc'        => 'Change the background of the single products (where the short description and the images are displayed).',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'light_footer_background',
        'label'       => 'Light Footer Background',
        'desc'        => 'Change the background of light footer area.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dark_footer_background',
        'label'       => 'Dark Footer Background',
        'desc'        => 'Change the background of dark footer area.',
        'std'         => '',
        'type'        => 'background',
        'section'     => 'color_and_styles',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}