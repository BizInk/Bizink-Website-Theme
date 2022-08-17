<!-- Feature Story -->
<section class="feature-story-section bg text-center">
<?php if(get_sub_field('feature_section_marketing_logo') == 'yes' ){ ?>
	<div class="round-logo">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png">
	</div>
<?php } ?>	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2><?php the_sub_field('feature_title'); ?></h2>
				<?php $select_feature_stories = get_sub_field('feature_story_blog'); ?>
				<?php foreach($select_feature_stories as $post_id){ ?>
				<h3><?php echo get_the_title($post_id); ?></h3>
				<!-- <p>Mark Telford switched to bizink in 2017, orem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. <a href="#">Read Mark’s story.</a>
				</p> -->
				<p><?php echo apply_filters('the_content', get_post_field('post_content', $post_id)); ?></p>
				<?php  $tags = get_the_tags($post_id);
				
				 ?>
				<ul class="tags">
				<?php foreach ($tags as $tag) { ?>
					<li>
						<h6><?php echo $tag->name ?></h6>
					</li>
				
				<?php  } ?>
				</ul>
				<?php } ?>	
			</div>
		</div>

	</div>
</section>
<!-- Feature Story End -->