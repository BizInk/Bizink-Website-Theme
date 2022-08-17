<?php
?>

<section class="services-section bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php if(get_sub_field('service_main_title')){ ?>
					<h2 class="text-center"><?php the_sub_field('service_main_title') ?></h2>
			  <?php	} ?>
			</div>
		</div>
		<div class="services-inner">
			<div class="row">
				<?php if( have_rows('services') ): ?>
					<?php while( have_rows('services') ): the_row(); ?>
							<div class="col-lg-4 col-md-4 mb-5 mb-md-0">
								<?php if(get_sub_field('service_image')){ ?>
								 		<img src="<?php the_sub_field('service_image'); ?>">
								 <?php } ?>
								<?php if(get_sub_field('service_title')){ ?>
									<h3><?php the_sub_field('service_title') ?></h3>
								 <?php	} ?>

								 <?php if(get_sub_field('service_description')){ ?>
									<div class="default-content">
									<p><?php the_sub_field('service_description') ?></p>
								</div>
								<?php	} ?>
								<?php 
									$service_link = get_sub_field('button');
										if( $service_link ): 
											    $service_link_url = $service_link['url'];
											    $service_link_title = $service_link['title'];
											    $service_link_target = $service_link['target'] ? $service_link['target'] : '_self';
											    $service_button_color = '';
												if( get_sub_field('service_button_style') == 'navyblue' ) { 
													$service_button_color = 'navyblue-btn';
												} elseif (get_sub_field('service_button_style') == 'lightblue') {
													$service_button_color = 'lightblue-btn';
												} elseif (get_sub_field('service_button_style') == 'purple') {
													$service_button_color = 'purple-btn';
												} elseif (get_sub_field('service_button_style') == 'yellow') {
													$service_button_color = 'yellow-btn';

										}
										    ?>
    									    <a href="<?php echo esc_url($service_link_url); ?>" class="btn <?php echo $service_button_color; ?>"><?php echo esc_html( $service_link_title ); ?></a>
									<?php endif; ?>
					<!-- Buttons: navyblue-btn, yellow-btn, lightblue-btn, purple-btn -->
						
					</div>
						<?php endwhile; ?>
					<?php endif; ?>
				
			</div>
		</div>
</section>