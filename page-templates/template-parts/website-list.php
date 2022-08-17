<?php 
$number_of_website = get_sub_field('number_of_the_website_list_you_want_to_display');
$website_section_main_title = get_sub_field('website_section_main_title');
if($number_of_website){
    $count = $number_of_website;
}else{
    $count = -1;
}
$view_all_website_link = get_sub_field('view_all_website_link');
$args = array(  
    'post_type' => 'websites',
    'post_status' => 'publish',
    'posts_per_page' => $count,         
);

$loop = new WP_Query( $args ); 
?>
<section class="web-list-section">
	<div class="container">
	<div class="row justify-content-center text-center">
		<h2><?php echo $website_section_main_title; ?></h2>
	</div>
		<?php $per_page_post = '';
				if(get_sub_field('show_post_per_row') == 'three'){
					$per_page_post = "4";
				} elseif(get_sub_field('show_post_per_row') == 'four')
					$per_page_post = "3";  
				?>
		<div class="row justify-content-center text-center">
			
            <?php while ( $loop->have_posts() ) : $loop->the_post(); 
				
			?>
                <div class="col-lg-<?php echo $per_page_post;  ?> col-md-<?php echo $per_page_post; ?>">
                    <a href="<?php echo get_the_permalink(); ?>">
                    	<?php if(get_field('featured_image')) { ?>
                        <div class="icon">
                            <img src="<?php the_field('featured_image'); ?>" class="img-fluid">
                        </div>
                    <?php } ?>
                        <h4><?php echo get_the_title(); ?> </h4>
                        <?php if(get_field('location')){ ?><p><?php echo get_field('location'); ?></p><?php } ?>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata(); 
            ?>
            <?php if($view_all_website_link && $count != -1){ ?><div class="col-md-12 col-lg-12"><a href="<?php echo $view_all_website_link['url']; ?>" target="<?php echo $view_all_website_link['target']; ?>" class="btn navyblue-btn"><?php echo $view_all_website_link['title']; ?></a></div><?php } ?>
        </div>
	</div>
</section> 
  
<?php /*        
<section class="web-list-section">
	<div class="container">
		<div class="row justify-content-center text-center">

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Marama-Tatuhi.png" class="img-fluid">
					</div>
					<h4>Hanshaw </h4>
					<p>Malaysia</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Collins-Financial.png" class="img-fluid">
					</div>
					<h4>Marama Tatuhi</h4>
					<p>UK</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Xperion.png" class="img-fluid">
					</div>
					<h4>Xperion</h4>
					<p>Australia</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Marama-Tatuhi.png" class="img-fluid">
					</div>
					<h4>Hanshaw </h4>
					<p>Malaysia</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Collins-Financial.png" class="img-fluid">
					</div>
					<h4>Marama Tatuhi</h4>
					<p>UK</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Xperion.png" class="img-fluid">
					</div>
					<h4>Xperion</h4>
					<p>Australia</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Collins-Financial.png" class="img-fluid">
					</div>
					<h4>Hanshaw </h4>
					<p>Malaysia</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Marama-Tatuhi.png" class="img-fluid">
					</div>
					<h4>Marama Tatuhi</h4>
					<p>UK</p>
				</a>
			</div>

			<div class="col-lg-4 col-md-4">
				<a href="#">
					<div class="icon">
						<img src="https://bizink2021.bizinkonline.com/app/uploads/2021/03/Xperion.png" class="img-fluid">
					</div>
					<h4>Xperion</h4>
					<p>Australia</p>
				</a>
			</div>

			<a href="#" target="" class="btn navyblue-btn">SEE MORE WEBSITES</a>

		</div>
	</div>
</section> */ 
?>