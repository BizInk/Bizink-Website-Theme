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

<!-- Archive Page -->
<?php if(get_field('post_banner_image')) { ?>
<section class="full-img-section">
	<div class="image">
		<img src="<?php the_field('post_banner_image'); ?>" class="w-100">
	</div>
</section>
<?php } ?>

<!-- Blog Grid section -->
<section class="blog-grid-section bg light-gray-bg" >
	<div id="ajax-posts">
	<div class="container">
		<div class="filter-wrap text-center ">
			<h4>SORT BY:</h4>
			<?php $terms_location = get_terms('location'); ?>
			<div class="row justify-content-center category">
				<div class="col-lg-3 col-md-4">
					<select class="form-select" id="location">
						<option value="">Location</option>
						<?php foreach ( $terms_location as $term_location ) { ?>
						<option value="<?php echo $term_location->slug; ?>"><?php echo $term_location->name; ?></option>
						
					<?php } ?>
					</select>
				</div>
				<div class="col-lg-3 col-md-4">
					<?php $terms_partner = get_terms('partner'); ?>
					<select class="form-select" id="partner">
						<option value="">Partner</option>
						<?php foreach ( $terms_partner as $term_partner ) { ?>
						<option value="<?php echo $term_partner->slug; ?>"><?php echo $term_partner->name; ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-3 col-md-4">
						<?php $terms_typework = get_terms('typework'); ?>
					<select class="form-select" id="typeofwork">
						<option value="">Type of Work</option>
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

<!-- Feature Story -->
<section class="feature-story-section bg text-center">
	<div class="round-logo">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png">
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<h2>FEATURE STORY</h2>
				<?php $select_feature_stories = get_field('feature_blog'); ?>
				<?php foreach($select_feature_stories as $post_id){ ?>
				<h3><a href="<?php the_permalink(); ?>"><?php echo get_the_title($post_id); ?></a></h3>
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

<!-- Blog Grid section -->

<!-- <section class="blog-grid-section bg light-gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service1.png">
					</div>
					<h3> The accounting hub </h3>
					<div class="default-content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore <span>magna aliquam</span> erat volutpat. </p>
					</div>
					<ul class="tags">
						<li>
							<a href="#">
								<h6>Strategy</h6>
							</a>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service2.png">
					</div>
					<h3> Xperion accounting</h3>
					<div class="default-content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad <span>minim veni</span>am, quis nostrud.</p>
					</div>
					<ul class="tags">
						<li>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service3.png">
					</div>
					<h3> Accounting company name</h3>
					<div class="default-content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
						<a href="#"> Read Sarahs story</a>
					</div>
					<ul class="tags">
						<li>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service1.png">
					</div>
					<h3> The accounting hub </h3>
					<div class="default-content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore <span>magna aliquam</span> erat volutpat. </p>
					</div>
					<ul class="tags">
						<li>
							<a href="#">
								<h6>Strategy</h6>
							</a>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service2.png">
					</div>
					<h3> Xperion accounting</h3>
					<div class="default-content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad <span>minim veni</span>am, quis nostrud.</p>
					</div>
					<ul class="tags">
						<li>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/service3.png">
					</div>
					<h3> Accounting company name</h3>
					<div class="default-content">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
						<a href="#"> Read Sarahs story</a>
					</div>
					<ul class="tags">
						<li>
							<h6>Strategy</h6>
						</li>
						<li>
							<h6>Search Engine</h6>
						</li>
						<li>
							<h6>Blogs</h6>
						</li>
						<li>
							<h6>Xerol Partner</h6>
						</li>
						<li>
							<h6>UK</h6>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="load-more-wrap text-center">
			<a href="#" class="btn lightblue-btn">LOAD MORE</a>
		</div>
	</div>
</section> -->

<!--Story Slider Start -->
<section class="story-slider-section bg">
	<div class="round-logo">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png">
	</div>
	<div class="container">
		<div class="story-slider">
         <?php if( have_rows('sliderimage') ): ?>
         	   <?php while( have_rows('sliderimage') ): the_row(); ?>
         	   	<div class="slide">
				<div class="row align-items-center">
					<div class="col-md-4">
						<div class="image">
							<img src="<?php the_sub_field('slider_image'); ?>">
						</div>
					</div>
					<div class="col-md-8">
						<h3> <?php the_sub_field('image_right_side_content'); ?>
						</h3>
						<?php $read_more_button = get_sub_field('read_more_button'); 
							$read_more_link_url = $read_more_button['url'];
    						$read_more_link_title  = $read_more_button['title'];
    						$read_more_link_target = $read_more_button['target'] ? $read_more_button['target'] : '_self';

						?>
						<a href="<?php echo esc_url( $read_more_link_url ); ?>">
							<?php echo esc_html( $read_more_link_title ); ?>
						</a>
					</div>
				</div>
			</div>
         	   	<?php endwhile; ?>
         	<?php endif; ?>
			

			<div class="slide">
				<div class="row align-items-center">
					<div class="col-md-4">
						<div class="image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/searchange.png">
						</div>
					</div>
					<div class="col-md-8">
						<h3> “Websites can be confusing. Bizink made it easy.”
						</h3>
						<a href="#">
							Read the Seachange story
						</a>
					</div>
				</div>
			</div>

			<div class="slide">
				<div class="row align-items-center">
					<div class="col-md-4">
						<div class="image">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/searchange.png">
						</div>
					</div>
					<div class="col-md-8">
						<h3> “Websites can be confusing. Bizink made it easy.”
						</h3>
						<a href="#">
							Read the Seachange story
						</a>
					</div>
				</div>
			</div>

		</div>
</section>
<!-- -Story Slider END -->

<!-- Detail Page -->

<!-- Story  START -->
<!-- <section class="story-nav-section light-gray-bg bg">
	<div class="round-logo">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bzik.png">
	</div>
	<div class="container">
		<div class="story-nav-inner">
			<a href="#" class="nav-left"><i class="fa fa-chevron-left"></i></a>
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<h2>H2 Previous story:</h2>
					<h3>The accounting hub </h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore <a href="#">magna aliquam</a> erat volutpat.</p>
				</div>
				<div class="col-lg-6 col-md-6">
					<h2>Next story:</h2>
					<h3>Xperion accounting </h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore <a href="#">magna aliquam</a> erat volutpat. Ut wisi enim ad minim veniam, quis nostrud.</p>
				</div>
			</div>
			<a href="#" class="nav-right"><i class="fa fa-chevron-right"></i></a>
		</div>
	</div>
</section> -->
<!-- Story  END -->


<?php
get_footer();
