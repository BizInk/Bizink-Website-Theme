<!-- Blog Grid section -->
<section class="blog-grid-section bg light-gray-bg" >
	<div id="ajax-posts">
	<div class="container">
		<div class="filter-wrap text-center ">
			<h4>SORT BY:</h4>
			<?php $terms_location = get_terms('location'); ?>
			<div class="row justify-content-center category">
				<div class="col-lg-3 col-md-4 col-sm-6">
					<select class="form-select" id="location">
						<option value=""><?php _e('Location','bizink');?></option>
						<?php foreach ( $terms_location as $term_location ) { ?>
						<option value="<?php echo $term_location->slug; ?>"><?php echo $term_location->name; ?></option>
						
					<?php } ?>
					</select>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<?php $terms_partner = get_terms('partner'); ?>
					<select class="form-select" id="partner">
						<option value=""><?php _e('Partner','bizink'); ?></option>
						<?php foreach ( $terms_partner as $term_partner ) { ?>
						<option value="<?php echo $term_partner->slug; ?>"><?php echo $term_partner->name; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6">
						<?php $terms_typework = get_terms('typework'); ?>
					<select class="form-select" id="typeofwork">
						<option value=""><?php _e('Type of Work','bizink'); ?></option>
						<?php foreach ( $terms_typework as $term_typework ) { ?>
						<option value="<?php echo $term_typework->slug; ?>"><?php echo $term_typework->name; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row post-grid-section filtered-posts"></div>
		<input type="hidden" name="page-count" value="1" id="page-count">
		<div class="load-more-wrap text-center">
			<a href="javascript:void(0)" id="more_posts" class="btn lightblue-btn">LOAD MORE</a>
		</div>
	</div>
</div>
</section>
