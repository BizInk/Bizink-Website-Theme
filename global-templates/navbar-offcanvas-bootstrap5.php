<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="header-top">
	<div class="container">
		<?php
		if ( has_nav_menu( 'my-account-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'my-account-menu',
					'container_class' => 'my-account-menu',
					'menu_class'      => 'my-account',
				)
			);
		} else {
			?>
				<div class="my-account">
					<a href="/marketing-content-home" style="margin-right: 20px;"><?php _e('CONTENT PACK','bizink'); ?></a>
					<a href="/my-account"><?php _e('MY ACCOUNT','bizink'); ?></a>
				</div>
			<?php
		}
		?>
		
	</div>
</div>

<nav id="main-nav" class="navbar navbar-expand-lg" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>
	<div class="<?php echo esc_attr( $container ); ?>">

		<!-- Your site title as branding in the menu -->
		<?php if ( ! has_custom_logo() ) { ?>

			<?php if ( is_front_page() && is_home() ) : ?>

				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

			<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

			<?php endif; ?>

			<?php
		} else {
			the_custom_logo();
		}
		?>
		<!-- end custom logo -->

		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNavOffcanvas">

			<div class="offcanvas-header justify-content-end">
				<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div><!-- .offcancas-header -->

			<!-- The WordPress Menu goes here -->
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container_class' => 'offcanvas-body',
					'container_id'    => '',
					'menu_class'      => 'navbar-nav justify-content-end flex-grow-1',
					'fallback_cb'     => '',
					'menu_id'         => 'main-menu',
					'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
				)
			);
			?>
		</div><!-- .offcanvas -->

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
