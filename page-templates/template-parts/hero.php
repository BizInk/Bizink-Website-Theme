<?php
?>

<!-- Conditions: hero-section, hero-section-style2, hero-section-style3, hero-section-style4, dark-text, white-text -->
<!-- Buttons: navyblue-btn, yellow-btn, lightblue-btn, purple-btn -->

<!-- Hero Section START -->

<?php if (have_rows('hero_slider')) : ?>
	<section class="hero-slider">
		<?php while (have_rows('hero_slider')) : the_row();
			$heroclass = '';
			if (get_sub_field('slider_type') == 'hero section') {
				$heroclass = 'hero-section';
			} elseif (get_sub_field('slider_type') == 'hero style2') {
				$heroclass = 'hero-section hero-section-style2 dark-text';
			} elseif (get_sub_field('slider_type') == 'white text') {
				$heroclass = 'hero-section hero-section-style2 white-text';
			} elseif (get_sub_field('slider_type') == 'dark text') {
				$heroclass = 'hero-section hero-section-style2 dark-text';
			} elseif (get_sub_field('slider_type') == 'hero section style3') {
				$heroclass = 'hero-section hero-section-style3 dark-text';
			} elseif (get_sub_field('slider_type') == 'hero section style4') {
				$heroclass = 'hero-section hero-section-style4';
			} elseif (get_sub_field('slider_type') == 'no slider') {
				$heroclass = 'hero-section bg';
			}
			$slider_overlay_color = "";
			if (get_sub_field('slider_overlay_color') == 'whiteverlay') {
				$slider_overlay_color = 'white-overlay';
			} elseif (get_sub_field('slider_overlay_color') == 'darkoverlay') {
				$slider_overlay_color = 'dark-overlay';
			} elseif (get_sub_field('slider_overlay_color') == 'nooverlay') {
				$slider_overlay_color = '';
			}
		?>

			<div class="<?php echo $heroclass; ?> <?php echo $slider_overlay_color; ?>" <?php if (get_sub_field('background_color_or_image') == 'color') { ?> style="background-color: <?php echo the_sub_field('select_background_color'); ?>;" <?php	} elseif (get_sub_field('background_color_or_image') == 'image') { ?> style="background-image: url(<?php echo the_sub_field('select_background_image'); ?>);" .. <?php } ?>>
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<?php if (get_sub_field('title')) { ?>
								<?php
								$button_blue_class = '';
								if (get_sub_field('set_title_color_lightblue')[0] == 'Yes') {
									$button_blue_class =  'lightblue2';
								} ?>
								<h2 class="<?php echo $button_blue_class; ?>"><?php the_sub_field('title') ?></h2>
							<?php } ?>
							<?php if (get_sub_field('description')) { ?>
								<div class="default-content">
									<h3><?php the_sub_field('description') ?></h3>
								</div>
							<?php } ?>
							<?php
							$link = get_sub_field('button');
							$button_link_url = $link['url'];
							$button_link_title = $link['title'];
							$button_link_target = $link['target'] ? $link['target'] : '_self';
							?>
							<?php
							$button_color = '';
							if (get_sub_field('button_style') == 'navyblue') {
								$button_color = 'navyblue-btn';
							} elseif (get_sub_field('button_style') == 'lightblue') {
								$button_color = 'lightblue-btn';
							} elseif (get_sub_field('button_style') == 'purple') {
								$button_color = 'purple-btn';
							} elseif (get_sub_field('button_style') == 'yellow') {
								$button_color = 'yellow-btn';
							}
							$button_popup = get_sub_field('button_href') ? get_sub_field('button_href') : 'link';

							if($button_popup == 'modal'){
								?>
								<a href="#" class="talk-to-us btn <?php echo $button_color; ?>"><?php _e('Book A Demo','bizink'); ?></a>
								<?php
							}
							else{
								?>
								<a href="<?php echo esc_url($button_link_url); ?>" class="btn <?php echo $button_color; ?>"><?php echo esc_html($button_link_title ? $button_link_title : __('Book A Meeting','bizink')); ?></a>
								<?php
							}

							if (have_rows('tags')) : ?>
								<ul class="tags">
									<?php while (have_rows('tags')) : the_row();
										$image = get_sub_field('image');
									?>
										<li>
											<a href="<?php the_sub_field('tag_url'); ?>"></a>
											<h6><?php the_sub_field('tag_title'); ?></h6>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="col-lg-6">
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</section>