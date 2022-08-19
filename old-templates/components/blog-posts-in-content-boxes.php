<?php

$numberOfNewsItems = get_sub_field('number_of_news_items');
if ( ! $numberOfNewsItems ) { $numberOfNewsItems = 3; };
query_posts("showposts={$numberOfNewsItems}");

$boxesCount = $wp_query->post_count;

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

<?php if( have_posts() ): ?>

  <div class="<?php echo $rowClassesString; ?>">

    <?php while( have_posts()  ): the_post(); 
      $boxIcon       = false;
      $boxHeaderText = get_the_title();
      $boxBodyText   = true;
      $showButton    = false;
      $postHref      = get_the_permalink();
      if ( $showButton ) {
        $buttonHref = get_the_permalink();
        $buttonText = __('Read more »', 'sage');
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
                <a href="<?php echo $postHref; ?>"><?php echo $boxHeaderText; ?></a>
              </h2><!-- /.contentBox_headerText -->
            <?php endif; ?>

          </div><!-- /.contentBox_header -->

          <?php if( $boxBodyText ): ?>
            <div class="contentBox_body">

              <?php if ( get_the_post_thumbnail() ): ?>
                <p>
                  <a href="<?php echo $postHref; ?>">
                    <?php the_post_thumbnail('thumbnail_image'); ?>
                  </a>
                </p>
              <?php endif; ?>

              <?php wp_trim_words( get_the_content(), 25, '...' ); ?>
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

<?php wp_reset_query(); ?>
