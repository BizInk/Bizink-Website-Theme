<?php
$select_case_studies = get_sub_field('select_case_studies');
?>
<section class="image-text-grid-section">
	<div class="container">
		<div class="default-content">
			<?php if(get_sub_field('section_title')){ ?>
			<div class="row">
				<div class="col-lg-12">
					<h2><?php echo get_sub_field('section_title'); ?></h2>
				</div>
			</div>
			<?php } ?>
			<?php if($select_case_studies){ ?>
			<div class="row">
				<?php
				foreach($select_case_studies as $post_id){ ?>
					<div class="col-lg-4">
						<a href="<?php echo get_the_permalink($post_id); ?>">
						<div class="image">
							<img src="<?php echo get_the_post_thumbnail_url($post_id,'full'); ?>">
						</div>
						<h3><?php echo get_the_title($post_id); ?></h3>
						<p><?php echo wp_trim_words(get_the_excerpt($post_id), 30); ?></p>
						<?php //echo apply_filters('the_content', get_post_field('post_content', $post_id)); ?>
						</a>
					</div>
				<?php } ?>				
			</div>
			<?php } ?>
		</div>
	</div>
</section>