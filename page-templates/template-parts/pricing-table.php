<section class="pricing-table-section"> 
<?php if( get_sub_field('price_tabbing_show_and_hide') == 'yes' ) { ?>	
<?php if( have_rows('add_types') ): ?>	
		<ul class="nav nav-tabs" id="myTab" role="tablist">   
			<?php while( have_rows('add_types') ): the_row(); ?>
				<li class="nav-item" role="presentation">
					<button class="nav-link <?php if(get_row_index() == 1){ echo 'active'; } ?>" id="home-tab_<?php echo get_row_index(); ?>" data-bs-toggle="tab" data-bs-target="#home_<?php echo get_row_index(); ?>" type="button" role="tab" aria-controls="home_<?php echo get_row_index(); ?>" aria-selected="<?php echo (get_row_index() == 1) ? 'true' : 'false'; ?>"><?php echo get_sub_field('pricing_type'); ?></button>
				</li>
			<?php endwhile; ?>
		</ul>   
<?php endif; ?>
<?php } ?>
<?php if( have_rows('add_types') ): ?>	
	<div class="container">
		<div class="tab-content" id="myTabContent">
			<?php while( have_rows('add_types') ): the_row(); ?>
				<div class="tab-pane fade show <?php echo (get_row_index() == 1) ? 'active' : ''; ?>" id="home_<?php echo get_row_index(); ?>" role="tabpanel" aria-labelledby="home-tab_<?php echo get_row_index(); ?>">
				<?php if( have_rows('pricing_data') ): ?>
					<div class="table-main table-responsive">							
						<?php while( have_rows('pricing_data') ): the_row(); ?>
							<table class="table">
								<?php if( have_rows('table_heading') ): ?>
									<thead><tr>
									<?php while( have_rows('table_heading') ): the_row(); ?>
										<th <?php if(get_row_index() == 1){ echo 'style="width:33%;"'; } ?>>
											<?php if(get_sub_field('only_title') == 'Yes'){ ?>
												<?php if(get_sub_field('add_title')){ ?><h2><?php echo get_sub_field('add_title'); ?></h2><?php } ?>
											<?php } else { ?>
												<?php if(get_sub_field('popular_text')){ ?><p class="popular"><?php echo get_sub_field('popular_text'); ?></p><?php } ?>
												<?php if(get_sub_field('title_text')){ ?><p class="title"><?php echo get_sub_field('title_text'); ?></p><?php } ?>
												<?php if(get_sub_field('price')){ ?><p class="price">$<?php echo get_sub_field('price'); ?></p><?php } ?>
												<?php if(get_sub_field('time')){ ?><p class="time"><?php echo get_sub_field('time'); ?></p><?php } ?>
												<?php if(get_sub_field('information_text')){ ?><p class="desc"><?php echo get_sub_field('information_text'); ?></p><?php } ?>
												<?php if(get_sub_field('button')){ ?><a href="<?php echo get_sub_field('button')['url']; ?>" target="<?php echo get_sub_field('button')['target']; ?>" class="btn lightblue-btn"><?php echo get_sub_field('button')['title']; ?></a><?php } ?>
											<?php } ?>
										</th>
									<?php endwhile; ?>
									</tr></thead>
								<?php endif; ?>
								<?php if( have_rows('table_data') ): ?>
									<tbody>
									<?php while( have_rows('table_data') ): the_row(); ?>
										<tr>
											<?php if( have_rows('add_table_row') ): ?>											
												<?php while( have_rows('add_table_row') ): the_row(); ?>
													<?php if(get_sub_field('select_data_type') == 'Text'){ ?>
														<td><?php echo get_sub_field('add_text'); ?></td>
													<?php }elseif(get_sub_field('select_data_type') == 'Checkmark'){ ?>
														<td>
															<?php if(get_sub_field('check_mark_value') == 'yes') { ?>
																<?php echo get_sub_field('add_number'); ?> <i class="fa fa-check"></i> 
															<?php } elseif(get_sub_field('check_mark_value') == 'no') { ?>
																<i class="fa fa-times" aria-hidden="true"></i>
															<?php } ?>	
														</td>
													<?php } else { ?>
														<td></td>
													<?php } ?>
												<?php endwhile; ?>
											<?php endif; ?>											
										</tr>
									<?php endwhile; ?>
									</tbody>
								<?php endif; ?>								
							</table>
							<?php if(get_sub_field('need_floated_offer_text_on_right_side_of_table')[0] == 'Yes'){ ?>
								<div class="offer-text">
									<?php if(get_sub_field('offer_text')){ echo '<p>'.get_sub_field('offer_text').'</p>'; } ?>
									<?php 
									$link = get_sub_field('link');
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn purple-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>									
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-wave.png">
								</div>
							<?php } ?>
							<?php if(get_sub_field('pricing_note_text_after_table')){ ?>
								<div class="note">
									<p><?php echo get_sub_field('pricing_note_text_after_table'); ?></p>
								</div>
							<?php } ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>	
	</div>
	
<?php endif; ?>
</section>

<?php /* ?>
<!-- Pricing Table -->
<section class="pricing-table-section">
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item" role="presentation">
			<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Websites</button>
		</li>
		<li class="nav-item" role="presentation">
			<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Marketing</button>
		</li>
	</ul>
	<div class="container">
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

				<div class="table-main table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th style="width:33%;">
									<h2>Choose the website plan that fits your business</h2>
								</th>
								<th>
									<p class="title">Essentials</p>
									<p class="price">$99</p>
									<p class="time">Per Month</p>
									<p class="desc">$999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
								<th>
									<p class="popular">MOST POPULAR</p>
									<p class="title">Pro</p>
									<p class="price">$199</p>
									<p class="time">Per Month</p>
									<p class="desc">$1999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
								<th>
									<p class="title">Pro</p>
									<p class="price">$249</p>
									<p class="time">Per Month</p>
									<p class="desc">$3999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
								<th>
									<p class="title">Premium</p>
									<p class="price">$299</p>
									<p class="time">Per Month</p>
									<p class="desc">$9999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Beautiful mobile friendly design </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Live in under 3 weeks </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>


							<tr>
								<td>Official content from Xero, QBO, MYOB etc. </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Marketing automation </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>300+ blogs & new blogs each month </td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Built in email marketing </td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Website content written for you </td>
								<td></td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Advanced SEO </td>
								<td></td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>More lead generating features</td>
								<td></td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Social media content </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Best of everything Bizink offers </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Concierge marketing service </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Secure payment page </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>

					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Design</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Mobile friendly</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Free design change anytime</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Premium Stock Images </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Standard Design</td>
								<td>3 included</td>
								<td>5 included</td>
								<td>10 included</td>
								<td>15 included</td>
							</tr>

							<tr>
								<td> Custom Design (6 custom pages designed)</td>
								<td>&nbsp;</td>
								<td>+$2999</td>
								<td>+$2999</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td> Premium Design (10 custom pages designed & custom icons) </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>
						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Marketing</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Blogging</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Social media automation</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Landing pages</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Testimonials page</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Email marketing</td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Email automation</td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
						</tbody>
					</table>

					<div class="offer-text">
						<p> We also offer a specialist marketing packages</p>
						<a href="#" class="btn purple-btn">MORE</a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-wave.png">
					</div>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Lead Generation</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Online forms </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Live chat</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Appointment booking </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Pricing package builder</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Lead magnets </td>
								<td></td>
								<td>1 lead magnet</td>
								<td>2 lead magnets</td>
								<td>3 lead magnets</td>
							</tr>

							<tr>
								<td> Lead nurturing </td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Custom lead magnet</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>

						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Productivity features </h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Client area </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Online forms </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Survey module </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Digital signing </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Secure payment page</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Technology Features </h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> AWS Hosting</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Daily Backups </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> SSL Encryption </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Basic Integrations </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Standard Integrations </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Advanced Integrations</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>


					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Support and Training</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> One-on-one training</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Email and ticket support</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Private Facebook group</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Client only webinars</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Live chat support</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Dedicated account manager</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Reporting</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td>Google Analytics </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Google Search </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Console Monthly report</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>

					<div class="note">
						<p>Prices are in New Zealand Dollars. Prices listed exclusive of GST</p>
					</div>

				</div>

			</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

				<div class="table-main table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th style="width:33%;">
									<h2>Choose the website plan that fits your business</h2>
								</th>
								<th>
									<p class="title">Essentials</p>
									<p class="price">$99</p>
									<p class="time">Per Month</p>
									<p class="desc">$999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
								<th>
									<p class="popular">MOST POPULAR</p>
									<p class="title">Pro</p>
									<p class="price">$199</p>
									<p class="time">Per Month</p>
									<p class="desc">$1999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
								<th>
									<p class="title">Pro</p>
									<p class="price">$249</p>
									<p class="time">Per Month</p>
									<p class="desc">$3999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
								<th>
									<p class="title">Premium</p>
									<p class="price">$299</p>
									<p class="time">Per Month</p>
									<p class="desc">$9999 setup fee Ideal for Lorem ipsum dolor sit amet, consectetuer</p>
									<a href="#" class="btn lightblue-btn">TALK TO US!</a>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Beautiful mobile friendly design </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Live in under 3 weeks </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>


							<tr>
								<td>Official content from Xero, QBO, MYOB etc. </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Marketing automation </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>300+ blogs & new blogs each month </td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Built in email marketing </td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Website content written for you </td>
								<td></td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Advanced SEO </td>
								<td></td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>More lead generating features</td>
								<td></td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Social media content </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Best of everything Bizink offers </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Concierge marketing service </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td>Secure payment page </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>

					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Design</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Mobile friendly</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Free design change anytime</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Premium Stock Images </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Standard Design</td>
								<td>3 included</td>
								<td>5 included</td>
								<td>10 included</td>
								<td>15 included</td>
							</tr>

							<tr>
								<td> Custom Design (6 custom pages designed)</td>
								<td>&nbsp;</td>
								<td>+$2999</td>
								<td>+$2999</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td> Premium Design (10 custom pages designed & custom icons) </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>
						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Marketing</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Blogging</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Social media automation</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Landing pages</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Testimonials page</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Email marketing</td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Email automation</td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
						</tbody>
					</table>

					<div class="offer-text">
						<p> We also offer a specialist marketing packages</p>
						<a href="#" class="btn purple-btn">MORE</a>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-wave.png">
					</div>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Lead Generation</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Online forms </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Live chat</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Appointment booking </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Pricing package builder</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Lead magnets </td>
								<td></td>
								<td>1 lead magnet</td>
								<td>2 lead magnets</td>
								<td>3 lead magnets</td>
							</tr>

							<tr>
								<td> Lead nurturing </td>
								<td></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Custom lead magnet</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>

						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Productivity features </h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> Client area </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Online forms </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Survey module </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Digital signing </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Secure payment page</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Technology Features </h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> AWS Hosting</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Daily Backups </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> SSL Encryption </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Basic Integrations </td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Standard Integrations </td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Advanced Integrations</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>


					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Support and Training</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td> One-on-one training</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Email and ticket support</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Private Facebook group</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>
							<tr>
								<td> Client only webinars</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Live chat support</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Dedicated account manager</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>

					<table class="table">
						<tbody>
							<tr>
								<td>
									<h3>Reporting</h3>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
							</tr>

							<tr>
								<td>Google Analytics </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Google Search </td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

							<tr>
								<td> Console Monthly report</td>
								<td>&nbsp;</td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
								<td><i class="fa fa-check"></i></td>
							</tr>

						</tbody>
					</table>

					<div class="note">
						<p>Prices are in New Zealand Dollars. Prices listed exclusive of GST</p>
					</div>

				</div>

			</div>
		</div>
	</div>
</section>
<!-- Pricing Table End --> */?>