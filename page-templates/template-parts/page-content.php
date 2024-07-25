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

<section class="states-section bg light-gray-bg">
	<div class="container">
		<div class="default-content">
			<div class="row">
				<div class="col">
					<p><?php echo get_sub_field( 'body_page_content' ); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
