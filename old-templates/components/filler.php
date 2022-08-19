<?php
// Build classes for filler
$fillerClasses = array();
$fillerClasses[] = 'filler';
if ( get_sub_field('centered')) {
  $fillerClasses[] = "filler-centered";
}
$fillerClassesString = implode( ' ', $fillerClasses );

// Get content from ACF
$fillerHeadingText = get_sub_field('filler_heading_text');
$fillerBodyText    = get_sub_field('filler_body_text');
?>
<div class="<?php echo $fillerClassesString; ?>">

  <?php if( $fillerHeadingText ): ?>
    <h2 class="filler_heading">
      <?php echo $fillerHeadingText; ?>
    </h2><!-- /.filler_heading -->
  <?php endif; ?>

  <?php if( $fillerBodyText ): ?>
    <div class="filler_body">
      <?php echo $fillerBodyText; ?>
    </div><!-- /.filler_body -->
  <?php endif; ?>

</div><!-- /.filler -->
