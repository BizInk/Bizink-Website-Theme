<?php

// Build classes for contentPanel
$contentPanelClasses = array();
$contentPanelClasses[] = 'contentPanel';
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

$contentPanelTextHeading2 = get_sub_field('content_panel_text_heading2');
$contentPanelTextBody2    = get_sub_field('content_panel_text_body2');

?>

<div class="<?php echo $contentPanelClassesString; ?>">

  <div class="row">

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

    <div class="contentPanel_text col-sm-6">

      <?php if( $contentPanelTextHeading2 ): ?>
        <h3 class="<?php echo $contentPaneltextHeadingClassesString; ?>">
          <?php echo $contentPanelTextHeading2; ?>
        </h3><!-- /.contentPanel_textHeading -->
      <?php endif; ?>

      <?php if( $contentPanelTextBody2 ): ?>
        <div class="contentPanel_textBody">
            <?php echo $contentPanelTextBody2; ?>
        </div><!-- /.contentPanel_textBody -->
      <?php endif; ?>

    </div><!-- /.contentPanel_text -->

  </div><!-- /.row -->

</div><!-- /.contentPanel -->
