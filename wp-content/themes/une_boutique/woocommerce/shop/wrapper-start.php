<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$shop_layout = ot_get_option('shop_layout');
$sidebar_porsition = "sidebar-right";
if ($shop_layout == 'left-sidebar') {
	$sidebar_porsition = "sidebar-left";
}
$template = get_option('template');

switch( $template ) {
	case 'twentyeleven' :
		echo '<div id="primary"><div id="content" role="main">';
		break;
	case 'twentytwelve' :
		echo '<div id="primary" class="site-content"><div id="content" role="main">';
		break;
	default :
		echo '<div id="shop-container" class="'.$sidebar_porsition.'">';
		break;
}