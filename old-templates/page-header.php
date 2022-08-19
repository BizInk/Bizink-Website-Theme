<?php use Roots\Sage\Titles; ?>

<div class="heading">
  <h2 class="heading_text">

  <?php

    if (get_post_type(get_the_ID()) == "sfwd-quiz" || get_post_type(get_the_ID()) == "sfwd-lessons" || get_post_type(get_the_ID()) == "sfwd-topic") :

      echo get_the_title(learndash_get_primary_course_for_step(get_the_ID()));

    elseif (learndash_is_course_post(get_the_ID())):
      
      echo 'Getting Started';

    else :

    echo Titles\title();

    endif; 
  ?>
  </h2><!-- /.heading_text -->

  <div class="heading_horizontalRule">

    <div class="heading_downTriangle">
    </div><!-- /.heading_downTriangle -->

  </div><!-- /.heading_horizontalRule -->

</div><!-- /.heading -->
