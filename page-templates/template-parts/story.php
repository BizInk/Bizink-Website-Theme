<?php
$select_background_color = get_sub_field( 'select_background_color' );
?>
<section class="story-section bg <?php echo $select_background_color; ?>">
	<?php if ( get_sub_field( 'show_marketing_logo_on_right_side_of_section' ) ) { ?>
		<div class="round-logo">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png">
		</div>
	<?php } ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php if ( get_sub_field( 'top_title' ) ) { ?>
					<p><?php echo get_sub_field( 'top_title' ); ?></p>
					<?php
				}
				if ( get_sub_field( 'info_text' ) ) {
					?>
					<h3><?php echo get_sub_field( 'info_text' ); ?></h3>
					<?php
				}
				if ( get_sub_field( 'link' ) ) {
					?>
					<a href="<?php echo get_sub_field( 'link' )['url']; ?>">
						<?php echo get_sub_field( 'link' )['title']; ?>
					</a>
				<?php } ?>
			</div>
			<?php if ( get_sub_field( 'right_side_image' ) ) { ?>
				<div class="col-md-6">
					<div class="image">
						<img src="<?php echo get_sub_field( 'right_side_image' )['url']; ?>" alt="<?php echo get_sub_field( 'info_text' ); ?>">
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
