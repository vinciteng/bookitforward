<?php

if (azul_top('plugin_status') == 'enable') {
    add_action('get_header', 'azul_coming_soon_page');
}

function azul_coming_soon_page() {
        
    $current_user = wp_get_current_user();
    if (is_user_logged_in()) {
        if (azul_top('site_access') == "enable") {
            echo '';
        } else {
            require_once(azul_product_info('product_dir') . '/themes/theme.php');
            die();
        }
    } else {
        require_once(azul_product_info('product_dir') . '/themes/theme.php');
        die();
    }
}