<?php
/**
 * Single playbook post template
 */

get_header();
?>
<section class="playbook-section">
	<div class="container">
		<div class="row">            
			<aside class="col-md-4 col-lg-3">
				<div class="aside-inner-wrap">

					<?php
					echo wp_nav_menu(
						array(
							'theme_location' => 'our-playbook-menu',
						)
					);
					?>
									</div>
				
			</aside>                         
			<div class="col-md-8 col-lg-9">
				<div class="default-content playbook-editor">

					<?php
					global $post;
							$post_id = $post->ID;

							$content_post = get_post( $post_id );
							$content      = $content_post->post_content;
							$content      = apply_filters( 'the_content', $content );
							// $content = str_replace(']]>', ']]&gt;', $content);
							echo $content;
					?>
						  
				</div>

			</div>
		</div>
	</div>	
</section>

<?php
get_footer();
?>
