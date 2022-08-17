<?php
?>

<section class="team-sec py-5">
	<div class="container py-5">
		<div class="row py-5">
			<?php if( have_rows('team_member') ): ?>
				<?php endif; ?>
				<?php while( have_rows('team_member') ): the_row(); ?>
					<div class="col-lg-4 text-center">
				<div class="team-img">
					<img src="<?php the_sub_field('team_image'); ?>">
					<h3 class="team-title"><?php the_sub_field('team_member_name'); ?></h3>
					<h5 class="team-designation"><?php the_sub_field('designation'); ?></h5>
				</div>
			</div>
		<?php endwhile; ?>

			
			
		</div>
	</div>
</section>
