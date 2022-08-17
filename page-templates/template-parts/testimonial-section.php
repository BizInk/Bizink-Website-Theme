<?php
$testimonial_bg = '';
	if( get_sub_field('testimonial_background_color') == 'navyblue' ) { 
		$testimonial_bg = 'navyblue-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'lightblue') {
			$testimonial_bg = 'lightblue-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'purple') {
			$testimonial_bg = 'purple-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'yellow') {
			$testimonial_bg = 'yellow-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'gray') {
			$testimonial_bg = 'gray-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'light gray') {
			$testimonial_bg = 'light-gray-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'lightblue2') {
			$testimonial_bg = 'lightblue2-bg';
		} elseif (get_sub_field('testimonial_background_color') == 'darkpurple') {
			$testimonial_bg = 'darkpurple-bg';
		}
$testimonial_title_color = '';
	if( get_sub_field('testimonial_title_font_color') == 'white' ) { 
		$testimonial_title_color = 'title-white';
	} elseif (get_sub_field('testimonial_title_font_color') == 'purple') {
			$testimonial_title_color = 'title-purple';
	}	
?>

<section class="quote-section white-text text-center <?php echo $testimonial_bg; ?> bg">
	<div class="container">
		<?php if(get_sub_field('testimonial_title')) { ?><h2 class="<?php echo $testimonial_title_color;  ?>">"<?php the_sub_field('testimonial_title'); ?>"</h2><?php } ?>
		<div class="default-content">
			<?php if(get_sub_field('testimonial_description')) { ?><p><?php the_sub_field('testimonial_description'); ?></p><?php } ?>
		</div>
		<?php if(get_sub_field('author_name')) { ?><p class="author-name"><?php the_sub_field('author_name'); ?></p><?php } ?>
	</div>
</section>