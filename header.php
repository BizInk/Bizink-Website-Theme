<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$bootstrap_version = get_theme_mod( 'understrap_bootstrap_version', 'bootstrap5' );
$navbar_type       = get_theme_mod( 'understrap_navbar_type', 'offcanvas' ); // USE offcanvas
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="dns-prefetch" href="//js.hsforms.net" />
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link rel="dns-prefetch" href="//www.google-analytics.com" />
	<link rel="dns-prefetch" href="//static.hsappstatic.net" />
	<link rel="dns-prefetch" href="//meetings.bizinkonline.com" />
	<link rel="dns-prefetch" href="//s3-us-west-2.amazonaws.com" />
	<link rel="dns-prefetch" href="//www.googletagmanager.com" />
	<link rel="prefetch" href="https://js.hsforms.net/forms/embed/v2.js?ver=11.1.75" />
	<link rel="prefetch" href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" />
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
		var homeurl = '<?php echo home_url( '/' ); ?>';
		var styleurl = '<?php echo get_stylesheet_directory_uri(); ?>';
	</script>
	<?php 
	wp_head();
	if(function_exists('get_field')): echo get_field('header_scripts', 'option') ?: ''; endif;
	?>
</head>
<body <?php body_class(); understrap_body_attributes(); ?>>
	<?php
	do_action( 'wp_body_open' );
	if(function_exists('get_field')){
		echo get_field('before_page_scripts', 'option') ?: '';
	}
	?>
	<div class="site" id="page">
		<!-- ******************* The Navbar Area ******************* -->
		<header id="wrapper-navbar">
			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
			<?php get_template_part( 'global-templates/navbar', 'offcanvas-' . $bootstrap_version ); ?>
		</header><!-- #wrapper-navbar end -->
