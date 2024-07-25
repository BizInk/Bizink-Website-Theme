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
			// get_template_part( 'loop-templates/content', 'single' );
			// understrap_post_nav();
			?>

			<section class="webinar-banner">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center content">
							<h2><?php the_title(); ?></h2>
							<?php
							$terms = get_the_terms( $post->ID, 'topics' );
							if ( ! empty( $terms ) ) {
								// get the first term
								$term = array_shift( $terms );
								echo '<p>' . $term->name . '</p>';
							}
							?>

							<p><?php the_field( 'date' ); ?></p>
						</div>
					</div>
				</div>
			</section>

			<section class="webinar-content">
				<div class="container">
					<div class="row">
						<div class="col-12 content">
							<?php if ( get_field( 'featured_image' ) ) { ?>
								<div class="inner-img">
									<img src="<?php the_field( 'featured_image' ); ?>">
								</div>
							<?php } ?>
							<?php
							if ( have_rows( 'website_content' ) ) :
								while ( have_rows( 'website_content' ) ) :
									the_row();
									if ( get_row_layout() == 'main_content' ) :
										?>
										<?php echo get_sub_field( 'content' ); ?>

										<?php
									endif;
								endwhile;
							endif;


							?>
						</div>
					</div>
				</div>
			</section>

			<section class="story-nav-section light-gray-bg bg">
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
			$webinar_select_background_color   = get_field( 'webinar_select_background_color', 'option' );
			$webinar_title_text                = get_field( 'webinar_title_text', 'option' );
			$webinar_big_text_after_title      = get_field( 'webinar_big_text_after_title', 'option' );
			$webinar_description               = get_field( 'webinar_description', 'option' );
			$webinar_button_linktext           = get_field( 'webinar_button_linktext', 'option' );
			$webinar_button_background_options = get_field( 'webinar_button_background_options', 'option' );
			$webinar_select_background_color   = '';
			if ( get_field( 'webinar_select_background_color', 'option' ) == 'navyblue-bg' ) {
				$webinar_select_background_color = 'navyblue-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'yellow-bg' ) {
				$webinar_select_background_color = 'yellow-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'lightblue-bg' ) {
				$webinar_select_background_color = 'lightblue-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'purple-bg' ) {
				$webinar_select_background_color = 'purple-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'light-gray-bg' ) {
				$webinar_select_background_color = 'light-gray-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'lightblue2-bg' ) {
				$website2_select_background_color = 'lightblue2-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'white' ) {
				$webinar_select_background_color = 'white-bg';
			} elseif ( get_field( 'webinar_select_background_color', 'option' ) == 'darkpurple' ) {
				$webinar_select_background_color = 'darkpurple-bg';
			}

			$webinar_title_color = '';
			if ( get_field( 'webinar_title_color', 'option' ) == 'purple' ) {
				$webinar_title_color = 'title-purple';
			} elseif ( get_field( 'webinar_title_color', 'option' ) == 'white' ) {
				$webinar_title_color = 'title-white';
			}
			?>
			<section class="cta-section text-center bg <?php echo $webinar_select_background_color; ?>">

				<div class="container">

					<div class="default-content">
						<?php
						if ( $webinar_title_text ) {
							?>
							<h2 class="<?php echo $webinar_title_color; ?>"><?php echo $webinar_title_text; ?></h2><?php } ?>
						<?php
						if ( $webinar_big_text_after_title ) {
							?>
							<h3><?php echo $webinar_big_text_after_title; ?></h3><?php } ?>
						<?php
						if ( $webinar_description ) {
							echo $webinar_description;
						}
						?>
					</div>
					<?php if ( $webinar_button_linktext ) { ?>
						<a href="<?php echo $webinar_button_linktext['url']; ?>" target="<?php echo $webinar_button_linktext['target']; ?>" class="btn <?php echo $webinar_button_background_options; ?>"><?php echo $webinar_button_linktext['title']; ?></a>
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
