<?php

// Build classes for contentPanel
$contentPanelClasses = array();
$contentPanelClasses[] = 'contentPanel';
if ( get_sub_field('text_image_alignment') == 'textLeft' ) {
  $contentPanelClasses[] = "contentPanel-textLeft";
}
$contentPanelClassesString = implode( ' ', $contentPanelClasses );

// Build classes for contentPaneltextHeading
$contentPaneltextHeadingClasses = array();
$contentPaneltextHeadingClasses[] = 'contentPanel_textHeading';
if ( get_sub_field('content_panel_text_heading_alignment') == 'centered') {
  $contentPaneltextHeadingClasses[] = "contentPanel_textHeading-centered";
}
$contentPaneltextHeadingClassesString = implode( ' ', $contentPaneltextHeadingClasses );

// Get content from ACF
$contentPanelTextHeading = get_sub_field('content_panel_text_heading');
$contentPanelTextBody    = get_sub_field('content_panel_text_body');

// Get and setup content panel image
$contentPanelImageArray  = get_sub_field('content_panel_image');
if ( $contentPanelImageArray ) {
  $contentPanelSizedImage  = $contentPanelImageArray['sizes']['medium_large'];
  $contentPanelImageAlt    = $contentPanelImageArray['alt'];
}
?>

<div class="<?php echo $contentPanelClassesString; ?>">

  <div class="row">

    <figure class="contentPanel_figure col-sm-6">
      <?php if( $contentPanelSizedImage ): ?>
        <img class="contentPanel_figureImg" src="<?php echo $contentPanelSizedImage; ?>" alt="<?php echo $contentPanelImageAlt; ?>">
      <?php endif; ?>
    </figure><!-- /.contentPanel_figure -->

    <div class="contentPanel_text col-sm-6">

      <?php if( $contentPanelTextHeading ): ?>
        <h3 class="<?php echo $contentPaneltextHeadingClassesString; ?>">
          <?php echo $contentPanelTextHeading; ?>
        </h3><!-- /.contentPanel_textHeading -->
      <?php endif; ?>

      <?php if( $contentPanelTextBody ): ?>
        <div class="contentPanel_textBody">
            <?php echo $contentPanelTextBody; ?>
        </div><!-- /.contentPanel_textBody -->
      <?php endif; ?>

    </div><!-- /.contentPanel_text -->

  </div><!-- /.row -->

</div><!-- /.contentPanel -->
