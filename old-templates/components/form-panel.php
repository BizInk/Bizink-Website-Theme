<?php
// Build classes for filler
$formPanelClasses = array();
$formPanelClasses[] = 'formPanel';
$formPanelClasses[] = "formPanel-" . get_sub_field('alignment');
$formPanelClassesString = implode( ' ', $formPanelClasses );

// Get content from ACF
$formId = get_sub_field('form_id');
?>

<div class="<?php echo $formPanelClassesString; ?>">

  <h2 class="formPanel_heading">
    <?php 
      $form = GFAPI::get_form( $formId );
      echo $form['title'];
    ?>
  </h2><!-- /.formPanel_heading -->

  <div class="formPanel_body">
    <?php gravity_form( $formId, false, false, false, null, true ); ?>
  </div><!-- /.formPanel_body -->

</div><!-- /.formPanel -->
