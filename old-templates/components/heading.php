<?php

$showHeadingText = get_sub_field('show_text');
$isheadingCentered = get_sub_field('centered');

// Build classes for filler
$headingClasses = array();
$headingClasses[] = "heading";
if ( ! $isheadingCentered ) {
  $headingClasses[] = "heading-left";
}
$headingClassesString = implode( ' ', $headingClasses );


// Get content from ACF
if ( $showHeadingText ) {
  $headingText = get_sub_field('heading_text');
}

?>

<div class="<?php echo $headingClassesString; ?>">

  <?php if( $showHeadingText && $headingText ): ?>
    <h2 class="heading_text">
      <?php echo $headingText; ?>
    </h2><!-- /.heading_text -->
  <?php endif; ?>

  <div class="heading_horizontalRule">

    <?php if( $isheadingCentered ): ?>
      <div class="heading_downTriangle">
      </div><!-- /.heading_downTriangle -->
    <?php endif; ?>

  </div><!-- /.heading_horizontalRule -->

</div><!-- /.heading -->
