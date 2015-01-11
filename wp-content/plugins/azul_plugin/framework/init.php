<?php

require_once('admin_options.php');
add_action('admin_menu', 'azul_init');

$azul_uninstall_opt = '_site_' . sha1(azul_product_info('item_name'));
if (get_option($azul_uninstall_opt) == 1) {
    $azul_install_text = 'Re-Install';
} else {
    $azul_install_text = 'Uninstall';
}

$azul_admin_menus = array(
    array(
        'page_type' => 'top_level',
        'page_title' => 'Azul Coming Soon',
        'menu_title' => 'Azul Plugin',
        'page_slug' => azul_product_info('settings_page_slug'),
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_item_info',
        'icon_url' => azul_product_info('assets_url').'/images/menu_icon.png', // Can be used with top_level only
    ),
    
    
    array(
        'page_type' => 'sub_level',
        'page_title' => 'Plugin Configuration',
        'menu_title' => 'Configuration',
        'page_slug' => 'azul_general_settings',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_configuration',
        'icon_url' => '', // Can be used with top_level only
    ),
    
    array(
        'page_type' => 'sub_level',
        'page_title' => 'Main Options',
        'menu_title' => 'Main Options',
        'page_slug' => 'azul_main_options',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_main_options',
        'icon_url' => '', // Can be used with top_level only
    ), 

    array(
        'page_type' => 'sub_level',
        'page_title' => 'Home',
        'menu_title' => 'Home',
        'page_slug' => 'azul_home',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_home',
        'icon_url' => '', // Can be used with top_level only
    ),

    array(
        'page_type' => 'sub_level',
        'page_title' => 'About',
        'menu_title' => 'About',
        'page_slug' => 'azul_about',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_about',
        'icon_url' => '', // Can be used with top_level only
    ),
    
    array(
        'page_type' => 'sub_level',
        'page_title' => 'Newsletter',
        'menu_title' => 'Newsletter',
        'page_slug' => 'azul_newsletter',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_newsletter',
        'icon_url' => '', // Can be used with top_level only
    ),
    
    array(
        'page_type' => 'sub_level',
        'page_title' => 'Contact',
        'menu_title' => 'Contact',
        'page_slug' => 'azul_contact',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_contact',
        'icon_url' => '', // Can be used with top_level only
    ),
     
    array(
        'page_type' => 'sub_level',
        'page_title' => $azul_install_text,
        'menu_title' => $azul_install_text,
        'page_slug' => 'azul_uninstall',
        'permission' => '"manage_opitons"',
        'callback_function' => 'azul_uninstall',
        'icon_url' => '', // Can be used with top_level only
    ),
);

function azul_item_info() {
    global $azul_options;
    azul_display_options($azul_options['info_page'], 'false');
}

function azul_configuration() {
    global $azul_options;
    azul_display_options($azul_options['configuration']);
}

function azul_main_options() {
    global $azul_options;
    azul_display_options($azul_options['main_options']);
}

function azul_home() {
    global $azul_options;
    azul_display_options($azul_options['home']);
}

function azul_about() {
    global $azul_options;
    azul_display_options($azul_options['about']);
}

function azul_newsletter() {
    global $azul_options;
    azul_display_options($azul_options['newsletter'], '', 'false');
}

function azul_contact() {
    global $azul_options;
    azul_display_options($azul_options['contact']);
}

function azul_uninstall() {
    azul_display_uninstall();
}

######################################################################
# PLUGIN INIT
######################################################################

function azul_init() {
    global $azul_admin_menus, $azul_uninstall_opt;
    foreach ($azul_admin_menus as $admin_page) {
        if ($admin_page['page_type'] == 'top_level') {
            $menu_page = add_menu_page($admin_page['page_title'], $admin_page['menu_title'], 'manage_options', $admin_page['page_slug'], $admin_page['callback_function'], $icon_url = $admin_page['icon_url']);
            add_action('admin_print_scripts', 'azul_admin_scripts');
            add_action('admin_print_styles', 'azul_admin_styles');          
        } else {
            $menu_page = add_submenu_page(azul_product_info('settings_page_slug'), $admin_page['page_title'], $admin_page['menu_title'], 'manage_options', $admin_page['page_slug'], $admin_page['callback_function']);
            add_action('admin_print_scripts', 'azul_admin_scripts');
            add_action('admin_print_styles', 'azul_admin_styles');
        }
    }

    // SETUP DATABASE
    if (get_option($azul_uninstall_opt) == 1) {

        foreach ($azul_admin_menus as $key => $value) {
        	//if ($_GET['page'] == $value['page_slug']) {
                if ($_GET['page'] != 'azul_uninstall') {
                    $location = site_url('wp-admin/admin.php?page=azul_uninstall');
                    wp_redirect($location);
                }
        	//}
        }
    } else {
        add_action('admin_head', 'azul_install_db');
    }



    // REMOVE FIRST LINK IN ADMIN PAGES MENU
    add_action('admin_head', 'azul_menu_fix');

    function azul_menu_fix() {
        echo '<style type="text/css">ul#adminmenu li.toplevel_page_' . azul_product_info('settings_page_slug') . ' .wp-first-item{display:none !important;} </style>';
    }

}
