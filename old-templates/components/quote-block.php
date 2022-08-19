<?php
// Build classes for filler
$quoteBlockClasses = array();
$quoteBlockClasses[] = 'quoteBlock';
if ( get_sub_field('centered')) {
  $quoteBlockClasses[] = "quoteBlock-centered";
}
$quoteBlockClassesString = implode( ' ', $quoteBlockClasses );

// Get content from ACF
$quoteBlockQuote  = get_sub_field('quote_block_quote');
$quoteBlockSource = get_sub_field('quote_block_source');

?>

<div class="<?php echo $quoteBlockClassesString; ?>">

  <?php if( $quoteBlockQuote ): ?>
    <div class="quoteBlock_quote">
      <?php echo $quoteBlockQuote; ?>
    </div><!-- /.quoteBlock_quote -->
  <?php endif; ?>

  <?php if( $quoteBlockSource ): ?>
    <div class="quoteBlock_source">
      <?php echo $quoteBlockSource; ?>
    </div><!-- /.quoteBlock_source -->
  <?php endif; ?>

</div><!-- /.quoteBlock -->
