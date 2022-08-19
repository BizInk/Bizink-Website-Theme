<?php

// Create custom query for clients
$args = array(
  'post_type'      => 'bizink_client',
  'posts_per_page' => -1,
);
$query = new WP_Query( $args );
?>

<?php if ( $query->have_posts() ) : ?>

  <div class="row">

  <?php while ( $query->have_posts() ) : $query->the_post(); 
      $boxIcon       = '';
      // Get and setup content box image
      $boxImageArray      = get_field('client_image');
      if ( $boxImageArray ) {
        $boxSizedImage  = $boxImageArray['sizes']['medium'];
        $boxImageAlt    = $boxImageArray['alt'];
      }
      $boxHeaderText = get_the_title();
      $boxLink       = get_field('client_link');
      $boxBodyText   = '';
      $showButton    = '';
      if ( $showButton ) {
        $buttonHref = get_sub_field('internal_or_external_href') == 'internal' ? get_sub_field('custom_internal_href') : get_sub_field('custom_external_href');
        $buttonText = get_sub_field('button_text');
      }
      
    ?>

      <div class="col-sm-6 col-lg-4 smartClear">

        <div class="contentBox">

          <div class="contentBox_header">

            <?php if( $boxIcon ): ?>
              <div class="contentBox_headerIcon">
                <svg class="shape shape-orange">
                  <use xlink:href="#<?php echo $boxIcon; ?>" />
                </svg>
              </div><!-- /.contentBox_headerIcon -->
            <?php endif; ?>

            <?php if( $boxLink ): ?>
              <a class="contentBox_link" href="<?php echo $boxLink; ?>" target="_blank">
            <?php endif; ?>

              <?php if( $boxSizedImage ): ?>
                <figure class="contentBox_figure" style="max-width: 80%;margin: 0 auto;">
                  <img class="contentBox_figureImg" src="<?php echo $boxSizedImage; ?>" alt="<?php echo $boxImageAlt; ?>">
                </figure><!-- /.contentPanel_figure -->
              <?php endif; ?>

              <?php if( $boxHeaderText ): ?>
                <h2 class="contentBox_headerText">
                  <?php echo $boxHeaderText; ?>
                </h2><!-- /.contentBox_headerText -->
              <?php endif; ?>

            <?php if( $boxLink ): ?>
              </a>
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

    <?php wp_reset_postdata(); ?>

  </div><!-- /.row -->

<?php else : ?>

  <div class="basicContent">
    <div class="alert alert-danger" role="alert"><?php _e( 'No clients have been added yet!' ); ?></div>   
  </div>

<?php endif; ?>
