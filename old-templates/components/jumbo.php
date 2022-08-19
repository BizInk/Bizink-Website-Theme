<?php

// Build classes for jumbo
$jumboClasses = array();
$jumboClasses[] = 'jumbo';
if ( get_sub_field('size_of_top_and_bottom_margins') == 'lgMargins' ) {
  $jumboClasses[] = "jumbo-lgMargins";
}
if ( get_sub_field('centered')) {
  $jumboClasses[] = "jumbo-centered";
}
$jumboClassesString = implode( ' ', $jumboClasses );

// Build classes for jumbo_heading
$jumboHeadingClasses = array();
$jumboHeadingClasses[] = 'jumbo_heading';
if ( get_sub_field('jumbo_heading_size') == 'large' ) {
  $jumboHeadingClasses[] = 'jumbo_heading-lg';
}
$jumboHeadingClassesString = implode( ' ', $jumboHeadingClasses );

// Build classes for jumbo_body
$jumboBodyClasses = array();
$jumboBodyClasses[] = 'jumbo_body';
$jumboBodyClasses[] = "jumbo_body-" . get_sub_field('jumbo_body_text_color');
if ( get_sub_field('jumbo_body_text_size') == 'default' ) {
  $jumboBodyClasses[] = 'jumbo_body-sm';
}
if ( get_sub_field('jumbo_body_size') == 'constrained' ) {
  $jumboBodyClasses[] = 'jumbo_body-constrained';
}
$jumboBodyClassesString = implode( ' ', $jumboBodyClasses );

// Get content from ACF
$jumboHeadingFirstRow  = get_sub_field('jumbo_heading_first_row');
$jumboHeadingSecondRow = get_sub_field('jumbo_heading_second_row');
$jumboBodyText         = get_sub_field('jumbo_body_text');
$jumboFooterText       = get_sub_field('jumbo_footer_text');
switch ( get_sub_field('show_text_or_buttons') ) {
  case 'text':
    $jumboFooterContent = 'text';
    $jumboFooterText    = get_sub_field('jumbo_footer_text');
    break;
  case 'buttons':
    $jumboFooterContent = 'buttons';
    break;
}

$hasCustomFontColor = get_sub_field('has_custom_font_color');
$customFontColor = '#FFF';
if ( $hasCustomFontColor ) {
  $customFontColor = get_sub_field('custom_font_color');
}

?>

<div class="<?php echo $jumboClassesString; ?>">

  <?php if( $jumboHeadingFirstRow || $jumboHeadingSecondRow ): ?>
    <h2 
      <?php if ( $hasCustomFontColor ) : ?>
        style="color: <?= $customFontColor ?>;"
      <?php endif; ?>
      class="<?php echo $jumboHeadingClassesString; ?>">

      <?php if( $jumboHeadingFirstRow ): ?>
        <span><?php echo $jumboHeadingFirstRow; ?></span>
      <?php endif; ?>

      <?php if( $jumboHeadingSecondRow ): ?>
        <span><?php echo $jumboHeadingSecondRow; ?></span>
      <?php endif; ?>

    </h2><!-- /.jumbo_heading -->
  <?php endif; ?>

  <?php if( $jumboBodyText ): ?>
    <div 
      <?php if ( $hasCustomFontColor ) : ?>
        style="color: <?= $customFontColor ?>;"
      <?php endif; ?>
      class="<?php echo $jumboBodyClassesString; ?>">

      <?php echo $jumboBodyText; ?>

    </div><!-- /.jumbo_body -->
  <?php endif; ?>

  <?php if( $jumboFooterContent == 'buttons'
    || ( $jumboFooterContent == 'text' && $jumboFooterText ) ): ?>
      <div 
        <?php if ( $hasCustomFontColor ) : ?>
          style="color: <?= $customFontColor ?>;"
        <?php endif; ?>
        class="jumbo_footer">

        <?php if( $jumboFooterContent == 'text' ): ?>
          <?php echo $jumboFooterText; ?>
        <?php endif; ?>

        <?php if( $jumboFooterContent == 'buttons' ): ?>
          <a class="btn btn-blue wistia-popover[height=478,playerColor=7b796a,width=800]" href="//fast.wistia.net/embed/iframe/6z1s15eisi?popover=true" role="button"><?php _e('Video ►', 'bizink'); ?></a>
          <a class="btn btn-primary" href="#book-online-demo" data-toggle="modal" data-target="#bookDemoModal" role="button"><?php _e('Book online demo', 'bizink'); ?></a>
        <?php endif; ?>

      </div><!-- /.jumbo_footer -->
  <?php endif; ?>

</div><!-- /.jumbo -->
