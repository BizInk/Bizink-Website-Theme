<?php

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
		'menu_name'          => 'Success Stories',
	);
	$args   = array(
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
	$args   = array(
		'label'               => __( 'Websites', 'text_domain' ),
		'description'         => __( 'List of websites', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
		'taxonomies'          => array( 'topics', 'types', 'regions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-admin-site-alt3',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'websites', $args );
}
add_action( 'init', 'websites_custom_post_type' );

function regions_custom_taxonomy() {

	$labels  = array(
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
		'slug'         => 'content-regions',
		'with_front'   => true,
		'hierarchical' => false,
	);
	$args    = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => $rewrite,
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
		'menu_name'          => 'Case Studies',
	);
	$args   = array(
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

// Register Webinar Custom Post Type
function webinar_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Webinar', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Webinars', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Webinars', 'text_domain' ),
		'name_admin_bar'        => __( 'Webinars', 'text_domain' ),
		'archives'              => __( 'Webinars Archive', 'text_domain' ),
		'attributes'            => __( 'Webinar Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Webinar:', 'text_domain' ),
		'all_items'             => __( 'All Webinars', 'text_domain' ),
		'add_new_item'          => __( 'Add New Webinar', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Webinar', 'text_domain' ),
		'edit_item'             => __( 'Edit Webinar', 'text_domain' ),
		'update_item'           => __( 'Update Webinar', 'text_domain' ),
		'view_item'             => __( 'View Webinar', 'text_domain' ),
		'view_items'            => __( 'View Webinar', 'text_domain' ),
		'search_items'          => __( 'Search Webinar', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Webinar', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Webinar', 'text_domain' ),
		'items_list'            => __( 'Webinar list', 'text_domain' ),
		'items_list_navigation' => __( 'Webinar list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Webinar list', 'text_domain' ),
	);
	$args   = array(
		'label'               => __( 'Webinars', 'text_domain' ),
		'description'         => __( 'List of Marketing Content', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title' ),
		'taxonomies'          => array( 'topics', 'types', 'regions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-welcome-view-site',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'webinars', $args );
}
add_action( 'init', __NAMESPACE__ . '\\webinar_custom_post_type', 0 );

// Register Custom Taxonomy
function topics_custom_taxonomy() {

	$labels  = array(
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
		'slug'         => 'content-topic',
		'with_front'   => true,
		'hierarchical' => false,
	);
	$args    = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => $rewrite,
	);
	register_taxonomy( 'topics', array( 'webinars' ), $args );
}
add_action( 'init', __NAMESPACE__ . '\\topics_custom_taxonomy', 0 );

// Register Custom Taxonomy
function types_custom_taxonomy() {

	$labels  = array(
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
		'slug'         => 'content-types',
		'with_front'   => true,
		'hierarchical' => false,
	);
	$args    = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'rewrite'           => $rewrite,
	);
	register_taxonomy( 'types', array( 'webinars' ), $args );
}
add_action( 'init', __NAMESPACE__ . '\\types_custom_taxonomy', 0 );


function register_client_post_type() {

	$labels = array(
		'name'               => _x( 'Clients', 'Post Type General Name', 'bizink' ),
		'singular_name'      => _x( 'Client', 'Post Type Singular Name', 'bizink' ),
		'menu_name'          => __( 'Clients', 'bizink' ),
		'name_admin_bar'     => __( 'Client', 'bizink' ),
		'parent_item_colon'  => __( 'Parent Client:', 'bizink' ),
		'all_items'          => __( 'All Clients', 'bizink' ),
		'add_new_item'       => __( 'Add New Client', 'bizink' ),
		'add_new'            => __( 'Add New', 'bizink' ),
		'new_item'           => __( 'New Client', 'bizink' ),
		'edit_item'          => __( 'Edit Client', 'bizink' ),
		'update_item'        => __( 'Update Client', 'bizink' ),
		'view_item'          => __( 'View Client', 'bizink' ),
		'search_items'       => __( 'Search Client', 'bizink' ),
		'not_found'          => __( 'Not found', 'bizink' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'bizink' ),
	);
	$args   = array(
		'label'               => __( 'Client', 'bizink' ),
		'description'         => __( 'Client Description', 'bizink' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions' ),
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
add_action( 'init', __NAMESPACE__ . '\\register_client_post_type', 0 );

function register_marketing_content_post_type() {

	$labels = array(
		'name'               => _x( 'Marketing Content', 'Post Type General Name', 'bizink' ),
		'singular_name'      => _x( 'Marketing Content', 'Post Type Singular Name', 'bizink' ),
		'menu_name'          => __( 'Marketing Content', 'bizink' ),
		'name_admin_bar'     => __( 'Marketing Content', 'bizink' ),
		'parent_item_colon'  => __( 'Parent Marketing Content:', 'bizink' ),
		'all_items'          => __( 'All Marketing Content', 'bizink' ),
		'add_new_item'       => __( 'Add Marketing Content', 'bizink' ),
		'add_new'            => __( 'Add New', 'bizink' ),
		'new_item'           => __( 'New Marketing Content', 'bizink' ),
		'edit_item'          => __( 'Edit Marketing Content', 'bizink' ),
		'update_item'        => __( 'Update Marketing Content', 'bizink' ),
		'view_item'          => __( 'View Marketing Content', 'bizink' ),
		'search_items'       => __( 'Search Marketing Content', 'bizink' ),
		'not_found'          => __( 'Not found', 'bizink' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'bizink' ),
	);
	$args   = array(
		'label'               => __( 'Marketing Content', 'bizink' ),
		'description'         => __( 'Marketing Content Description', 'bizink' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'revisions' ),
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
add_action( 'init', __NAMESPACE__ . '\\register_marketing_content_post_type', 0 );


// custom types taxonomies for marketing content
add_action( 'init', 'create_type_hierarchical_taxonomy', 0 );
// create a custom taxonomy name
function create_type_hierarchical_taxonomy() {
	$labels = array(
		'name'              => _x( 'Content Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Content Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Content Types' ),
		'all_items'         => __( 'All Content Types' ),
		'parent_item'       => __( 'Parent Content Type' ),
		'parent_item_colon' => __( 'Parent Content Type:' ),
		'edit_item'         => __( 'Edit Content Type' ),
		'update_item'       => __( 'Update Content Type' ),
		'add_new_item'      => __( 'Add New Content Type' ),
		'new_item_name'     => __( 'New Content Type Name' ),
		'menu_name'         => __( 'Content Types' ),
	);
	// taxonomy register
	register_taxonomy(
		'types',
		array( 'marketing_content' ),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'content-types' ),
		)
	);
}

// custom types taxonomies for marketing content
add_action( 'init', 'create_topic_hierarchical_taxonomy', 0 );
// create a custom taxonomy name
function create_topic_hierarchical_taxonomy() {
	$labels = array(
		'name'              => _x( 'Content Topic', 'taxonomy general name' ),
		'singular_name'     => _x( 'Content Topic', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Content Topics' ),
		'all_items'         => __( 'All Content Topics' ),
		'parent_item'       => __( 'Parent Content Topic' ),
		'parent_item_colon' => __( 'Parent Content Topic:' ),
		'edit_item'         => __( 'Edit Content Topic' ),
		'update_item'       => __( 'Update Content Topic' ),
		'add_new_item'      => __( 'Add New Content Topic' ),
		'new_item_name'     => __( 'New Content Topic Name' ),
		'menu_name'         => __( 'Content Topics' ),
	);
	// taxonomy register
	register_taxonomy(
		'topics',
		array( 'marketing_content' ),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'content-topics' ),
		)
	);
}

// custom types taxonomies for marketing content
add_action( 'init', 'create_region_hierarchical_taxonomy', 0 );
// create a custom taxonomy name
function create_region_hierarchical_taxonomy() {
	$labels = array(
		'name'              => _x( 'Content region', 'taxonomy general name' ),
		'singular_name'     => _x( 'Content region', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Content Regions' ),
		'all_items'         => __( 'All Content Regions' ),
		'parent_item'       => __( 'Parent Content Region' ),
		'parent_item_colon' => __( 'Parent Content Region:' ),
		'edit_item'         => __( 'Edit Content Region' ),
		'update_item'       => __( 'Update Content Region' ),
		'add_new_item'      => __( 'Add New Content Region' ),
		'new_item_name'     => __( 'New Content Region Name' ),
		'menu_name'         => __( 'Content Region' ),
	);
	// taxonomy register
	register_taxonomy(
		'regions',
		array( 'marketing_content' ),
		array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'content-regions' ),
		)
	);
}

function bizink_custom_post_type_playbook() {

	$labels = array(
		'name'                  => _x( 'Playbooks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Playbook', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Playbook', 'text_domain' ),
		'name_admin_bar'        => __( 'Playbook', 'text_domain' ),
		'archives'              => __( 'Item Playbooks', 'text_domain' ),
		'attributes'            => __( 'Item Playbooks', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Playbooks', 'text_domain' ),
		'add_new_item'          => __( 'Add New Playbook', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Playbook', 'text_domain' ),
		'edit_item'             => __( 'Edit Playbook', 'text_domain' ),
		'update_item'           => __( 'Update Playbook', 'text_domain' ),
		'view_item'             => __( 'View Playbook', 'text_domain' ),
		'view_items'            => __( 'View Playbooks', 'text_domain' ),
		'search_items'          => __( 'Search Playbook', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this playbook', 'text_domain' ),
		'items_list'            => __( 'Playbooks list', 'text_domain' ),
		'items_list_navigation' => __( 'Playbooks list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter playbooks list', 'text_domain' ),
	);
	$args   = array(
		'label'               => __( 'Playbook', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor' ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-book',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'playbook', $args );
}
add_action( 'init', 'bizink_custom_post_type_playbook', 0 );
