<?php
/*
  Plugin Name: Azul - Creative Coming Soon Template (shared on wplocker.com)
  Description: This plugin shows a 'Custom Coming Soon' page to all users who are not logged in. However, the Site Administrators see the fully functional website with the applied theme and active plugins..
  Author: CreaboxThemes
  Version: 1.2
  Author URI: http://themeforest.net/user/CreaboxThemes
  Email: admin@creabox.es
*/ 

require_once('framework/framework.php');
require_once('framework/init.php');

#################################################################################
# LOAD MODULES
#################################################################################
$azul_modules = array(
        'functions/coming_soon_page'
);

azul_load_modules($azul_modules);


if (azul_product_info('item_type') == 'Plugin') {
#################################################################################
# PLUGIN SETTINGS LINK
#################################################################################

    function azul_action_links($links, $file) {
        static $this_plugin;
        if (!$this_plugin)
            $this_plugin = plugin_basename(__FILE__);
        if ($file == $this_plugin) {
            $settings_link = '<a href="' . site_url('wp-admin/admin.php?page=') . azul_product_info('settings_page_slug') . '">' . 'Settings' . '</a>';
            $links = array_merge(array($settings_link), $links);
        }
        return $links;
    }

    add_filter('plugin_action_links', 'azul_action_links', 10, 2);
    /** LOCALIZATION ************************************************************* */
    load_plugin_textdomain('azul-plugin', true, dirname( plugin_basename( __FILE__ ) ) . '/languages/');
} else {
    /** LOCALIZATION ************************************************************* */
    load_theme_textdomain('azul-plugin', true, get_template_directory() . '/languages/');
}