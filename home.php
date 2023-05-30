<?php

/**
 * Template Name: Post
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
	get_template_part('global-templates/hero');
}
?>

<section class="cta-section text-center bg <?php echo get_field('select_background_color') ? get_field('select_background_color') : 'navyblue-bg'; ?>">
	<div class="container">
		<div class="default-content">
			<?php if( get_field('banner_title') ){ ?><h2 class="<?php echo get_field('title_color') ? get_field('title_color'):'title-yellow';?>"><?php echo get_field('banner_title'); ?></h2><?php } ?>
			<?php if(get_field('banner_after_title')){ ?><h3 class="<?php echo get_field('text_after_title_color') ? get_field('text_after_title_color'):'title-white';?>"><?php echo get_field('banner_after_title'); ?></h3><?php } ?>
		</div>
	</div>
</section>

<!-- Blog Grid section -->
<section class="blog-grid-section bg light-gray-bg" >
	<div class="container">
		<?php
		if ( have_posts() ):
		?>
		<div class="blog-grid grid">
			<?php while ( have_posts() ): the_post(); ?>
			<div class="g-col-6 g-col-md-4">
				<div class="image blog-image">
					<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
				</div>
				<h3 class="blog-title"><?php the_title(); ?></h3>
				<div class="blog-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<div class="blog-readmore">
					<a class="btn yellow-btn" href="<?php the_permalink(); ?>"><?php _e('Read More','bizink'); ?></a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
		<?php
		else:
			?>
			<div class="blog-grid text-center">
				<h2><?php _e('Sorry there are no posts at the moment','bizink');?></h2>
				<p><?php _e('Sorry there are no posts at the moment. Please check back soon.','bizink'); ?></p>
			</div>
			<?php
		endif;
		?>
	</div>
</section>


<?php
get_footer();
