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
			the_post();
			$url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>


			<section class="cta-section text-center bg" style="background-image: url(<?php if ($url) {
																							echo $url;
																						} else {
																							echo get_template_directory_uri() . "/images/full-img.jpg";
																						}  ?>); background-repeat: no-repeat; background-size: cover;">
				<div class="container">
					<div class="default-content">
					</div>
				</div>
			</section>
			<section class="states-section text-center bg light-gray-bg">
				<div class="container">
					<div class="default-content text-center">
						<h4 class="title"><?php _e('SUCCESS STORIES', 'bizink'); ?></h4>
						<h2><?php echo get_the_title(); ?></h2>
						<div class="row justify-content-center">
							<div class="col-lg-4">
								<div class="inner-wrap">
									<h2><?php echo get_field('post_location'); ?></h2>
									<?php echo get_field('post_city'); ?>
								</div>
							</div>
							<?php if (get_field('post_years_in_business')) { ?>
								<div class="col-lg-4">
									<div class="inner-wrap">
										<h2><?php echo get_field('post_years_in_business'); ?></h2>
										<?php _e('Years in business', 'bizink'); ?>
									</div>
								</div>
							<?php } ?>
							<?php if (get_field('post_numer_of_employees')) { ?>
								<div class="col-lg-4">
									<div class="inner-wrap">
										<h2><?php echo get_field('post_numer_of_employees'); ?></h2>
										<?php _e('Employees', 'bizink'); ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</section>
			<section class="two-column bolg-posting">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<?php  ?>
							<?php echo get_the_content(); ?>
						</div>
						<div class="col-lg-4">
							<div class="default-content-post">
								<?php
								if (get_field('single_page_right_side_logo')) { ?>
									<img src="<?php the_field('single_page_right_side_logo'); ?>">
								<?php }
								?>
								<h3><?php _e('Related Tags', 'bizink'); ?></h3>
								<div class="blog-grid-section">
									<?php
									$post_tags = get_the_tags(); ?>
									<ul class="tags">
										<?php if ($post_tags) {
											foreach ($post_tags as $tag) { ?>

												<li>
													<a href="#">
														<h6><?php echo $tag->name;  ?></h6>
													</a>
												</li>

										<?php }
										} ?>
									</ul>
								</div>

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
									<h2><?php previous_post_link('%link', __('<h2>Previous Website:</h2>', 'twentyeleven')); ?></h2>
									<h3><a href="<?php echo $permalink_prev; ?>"><?php echo $prev_post->post_title; ?></a> </h3>
								<?php } ?>
							</div>
							<div class="col-lg-6 col-md-6">
								<?php if ($permalink != get_the_permalink()) { ?>
									<h2><?php next_post_link('%link', __('<h2>Next Website:</h2>', 'twentyeleven')); ?></h2>
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
			$post_title_text = get_field('post_title_text', 'option');
			$post_big_text_after_title = get_field('post_big_text_after_title', 'option');
			$post_description = get_field('post_description', 'option');
			$post_button_linktext = get_field('post_button_linktext', 'option');
			$post_button_background_options = get_field('post_button_background_options', 'option');
			$post_select_background_color = '';
			if (get_field('post_select_background_color', 'option') == 'navyblue-bg') {
				$post_select_background_color = 'navyblue-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'yellow-bg') {
				$post_select_background_color = 'yellow-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'lightblue-bg') {
				$post_select_background_color = 'lightblue-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'purple-bg') {
				$post_select_background_color = 'purple-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'light-gray-bg') {
				$post_select_background_color = 'light-gray-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'lightblue2-bg') {
				$post_select_background_color = 'lightblue2-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'white') {
				$post_select_background_color = 'white-bg';
			} elseif (get_field('post_select_background_color', 'option') == 'darkpurple') {
				$post_select_background_color = 'darkpurple-bg';
			}

			$post_title_color = '';
			if (get_field('post_title_color', 'option') == 'purple') {
				$post_title_color = 'title-purple';
			} elseif (get_field('website2_cta_title_color', 'option') == 'white') {
				$post_title_color = 'title-white';
			}
			?>
			<section class="cta-section text-center bg <?php echo $post_select_background_color; ?>">

				<div class="container">

					<div class="default-content">
						<?php if ($post_title_text) { ?><h2 class="<?php echo $post_title_color; ?>"><?php echo $post_title_text; ?></h2><?php } ?>
						<?php if ($post_big_text_after_title) { ?><h3><?php echo $post_big_text_after_title; ?></h3><?php } ?>
						<?php if ($post_description) {
							echo $post_description;
						} ?>
					</div>
					<?php if ($post_button_linktext) { ?>
						<a href="<?php echo $post_button_linktext['url']; ?>" target="<?php echo $post_button_linktext['target']; ?>" class="btn <?php echo $post_button_background_options; ?>"><?php echo $post_button_linktext['title']; ?></a>
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
