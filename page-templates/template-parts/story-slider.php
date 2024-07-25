<!--Story Slider Start -->
<section class="story-slider-section bg">
	<?php if (get_sub_field('blog_slider_marketing_logo') == 'yes') { ?>
		<div class="round-logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png">
		</div>
	<?php } ?>
	<div class="container">
		<div class="story-slider">
			<?php if (have_rows('sliderimage')) : ?>
				<?php while (have_rows('sliderimage')) : the_row(); ?>
					<div class="slide">
						<?php
						$read_more_button = get_sub_field('read_more_button');
						$read_more_link_url = $read_more_button['url'];
						$read_more_link_title  = $read_more_button['title'];
						$read_more_link_target = $read_more_button['target'] ? $read_more_button['target'] : '_self';
						?>
						<div class="row align-items-center">
							<div class="col-md-4">
								<div class="image">
									<img src="<?php the_sub_field('slider_image'); ?>" alt="<?php echo $read_more_link_title; ?>">
								</div>
							</div>
							<div class="col-md-8">
								<h3>“<?php the_sub_field('image_right_side_content'); ?>”</h3>
								<a href="<?php echo esc_url($read_more_link_url); ?>">
									<?php echo esc_html($read_more_link_title); ?>
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>


			<div class="slide">
				<div class="row align-items-center">
					<div class="col-md-4">
						<div class="image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/searchange.png">
						</div>
					</div>
					<div class="col-md-8">
						<h3> “Websites can be confusing. Bizink made it easy.”
						</h3>
						<a href="#">
							Read the Seachange story
						</a>
					</div>
				</div>
			</div>

			<div class="slide">
				<div class="row align-items-center">
					<div class="col-md-4">
						<div class="image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/searchange.png">
						</div>
					</div>
					<div class="col-md-8">
						<h3> “Websites can be confusing. Bizink made it easy.”
						</h3>
						<a href="#">
							Read the Seachange story
						</a>
					</div>
				</div>
			</div>

		</div>
</section>
<!-- -Story Slider END -->