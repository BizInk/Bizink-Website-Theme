<?php
//$background_color = get_sub_field('select_background_color');
$title_text = get_sub_field('title_text');
$big_text_after_title = get_sub_field('big_text_after_title');
$description = get_sub_field('description');
$button_link_text = get_sub_field('button_link_text');
$button_background_options = get_sub_field('button_background_options');


$cta_main_title_color = '';
	if( get_sub_field('cta_title_color') == 'purple' ) {
		$cta_main_title_color = 'title-purple';
	} elseif (get_sub_field('cta_title_color') == 'white') {
		$cta_main_title_color = 'title-white';
	} elseif (get_sub_field('cta_title_color') == 'yellow') {
		$cta_main_title_color = 'title-yellow';
	} 

$text_after_title_color = '';
if( get_sub_field('text_after_title_color') == 'purple' ) {
		$text_after_title_color = 'title-purple';
	} elseif (get_sub_field('text_after_title_color') == 'white') {
		$text_after_title_color = 'title-white';
	} elseif (get_sub_field('text_after_title_color') == 'yellow') {
		$text_after_title_color = 'title-yellow';
	} elseif (get_sub_field('text_after_title_color') == 'blue') {
		$text_after_title_color = 'title-blue';
	} 

$cta_text_alignment	= '';
if( get_sub_field('cta_text_alignment') == 'center' ) {
	$cta_text_alignment = 'text-center';
} elseif(get_sub_field('cta_text_alignment') == 'left'){
	$cta_text_alignment = 'cta-section-left';
}

$two_column_bg_color = '';
if( get_sub_field('select_background_color') == 'navyblue-bg' ) {
	$two_column_bg_color = 'navyblue-bg';
} elseif( get_sub_field('select_background_color') == 'yellow-bg'){
	$two_column_bg_color = 'yellow-bg';
} elseif( get_sub_field('select_background_color') == 'lightblue-bg'){
	$two_column_bg_color = 'lightblue-bg';
} elseif( get_sub_field('select_background_color') == 'purple-bg'){
	$two_column_bg_color = 'purple-bg';
} elseif( get_sub_field('select_background_color') == 'light-gray-bg'){
	$two_column_bg_color = 'light-gray-bg';
} elseif( get_sub_field('select_background_color') == 'lightblue2-bg'){
	$two_column_bg_color = 'lightblue2-bg';
} elseif( get_sub_field('select_background_color') == 'white'){
	$two_column_bg_color = 'white-bg';
} elseif( get_sub_field('select_background_color') == 'darkpurple'){
	$two_column_bg_color = 'darkpurple-bg';	
}

?>
<section class="cta-section <?php echo $cta_text_alignment; ?> bg <?php echo $two_column_bg_color; ?>">
	<div class="container">
		<div class="default-content">
			<?php if( $title_text ){ ?><h2 class="<?php echo $cta_main_title_color; ?>"><?php echo $title_text; ?></h2><?php } ?>
			<?php if($big_text_after_title){ ?><h3 class="<?php echo $text_after_title_color; ?>"><?php echo $big_text_after_title; ?></h3><?php } ?>
			<?php if( $description ) { echo $description; }?>
		</div>
		<?php if($button_link_text){ ?>
			<a href="<?php echo $button_link_text['url']; ?>" target="<?php echo $button_link_text['target']; ?>" class="btn <?php echo $button_background_options; ?>"><?php echo $button_link_text['title']; ?></a>
		<?php } ?>
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

<?php /*
<!-- navyblue-bg, yellow-bg, lightblue, purple, gray, lightblue2 -->
<section class="cta-section text-center bg navyblue-bg">
	<div class="container">
		<div class="default-content">
			<p>We are friendly, smart and understand both accounting businesses and your clients needs. We are based globally UK, USA, AUS, NZ and on a mission to create a world where business is easier for all. We run your marketing so you can focus on what you do best.</p>
		</div>
		<a href="#" class="btn lightblue-btn">FIND OUT MORE</a>
	</div>
</section>


<!-- navyblue-bg, yellow-bg, lightblue, purple, gray, lightblue2 -->
<section class="cta-section text-center bg light-gray-bg">
	<div class="container">
		<div class="default-content">
			<h2>Hello, let’s talk</h2>
			<h3>One of our team would love to guide you through which bizink services would work for your business</h3>
		</div>
		<a href="#" class="btn lightblue-btn">TALK TO US</a>
	</div>
</section>

<section class="cta-section text-center bg purple-bg">
	<div class="container">
		<div class="default-content">
			<p>bizink offers a range marketing tools that draw prospective clients to your website.</p>
		</div>
		<a href="#" class="btn lightblue-btn">FIND OUT MORE</a>
	</div>
</section> */?>