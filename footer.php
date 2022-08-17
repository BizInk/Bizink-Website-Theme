<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<footer>

	<div class="<?php echo esc_attr($container); ?>">

		<div class="row">

			<div class="col-md-3">
				<h5>CONTACT US</h5>
				<div class="contact-info">

					<?php 
						$link = get_field('email_id', 'option');
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
					    ?>
						<p><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?> </a></p>
					<?php endif; ?>	
					<?php if( have_rows('contact_no', 'option') ): ?>
						<p>
						<?php while( have_rows('contact_no', 'option') ): the_row(); ?>
							<?php the_sub_field('country'); ?> <?php the_sub_field('contact_number'); ?> <br>
						<?php endwhile; ?>
						</p>
					<?php endif; ?>	
				</div>
			</div>

			<div class="col-md-3">

				<div class="footer-menu">
					<?php
						wp_nav_menu( array( 
						    'theme_location' => 'my-custom-menu-one', 
						    'container_class' => 'custom-menu-class' ) ); 
					?>
					<!-- <ul>
						<li><a href="#">ABOUT US</a></li>
						<li><a href="#">BLOG</a></li>
						<li><a href="#">CAREERS</a></li>
					</ul> -->

					<!-- <ul>
						<li><a href="#">MY ACCOUNT</a></li>
					</ul> -->

				</div>

				<div class="bottom-link">
					<?php
			            $menuParameters = array(
			              'theme_location'  => 'my-custom-menu-two', 
			              'container'       => false,
			              'echo'            => false,
			              'items_wrap'      => '%3$s',
			              'depth'           => 0,
			            );
            				echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
            		?>
					<!-- <a href="#">Legal stuff </a>
					<a href="#"> Privacy Policy</a> -->
				</div>

			</div>

			<div class="col-md-3">
				<div class="newsletter-wrap">
					<h5>SUBSCRIBE TO OUR NEWSLETTER</h5>
					<?php if(get_field('subscribe_to_newsletter_text', 'option')) { ?>
						<p><?php the_field('subscribe_to_newsletter_text', 'option'); ?></p>
					<?php } ?>		
				</div>
			</div>

			<div class="col-md-3">
				<div class="social-media-wrap">
					<h5>FOLLOW US ON:</h5>
					<ul>
						<?php if(get_field('twitter', 'option')) { ?>
							<li><a target="_blank" href="<?php the_field('twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>	
						<?php if(get_field('linkdin', 'option')) { ?>
							<li><a target="_blank" href="<?php the_field('linkdin', 'option'); ?>"><i class="fa fa-linkedin"></i></a></li>
						<?php } ?>
						<?php if(get_field('facebook', 'option')) { ?>	
							<li><a target="_blank" href="<?php the_field('facebook', 'option'); ?>"><i class="fa fa-facebook-f"></i></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="col-md-12">
				<div class="privacy-policy-wrap">
					<?php if(get_field('copyright_text', 'option')) { ?>
						<p class="mb-0"><?php the_field('copyright_text', 'option'); ?></p>
					<?php } ?>	
				</div>
			</div>

		</div>

	</div>

</footer>

<a href="javascript:" id="return-to-top" class="<?php if(get_field('scroll_to_top_button', 'option') == 'No') { echo "no-scroll"; } elseif(get_field('scroll_to_top_button', 'option') == 'Yes') { echo "yes-scroll";  } ?> scrollTop" style="display: none;"></a>
</div><!-- #page we need this extra closing tag here --> 

<?php wp_footer(); ?>

</body>

</html>