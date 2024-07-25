<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="error-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<?php if ( get_field( '404__page_title', 'option' ) ) { ?>
					<h1><?php the_field( '404__page_title', 'option' ); ?></h1>
				<?php } ?>	
				<?php if ( get_field( '404_page_description', 'option' ) ) { ?>
					<?php the_field( '404_page_description', 'option' ); ?>
				<?php } ?>	
				<a href="<?php echo site_url(); ?>" class="btn navyblue-btn"><?php _e( 'Back to Home', 'bizink' ); ?></a>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
