<?php
?>

<section class="newsletter-sec py-5">
	<div class="container py-5">
		<div class="row py-5">
			<div class="col-12">
				<?php
				$bulletin_title_color = '';
	if( get_sub_field('bulletin_title_color') == 'purple' ) {
		$bulletin_title_color = 'title-purple';
	} elseif (get_sub_field('bulletin_title_color') == 'white') {
		$bulletin_title_color = 'title-white';
	} elseif (get_sub_field('bulletin_title_color') == 'yellow') {
		$bulletin_title_color = 'title-yellow';
	} 
				?>
				<h2 class="<?php echo $bulletin_title_color; ?>"><?php the_sub_field('bulletin_title'); ?></h2>
				<div class="content">
					<?php the_sub_field('bulletin_description'); ?>
				</div>
				<h3>Bizink Bulletin - Weekly Newsletter</h3>
				<span>A weekly digest of marketing tips, inspiration and resources by Matt Wilkinson, founder of Bizink.</span>
				<form>
					<input type="email" name="email" placeholder="Add your email address">
					<button type="submit" class="button">Signup »</button>
				</form>
				<img src="<?php the_sub_field('bulletin_image'); ?>">
			</div>
		</div>
	</div>
</section>
<style type="text/css">
	.title-purple{
		color: #b665a8;
	}
	.title-white{
		color: #fff;
	}
	.title-yellow{
		color: #F7A800;
	}
	.title-blue{
		color: #333b61;
	}

</style>