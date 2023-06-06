<?php
/**
 * Single blog post template
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>
<div class="row">

   <div class="section section-grayLight">
      <div class="container">
         <div class="jumbo jumbo-centered">
            <h2 class="jumbo_heading jumbo_heading-lg">
               <span><?php the_title(); ?></span>
            </h2>
            <!-- /.jumbo_heading -->
         </div>
         <!-- /.jumbo -->
      </div>
      <!-- /.container -->
   </div>

   <div class="section section-white mb-4">
      <div class="container">
         <div class="row">
            <div class="col-sm-9 basicContent marketing-content-field">
               <?php echo get_field('content'); ?>
            </div>
            <div class="col-sm-3 basicContent">
               <div class="marketing-content-buttons">
                  <?php
                  $file = get_field('download_doc');
                  if ($file) :
                  ?>
                     <a class="btn btn-primary" href="<?php echo $file['url']; ?>">Download Content</a>
                  <?php
                  endif;
                  ?>
               </div>
               <div class="marketing-content-buttons">
                  <?php
                  $file = get_field('social_media_post');
                  if ($file) :
                  ?>
                     <a class="btn yellow-btn" href="<?php echo $file['url']; ?>">Download Social Media Post</a>
                  <?php
                  endif;
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php get_footer();
