<?php
/**
 * Template Name: Flexible Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

if ( have_rows( 'page_flexible_content' ) ) :
	while ( have_rows( 'page_flexible_content' ) ) :
		the_row();
		if ( get_row_layout() == 'hero_section' ) :
			get_template_part( 'page-templates/template-parts/hero' );
		elseif ( get_row_layout() == 'service_icon_sections' ) :
			get_template_part( 'page-templates/template-parts/service-icon' );
		elseif ( get_row_layout() == 'service_section' ) :
			get_template_part( 'page-templates/template-parts/services' );
		elseif ( get_row_layout() == 'why_bizink' ) :
			get_template_part( 'page-templates/template-parts/why-bizink' );
		elseif ( get_row_layout() == 'logo_section' ) :
			get_template_part( 'page-templates/template-parts/logo-section' );
		elseif ( get_row_layout() == 'two_column' ) :
			get_template_part( 'page-templates/template-parts/two-columns' );
		elseif ( get_row_layout() == 'bizink_states' ) :
			get_template_part( 'page-templates/template-parts/counter' );
		elseif ( get_row_layout() == 'call_to_action' ) :
			get_template_part( 'page-templates/template-parts/cta' );
		elseif ( get_row_layout() == 'success_stories' ) :
			get_template_part( 'page-templates/template-parts/success-stories' );
		elseif ( get_row_layout() == 'inner_page_banner' ) :
			get_template_part( 'global-templates/innerpage-banner' );
		elseif ( get_row_layout() == 'story_section' ) :
			get_template_part( 'page-templates/template-parts/story' );
		elseif ( get_row_layout() == 'pricing_table' ) :
			get_template_part( 'page-templates/template-parts/pricing-table' );
		elseif ( get_row_layout() == 'testimonial_section' ) :
			get_template_part( 'page-templates/template-parts/testimonial-section' );
		elseif ( get_row_layout() == 'blog_section' ) :
			get_template_part( 'page-templates/template-parts/blog-grid' );
		elseif ( get_row_layout() == 'feature_story' ) :
			get_template_part( 'page-templates/template-parts/feature-story' );
		elseif ( get_row_layout() == 'blog_slider' ) :
			get_template_part( 'page-templates/template-parts/story-slider' );
		elseif ( get_row_layout() == 'mobile_friendly_website' ) :
			get_template_part( 'page-templates/template-parts/mobile-friendly-website' );
		elseif ( get_row_layout() == 'website_list' ) :
			get_template_part( 'page-templates/template-parts/website-list' );
		elseif ( get_row_layout() == 'marketing_automation' ) :
			get_template_part( 'page-templates/template-parts/marketing-automation' );
		elseif ( get_row_layout() == 'bizink_bulletin' ) :
			get_template_part( 'page-templates/template-parts/bizink-bulletin' );
		elseif ( get_row_layout() == 'webinar_list' ) :
			get_template_part( 'page-templates/template-parts/webinar-list' );
		elseif ( get_row_layout() == 'case_studies' ) :
			get_template_part( 'page-templates/template-parts/case-studies' );
		elseif ( get_row_layout() == 'meet_the_team' ) :
			get_template_part( 'page-templates/template-parts/meet-team' );
		elseif ( get_row_layout() == 'page_content' ) :
			get_template_part( 'page-templates/template-parts/page-content' );
		elseif ( get_row_layout() == 'use_cases' ) :
				get_template_part( 'page-templates/template-parts/services-box' );
		elseif ( get_row_layout() == 'left_image_testimonial' ) :
					get_template_part( 'page-templates/template-parts/testimonial' );
		endif;
	endwhile;
endif;

get_footer();
