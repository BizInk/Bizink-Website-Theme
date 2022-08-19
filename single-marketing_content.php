<?
/**
 * Single blog post template
 */
?>
<div class="section section-grayLight">
   <div class="container">
      <div class="jumbo jumbo-centered">
         <h2 class="jumbo_heading jumbo_heading-lg">
            <span><?= get_the_title(); ?></span>
         </h2>
         <!-- /.jumbo_heading -->
      </div>
      <!-- /.jumbo -->
   </div>
   <!-- /.container -->
</div>

<div class="section section-white">
   <div class="container">
     <div class="row">
         <div class="col-sm-9 basicContent marketing-content-field">
            <?= get_field('content'); ?>
     	</div>	
     	<div class="col-sm-3 basicContent">
          <div class="marketing-content-buttons"> 
          <?php
                $file = get_field('download_doc');
                if($file): 
            ?>
                    <a class="btn btn-primary" href="<?= $file['url']; ?>">Download Content</a>
            <?php 
                endif; 
            ?>
            </div>
          	  <div class="marketing-content-buttons"> 
          <?php
                $file = get_field('social_media_post');
                if($file): 
            ?>
                    <a class="btn btn-blue" href="<?= $file['url']; ?>">Download Social Media Post</a>
            <?php 
                endif; 
            ?>
            </div>
     	</div>
     </div>
   </div>
</div>

<!-- <div class="section section-white">
   <div class="container">
   	 <div class="basicContent">
      <h2>Related Content</h2>
      <div>
         <div>
            <ul>
            	<?php
					$related_content = get_field('related-content');
					if( $related_content ): ?>
					    <ul>
					    <?php foreach( $related_content as $post ): 
					        setup_postdata($post); ?>
					        <li>
	                            <a href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>">
	                            <?= get_the_title(); ?>
	                            </a>
                        	</li>
					    <?php endforeach; ?>
					    </ul>
					    <?php 
					    // Reset the global post object so that the rest of the page works correctly.
					    wp_reset_postdata(); ?>
				<?php endif; ?>
            </ul>
         </div>
      </div>
 	 </div>
   </div>
</div> -->