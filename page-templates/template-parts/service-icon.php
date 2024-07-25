<?php
$background_color = get_sub_field('background_color');
?>

<section class="service-icon-section extra-padding <?php echo $background_color; ?>">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="default-content text-center">
					<?php if (get_sub_field('icon_section_title')) { ?>
						<h2><?php the_sub_field('icon_section_title'); ?></h2>
					<?php } ?>
					<div class="">
						<?php if (get_sub_field('maiun_icon_description')) { ?>
							<h3><?php the_sub_field('maiun_icon_description'); ?></h3>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		<div class="icons-inner">
			<div class="row justify-content-center text-center">
				<?php $per_row_list = get_sub_field('icon_number');
				if (have_rows('icon_section')) : ?>
					<?php while (have_rows('icon_section')): the_row(); ?>
						<div class="col-lg-2 col-md-4 col-xs-6 col-6">
							<?php 
							$icon_link = get_sub_field('icon_title');
							if ($icon_link) :
								$link_url = $icon_link['url'];
								$link_title = $icon_link['title'];
								$link_target = $icon_link['target'] ? $icon_link['target'] : '_self';
							endif;
							?>
							<a href="<?php echo esc_url($link_url); ?>">
								<div class="icon">
									<img src="<?php the_sub_field('icon_image'); ?>" alt="<?php echo esc_html($link_title); ?>">
								</div>
								<h4><?php echo esc_html($link_title); ?></h4>
								<?php if (get_sub_field('icon_description')) { ?><p><?php the_sub_field('icon_description'); ?></p><?php } ?>
							</a>
							<?php  ?>
						</div>

					<?php
					endwhile;
				endif; ?>
			</div>
		</div>
	</div>
</section>