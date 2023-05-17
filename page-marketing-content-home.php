<?php 
/* Template Name: Marketing Resources Home */
?>

<?php 
get_header();
while (have_posts()) : the_post(); ?>

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

              <?php get_template_part('templates/components/basic-text-content'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'jumbo' ): ?>

              <?php get_template_part('templates/components/jumbo'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'filler' ): ?>

              <?php get_template_part('templates/components/filler'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'heading' ): ?>

              <?php get_template_part('templates/components/heading'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'form_panel' ): ?>

              <?php get_template_part('templates/components/form-panel'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'content_panel' ): ?>

              <?php get_template_part('templates/components/content-panel'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'cta' ): ?>

              <?php get_template_part('templates/components/cta'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'quote_block' ): ?>

              <?php get_template_part('templates/components/quote-block'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'content_boxes' ): ?>

              <?php get_template_part('templates/components/content-boxes'); ?>

            <?php endif; ?>

            <?php if( get_row_layout() == 'blog_posts_in_content_boxes' ): ?>

              <?php get_template_part('templates/components/blog-posts-in-content-boxes'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'content_panel_text_only' ): ?>

              <?php get_template_part('templates/components/content-panel-text-only'); ?>

            <?php endif; ?>


            <?php if( get_row_layout() == 'clients' ): ?>

              <?php get_template_part('templates/components/clients'); ?>

            <?php endif; ?>


          <?php endwhile; ?>

        <?php endif; ?>

      </div><!-- /.container -->

    </div><!-- /.section -->

    <?php endwhile; ?>

  <?php endif; ?>

<?php endwhile; ?>

<div class="section section-white">
   <div class="container">
    <div class="contentPanel">
      <div class="blockHeader">
         <h2 class="blockHeader_title">Find Content By Topic</h2>
      </div>
      <!-- /.blockHeader -->
      <div class="row">
        <?php $custom_topics = get_terms('topics');
          foreach($custom_topics as $key=>$custom_topic) {
              wp_reset_query();
              $args = array('post_type' => 'marketing_content',
                  'tax_query' => array(
                      array(
                          'taxonomy' => 'topics',
                          'field' => 'slug',
                          'terms' => $custom_topic->slug,
                      ),
                  ),
               );
               $data = new WP_Query($args);
               ?>
               <div class="col-sm-6 col-md-3 col-verticalSpacing">
                  <a class="iconTile iconTile-alt" href="/content-topics/<?= $custom_topic->slug; ?>/" title="<?= $custom_topic->name;  ?> ">
                     <div class="iconTile_content js-matchHeight" style="height: 258px;">
                        <div class="iconTile_icon">
                           <div class="u-scalingSvg">
                              <svg class="u-scalingSvg_shape">
                                 <use xlink:href="#<?= get_field('icon', $custom_topic->taxonomy . '_' . $custom_topic->term_id); ?>"></use>
                              </svg>
                           </div>
                        </div>
                        <!-- /.iconTile_icon -->
                        <h2 class="iconTile_title">
                           <?= $custom_topic->name;  ?>         
                        </h2>
                        <!-- /.iconTile_title -->
                     </div>
                     <!-- /.iconTile_content -->
                  </a>
                  <!-- /.iconTile -->
               </div>
       <?php } ?>
      </div>
      <!-- /.row -->
      </div>
   </div>
</div>

<div class="section section-white">
     <div class="container">
       <div class="basicContent">
          <div class="row">
<?php $custom_terms = get_terms('types');
$leftBlock = '';
$rightBlock = '';
foreach($custom_terms as $key=>$custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'marketing_content',
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );
     $loop = new WP_Query($args);
     if($loop->have_posts()) {
       $collapse_template = '
          <div class="collapseBlock">
             <a href="#collapseBlock-'.$key.'" class="collapseBlock_header collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample">
                <h3 class="collapseBlock_title">
                   '.$custom_term->name.'            
                </h3>
                <div class="collapseBlock_transformIcon">
                   <div class="transformIconPlus">
                      <span class="transformIconPlus_icon transformIconPlus_icon-minus">
                         <svg class="transformIconPlus_shape">
                            <use xlink:href="#shape-minus"></use>
                         </svg>
                      </span>
                      <span class="transformIconPlus_icon transformIconPlus_icon-plus">
                         <svg class="transformIconPlus_shape">
                            <use xlink:href="#shape-plus"></use>
                         </svg>
                      </span>
                   </div>
                </div>
                <!-- /.collapseBlock_transformIcon -->
             </a>
             <!-- /.collapseBlock_header -->
             <div id="collapseBlock-'.$key.'" class="collapseBlock_collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="collapseBlock_content">
                   <div class="collapseBlock_body">
                      <ul>';

                          while($loop->have_posts()) : $loop->the_post();
                         $collapse_template .= '<li>
                            <a href="'. get_permalink().'" title="'.get_the_title().'">
                            '.get_the_title().'
                            </a>
                         </li>';
                            endwhile;

                      $collapse_template .= '</ul>
                   </div>
                   <!-- /.collapseBlock_body -->
                   <div class="collapseBlock_footer">
                      <a href="/content-types/'.$custom_term->slug.'/" class="collpaseBlock_navLink" title="'.$custom_term->slug.'">
                      See All &gt;                  </a>
                   </div>
                   <!-- /.collapseBlock_footer -->
                </div>
                <!-- /.collapseBlock_content -->
             </div>
             <!-- /.collapseBlock_collapse -->
          </div>
          <!-- /.collapseBlock -->';
        if($key % 2 == 0){ 
          $leftBlock .= $collapse_template;
        } 
        else{ 
          $rightBlock .= $collapse_template;
        } 
     }
} ?>
            <div class="col-sm-6">
              <?= $leftBlock; ?>
            </div>
            <div class="col-sm-6">
              <?= $rightBlock; ?>
            </div>
          </div >
       </div>
      </div>
</div>

<script>
  // SVG spritesheet include
  var ajax = new XMLHttpRequest();
  ajax.open("GET", "<?php echo get_template_directory_uri(); ?>/images/svg-sprites.svg", true);
  ajax.send();
  ajax.onload = function(e) {
    var div = document.createElement("div");
    div.style.display = "none";
    div.innerHTML = ajax.responseText;
    document.body.insertBefore(div, document.body.childNodes[0]);
  }
</script>

<?php
get_footer();
?>