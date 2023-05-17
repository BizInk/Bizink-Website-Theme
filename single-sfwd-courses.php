<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;
//get_header();
?>

<div class="section section-white ">

  <div class="container sidebar-primary">
    <?php get_template_part('templates/page', 'header'); ?>

    <?php //if (Config\display_sidebar()) : ?>
      <div class="row ">
    <?php //endif; ?>

    <div class="basicContent">

      <?php if (!have_posts()) : ?>
        <div class="alert alert-warning">
          <?php _e('Sorry, no results were found.', 'sage'); ?>
        </div>
        <?php get_search_form(); ?>
      <?php endif; ?>

      <?php get_template_part('templates/content-single', get_post_type()); ?>

      <?php the_posts_navigation(); ?>

    </div><!-- /.basicContent -->

      <aside class="sidebar" role="complementary">
        <a class="btn btn-primary btn-marketing" href="/marketing-content-home/">Marketing Content Pack >></a>
      </aside><!-- /.sidebar -->

      </div><!-- /.row -->

  </div><!-- /.container -->

</div><!-- /.section.section-white -->
<?php
//get_footer();
?>