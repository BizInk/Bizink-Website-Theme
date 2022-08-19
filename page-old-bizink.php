<?php /* Template Name: Old Bizink Page Template */ ?>
<?php
get_header();
?>
<?php while (have_posts()) : the_post(); ?>

  <?php if( have_rows('sections') ): ?>

    <?php while( have_rows('sections')  ): the_row(); 

      // Build classes for section
      $sectionClasses = array();
      $sectionClasses[] = "section";
      $sectionClasses[] = "section-" . get_sub_field('section_background_color');
      if ( get_sub_field('section_top_gradient') ) {
        $sectionClasses[] = "section-topGradient";
      }
      $sectionClassesString = implode( ' ', $sectionClasses );

      // Build classes for container
      $containerClasses = array();
      $containerClasses[] = "container";
      if ( get_sub_field('section_container_top_and_bottom_borders') ) {
        $containerClasses[] = "container-borders";
      }
      $containerClassesString = implode( ' ', $containerClasses );

      $bgImageArray = get_sub_field( 'section_background_image' );
      $bgImageUrl = false;
      if ( $bgImageArray ) {
        $bgImageUrl = $bgImageArray[ 'sizes' ][ 'full_bg_image' ];
      }

    ?>

    <div 
      <?php if ( $bgImageUrl ) : ?>
        style="background: url('<?= $bgImageUrl ?>') center / cover no-repeat;"
      <?php endif; ?>
      class="<?= $sectionClassesString; ?>">

      <div class="<?= $containerClassesString; ?>">

        <?php if( have_rows('components') ): ?>

          <?php while( have_rows('components')  ): the_row(); ?>


            <?php if( get_row_layout() == 'basic_text_content' ): ?>

              <?php get_template_part('old-templates/components/basic-text-content'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'jumbo' ): ?>

              <?php get_template_part('old-templates/components/jumbo'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'filler' ): ?>

              <?php get_template_part('old-templates/components/filler'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'heading' ): ?>

              <?php get_template_part('old-templates/components/heading'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'form_panel' ): ?>

              <?php get_template_part('old-templates/components/form-panel'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'content_panel' ): ?>

              <?php get_template_part('old-templates/components/content-panel'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'cta' ): ?>

              <?php get_template_part('old-templates/components/cta'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'quote_block' ): ?>

              <?php get_template_part('old-templates/components/quote-block'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'content_boxes' ): ?>

              <?php get_template_part('old-templates/components/content-boxes'); ?>

            <?php endif; ?>

            <?php if( get_row_layout() == 'blog_posts_in_content_boxes' ): ?>

              <?php get_template_part('old-templates/components/blog-posts-in-content-boxes'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'content_panel_text_only' ): ?>

              <?php get_template_part('old-templates/components/content-panel-text-only'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'clients' ): ?>

              <?php get_template_part('old-templates/components/clients'); ?>

            <?php endif; ?>


          <?php endwhile; ?>

        <?php endif; ?>

      </div><!-- /.container -->

    </div><!-- /.section -->

    <?php endwhile; ?>

  <?php endif; ?>

<?php endwhile; ?>

<?php
get_footer();
?>
