<?php
$section_background_color = get_sub_field( 'section_background_color' );
$title_color              = get_sub_field( 'title_color' );
?>

<section class="page-title-section bg text-center <?php echo $section_background_color; ?> <?php echo $title_color; ?>">
	<div class="container">
		<?php
		if ( get_sub_field( 'main_title' ) ) {
			?>
			<h2><?php echo get_sub_field( 'main_title' ); ?></h2><?php } ?>
		<?php
		if ( get_sub_field( 'sub_title' ) ) {
			echo '<h3>' . get_sub_field( 'sub_title' ) . '</h3>'; }
		?>
	</div>
</section>
