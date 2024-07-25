<?php

$background_color = get_sub_field( 'mobile_background_color_option' );
?>
<section class="icon-title-desc-section py-5 <?php echo $background_color; ?>">
	<div class="container py-5">
		<div class="row">
			<div class="col-lg-12">
				<div class="default-content text-center">
					<?php
					if ( get_sub_field( 'mobile_title' ) ) {
						?>
						<h2><?php the_sub_field( 'mobile_title' ); ?></h2><?php } ?>
					<?php
					if ( get_sub_field( 'mobile_description' ) ) {
						?>
						<h3><?php the_sub_field( 'mobile_description' ); ?></h3><?php } ?>
				</div>
			</div>
		</div>
		<div class="row justify-content-center text-center">
			<?php if ( have_rows( 'mobile_icon_section' ) ) : ?>
				<?php
				while ( have_rows( 'mobile_icon_section' ) ) :
					the_row();
					?>
					<div class="col-lg-4 col-md-4">
						<a href="#">
							<?php if ( get_sub_field( 'mobile_icon_image' ) ) { ?>
								<div class="icon">
									<img src="<?php the_sub_field( 'mobile_icon_image' ); ?>" alt="<?php the_sub_field( 'mobile_icon_title' ); ?>">
								</div>
							<?php } ?>
							<?php
							if ( get_sub_field( 'mobile_icon_title' ) ) {
								?>
								<h4><?php the_sub_field( 'mobile_icon_title' ); ?></h4><?php } ?>
							<?php
							if ( get_sub_field( 'mobile_icon_description' ) ) {
								?>
								<?php the_sub_field( 'mobile_icon_description' ); ?><?php } ?>
						</a>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
