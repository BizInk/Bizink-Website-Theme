<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Remove Block Editor
add_filter('use_block_editor_for_post', '__return_false');

/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Custom JS
    wp_enqueue_script('ajax_custom_script',  get_stylesheet_directory_uri() . '/js/custom-post.js');
    wp_localize_script( 'ajax_custom_script', 'my_ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

/*Theme Option*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}	

function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu-one',__( 'Footer Menu One' ));
  register_nav_menu('my-custom-menu-two',__( 'Footer Menu Two' ));
  register_nav_menu('our-playbook-menu',__( 'Our Playbook' ));

}
add_action( 'init', 'wpb_custom_new_menu' );

/*Success Stories post type*/
function stories_custom_post_type() {
  $labels = array(
    'name'               => _x( 'Success Stories', 'post type general name' ),
    'singular_name'      => _x( 'Success Stories', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Success Stories' ),
    'add_new_item'       => __( 'Add New Success Stories' ),
    'edit_item'          => __( 'Edit Success Stories' ),
    'new_item'           => __( 'New Success Stories' ),
    'all_items'          => __( 'All Success Stories' ),
    'view_item'          => __( 'View Success Stories' ),
    'search_items'       => __( 'Search Success Stories' ),
    'not_found'          => __( 'No success stories video found' ),
    'not_found_in_trash' => __( 'No success stories video found in the Trash' ), 
    'parent_item_colon'  => __( 'stories' ),
    'menu_name'          => 'Success Stories'
  );
  $args = array(
    'labels'        => $labels,
    'hierarchical'  => true,
    'description'   => 'Holds our Success Stories data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'stories', $args ); 
}
add_action( 'init', 'stories_custom_post_type' );

/**/
//hook into the init action and call create_book_taxonomies when it fires
 
add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Location', 'taxonomy general name' ),
    'singular_name' => _x( 'Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Location' ),
    'all_items' => __( 'All Location' ),
    'parent_item' => __( 'Parent Location' ),
    'parent_item_colon' => __( 'Parent Location:' ),
    'edit_item' => __( 'Edit Location' ), 
    'update_item' => __( 'Update Location' ),
    'add_new_item' => __( 'Add New Location' ),
    'new_item_name' => __( 'New Location Name' ),
    'menu_name' => __( 'Location' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('location',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    //'rewrite' => array( 'slug' => 'subject' ),
  ));

  $labels_partner = array(
    'name' => _x( 'Partner', 'taxonomy general name' ),
    'singular_name' => _x( 'Partner', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Partner' ),
    'all_items' => __( 'All Partner' ),
    'parent_item' => __( 'Parent Partner' ),
    'parent_item_colon' => __( 'Parent Partner:' ),
    'edit_item' => __( 'Edit Partner' ), 
    'update_item' => __( 'Update Partner' ),
    'add_new_item' => __( 'Add New Partner' ),
    'new_item_name' => __( 'New Partner Name' ),
    'menu_name' => __( 'Partner' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('partner',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels_partner,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    //'rewrite' => array( 'slug' => 'subject' ),
  ));
  $labels_work = array(
    'name' => _x( 'Type Of Work', 'taxonomy general name' ),
    'singular_name' => _x( 'Type Of Work', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Type Of Work' ),
    'all_items' => __( 'All Type Of Work' ),
    'parent_item' => __( 'Parent Type Of Work' ),
    'parent_item_colon' => __( 'Parent Type Of Work:' ),
    'edit_item' => __( 'Edit Type Of Work' ), 
    'update_item' => __( 'Update Type Of Work' ),
    'add_new_item' => __( 'Add New Type Of Work' ),
    'new_item_name' => __( 'New Type Of Work Name' ),
    'menu_name' => __( 'Type Of Work' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('typework',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels_work,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    //'rewrite' => array( 'slug' => 'subject' ),
  ));
}


// Blog Filter Ajax Callback
add_action('wp_ajax_filter_posts_callback', 'filter_posts_callback');
add_action('wp_ajax_nopriv_filter_posts_callback', 'filter_posts_callback');

function filter_posts_callback() {
	ob_start();
 // $postsPerPage = 6;

  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
  $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	// Slug of Location
	$location = $_REQUEST['keyword'];
	$category = $_POST['category'];
	$location = $_POST['location'];
	$partner = $_POST['partner'];
	$typeofwork = $_POST['typeofwork'];

  
	// Arguments
		$tax_query = array('relation' => 'AND');
		if (isset($location) && !empty($location))
    {
        $tax_query[] =  array(
                'taxonomy' => 'location',
                'field' => 'slug',
                'terms' => $location
            );
    }
    if (isset($partner) && !empty($partner))
    {
        $tax_query[] =  array(
                'taxonomy' => 'partner',
                'field' => 'slug',
                'terms' => $partner
            );
    }
    if (isset($typeofwork) && !empty($typeofwork))
    {
        $tax_query[] =  array(
                'taxonomy' => 'typework',
                'field' => 'slug',
                'terms' => $typeofwork
            );
    }
    if( empty($typeofwork) && empty($partner) && empty($location) ){
      $args = array (
        'post_type'        => 'post',
        'posts_per_page' => $ppp,
        'post_status'      => 'publish',
        //'tax_query' =>  $tax_query,
        'paged'    => $page,
      );
    }else{
      $args = array (
        'post_type'        => 'post',
        'posts_per_page' => $ppp,
        'post_status'      => 'publish',
        'tax_query' =>  $tax_query,
        'paged'    => $page,
      );
    }
	
	
	$post_array = new WP_Query( $args );
 // print_r($args );
  $html = '';  
	if( $post_array->have_posts() ) {
		while( $post_array->have_posts() ) {
			$post_array->the_post();
			
			// Get Image
			//$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            if($image){
                $images = $image;
            } else {
               $images = "/wp-content/uploads/2022/06/service3.png";
            }


			
			// Get Title
			$title = get_the_title( $post->ID );
            $url = get_the_permalink($post->ID );
			
			// tags
      //$postid = $post->ID;
			$tags = get_terms('post_tag');
      $posttags = get_the_tags();
			
			// Content
			$content = wp_trim_words(get_the_content(), 30, '...');
			
			$html .= '<div class="col-lg-4 col-md-4">
				<div class="blog-grid">
					<div class="image">';
						$html .= '<img src="'.$images.'">
					</div>';
					$html .= '<h3><a href="'.$url.'">'.$title.'</a></h3>
					<div class="default-content">
						<p>'.$content.'</p>
					</div>
					<ul class="tags">';
						foreach ($posttags as $tag) {
							$html .= '<li>
								<a href="#">
									<h6>'.$tag->name.'</h6>
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
      'postdata'  => $html
  ); 
  wp_send_json($return);	
}

// Register Custom Post Type
function custom_post_playbook() {

	$labels = array(
		'name'                  => _x( 'Playbooks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Playbook', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Playbook', 'text_domain' ),
		'name_admin_bar'        => __( 'Playbook', 'text_domain' ),
		'archives'              => __( 'Playbook Archives', 'text_domain' ),
		'attributes'            => __( 'Playbook Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Playbook:', 'text_domain' ),
		'all_items'             => __( 'All Playbooks', 'text_domain' ),
		'add_new_item'          => __( 'Add New Playbook', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Playbook', 'text_domain' ),
		'edit_item'             => __( 'Edit Playbook', 'text_domain' ),
		'update_item'           => __( 'Update Playbook', 'text_domain' ),
		'view_item'             => __( 'View Playbook', 'text_domain' ),
		'view_items'            => __( 'View Playbook', 'text_domain' ),
		'search_items'          => __( 'Search Playbook', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Playbook', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this playbook', 'text_domain' ),
		'items_list'            => __( 'Playbooks list', 'text_domain' ),
		'items_list_navigation' => __( 'Playbooks list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Playbooks list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Playbook', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => '',
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'playbook', $args );

}
add_action( 'init', 'custom_post_playbook', 0 );

/*Services post type*/
function websites_custom_post_type() {
  $labels = array(
    'name'                  => _x( 'Website', 'Post Type General Name', 'text_domain' ),
    'singular_name'         => _x( 'Websites', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'             => __( 'Websites', 'text_domain' ),
    'name_admin_bar'        => __( 'Websites', 'text_domain' ),
    'archives'              => __( 'Website Archives', 'text_domain' ),
    'attributes'            => __( 'Website Attributes', 'text_domain' ),
    'parent_item_colon'     => __( 'Parent Website:', 'text_domain' ),
    'all_items'             => __( 'All Websites', 'text_domain' ),
    'add_new_item'          => __( 'Add New Website', 'text_domain' ),
    'add_new'               => __( 'Add New', 'text_domain' ),
    'new_item'              => __( 'New Website', 'text_domain' ),
    'edit_item'             => __( 'Edit Website', 'text_domain' ),
    'update_item'           => __( 'Update Website', 'text_domain' ),
    'view_item'             => __( 'View Website', 'text_domain' ),
    'view_items'            => __( 'View Website', 'text_domain' ),
    'search_items'          => __( 'Search Website', 'text_domain' ),
    'not_found'             => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
    'featured_image'        => __( 'Featured Image', 'text_domain' ),
    'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
    'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
    'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
    'insert_into_item'      => __( 'Insert into Website', 'text_domain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Website', 'text_domain' ),
    'items_list'            => __( 'Website list', 'text_domain' ),
    'items_list_navigation' => __( 'Website list navigation', 'text_domain' ),
    'filter_items_list'     => __( 'Filter Website list', 'text_domain' ),
  );
  $args = array(
    'label'                 => __( 'Websites', 'text_domain' ),
    'description'           => __( 'List of websites', 'text_domain' ),
    'labels'                => $labels,
    'supports'              => array( 'title','editor','thumbnail','page-attributes' ),
    'taxonomies'            => array( 'topics', 'types', 'regions' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 25,
    'menu_icon'             => 'dashicons-admin-site-alt3',
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => true,
    'can_export'            => true,
    'has_archive'           => false,
    'exclude_from_search'   => false,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
  );
  register_post_type( 'websites', $args );
}
add_action( 'init', 'websites_custom_post_type' );



function regions_custom_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Regions', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Content Region', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Content Regions', 'text_domain' ),
    'all_items'                  => __( 'All Regions', 'text_domain' ),
    'parent_item'                => __( 'Parent Region', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Region:', 'text_domain' ),
    'new_item_name'              => __( 'New Region Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Region', 'text_domain' ),
    'edit_item'                  => __( 'Edit Region', 'text_domain' ),
    'update_item'                => __( 'Update Region', 'text_domain' ),
    'view_item'                  => __( 'View Region', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate regions with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove regions', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Regions', 'text_domain' ),
    'search_items'               => __( 'Search Regions', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No regions', 'text_domain' ),
    'items_list'                 => __( 'Regions list', 'text_domain' ),
    'items_list_navigation'      => __( 'Regions list navigation', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                       => 'content-regions',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'regions', array( 'webinars' ), $args );

}
add_action( 'init', 'regions_custom_taxonomy', 0 );

/*Casestudy post type*/
function casestudies_custom_post_type() {
  $labels = array(
    'name'               => _x( 'Case Studies', 'post type general name' ),
    'singular_name'      => _x( 'Case Studies', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'Case Studies' ),
    'add_new_item'       => __( 'Add New Case Studies' ),
    'edit_item'          => __( 'Edit Case Studies' ),
    'new_item'           => __( 'New Case Studies' ),
    'all_items'          => __( 'All Case Studies' ),
    'view_item'          => __( 'View Case Studies' ),
    'search_items'       => __( 'Search Case Studies' ),
    'not_found'          => __( 'No case studies video found' ),
    'not_found_in_trash' => __( 'No case studies video found in the Trash' ), 
    'parent_item_colon'  => __( 'case studies' ),
    'menu_name'          => 'Case Studies'
  );
  $args = array(
    'labels'        => $labels,
    'hierarchical'  => true,
    'description'   => 'Holds our Case Studies data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'case_studies', $args ); 
}
add_action( 'init', 'casestudies_custom_post_type' );



// Register Custom Taxonomy
function topics_custom_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Topics', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Content Topic', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Content Topics', 'text_domain' ),
    'all_items'                  => __( 'All Topics', 'text_domain' ),
    'parent_item'                => __( 'Parent Topic', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Topic:', 'text_domain' ),
    'new_item_name'              => __( 'New Topic Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Topic', 'text_domain' ),
    'edit_item'                  => __( 'Edit Topic', 'text_domain' ),
    'update_item'                => __( 'Update Topic', 'text_domain' ),
    'view_item'                  => __( 'View Topic', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate topics with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove topics', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Topics', 'text_domain' ),
    'search_items'               => __( 'Search Topics', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No topics', 'text_domain' ),
    'items_list'                 => __( 'Topics list', 'text_domain' ),
    'items_list_navigation'      => __( 'Topics list navigation', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                       => 'content-topic',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'topics', array( 'webinars' ), $args );

}
add_action( 'init', __namespace__ . '\\topics_custom_taxonomy', 0 );

// Register Custom Taxonomy
function types_custom_taxonomy() {

  $labels = array(
    'name'                       => _x( 'Types', 'Taxonomy General Name', 'text_domain' ),
    'singular_name'              => _x( 'Content Type', 'Taxonomy Singular Name', 'text_domain' ),
    'menu_name'                  => __( 'Content Types', 'text_domain' ),
    'all_items'                  => __( 'All Types', 'text_domain' ),
    'parent_item'                => __( 'Parent Type', 'text_domain' ),
    'parent_item_colon'          => __( 'Parent Type:', 'text_domain' ),
    'new_item_name'              => __( 'New Type Name', 'text_domain' ),
    'add_new_item'               => __( 'Add New Type', 'text_domain' ),
    'edit_item'                  => __( 'Edit Type', 'text_domain' ),
    'update_item'                => __( 'Update Type', 'text_domain' ),
    'view_item'                  => __( 'View Type', 'text_domain' ),
    'separate_items_with_commas' => __( 'Separate types with commas', 'text_domain' ),
    'add_or_remove_items'        => __( 'Add or remove types', 'text_domain' ),
    'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
    'popular_items'              => __( 'Popular Types', 'text_domain' ),
    'search_items'               => __( 'Search Types', 'text_domain' ),
    'not_found'                  => __( 'Not Found', 'text_domain' ),
    'no_terms'                   => __( 'No types', 'text_domain' ),
    'items_list'                 => __( 'Types list', 'text_domain' ),
    'items_list_navigation'      => __( 'Types list navigation', 'text_domain' ),
  );
  $rewrite = array(
    'slug'                       => 'content-types',
    'with_front'                 => true,
    'hierarchical'               => false,
  );
  $args = array(
    'labels'                     => $labels,
    'hierarchical'               => true,
    'public'                     => true,
    'show_ui'                    => true,
    'show_admin_column'          => true,
    'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite'                    => $rewrite,
  );
  register_taxonomy( 'types', array( 'webinars', 'playbook' ), $args );

}
add_action( 'init', __namespace__ . '\\types_custom_taxonomy', 0 );

function register_client_post_type() {

  $labels = array(
    'name'                => _x( 'Clients', 'Post Type General Name', 'bizink' ),
    'singular_name'       => _x( 'Client', 'Post Type Singular Name', 'bizink' ),
    'menu_name'           => __( 'Clients', 'bizink' ),
    'name_admin_bar'      => __( 'Client', 'bizink' ),
    'parent_item_colon'   => __( 'Parent Client:', 'bizink' ),
    'all_items'           => __( 'All Clients', 'bizink' ),
    'add_new_item'        => __( 'Add New Client', 'bizink' ),
    'add_new'             => __( 'Add New', 'bizink' ),
    'new_item'            => __( 'New Client', 'bizink' ),
    'edit_item'           => __( 'Edit Client', 'bizink' ),
    'update_item'         => __( 'Update Client', 'bizink' ),
    'view_item'           => __( 'View Client', 'bizink' ),
    'search_items'        => __( 'Search Client', 'bizink' ),
    'not_found'           => __( 'Not found', 'bizink' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'bizink' ),
  );
  $args = array(
    'label'               => __( 'Client', 'bizink' ),
    'description'         => __( 'Client Description', 'bizink' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 25,
    'menu_icon'           => 'dashicons-networking',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'bizink_client', $args );

}
add_action( 'init', __namespace__ . '\\register_client_post_type', 0 );

function register_marketing_content_post_type() {

  $labels = array(
    'name'                => _x( 'Marketing Content', 'Post Type General Name', 'bizink' ),
    'singular_name'       => _x( 'Marketing Content', 'Post Type Singular Name', 'bizink' ),
    'menu_name'           => __( 'Marketing Content', 'bizink' ),
    'name_admin_bar'      => __( 'Marketing Content', 'bizink' ),
    'parent_item_colon'   => __( 'Parent Marketing Content:', 'bizink' ),
    'all_items'           => __( 'All Marketing Content', 'bizink' ),
    'add_new_item'        => __( 'Add Marketing Content', 'bizink' ),
    'add_new'             => __( 'Add New', 'bizink' ),
    'new_item'            => __( 'New Marketing Content', 'bizink' ),
    'edit_item'           => __( 'Edit Marketing Content', 'bizink' ),
    'update_item'         => __( 'Update Marketing Content', 'bizink' ),
    'view_item'           => __( 'View Marketing Content', 'bizink' ),
    'search_items'        => __( 'Search Marketing Content', 'bizink' ),
    'not_found'           => __( 'Not found', 'bizink' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'bizink' ),
  );
  $args = array(
    'label'               => __( 'Marketing Content', 'bizink' ),
    'description'         => __( 'Marketing Content Description', 'bizink' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'revisions', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 25,
    'menu_icon'           => 'dashicons-rest-api',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'marketing_content', $args );

}
add_action( 'init', __namespace__ . '\\register_marketing_content_post_type', 0 );


function gp130428_paginate_parent_children( $parent = null ) {
  global $post;
    
  $child  = $post->ID;
  $parent = ( null !== $parent ) ? $parent : $post->post_parent;
  
 $children = get_pages( array(
        'sort_column' => 'menu_order',
        'sort_order'  => 'ASC',
        'child_of'    => $parent,
        ) );
  // $children = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=desc&parent='.$post->ID);
  
  $pages = array( $parent );
  foreach( $children as $page )
    $pages[] += $page->ID;
  
  if( ! in_array( $child, $pages ) && ! is_page( $parent ) )
    return;
  
  $current = array_search( $child, $pages );
    
  $prev = $pages[$current-1];
  $next = $pages[$current+1];

  ?>
  <nav id="nav-single" class="clearfix next-prve-wrap">
  <?php 
    if ( empty( $prev ) && ! is_page( $parent ) ) : 
  ?>
  <!-- <div class="previous"> -->
    <a class="comman-direction" href="<?php echo get_permalink( $parent ); ?>" title="<?php echo esc_attr( get_the_title( $parent ) ) ?>"><span class="navyblue">← Previous</span><small><?php echo get_the_title( $parent ) ?></small></a>
  <!-- </div> -->
  <?php 
    elseif ( ! empty( $prev ) ) : 
  ?>
  <!-- <div class="previous"> -->
    <a class="comman-direction" href="<?php echo get_permalink( $prev ); ?>" title="<?php echo esc_attr( get_the_title( $prev ) ) ?>"><span class="navyblue">← Previous</span><small><?php echo get_the_title( $prev ) ?></small></a>
  <!-- </div> -->
  <?php 
    endif;
    if( ! empty( $next ) ) : 
  ?>
  <!-- <div class="next"> -->
    <a class="comman-direction text-end" href="<?php echo get_permalink( $next ); ?>" title="<?php echo esc_attr( get_the_title( $next ) ) ?>"><span class="navyblue">Next →</span><small><?php echo get_the_title( $next ) ?></small></a>
  <!-- </div> -->
  <?php 
    endif; 
  ?>

   <!-- <div class="next-prve-wrap">
  <a href="" class="comman-direction">
    <span class="navyblue">← Previous</span>
    <small>Customer Research</small>
  </a>

  <a href="" class="comman-direction text-end">
    <span class="navyblue">Next →</span>
    <small>Campaign Distribution</small>
  </a>   

  <?php// echo do_shortcode('[gp130428_link_pages]'); 
  // siblings('before'); siblings('after'); ?>              
<!-- </div> --> 


  </nav>
<?php }
add_shortcode('gp130428_link_pages','gp130428_paginate_parent_children');


// function siblings($link) {
//     global $post;
//     $siblings = get_pages('child_of='.$post->post_parent.'&parent='.$post->post_parent);
//     foreach ($siblings as $key=>$sibling){
//         if ($post->ID == $sibling->ID){
//             $ID = $key;
//         }
//     }
//     $closest = array('before'=>get_permalink($siblings[$ID-1]->ID),'after'=>get_permalink($siblings[$ID+1]->ID));

//     if ($link == 'before' || $link == 'after') { echo $closest[$link]; } else { return $closest; }
// }

// Register Custom Taxonomy
function custom_taxonomy_template_type() {

	$labels = array(
		'name'                       => _x( 'Template Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Template Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Template Type', 'text_domain' ),
		'all_items'                  => __( 'All Template Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Template Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Template Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Template Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Template Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Template Type', 'text_domain' ),
		'update_item'                => __( 'Update Template Type', 'text_domain' ),
		'view_item'                  => __( 'View Template Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Template Types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Template Types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Template Types', 'text_domain' ),
		'search_items'               => __( 'Search Template Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Template Types', 'text_domain' ),
		'items_list'                 => __( 'Template Types list', 'text_domain' ),
		'items_list_navigation'      => __( 'Template Types list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'template-type', array( 'page' ), $args );

}
add_action( 'init', 'custom_taxonomy_template_type', 0 );

