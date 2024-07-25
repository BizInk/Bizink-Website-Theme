<?php
$use_case_section_background = get_sub_field('use_case_section_background');
$service_title_font_size = '';
if (get_sub_field('service_title_font_size') == 'bigtitle') {
	$service_title_font_size = 'xl-font';
} elseif (get_sub_field('service_title_font_size') == 'smalltitle') {
	$service_title_font_size = 'sm-font';
}

$use_case_view_column = '';
if (get_sub_field('use_case_view_column') == 'fourcolumn') {
	$use_case_view_column = 'row-cols-4';
} elseif (get_sub_field('use_case_view_column') == 'fivecolumn') {
	$use_case_view_column = 'row-cols-5';
} elseif (get_sub_field('use_case_view_column') == 'default') {
	$use_case_view_column = 'row-cols-3';
}

$use_case_image_size = '';
if (get_sub_field('use_case_image_size') == 'largeimage') {
	$use_case_image_size = 'lg-img';
} elseif (get_sub_field('use_case_image_size') == 'smallimage') {
	$use_case_image_size = 'sm-img';
}
?>
<section class="services-box <?php echo $use_case_section_background; ?> bg bg-margin-remove">
	<div class="container-xxl">
		<div class="row text-center">
			<div class="col">
				<?php if (get_sub_field('marketing_title')) { ?>
					<h2 class="<?php echo $service_title_font_size; ?>"><?php the_sub_field('marketing_title'); ?></h2>
				<?php } ?>
				<?php if (get_sub_field('marketing_description')) { ?>
					<?php the_sub_field('marketing_description'); ?>
				<?php } ?>
			</div>
		</div>
		<div class="row services-inner-row <?php echo $use_case_view_column; ?>">
			<?php if (have_rows('use_cases_of_bizink')) :
				while (have_rows('use_cases_of_bizink')) : the_row(); ?>
					<div class="col services-inner text-center <?php echo $use_case_image_size; ?>">
						<?php
						if (get_sub_field('use_case_image')) {
						?>
							<img src="<?php the_sub_field('use_case_image'); ?>" alt="<?php the_sub_field('use_case_title'); ?>">
						<?php
						}
						if (get_sub_field('use_case_title')) {
						?>
							<h3><?php the_sub_field('use_case_title'); ?></h3>
						<?php
						}
						if (get_sub_field('use_case_description')) {
							the_sub_field('use_case_description');
						}
						$use_case_button = get_sub_field('use_case_button');
						if ($use_case_button) {
						?>
							<a href="<?php echo $use_case_button['url']; ?>" class="btn lightblue-btn"><?php echo $use_case_button['title']; ?></a>
						<?php
						}
						?>
					</div>
			<?php endwhile;
			endif; ?>

		</div>
	</div>
</section>