<?php if( have_rows('add_stats_section') ): ?>    
    <?php while( have_rows('add_stats_section') ): the_row(); ?>
	<?php
		$feature_background_color = '';
			if( get_sub_field('feature_background_color') == 'navyblue' ) { 
				$feature_background_color = 'navyblue-bg';
				} elseif (get_sub_field('feature_background_color') == 'lightblue') {
					$feature_background_color = 'lightblue-bg';
				} elseif (get_sub_field('feature_background_color') == 'purple') {
					$feature_background_color = 'purple-bg';
				} elseif (get_sub_field('feature_background_color') == 'yellow') {
					$feature_background_color = 'yellow-bg';
				} elseif (get_sub_field('feature_background_color') == 'gray') {
					$feature_background_color = 'gray-bg';
				} elseif (get_sub_field('feature_background_color') == 'light gray') {
					$feature_background_color = 'light-gray-bg';
				} elseif (get_sub_field('feature_background_color') == 'lightblue2') {
					$feature_background_color = 'lightblue2-bg';
				} elseif (get_sub_field('feature_background_color') == 'darkpurple') {
					$feature_background_color = 'darkpurple-bg';
			} 
			$white_text = '';
			//echo get_sub_field('font_color');
			if( get_sub_field('font_color') == 'white_text' ){
				$white_text = 'white-text';
			}

		?>
		<section class="states-section text-center bg <?php echo $feature_background_color.' '.$white_text; ?>">
			<?php if(get_sub_field('show_marketing_logo_on_right_side_of_section') == 'yes' ){ ?>
			<div class="round-logo">
				<img src="https://bizinkonline.betatesting87.com/wp-content/themes/understrap-child-main/images/bzik.png">
			</div>
			<?php } ?>
			<div class="container">
				<div class="default-content">
					<?php if(get_sub_field('top_title')) { ?><h2 class="title"><?php echo get_sub_field('top_title'); ?></h2><?php } ?>
					<?php if(get_sub_field('main_title')) { ?><h2><?php echo get_sub_field('main_title'); ?></h2><?php } ?>
						<div class="row justify-content-center">
						<?php if( have_rows('add_block') ): ?>							
								<?php while( have_rows('add_block') ): the_row(); 
									$number = get_sub_field('number');
									$symbol = get_sub_field('symbol');
									$description = get_sub_field('description');
									?>
									<div class="col-lg-4 mb-4">
										<div class="inner-wrap">
											<?php 
											if(get_sub_field('show_symbol_on_left')[0] == 'Yes'){
												if($number){ ?>
													<h2><?php if($symbol){ ?><span><?php echo $symbol; ?></span><?php } ?><?php echo $number; ?></h2>
												<?php } 
											} else {
												if($number){ ?>
													<h2><?php echo $number; ?><?php if($symbol){ ?><span><?php echo $symbol; ?></span><?php } ?></h2>
												<?php } 
											}?>
											<?php echo $description; ?>
										</div>
									</div>
								<?php endwhile; ?>
								
							<?php endif; ?>
						</div>
				</div>
			</div>
		</section>
    <?php endwhile; ?>    
<?php endif; ?>