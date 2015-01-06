<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Une Boutique
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( !ot_get_option('custom_favicon') ) { ?>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php } else { ?>
<link rel="shortcut icon" href="<?php echo ot_get_option('custom_favicon') ?>" />
<?php } ?>
<?php
if ( ot_get_option('main_container_max_width') ) {
$main_container_max_width = ot_get_option('main_container_max_width');
	if ( $main_container_max_width[0] && $main_container_max_width[1] ) {
		echo "<style>";
			echo ".row, .contain-to-grid .top-bar, .boxed-layout, .vc_row {";
				echo "max-width:" . $main_container_max_width[0] . $main_container_max_width[1] . "!important;";
			echo "}";
		echo "</style>";
	} 
} ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.foundation.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a id="touch-trigger" href="javascript:void(0)" class="fixed"></a>
<?php if ( ot_get_option('default_layout') == 'boxed' ) {
	// if boxed layout is selected
	echo '<div class="boxed-layout">';
} ?>


<div id="page" class="hfeed site">
<?php do_action( 'before' ); ?>

<?php if (ot_get_option( 'header_layout') == 'header-v2' ) {

	require get_template_directory() . '/inc/header/header-style-v2.php';

} elseif (ot_get_option( 'header_layout') == 'header-v3' ) {

	require get_template_directory() . '/inc/header/header-style-v3.php';

} elseif (ot_get_option( 'header_layout') == 'header-v4' ) {

	require get_template_directory() . '/inc/header/header-style-v4.php';

} else {

	require get_template_directory() . '/inc/header/deafult-header-style.php'; 

} ?>

<section id="content" class="site-content">