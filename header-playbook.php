<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap5');
$navbar_type       = get_theme_mod('understrap_navbar_type', 'offcanvas');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body
	<?php
	body_class();
	understrap_body_attributes();
	?>>
	<?php do_action('wp_body_open'); ?>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<header id="wrapper-navbar">
			<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e('Skip to content', 'understrap'); ?></a>
			<div class="container">
				<div class="playbook-header-wrap">
					<div class="header-logo-wrap">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bizink-logo.png" class="img-fluid" alt="BizinkLogo">
					</div>
					<div class="header-btn-group">
						<a href="https://scorecard.bizinkonline.com/marketing-performance-audit" target="_blank" class="btn navyblue-btn"><?php _e('Rank your performance', 'bizink'); ?></a>
						<a href="https://bizinkonline.com/" class="btn navyblue-btn"><?php _e('Visit Bizink', 'bizink'); ?></a>
					</div>
				</div>
			</div>

		</header><!-- #wrapper-navbar end -->