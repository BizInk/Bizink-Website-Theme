<?php
?>

<!-- <section class="guide-sec">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<h2>Complete Guide to Marketing Automation for Accountants</h2>
				<p>Download our free guide to discover how to put your firm’s marketing on auto-pilot</p>
			</div>
			<div class="col-lg-6">
				
			</div>
		</div>
	</div>
</section> -->

<section class="included-sec">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="content">
					<?php the_sub_field('first_description'); ?>
				</div>
			</div>
			<div class="col-12">
				<div class="middle-img text-center">
					<img src="<?php the_sub_field('marketing_image'); ?>">
				</div>
			</div>
			<div class="col-12 content-2">
				<?php the_sub_field('second_description'); ?>
			</div>
		</div>
	</div>
</section>