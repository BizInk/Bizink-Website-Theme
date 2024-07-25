<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="row">

	<!-- Do the left sidebar check -->

	<main class="site-main" id="main">

		<?php
		while (have_posts()) {
			the_post(); ?>
			<section class="cta-section case-study-banner text-center bg" style="background-image: url(<?php if (get_field('featured_image')) : echo get_field('featured_image');
																										endif; ?>); background-repeat: no-repeat; background-size: cover;">
				<div class="container">
					<div class="default-content">
					</div>
				</div>
			</section>
			<section class="states-section text-center bg light-gray-bg">
				<div class="container">
					<div class="default-content text-center">
						<h4 class="title"><?php _e('SUCCESS STORIES','bizink'); ?></h4>
						<h2><?php echo get_field('firm_name'); ?></h2>
						<div class="row justify-content-center">
							<div class="col-lg-4">
								<div class="inner-wrap">
									<h2><?php echo get_field('location'); ?></h2>
									<?php echo get_field('city'); ?>
								</div>
							</div>
							<?php if (get_field('years_in_business')) { ?>
								<div class="col-lg-4">
									<div class="inner-wrap">
										<h2><?php echo get_field('years_in_business'); ?></h2>
										<?php _e('Years in business','bizink'); ?>
									</div>
								</div>
							<?php } ?>
							<?php if (get_field('numer_of_employees')) { ?>
								<div class="col-lg-4">
									<div class="inner-wrap">
										<h2><?php echo get_field('numer_of_employees'); ?></h2>
										<?php _e('Employees','bizink'); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<section class="two-column">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<?php if (get_field('description')) : ?>
								<?php echo get_field('description'); ?>
							<?php endif; ?>
						</div>
						<div class="col-lg-4">
							<div class="default-content">
								<div class="case-right-image">
									<?php if (get_field('featured_image')) { ?>
										<img src="<?php echo get_field('featured_image'); ?>">
									<?php } ?>
								</div>
								<?php if (get_field('case_stidies_right_description', 'option')) { ?>
									<div class="right-side-descriptiob">
										<?php echo get_field('case_stidies_right_description', 'option'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="story-nav-section light-gray-bg bg">
				<div class="container">
					<div class="story-nav-inner">
						<?php
						$prev_post = get_previous_post();
						$id = $prev_post->ID;
						$permalink_prev = get_permalink($id);
						$next_post = get_next_post();
						$nid = $next_post->ID;
						$permalink = get_permalink($nid);
						?>

						<?php if ($permalink_prev != get_the_permalink()) { ?><a href="<?php echo $permalink_prev; ?>" class="nav-left"><i class="fa fa-chevron-left"></i></a><?php } ?>
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<?php if ($permalink_prev != get_the_permalink()) { ?>
									<h2><?php previous_post_link('%link', __('<h2>Previous Website:</h2>', 'bizink')); ?></h2>
									<h3><a href="<?php echo $permalink_prev; ?>"><?php echo $prev_post->post_title; ?></a> </h3>
								<?php } ?>
							</div>
							<div class="col-lg-6 col-md-6">
								<?php if ($permalink != get_the_permalink()) { ?>
									<h2><?php next_post_link('%link', __('<h2>Next Website:</h2>', 'bizink')); ?></h2>
									<h3><a href="<?php echo $permalink; ?>"><?php echo $next_post->post_title; ?></a> </h3>
								<?php } ?>
							</div>
						</div>
						<?php if ($permalink != get_the_permalink()) { ?><a href="<?php echo $permalink; ?>" class="nav-right"><i class="fa fa-chevron-right"></i></a><?php } ?>
					</div>
				</div>
			</section>
			<style type="text/css">
				.story-nav-inner a {
					text-decoration: none;
				}
			</style>


			<?php
			$website2_select_background_color = get_field('website2_select_background_color', 'option');
			$website2_title_text = get_field('website2_title_text', 'option');
			$wwebsite2_big_text_after_title = get_field('wwebsite2_big_text_after_title', 'option');
			$website2_description = get_field('website2_description', 'option');
			$website2_button_linktext = get_field('website2_button_linktext', 'option');
			$website2_button_background_options = get_field('website2_button_background_options', 'option');


			$website2_cta_title_color = '';
			if (get_field('website2_cta_title_color', 'option') == 'purple') {
				$website2_cta_title_color = 'title-purple';
			} elseif (get_field('website2_cta_title_color', 'option') == 'white') {
				$website2_cta_title_color = 'title-white';
			}
			?>
			<section class="cta-section text-center bg <?php echo $website2_select_background_color; ?>">

				<div class="container">

					<div class="default-content">
						<?php if ($website2_title_text) { ?><h2 class="<?php echo $website2_cta_title_color; ?>"><?php echo $website2_title_text; ?></h2><?php } ?>
						<?php if ($wwebsite2_big_text_after_title) { ?><h3><?php echo $wwebsite2_big_text_after_title; ?></h3><?php } ?>
						<?php if ($website2_description) {
							echo $website2_description;
						} ?>
					</div>
					<?php if ($website2_button_linktext) { ?>
						<a href="<?php echo $website2_button_linktext['url']; ?>" target="<?php echo $website2_button_linktext['target']; ?>" class="btn <?php echo $website2_button_background_options; ?>"><?php echo $website2_button_linktext['title']; ?></a>
					<?php } ?>
				</div>
			</section>


		<?php	}
		?>

	</main><!-- #main -->

	<!-- Do the right sidebar check -->


</div><!-- .row -->




<?php
get_footer();
