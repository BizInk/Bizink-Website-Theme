<?php
/**
* Single Resource Content Type page
*/
get_header();
$tax = $wp_query->get_queried_object();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/css/theme.bootstrap_4.min.css" integrity="sha512-2C6AmJKgt4B+bQc08/TwUeFKkq8CsBNlTaNcNgUmsDJSU1Fg+R6azDbho+ZzuxEkJnCjLZQMozSq3y97ZmgwjA==" crossorigin="anonymous" />
<div class="section section-grayLight">
   <div class="container">
      <div class="jumbo jumbo-centered">
         <h2 class="jumbo_heading jumbo_heading-lg">
            <span>Content Topic: <?= $tax->name; ?></span>
         </h2>
         <!-- /.jumbo_heading -->
      </div>
      <!-- /.jumbo --> 
   </div>
   <!-- /.container -->
</div>
<div class="section section-white">
   <div class="container sidebar-primary">
   	 <div class="basicContent">
      <h2><?= $tax->name; ?></h2>
      <div>
         <div>
             <table id="myTable" class="table table-bordered table-striped">
              <thead class="thead-dark">
                <tr>
                  <th>Title</th>
                  <th>Type</th>
                  <th>Published Date</th>
                </tr>
              </thead>
              <tbody>
                  <?php 
                    $args = array(
                    'post_type' => 'marketing_content',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'topics',
                            'field' => 'slug',
                            'terms' => $tax->name,
                        ),
                    ),
                );
                $loop = new WP_Query($args);
                if($loop->have_posts()) {
                  while($loop->have_posts()) : $loop->the_post();
                    $geo = get_post_meta( $post->ID , 'geot_options', true )["country_code"];
                    if (in_array(geot_country_code(), $geo) || empty($geo)) :
                    ?>
                            <tr>
                              <td><a href="<?= get_permalink(); ?>" title="<?= get_the_title(); ?>">
                                <?= get_the_title(); ?>
                                </a></td>
                              <td>
                                <?php 
                                  $terms = get_the_terms( $post->ID , 'types' );
                                  if ( $terms != null ){
                                     foreach( $terms as $term ) {
                                      if( !next( $terms ) ) {
                                        echo $term->name;
                                      }
                                      else{
                                        echo $term->name. ", ";
                                      }
                                     
                                     unset($term);
                                     }
                                  }
                                ?>
                              </td>
                              <td><?= get_the_date( 'M d, Y' ); ?></td>
                            </tr>
                            <?php
                               endif;
                            endwhile;
                        }
                  ?>
              </tbody>
            </table>
         </div>
      </div>
 	 </div>
      <aside class="sidebar" role="complementary">
        <a class="btn btn-primary btn-marketing" href="/marketing-content-home/" style="margin-top:97px">Marketing Content Pack >></a>
        <br>
      </aside><!-- /.sidebar -->
   </div>
</div>

<script type="text/javascript">
  jQuery(function() {
  jQuery("#myTable").tablesorter();
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.3/js/jquery.tablesorter.min.js" integrity="sha512-qzgd5cYSZcosqpzpn7zF2ZId8f/8CHmFKZ8j7mU4OUXTNRd5g+ZHBPsgKEwoqxCtdQvExE5LprwwPAgoicguNg==" crossorigin="anonymous"></script>
<?php
get_footer();
?>