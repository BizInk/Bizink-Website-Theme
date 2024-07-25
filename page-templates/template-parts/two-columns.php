<?php if (have_rows('column_components')) :
	while (have_rows('column_components')) : the_row();
		$column_image = '';
		if (get_sub_field('image_position') == 'right') {
			$column_image = 'right-image';
		} elseif (get_sub_field('image_position') == 'left') {
			$column_image = 'bg';
		}


		$two_column_background_color = '';
		if (get_sub_field('two_column_background_color') == 'grey') {
			$two_column_background_color = 'bg';
		} elseif (get_sub_field('two_column_background_color') == 'white') {
			$two_column_background_color = 'bg white-bg ';
		}
?>

		<section class="two-column <?php echo $column_image; ?> <?php echo $two_column_background_color; ?>">
			<div class="container">
				<div class="row align-items-center">


					<div class="col-lg-6">
						<?php if (get_sub_field('column_image')) { ?>
							<div class="image">
								<img src="<?php the_sub_field('column_image'); ?>" alt="<?php get_sub_field('column_title'); ?>">
							</div>
						<?php } ?>
					</div>
					<div class="col-lg-6">
						<div class="web-content-list default-content">
							<?php if (get_sub_field('column_title')) {  ?>
								<h2><?php the_sub_field('column_title');  ?></h2>
							<?php } 
							if (get_sub_field('long_description')) { ?>
								<p><?php the_sub_field('long_description'); ?></p>
							<?php } 
							if (have_rows('column_description')) : ?>
								<ul>
									<?php while (have_rows('column_description')) : the_row(); ?>
										<li><?php the_sub_field('description'); ?></li>
									<?php endwhile; ?>
								</ul>
							<?php endif;

							$column_button_style = '';
							if (get_sub_field('column_button_style') == 'navyblue') {
								$column_button_style = 'navyblue-btn';
							} elseif (get_sub_field('column_button_style') == 'lightblue') {
								$column_button_style = 'lightblue-btn';
							} elseif (get_sub_field('column_button_style') == 'purple') {
								$column_button_style = 'purple-btn';
							} elseif (get_sub_field('column_button_style') == 'yellow') {
								$column_button_style = 'yellow-btn';
							}
							$two_column_button = get_sub_field('two_column_button');
							if ($two_column_button) :
								$two_link_url = $two_column_button['url'];
								$two_link_title = $two_column_button['title'];
								$two_link_target = $two_column_button['target'] ? $two_column_button['target'] : '_self';
							?>
								<a href="<?php echo esc_url($two_link_url); ?>" target="<?php echo esc_attr($two_link_target); ?>" class="btn <?php echo $column_button_style; ?> mt-4"><?php echo esc_html($two_link_title); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile;
endif; ?>