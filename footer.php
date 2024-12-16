<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer>

	<div class="<?php echo esc_attr( $container ); ?>">

	<div class="row">

		<div class="col-md-3">
		<h5><?php _e( 'CONTACT US', 'bizink' ); ?></h5>
		<div class="contact-info">

			<?php
			$link = get_field( 'email_id', 'option' );
			if ( $link ) :
				$link_url    = $link['url'];
				$link_title  = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
				?>
			<p><a href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?> </a></p>
			<?php endif; ?>
			<?php if ( have_rows( 'contact_no', 'option' ) ) : ?>
			<p>
				<?php
				while ( have_rows( 'contact_no', 'option' ) ) :
					the_row();
					?>
					<?php the_sub_field( 'country' ); ?> <?php the_sub_field( 'contact_number' ); ?> <br>
				<?php endwhile; ?>
			</p>
			<?php endif; ?>
		</div>
		</div>

		<div class="col-md-3">

		<div class="footer-menu">
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'my-custom-menu-one',
					'container_class' => 'custom-menu-class',
				)
			);
			?>
		</div>

		<div class="bottom-link">
			<?php
			$menuParameters = array(
				'theme_location' => 'my-custom-menu-two',
				'container'      => false,
				'echo'           => false,
				'items_wrap'     => '%3$s',
				'depth'          => 0,
			);
			echo strip_tags( wp_nav_menu( $menuParameters ), '<a>' );
			?>
		</div>

		</div>

		<div class="col-md-3">
		<div class="newsletter-wrap">
			<h5><?php _e( 'SUBSCRIBE TO OUR NEWSLETTER', 'bizink' ); ?></h5>
			<?php 
			$subscribe_to_newsletter_text = get_field( 'subscribe_to_newsletter_text', 'option' );
			if ( $subscribe_to_newsletter_text ) { ?>
			<p><?php echo $subscribe_to_newsletter_text; ?></p>
			<?php } ?>
		</div>
		</div>

		<div class="col-md-3">
		<div class="social-media-wrap">
			<h5><?php _e( 'FOLLOW US ON:', 'bizink' ); ?></h5>
			<ul>
			<?php if ( get_field( 'twitter', 'option' ) ) { ?>
				<li><a target="_blank" href="<?php the_field( 'twitter', 'option' ); ?>"><i class="fa fa-twitter"></i></a></li>
			<?php } ?>
			<?php if ( get_field( 'linkdin', 'option' ) ) { ?>
				<li><a target="_blank" href="<?php the_field( 'linkdin', 'option' ); ?>"><i class="fa fa-linkedin"></i></a></li>
			<?php } ?>
			<?php if ( get_field( 'facebook', 'option' ) ) { ?>
				<li><a target="_blank" href="<?php the_field( 'facebook', 'option' ); ?>"><i class="fa fa-facebook-f"></i></a></li>
			<?php } ?>
			</ul>
		</div>
		</div>

		<div class="col-md-12">
		<div class="privacy-policy-wrap">
			<?php if ( get_field( 'copyright_text', 'option' ) ) { ?>
			<p class="mb-0"><?php echo do_shortcode( get_field( 'copyright_text', 'option' ) ); ?></p>
			<?php } ?>
		</div>
		</div>

	</div>

	</div>

</footer>

<?php
$back_top_top_class = "";
if ( get_field( 'scroll_to_top_button', 'option' ) == 'No' ) {
	$back_top_top_class = 'no-scroll';
} elseif ( get_field( 'scroll_to_top_button', 'option' ) == 'Yes' ) {
	$back_top_top_class = 'yes-scroll';
}
?>
<a href="javascript:" id="return-to-top" class="scrollTop <?php echo $back_top_top_class; ?>" style="display: none;"></a>			
</div>
<!-- #page we need this extra closing tag here -->
<div class="modal fade" id="talktous" tabindex="-1" role="dialog" aria-labelledby="talktouslabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="talktouslabel"><?php _e( 'Talk To Us', 'bizink' ); ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="meetings-iframe-container" data-src="https://meetings.bizinkonline.com/meetings/matt-bizink/bizink-product-demo?embed=true"></div>
			</div>
		</div>
	</div>
</div>
<?php 
wp_footer(); 
if(function_exists('get_field')){
	echo get_field('footer_scripts', 'option') ?: '';
}
?>
<script defer type="text/javascript" src="https://static.hsappstatic.net/MeetingsEmbed/ex/MeetingsEmbedCode.js"></script>
<?php require_once 'global-templates/cookie.php'; ?>
</body>
</html>
