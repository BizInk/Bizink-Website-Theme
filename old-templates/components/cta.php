<?php
// Build classes for cta
$ctaClasses = array();
$ctaClasses[] = 'cta';
if ( get_sub_field('centered')) {
  $ctaClasses[] = "cta-centered";
}
$ctaClassesString = implode( ' ', $ctaClasses );

// Get content from ACF
$ctaText = get_sub_field('cta_text');

$ctaButtonHref = get_sub_field('cta_button_href');
$ctaButtonString = '';
switch( $ctaButtonHref ) {
  case 'default':
    $ctaButtonString = 'href="#book-online-demo" data-toggle="modal" data-target="#bookDemoModal"';
    break;
  case 'custom':
    $customHref = get_sub_field('internal_or_external_href') == 'internal' ? get_sub_field('custom_internal_href') : get_sub_field('custom_external_href');
    if ( $customHref ) {
      $ctaButtonString = "href=$customHref";
    }
    break;
}

$ctaButtonText = get_sub_field('cta_button_text');

?>

<div class="<?php echo $ctaClassesString; ?>">

  <?php if( $ctaText ): ?>
    <div class="cta_text">
      <?php echo $ctaText; ?>
    </div><!-- ./cta_text -->
  <?php endif; ?>

  <?php if( $ctaButtonString && $ctaButtonText ): ?>
    <div class="cta_button">
      <a class="btn btn-primary btn-lg" <?php echo $ctaButtonString; ?> role="button"><?php echo $ctaButtonText; ?></a>
    </div><!-- ./cta_button -->
  <?php endif; ?>

</div><!-- ./cta -->
