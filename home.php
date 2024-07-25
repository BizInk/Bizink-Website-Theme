<?php

/**
 * Template Name: Post
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<section class="cta-section text-center bg <?php echo get_field( 'select_background_color' ) ? get_field( 'select_background_color' ) : 'navyblue-bg'; ?>">
	<div class="container">
		<div class="default-content">
			<h2 class="<?php echo get_field( 'title_color' ) ? get_field( 'title_color' ) : 'title-yellow'; ?>">
				<?php echo get_field( 'banner_title' ) ? get_field( 'banner_title' ) : 'Blog'; ?>
			</h2>
			<h3 class="<?php echo get_field( 'text_after_title_color' ) ? get_field( 'text_after_title_color' ) : 'title-white'; ?>">
				<?php echo get_field( 'banner_after_title' ) ? get_field( 'banner_after_title' ) : 'Keep up with the latest from Bizink'; ?>
			</h3>
		</div>
	</div>
</section>

<!-- Blog Grid section -->
<section class="blog-grid-section bg light-gray-bg">
	<div class="container">
		<?php
		if ( have_posts() ) :
			?>
			<div class="blog-grid row">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<div class="col-6 col-md-4 mb-2">
						<div class="image blog-image">
							<a href="<?php the_permalink(); ?>">
								<?php
								if ( has_post_thumbnail( $post->ID ) ) :
									echo get_the_post_thumbnail( $post->ID, 'large' );
								else :
									?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/full-img.jpg" alt="<?php the_title(); ?>">
								<?php endif; ?>
							</a>
						</div>
						<h3 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="blog-excerpt">
							<?php the_excerpt(); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="blog-pagenation">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 5,
						'prev_text' => '&lt;',
						'next_text' => '&gt;',
					)
				);
				?>
			</div>
			<?php
		else :
			?>
			<div class="blog-grid text-center">
				<h2><?php _e( 'Sorry there are no posts at the moment', 'bizink' ); ?></h2>
				<p><?php _e( 'Sorry there are no posts at the moment. Please check back soon.', 'bizink' ); ?></p>
			</div>
			<?php
		endif;
		?>
	</div>
</section>
<?php
get_footer();
