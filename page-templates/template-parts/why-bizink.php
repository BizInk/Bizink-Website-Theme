<!-- navyblue-bg, yellow-bg, lightblue-bg, purple-bg, gray-bg, light-gray-bg, lightblue2-bg, darkpurple-bg -->
<?php
$why_bizik_bg = '';
if ( get_sub_field( 'section_background_color' ) == 'navyblue' ) {
	$why_bizik_bg = 'navyblue-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'lightblue' ) {
	$why_bizik_bg = 'lightblue-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'purple' ) {
	$why_bizik_bg = 'purple-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'yellow' ) {
	$why_bizik_bg = 'yellow-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'gray' ) {
	$why_bizik_bg = 'gray-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'light gray' ) {
	$why_bizik_bg = 'light-gray-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'lightblue2' ) {
	$why_bizik_bg = 'lightblue2-bg';
} elseif ( get_sub_field( 'section_background_color' ) == 'darkpurple' ) {
	$why_bizik_bg = 'darkpurple-bg';
}
$image_position = '';
if ( get_sub_field( 'image_position' ) == 'left' ) {
	$image_position = 'left-image';
} elseif ( get_sub_field( 'image_position' ) == 'right' ) {
	$image_position = 'right-image';
}
$bgImage   = get_sub_field( 'section_background_image' );
$mainImage = get_sub_field( 'whay_main_image' );
$whay_main_title = get_sub_field( 'whay_main_title' ) ?? __( 'Why Bizink', 'bizink' );
?>
<section class="<?php echo $why_bizik_bg; ?> bussiness-list-section <?php echo $image_position; ?>" 
							<?php
							if ( $bgImage ) :
								?>
	style="background-image: url(<?php echo $bgImage; ?>);" <?php endif; ?>>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="image">
					<?php if( $mainImage ): ?>
						<img src="<?php echo $mainImage; ?>" alt="<?php echo $whay_main_title; ?>">
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="success-list">
					<?php
					if ( $whay_main_title ) { ?>
						<h2><?php echo $whay_main_title; ?></h2>
					<?php } ?>
					<?php if ( have_rows( 'text_content' ) ) : ?>
						<ul class="purple-bg">
							<?php
							while ( have_rows( 'text_content' ) ) :
								the_row();
								?>
								<li><?php the_sub_field( 'item' ); ?></li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>
