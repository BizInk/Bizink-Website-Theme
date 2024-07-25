
<section class="logo-section text-center">
	<div class="container">
		<div class="default-content">
		<?php if ( get_sub_field( 'logo_main_title' ) ) { ?>
			<h3><?php the_sub_field( 'logo_main_title' ); ?></h3>
		<?php } ?>
		</div>
		<div class="logo-slider">
			<?php if ( have_rows( 'logo' ) ) : ?>
				<?php
				while ( have_rows( 'logo' ) ) :
					the_row();
					?>
					<div class="logo">
						<img src="
						<?php
						if ( get_sub_field( 'logo_item' ) ) {
							the_sub_field( 'logo_item' ); }
						?>
						">
					</div>

					<?php endwhile; ?>
				<?php endif; ?>
			
		</div>
	</div>
</section>
