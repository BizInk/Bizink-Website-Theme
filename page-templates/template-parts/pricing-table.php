<section class="pricing-table-section"> 
<?php if ( get_sub_field( 'price_tabbing_show_and_hide' ) == 'yes' ) { ?>	
	<?php if ( have_rows( 'add_types' ) ) : ?>	
		<ul class="nav nav-tabs" id="myTab" role="tablist">   
			<?php
			while ( have_rows( 'add_types' ) ) :
				the_row();
				?>
				<li class="nav-item" role="presentation">
					<button class="nav-link 
					<?php
					if ( get_row_index() == 1 ) {
						echo 'active'; }
					?>
					" id="home-tab_<?php echo get_row_index(); ?>" data-bs-toggle="tab" data-bs-target="#home_<?php echo get_row_index(); ?>" type="button" role="tab" aria-controls="home_<?php echo get_row_index(); ?>" aria-selected="<?php echo ( get_row_index() == 1 ) ? 'true' : 'false'; ?>"><?php echo get_sub_field( 'pricing_type' ); ?></button>
				</li>
			<?php endwhile; ?>
		</ul>   
		<?php
endif;
}
if ( have_rows( 'add_types' ) ) :
	?>
	<div class="container">
		<div class="tab-content" id="myTabContent">
			<?php
			while ( have_rows( 'add_types' ) ) :
				the_row();
				?>
				<div class="tab-pane fade show <?php echo ( get_row_index() == 1 ) ? 'active' : ''; ?>" id="home_<?php echo get_row_index(); ?>" role="tabpanel" aria-labelledby="home-tab_<?php echo get_row_index(); ?>">
				<?php if ( have_rows( 'pricing_data' ) ) : ?>
					<div class="table-main table-responsive">							
						<?php
						while ( have_rows( 'pricing_data' ) ) :
							the_row();
							?>
							<table class="table">
								<?php if ( have_rows( 'table_heading' ) ) : ?>
									<thead><tr>
									<?php
									while ( have_rows( 'table_heading' ) ) :
										the_row();
										?>
										<th 
										<?php
										if ( get_row_index() == 1 ) {
											echo 'style="width:33%;"'; }
										?>
										>
											<?php if ( get_sub_field( 'only_title' ) == 'Yes' ) { ?>
												<?php
												if ( get_sub_field( 'add_title' ) ) {
													?>
													<h2><?php echo get_sub_field( 'add_title' ); ?></h2><?php } ?>
											<?php } else { ?>
												<?php
												if ( get_sub_field( 'popular_text' ) ) {
													?>
													<p class="popular"><?php echo get_sub_field( 'popular_text' ); ?></p><?php } ?>
												<?php
												if ( get_sub_field( 'title_text' ) ) {
													?>
													<p class="title"><?php echo get_sub_field( 'title_text' ); ?></p><?php } ?>
												<?php
												if ( get_sub_field( 'price' ) ) {
													?>
													<p class="price"><?php echo get_sub_field( 'currency_type' ) . get_sub_field( 'price' ); ?></p><?php } ?>
												<?php
												if ( get_sub_field( 'time' ) ) {
													?>
													<p class="time"><?php echo get_sub_field( 'time' ); ?></p><?php } ?>
												<?php
												if ( get_sub_field( 'information_text' ) ) {
													?>
													<p class="desc"><?php echo get_sub_field( 'information_text' ); ?></p><?php } ?>
												<?php
												if ( get_sub_field( 'button' ) ) {
													?>
													<a href="<?php echo get_sub_field( 'button' )['url']; ?>" target="<?php echo get_sub_field( 'button' )['target']; ?>" class="btn lightblue-btn"><?php echo get_sub_field( 'button' )['title']; ?></a><?php } ?>
											<?php } ?>
										</th>
									<?php endwhile; ?>
									</tr></thead>
									<?php
								endif;
								if ( have_rows( 'table_data' ) ) :
									?>
									<tbody>
									<?php
									while ( have_rows( 'table_data' ) ) :
										the_row();
										?>
										<tr>
											<?php if ( have_rows( 'add_table_row' ) ) : ?>											
												<?php
												while ( have_rows( 'add_table_row' ) ) :
													the_row();
													?>
													<?php if ( get_sub_field( 'select_data_type' ) == 'Text' ) { ?>
														<td><?php echo get_sub_field( 'add_text' ); ?></td>
													<?php } elseif ( get_sub_field( 'select_data_type' ) == 'Checkmark' ) { ?>
														<td>
															<?php if ( get_sub_field( 'check_mark_value' ) == 'yes' ) { ?>
																<?php echo get_sub_field( 'add_number' ); ?> <i class="fa fa-check"></i> 
															<?php } elseif ( get_sub_field( 'check_mark_value' ) == 'no' ) { ?>
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
							<?php if ( get_sub_field( 'need_floated_offer_text_on_right_side_of_table' )[0] == 'Yes' ) { ?>
								<div class="offer-text">
									<?php
									if ( get_sub_field( 'offer_text' ) ) {
										echo '<p>' . get_sub_field( 'offer_text' ) . '</p>'; }
									$link = get_sub_field( 'link' );
									if ( $link ) :
										$link_url    = $link['url'];
										$link_title  = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="btn purple-btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>									
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow-wave.png">
								</div>
								<?php
							}
							if ( get_sub_field( 'pricing_note_text_after_table' ) ) {
								?>
								<div class="note">
									<p><?php echo get_sub_field( 'pricing_note_text_after_table' ); ?></p>
								</div>
								<?php
							}
						endwhile;
						?>
					</div>
				<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>	
	</div>
	
<?php endif; ?>
</section>
