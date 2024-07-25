<?php
$select_success_stories = get_sub_field( 'select_success_stories' );
// print_r($select_success_stories);
?>
<section class="image-text-grid-section">
	<div class="container">
		<div class="default-content">
			<?php if ( get_sub_field( 'section_title' ) ) { ?>
				<div class="row">
					<div class="col-lg-12">
						<h2><?php echo get_sub_field( 'section_title' ); ?></h2>
					</div>
				</div>
			<?php } ?>
			<?php if ( $select_success_stories ) { ?>
				<div class="row">
					<?php
					foreach ( $select_success_stories as $post_id ) {
						?>
						<div class="col-lg-4">
							<div class="image">
								<img src="<?php echo get_the_post_thumbnail_url( $post_id, 'full' ); ?>" alt="<?php echo get_the_title( $post_id ); ?>">
							</div>
							<h3><?php echo get_the_title( $post_id ); ?></h3>
							<?php echo apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) ); ?>
							<a href="<?php echo get_the_permalink( $post_id ); ?>"><?php _e( 'READ MORE', 'bizink' ); ?></a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
