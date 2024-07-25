<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="row">

	<!-- Do the left sidebar check -->

	<main class="site-main" id="main">

		<?php
		while ( have_posts() ) {
			the_post();
			$title_text                = get_field( 'website_title_text', 'option' );
			$big_text_after_title      = get_field( 'website_title_text_copy', 'option' );
			$description               = get_field( 'website_description', 'option' );
			$button_link_text          = get_field( 'website_button_linktext', 'option' );
			$button_background_options = get_field( 'website_button_background_options', 'option' );

			$background_color = '';
			if ( get_field( 'website_select_background_color', 'option' ) == 'navyblue-bg' ) {
				$background_color = 'navyblue-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'yellow-bg' ) {
				$background_color = 'yellow-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'lightblue-bg' ) {
				$background_color = 'lightblue-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'purple-bg' ) {
				$background_color = 'purple-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'light-gray-bg' ) {
				$background_color = 'light-gray-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'lightblue2-bg' ) {
				$background_color = 'lightblue2-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'white' ) {
				$background_color = 'white-bg';
			} elseif ( get_field( 'website_select_background_color', 'option' ) == 'darkpurple' ) {
				$background_color = 'darkpurple-bg';
			}
			?>
			<section class="cta-section text-center bg <?php echo $background_color; ?>">

				<div class="container">
					<div class="default-content">
						<?php
						if ( $title_text ) {
							?>
							<h2 class="<?php echo $cta_main_title_color; ?>"><?php echo $title_text; ?></h2><?php } ?>
						<?php
						if ( $big_text_after_title ) {
							?>
							<h3><?php echo $big_text_after_title; ?></h3><?php } ?>
						<?php
						if ( $description ) {
							echo $description;
						}
						?>
					</div>
					<?php if ( $button_link_text ) { ?>
						<a href="<?php echo $button_link_text['url']; ?>" target="<?php echo $button_link_text['target']; ?>" class="btn <?php echo $button_background_options; ?>"><?php echo $button_link_text['title']; ?></a>
					<?php } ?>
				</div>
			</section>
			<section class="two-column">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="image">
								<img src="<?php the_field( 'featured_image' ); ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="default-content">
								<h2><?php the_title(); ?></h2>
								<ul>
									<?php
									if ( get_field( 'website_url' ) ) {
										?>
										<li><b><?php _e( 'Website URL', 'bizink' ); ?> :</b> <a href="<?php the_field( 'website_url' ); ?>"><?php the_field( 'website_url' ); ?></a></li><?php } ?>
									<?php
									if ( get_field( 'location' ) ) {
										?>
										<li><b><?php _e( 'Location', 'bizink' ); ?>:</b> <?php the_field( 'location' ); ?></li><?php } ?>
									<?php
									if ( get_field( 'theme' ) ) {
										?>
										<li><b><?php _e( 'Theme', 'bizink' ); ?>:</b> <?php the_field( 'theme' ); ?></li><?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="story-nav-section light-gray-bg bg">
				<div class="round-logo">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png" alt="logo">
				</div>
				<div class="container">
					<div class="story-nav-inner">
						<?php
						$prev_post      = get_previous_post();
						$id             = $prev_post->ID;
						$permalink_prev = get_permalink( $id );
						$next_post      = get_next_post();
						$nid            = $next_post->ID;
						$permalink      = get_permalink( $nid );
						?>

						<?php
						if ( $permalink_prev != get_the_permalink() ) {
							?>
							<a href="<?php echo $permalink_prev; ?>" class="nav-left"><i class="fa fa-chevron-left"></i></a><?php } ?>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<?php if ( $permalink_prev != get_the_permalink() ) { ?>
									<h2><?php previous_post_link( '%link', __( '<h2>Previous Website:</h2>', 'twentyeleven' ) ); ?></h2>
									<h3><a href="<?php echo $permalink_prev; ?>"><?php echo $prev_post->post_title; ?></a> </h3>
								<?php } ?>
							</div>
							<div class="col-lg-6 col-md-6">
								<?php if ( $permalink != get_the_permalink() ) { ?>
									<h2><?php next_post_link( '%link', __( '<h2>Next Website:</h2>', 'twentyeleven' ) ); ?></h2>
									<h3><a href="<?php echo $permalink; ?>"><?php echo $next_post->post_title; ?></a> </h3>
								<?php } ?>
							</div>
						</div>
						<?php
						if ( $permalink != get_the_permalink() ) {
							?>
							<a href="<?php echo $permalink; ?>" class="nav-right"><i class="fa fa-chevron-right"></i></a><?php } ?>
					</div>
				</div>
			</section>
			<style type="text/css">
				.story-nav-inner a {
					text-decoration: none;
				}
			</style>


			<?php
			// $website2_select_background_color = get_field('website2_select_background_color','option');
			$website2_title_text                = get_field( 'website2_title_text', 'option' );
			$wwebsite2_big_text_after_title     = get_field( 'wwebsite2_big_text_after_title', 'option' );
			$website2_description               = get_field( 'website2_description', 'option' );
			$website2_button_linktext           = get_field( 'website2_button_linktext', 'option' );
			$website2_button_background_options = get_field( 'website2_button_background_options', 'option' );


			$website2_select_background_color = '';
			if ( get_field( 'website2_select_background_color', 'option' ) == 'navyblue-bg' ) {
				$background_color = 'navyblue-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'yellow-bg' ) {
				$website2_select_background_color = 'yellow-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'lightblue-bg' ) {
				$website2_select_background_color = 'lightblue-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'purple-bg' ) {
				$website2_select_background_color = 'purple-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'light-gray-bg' ) {
				$website2_select_background_color = 'light-gray-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'lightblue2-bg' ) {
				$website2_select_background_color = 'lightblue2-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'white' ) {
				$website2_select_background_color = 'white-bg';
			} elseif ( get_field( 'website2_select_background_color', 'option' ) == 'darkpurple' ) {
				$website2_select_background_color = 'darkpurple-bg';
			}


			$website2_cta_title_color = '';
			if ( get_field( 'website2_cta_title_color', 'option' ) == 'purple' ) {
				$website2_cta_title_color = 'title-purple';
			} elseif ( get_field( 'website2_cta_title_color', 'option' ) == 'white' ) {
				$website2_cta_title_color = 'title-white';
			}
			?>
			<section class="cta-section text-center bg <?php echo $website2_select_background_color; ?>">

				<div class="container">

					<div class="default-content">
						<?php
						if ( $website2_title_text ) {
							?>
							<h2 class="<?php echo $website2_cta_title_color; ?>"><?php echo $website2_title_text; ?></h2><?php } ?>
						<?php
						if ( $wwebsite2_big_text_after_title ) {
							?>
							<h3><?php echo $wwebsite2_big_text_after_title; ?></h3><?php } ?>
						<?php
						if ( $website2_description ) {
							echo $website2_description;
						}
						?>
					</div>
					<?php if ( $website2_button_linktext ) { ?>
						<a href="<?php echo $website2_button_linktext['url']; ?>" target="<?php echo $website2_button_linktext['target']; ?>" class="btn <?php echo $website2_button_background_options; ?>"><?php echo $website2_button_linktext['title']; ?></a>
					<?php } ?>
				</div>
			</section>


			<?php
		}
		?>

	</main><!-- #main -->

	<!-- Do the right sidebar check -->


</div><!-- .row -->
<?php
get_footer();
