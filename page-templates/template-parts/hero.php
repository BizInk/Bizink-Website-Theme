<?php
?>

<!-- Conditions: hero-section, hero-section-style2, hero-section-style3, hero-section-style4, dark-text, white-text -->
<!-- Buttons: navyblue-btn, yellow-btn, lightblue-btn, purple-btn -->

<!-- Hero Section START -->

<?php //if( have_rows('page_flexible_content') ): ?>
	<?php //while( have_rows('page_flexible_content') ): the_row(); ?>
		<?php //if( get_row_layout() == 'hero_section' ): ?>
			<?php if( have_rows('hero_slider') ): ?>
				<section class="hero-slider">
				<?php while( have_rows('hero_slider') ): the_row(); 
					$heroclass = '';
					if( get_sub_field('slider_type') == 'hero section' ) {
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
					if(get_sub_field('slider_overlay_color') == 'whiteverlay'){
    							$slider_overlay_color = 'white-overlay';
					} elseif(get_sub_field('slider_overlay_color') == 'darkoverlay'){
								$slider_overlay_color = 'dark-overlay';
					} elseif (get_sub_field('slider_overlay_color') == 'nooverlay') {
						        $slider_overlay_color = '';
					}			
					?>

					<div class="<?php echo $heroclass; ?> <?php echo $slider_overlay_color; ?>" <?php if( get_sub_field('background_color_or_image') == 'color' ) { ?>
						style="background-color: <?php echo the_sub_field('select_background_color'); ?>;"
					<?php	} elseif(get_sub_field('background_color_or_image') == 'image') { ?>
						style="background-image: url(<?php echo the_sub_field('select_background_image'); ?>);"..
						<?php } ?>>
						<div class="container">
							<div class="row">
								<div class="col-lg-6">
									<?php if(get_sub_field('title')) { ?>
										<?php 
										$button_blue_class = '';
										if( get_sub_field('set_title_color_lightblue')[0] == 'Yes' ) {
											$button_blue_class =  'lightblue2';
										} ?>
										<h2 class="<?php echo $button_blue_class; ?>"><?php the_sub_field('title') ?></h2>
									<?php } ?>
									<?php if(get_sub_field('description')) { ?>
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
										if( get_sub_field('button_style') == 'navyblue' ) { 
											$button_color = 'navyblue-btn';
										} elseif (get_sub_field('button_style') == 'lightblue') {
											$button_color = 'lightblue-btn';
										} elseif (get_sub_field('button_style') == 'purple') {
											$button_color = 'purple-btn';
										} elseif (get_sub_field('button_style') == 'yellow') {
											$button_color = 'yellow-btn';

										}
									?>
									<?php if($button_link_title) { ?>
									<a href="<?php echo esc_url( $button_link_url ); ?>" class="btn <?php echo $button_color; ?>"><?php echo esc_html( $button_link_title ); ?></a>
								<?php } ?>
									<?php if( have_rows('tags') ): ?>
										<ul class="tags">
											<?php while( have_rows('tags') ): the_row(); 
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
		<?php //elseif( get_row_layout() == 'service_icon_sections' ): 
			//$image = get_sub_field('image');
			?>
			<?php //endif; ?>
		<?php //endwhile; ?>
	<?php //endif; ?>

<!-- <section class="hero-slider">
	<div class="hero-section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/hero.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h2 class="lightblue2">Accountants, do what you do best and leave the rest to us</h2>
					<div class="default-content">
						<h3>Marketing for busy accountants and bookkeepers like Trevor here from Accounting hub.</h3>
					</div>
					<a href="#" class="btn navyblue-btn">GET STARTED</a>
					<ul class="tags">
						<li>
							<a href="#"></a>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
				<div class="col-lg-6"></div>
			</div>
		</div>
	</div>

	<div class="hero-section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/hero.png);">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h2 class="lightblue2">Accountants, do what you do best and leave the rest to us</h2>
					<div class="default-content">
						<h3>Marketing for busy accountants and bookkeepers like Trevor here from Accounting hub.</h3>
					</div>
					<a href="#" class="btn navyblue-btn">GET STARTED</a>
					<ul class="tags">
						<li>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Hero Section END -->

<!-- Hero Section START -->
<!-- <section class="hero-slider">
	<div class="hero-section hero-section-style2 dark-text" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/ctabg2.jpg);">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-6">
					<h2>“We weren’t on the first page of Google. Now, we rank first.”</h2>
					<div class="default-content">
						<h3>Meet Sam from Xperion</h3>
					</div>
					
					<ul class="tags">
						<li>
							<a href="#"></a>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Hero Section END -->

<!-- Hero Section START -->
<!-- <section class="hero-slider">
	<div class="hero-section hero-section-style2 white-text" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/ctabg1.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<h2>“We’ve doubled our turnover since switching to bizink 4 years ago”</h2>
					<div class="default-content">
						<h3>Meet Mark from The Accounting Hub</h3>
					</div>
					<ul class="tags">
						<li>
							<a href="#"></a>
							<h6>Website</h6>
						</li>
						<li>
							<h6>Content</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Email Blast</h6>
						</li>
						<li>
							<h6>USA</h6>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
				</div>
			</div>
		</div>
	</div>
</section> -->
<!-- Hero Section END -->