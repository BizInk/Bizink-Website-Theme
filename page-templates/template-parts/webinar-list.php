<?php 
$number_of_website = get_sub_field('number_of_the_webinar_list_you_want_to_display');
if($number_of_website){
    $count = $number_of_website;
}else{
    $count = -1;
}
$view_all_website_link = get_sub_field('view_all_website_link');
$args = array(  
    'post_type' => 'webinars',
    'post_status' => 'publish',
    'meta_key' => 'date',
    'posts_per_page' => $count, 
	    'meta_query' => array(
	'key' => 'date',
	'value' => date('Y-m-d'),
	'compare' => '>=',
	'type' => 'DATE'
));
 //print_r( $args );

$loop = new WP_Query( $args ); 
?>
<section class="blog-grid-section bg">
	<div class="container">
		<div class="row">
			 <?php 
			 if( $loop->have_posts() ) { 	
			 while ( $loop->have_posts() ) { 
			 	 $loop->the_post();

			 	?>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<?php if(get_field('featured_image')) { ?>
					<div class="image">
						<img src="<?php the_field('featured_image'); ?>">
					</div>
				<?php } ?>
					<h3> <a href="<?php the_permalink(); ?>"><?php the_field('title'); ?></a> </h3>
					<div class="webinars-description">
						<?php
						$terms = get_the_terms( $post->ID, 'topics' );
							if ( !empty( $terms ) ){
							    // get the first term
							    $term = array_shift( $terms );
							    echo $term->name;
							}
					?>
						                                                        
					</div>
					<div class="webinars-date">
						<?php echo get_field('date'); ?>                                                       
					</div>
				</div>
			</div>
			 <?php }
			} else { ?>
			<h3 class="content-title">Upcoming</h3>	
			<div class="webinar-notice">There are currently no upcoming webinars available.</div>
		<?php	}
            wp_reset_postdata(); 
            ?>
			
		</div>

	</div>
</section>
<?php
$args = array(  
    'post_type' => 'webinars',
    'post_status' => 'publish',
    //'meta_key' => 'date',
    'posts_per_page' => $count, 
);
 //print_r( $args );

$loop = new WP_Query( $args ); 
?>
<section class="blog-grid-section bg">

	<div class="container">
		<div class="row">
			<h3 class="content-title">Recent</h3>
			 <?php 
			 if( $loop->have_posts() ) { 	
			 while ( $loop->have_posts() ) { 
			 	 $loop->the_post();

			 	?>
			<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<?php if(get_field('featured_image')) { ?>
					<div class="image">
						<img src="<?php the_field('featured_image'); ?>">
					</div>
				<?php } ?>
					<h3> <a href="<?php the_permalink(); ?>"><?php the_field('title'); ?></a> </h3>
					<div class="webinars-description">
						<?php
						$terms = get_the_terms( $post->ID, 'topics' );
							if ( !empty( $terms ) ){
							    // get the first term
							    $term = array_shift( $terms );
							    echo $term->name;
							}
					?>
						                                                        
					</div>
					<div class="webinars-date">
						<?php echo get_field('date'); ?>                                                       
					</div>
				</div>
			</div>
			 <?php }
			} 
            wp_reset_postdata(); 
            ?>
			
		</div>

	</div>
</section>
<style type="text/css">
	.webinar-notice {
    text-align: left;
    font-size: 20px;
    font-family: 'Avenir-Heavy';
    color: #ffffff;
    background-color: #333b61;
    padding: 20px;
    width: 100%;
    margin-bottom: 70px;
    border-radius: 10px;
}
</style>