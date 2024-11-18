<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Remove Block Editor
add_filter('use_block_editor_for_post', '__return_false');

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);

/**
 * Enqueue our stylesheet and javascript file
 */
function bizink_theme_enqueue_styles()
{

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_script('jquery');

	wp_enqueue_style('bizink-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get('Version'));
	wp_enqueue_script('bizink-scripts', get_stylesheet_directory_uri() . $theme_scripts, array('jquery'), $the_theme->get('Version'), true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	// Custom JS
	wp_enqueue_script('ajax_custom_script', get_stylesheet_directory_uri() . '/js/custom-post.js');
	wp_localize_script('ajax_custom_script', 'my_ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'bizink_theme_enqueue_styles');


// Shortcode for line break
add_shortcode('br', 'br_cb');
function br_cb()
{
	return '<br>';
}

// Shortcode for current year
add_shortcode('current-year', 'current_year_cb');
function current_year_cb()
{
	return date('Y');
}

/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version($current_mod)
{
	return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);

function bizink_excerpt_more($more)
{
	return '<a class="btn yellow-btn" href="' . get_the_permalink() . '" rel="nofollow">' . __('Read More...', 'bizink') . '</a>';
}
add_filter('excerpt_more', 'bizink_excerpt_more');


/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array('customize-preview'),
		'20130508',
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');

/* Theme Option */
add_action('acf/init', 'bizink_acf_init');
function bizink_acf_init()
{
	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(
			array(
				'page_title' => 'Theme General Settings',
				'menu_title' => 'Theme Settings',
				'menu_slug'  => 'theme-general-settings',
				'capability' => 'edit_posts',
				'redirect'   => false,
			)
		);
	}
}


function bizink_custom_new_menu()
{
	register_nav_menu('my-account-menu', __('My Account'));
	register_nav_menu('my-custom-menu-one', __('Footer Menu One'));
	register_nav_menu('my-custom-menu-two', __('Footer Menu Two'));
	register_nav_menu('our-playbook-menu', __('Our Playbook'));
}
add_action('init', 'bizink_custom_new_menu');

// Blog Filter Ajax Callback
add_action('wp_ajax_filter_posts_callback', 'filter_posts_callback');
add_action('wp_ajax_nopriv_filter_posts_callback', 'filter_posts_callback');

function filter_posts_callback()
{
	global $post;
	ob_start();
	// $postsPerPage = 6;

	$ppp  = (isset($_POST['ppp'])) ? $_POST['ppp'] : 3;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	// Slug of Location
	if (! empty($_REQUEST['keyword'])) {
		$location = $_REQUEST['keyword'];
	} else {
		$location = null;
	}
	if (! empty($_POST['keyword'])) {
		$category = $_POST['category'];
	} else {
		$category = null;
	}
	if (! empty($_POST['location'])) {
		$location = $_POST['location'];
	} else {
		$location = null;
	}
	if (! empty($_POST['partner'])) {
		$partner = $_POST['partner'];
	} else {
		$partner = null;
	}
	if (! empty($_POST['typeofwork'])) {
		$typeofwork = $_POST['typeofwork'];
	} else {
		$typeofwork = null;
	}

	// Arguments
	$tax_query = array('relation' => 'AND');
	if (isset($location) && ! empty($location)) {
		$tax_query[] = array(
			'taxonomy' => 'location',
			'field'    => 'slug',
			'terms'    => $location,
		);
	}
	if (isset($partner) && ! empty($partner)) {
		$tax_query[] = array(
			'taxonomy' => 'partner',
			'field'    => 'slug',
			'terms'    => $partner,
		);
	}
	if (isset($typeofwork) && ! empty($typeofwork)) {
		$tax_query[] = array(
			'taxonomy' => 'typework',
			'field'    => 'slug',
			'terms'    => $typeofwork,
		);
	}
	if (empty($typeofwork) && empty($partner) && empty($location)) {
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $ppp,
			'post_status'    => 'publish',
			// 'tax_query' =>  $tax_query,
			'paged'          => $page,
		);
	} else {
		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => $ppp,
			'post_status'    => 'publish',
			'tax_query'      => $tax_query,
			'paged'          => $page,
		);
	}

	$post_array = new WP_Query($args);
	// print_r($args );
	$html = '';
	if ($post_array->have_posts()) {
		while ($post_array->have_posts()) {
			$post_array->the_post();

			// Get Image
			// $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
			if ($image) {
				$images = $image;
			} else {
				$images = '/wp-content/uploads/2022/06/service3.png';
			}

			// Get Title
			$title = get_the_title($post->ID);
			$url   = get_the_permalink($post->ID);

			// tags
			// $postid = $post->ID;
			$tags     = get_terms('post_tag');
			$posttags = get_the_tags();

			// Content
			$content = wp_trim_words(get_the_content(), 30, '...');

			$html .= '<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">';
			$html .= '<img src="' . $images . '">
					</div>';
			$html .= '<h3><a href="' . $url . '">' . $title . '</a></h3>
					<div class="default-content">
						<p>' . $content . '</p>
					</div>
					<ul class="tags">';
			foreach ($posttags as $tag) {
				$html .= '<li>
								<a href="#">
									<h6>' . $tag->name . '</h6>
								</a>
							</li>';
			}
			$html .= '</ul>
				</div>
			</div>';
		}
		wp_reset_postdata();
	}
	$return = array(
		'postdata' => $html,
	);
	wp_send_json($return);
}

require 'inc/cpt.php';

function gp130428_paginate_parent_children($parent = null)
{
	global $post;

	$child  = $post->ID;
	$parent = (null !== $parent) ? $parent : $post->post_parent;

	$children = get_pages(
		array(
			'sort_column' => 'menu_order',
			'sort_order'  => 'ASC',
			'child_of'    => $parent,
		)
	);
	// $children = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=desc&parent='.$post->ID);

	$pages = array($parent);
	foreach ($children as $page) {
		$pages[] += $page->ID;
	}

	if (! in_array($child, $pages) && ! is_page($parent)) {
		return;
	}

	$current = array_search($child, $pages);

	$prev = $pages[$current - 1];
	$next = $pages[$current + 1];

?>
	<nav id="nav-single" class="clearfix next-prve-wrap">
		<?php
		if (empty($prev) && ! is_page($parent)) :
		?>
			<!-- <div class="previous"> -->
			<a class="comman-direction" href="<?php echo get_permalink($parent); ?>" title="<?php echo esc_attr(get_the_title($parent)); ?>"><span class="navyblue">← Previous</span><small><?php echo get_the_title($parent); ?></small></a>
			<!-- </div> -->
		<?php
		elseif (! empty($prev)) :
		?>
			<!-- <div class="previous"> -->
			<a class="comman-direction" href="<?php echo get_permalink($prev); ?>" title="<?php echo esc_attr(get_the_title($prev)); ?>"><span class="navyblue">← Previous</span><small><?php echo get_the_title($prev); ?></small></a>
			<!-- </div> -->
		<?php
		endif;
		if (! empty($next)) :
		?>
			<!-- <div class="next"> -->
			<a class="comman-direction text-end" href="<?php echo get_permalink($next); ?>" title="<?php echo esc_attr(get_the_title($next)); ?>"><span class="navyblue">Next →</span><small><?php echo get_the_title($next); ?></small></a>
			<!-- </div> -->
		<?php
		endif;
		?>
	</nav>
<?php
}
add_shortcode('gp130428_link_pages', 'gp130428_paginate_parent_children');

/** Disable ACF Filtering */
add_filter('acf/the_field/allow_unsafe_html','bizink_allow_unsafe_html');
function bizink_allow_unsafe_html($allowed, $atts) {
	return true;
}

add_filter('acf/settings/save_json', 'bizink_theme_json_save_point');
function bizink_theme_json_save_point($path)
{
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}

add_filter('acf/settings/load_json', 'bizink_theme_json_load_point');
function bizink_theme_json_load_point($paths)
{
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}


// Plugin Updater
require 'plugin-update-checker/plugin-update-checker.php';

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker('https://github.com/BizInk/Bizink-Website-Theme', __FILE__, 'Bizink-Website-Theme');
// Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');
// Using a private repository, specify the access token
$myUpdateChecker->setAuthentication('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');
