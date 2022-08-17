<section class="testimonial">
	<div class="container">
		<div class="row">
			<div class="testimonial-inner">
				<?php if(get_sub_field('tetimonial_image')) { ?>
					<img src="<?php the_sub_field('tetimonial_image') ?> ">
				<?php } ?>
				<?php if(get_sub_field('tetimonial_idescription')) { ?>
					<?php the_sub_field('tetimonial_idescription') ?>
				<?php } ?>	
			</div>
		</div>
	</div>
</section>