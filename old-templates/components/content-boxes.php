<?php

$boxes      = get_sub_field('boxes');
$boxesCount = count($boxes);

$showBackground = get_sub_field('show_background_for_boxes');
if ($showBackground) {
  $forceEqualHeight   = get_sub_field('force_equal_height');
  $boxBackgroundColor = get_sub_field('box_background_color');
}

// Build classes for row
$rowClasses = array();
$rowClasses[] = 'row';
if ( isset($forceEqualHeight) && $forceEqualHeight ) {
  $rowClasses[] = 'row-eq-height';
}
$rowClassesString = implode( ' ', $rowClasses );

// Build classes for columns
$colClasses = array();
$colClasses[] = 'col-sm-6';
$colClasses[] = 'smartClear';
if ( isset($forceEqualHeight) && $forceEqualHeight ) {
  $colClasses[] = 'col-eq-height';
}
switch ( $boxesCount ) {
  case 3:
    $colClasses[] = 'col-lg-4';
    break;
  case 4:
    $colClasses[] = 'col-lg-3';
    break;
}
$colClassesString = implode( ' ', $colClasses );

// Build classes for contentBox
$contentBoxClasses = array();
$contentBoxClasses[] = 'contentBox';
if ( $showBackground ) {
  $contentBoxClasses[] = 'contentBox-bg';
  $contentBoxClasses[] = 'contentBox-' . $boxBackgroundColor . 'Bg';
}
$contentBoxClassesString = implode( ' ', $contentBoxClasses );

// Build classes for contentBox_headerText
$contentBoxHeaderTextClasses = array();
$contentBoxHeaderTextClasses[] = 'contentBox_headerText';
if ( get_sub_field('header_text_width') == 'constrained' ) {
  $contentBoxHeaderTextClasses[] = 'contentBox_headerText-constrained';
}
$contentBoxHeaderTextClassesString = implode( ' ', $contentBoxHeaderTextClasses );


?>

<?php if( have_rows('boxes') ): ?>

  <div class="<?php echo $rowClassesString; ?>">

    <?php while( have_rows('boxes')  ): the_row(); 
      $boxIcon       = get_sub_field('box_icon');
      $boxHeaderText = get_sub_field('box_header_text');
      $boxBodyText   = get_sub_field('box_body_text');
      $showButton    = get_sub_field('show_button_in_footer');
      if ( $showButton ) {
        $buttonHref = get_sub_field('internal_or_external_href') == 'internal' ? get_sub_field('custom_internal_href') : get_sub_field('custom_external_href');
        $buttonText = get_sub_field('button_text');
      }
      
    ?>

      <div class="<?php echo $colClassesString; ?>">

        <div class="<?php echo $contentBoxClassesString; ?>">

          <div class="contentBox_header">

            <?php if( $boxIcon ): ?>
              <div class="contentBox_headerIcon">
                <svg class="shape shape-orange">
                  <use xlink:href="#<?php echo $boxIcon; ?>" />
                </svg>
              </div><!-- /.contentBox_headerIcon -->
            <?php endif; ?>

            <?php if( $boxHeaderText ): ?>
              <h2 class="<?php echo $contentBoxHeaderTextClassesString; ?>">
                <?php echo $boxHeaderText; ?>
              </h2><!-- /.contentBox_headerText -->
            <?php endif; ?>

          </div><!-- /.contentBox_header -->

          <?php if( $boxBodyText ): ?>
            <div class="contentBox_body">
              <?php echo $boxBodyText; ?>
            </div><!-- /.contentBox_body -->
          <?php endif; ?>

          <?php if( $showButton && $buttonHref && $buttonText ): ?>
            <div class="contentBox_footer">
              <a class="btn btn-primary" href="<?php echo $buttonHref; ?>" role="button"><?php echo $buttonText; ?></a>
            </div><!-- /.contentBox_footer -->
          <?php endif; ?>

        </div><!-- /.contentBox -->

      </div><!-- /.col -->

    <?php endwhile; ?>

  </div><!-- /.row -->

<?php endif; ?>
