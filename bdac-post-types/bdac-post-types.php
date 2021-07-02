<?php 
/*
Plugin Name: BDAC Post Types & Taxonomies
Plugin URI:
Description: Adds Custom Post Types to the v20 theme
Version: 1.0
Author: Oliver Berry
License: GPL2
License URI: https://www.gnu.org/licenses/glp-2.0.html
*/

/**
 * Custom Post Type Hooks
 *
 */

add_action('init', 'exhibits_post_types');
add_action( 'init', 'events_post_type' );
add_action( 'init', 'opening_hours_post_type' );
add_action('init', 'volunteers_post_types');

// Exhibits Post Type
	function exhibits_post_types() {
			register_post_type('exhibits', array(
				'supports' 			=> array(
										'title', 
										'editor', 
										'excerpt', 
										'thumbnail'
									),
				'rewrite' 			=> array(
										'slug' => 'exhibits'
									),
				'has_archive' 		=> true,
				'public' 			=> true,
				'labels' 			=> array(
					'name' 			=> 'Exhibits',
					'add_new_item' 	=> 'Add New Exhibit',
					'edit_item' 	=> 'Edit Exhibit',
					'all_items' 	=> 'All Exhibits',
					'singular_name' => 'Exhibit'
				),
				'menu_icon' 		=> 'dashicons-performance',
				'menu_position' 	=> 40,
			));
	}

// Events Post Type
	function events_post_type() {
		$labels = array(
			'name' 					=> 'Events',
			'singular_name' 		=> 'Event',
			'add_new' 				=> 'Add New',
			'add_new_item' 			=> 'Add New Event',
			'edit_item' 			=> 'Edit Event',
			'new_item' 				=> 'New Event',
			'view_item' 			=> 'View Event',
			'search_items' 			=> 'Search Events',
			'not_found' 			=> 'No Events found',
			'not_found_in_trash' 	=> 'No Events in the trash',
			'parent_item_colon' 	=> '',
		);
	
		register_post_type( 'events', array(
			'supports' 				=> array( 
											'title', 
											'editor', 
											'excerpt', 
											'thumbnail' 
										),
			'rewrite' 				=> array('slug' => 'events' ),
			'labels' 				=> $labels,
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'show_ui' 				=> true,
			'exclude_from_search' 	=> true,
			'query_var' 			=> true,
			'rewrite' 				=> true,
			'capability_type' 		=> 'post',
			'has_archive' 			=> true,
			'hierarchical' 			=> false,
			'menu_icon' 			=> 'dashicons-calendar',
			'menu_position' 		=> 41,
			// 'register_meta_box_cb' => 'testimonials_meta_boxes', Callback function for custom metaboxes
		) );
	};

// Opening Hours Post Type
	function opening_hours_post_type() {
		$labels = array(
			'name' 					=> 'Opening Hours',
			'singular_name' 		=> 'Season Hours',
			'add_new' 				=> 'Add New',
			'add_new_item' 			=> 'Add New Season',
			'edit_item' 			=> 'Edit Season',
			'new_item' 				=> 'New Season',
			'view_item' 			=> 'View Season',
			'search_items' 			=> 'Search Seasons',
			'not_found' 			=> 'No Seasons found',
			'not_found_in_trash' 	=> 'No Seasons in the trash',
			'parent_item_colon' 	=> '',
		);
	
		register_post_type( 'opening_hours', array(
			'supports' 				=> array( 
											'title', 
											'editor', 
											'excerpt', 
											'thumbnail' 
										),
			'rewrite' 				=> array('slug' => 'seasons' ),
			'labels' 				=> $labels,
			'public' 				=> false,
			'publicly_queryable' 	=> true,
			'show_ui' 				=> true,
			'exclude_from_search' 	=> true,
			'query_var' 			=> true,
			'rewrite' 				=> true,
			'capability_type' 		=> 'post',
			'has_archive' 			=> true,
			'hierarchical' 			=> false,
			'menu_icon' 			=> 'dashicons-clock',
			'menu_position' 		=> 42,
			// 'register_meta_box_cb' => 'testimonials_meta_boxes', Callback function for custom metaboxes
		) );
	};

// Volunteers Post Type
	function volunteers_post_types() {
			register_post_type('volunteers', array(
				'supports' 			=> array('title', 'editor', 'excerpt', 'thumbnail'),
				'rewrite' 			=> array('slug' => 'volunteers' ),
				'has_archive' 		=> true,
				'public' 			=> true,
				'labels' 			=> array(
					'name' 			=> 'Volunteers',
					'add_new_item' 	=> 'Add New Volunteer',
					'edit_item' 	=> 'Edit Volunteer',
					'all_items' 	=> 'All Volunteers',
					'singular_name' => 'Volunteer'
				),
				'menu_icon' 		=> 'dashicons-groups',
				'menu_position' 	=> 43,
			));
	};

/**
 * Custom Post Type Taxonomy Hooks
 * 
 */

 add_action('init', 'exhibit_type_taxonomy');
 add_action('init', 'exhibit_role_taxonomy');
 add_action('init', 'event_type_taxonomy');

 // Taxonomy - Exhibit Type
	function exhibit_type_taxonomy() {
		$labels = array(
			'name'              => _x( 'Exhibit Type', 'taxonomy general name' ),
			'singular_name'     => _x( 'Exhibit Type', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Exhibit Type' ),
			'all_items'         => __( 'All Exhibit Types' ),
			'parent_item'       => __( 'Parent Exhibit Type' ),
			'parent_item_colon' => __( 'Parent Exhibit Type:' ),
			'edit_item'         => __( 'Edit Exhibit Type' ),
			'update_item'       => __( 'Update Exhibit Type' ),
			'add_new_item'      => __( 'Add Exhibit Type' ),
			'new_item_name'     => __( 'New Exhibit Type' ),
			'menu_name'         => __( 'Exhibit Type' )
		);
	
		$args = array(
		'hierarchical'  		=> true, //like categories or tags
		'labels'        		=> $labels,
		'show_ui'       		=> true, //add the default UI to this taxonomy
		'show_admin_column' 	=> true, //add the taxonomies to the wordpress admin
		'query_var'         	=> true,
		'rewrite'       		=> array('slug' =>'exhibit-type'),
		);
	
		register_taxonomy( 'exhibit-type', 'exhibits', $args );
	};
 
// Taxonomy - Exhibit Role
	function exhibit_role_taxonomy() {
		$labels = array(
			'name'              => _x( 'Exhibit Role', 'taxonomy general name' ),
			'singular_name'     => _x( 'Exhibit Role', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Exhibit Role' ),
			'all_items'         => __( 'All Exhibit Roles' ),
			'parent_item'       => __( 'Parent Exhibit Role' ),
			'parent_item_colon' => __( 'Parent Exhibit Role:' ),
			'edit_item'         => __( 'Edit Exhibit Role' ),
			'update_item'       => __( 'Update Exhibit Role' ),
			'add_new_item'      => __( 'Add Exhibit Role' ),
			'new_item_name'     => __( 'New Exhibit Role' ),
			'menu_name'         => __( 'Exhibit Role' )
		);
	
		$args = array(
		'hierarchical'  		=> true, //like categories or tags
		'labels'        		=> $labels,
		'show_ui'       		=> true, //add the default UI to this taxonomy
		'show_admin_column' 	=> true, //add the taxonomies to the wordpress admin
		'query_var'         	=> true,
		'rewrite'       		=> array('slug' =>'exhibit-role'),
		);
	
		register_taxonomy( 'exhibit-role', 'exhibits', $args );
	};

// Taxonomy - Event Type
function event_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Types of Event', 'Taxonomy General Name', 'bdac' ),
		'singular_name'              => _x( 'Type of Event', 'Taxonomy Singular Name', 'bdac' ),
		'menu_name'                  => __( 'Type of Event', 'bdac' ),
		'all_items'                  => __( 'All Types of Event', 'bdac' ),
		'parent_item'                => __( 'Parent Type of Event', 'bdac' ),
		'parent_item_colon'          => __( 'Parent Type of Event:', 'bdac' ),
		'new_item_name'              => __( 'New Type of Event', 'bdac' ),
		'add_new_item'               => __( 'Add Type of Event', 'bdac' ),
		'edit_item'                  => __( 'Edit Type of Event', 'bdac' ),
		'update_item'                => __( 'Update Type of Event', 'bdac' ),
		'view_item'                  => __( 'View Type of Event', 'bdac' ),
		'separate_items_with_commas' => __( 'Separate Type of Event with commas', 'bdac' ),
		'add_or_remove_items'        => __( 'Add or remove Type of Event', 'bdac' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'bdac' ),
		'popular_items'              => __( 'Popular Types of Event', 'bdac' ),
		'search_items'               => __( 'Search Types of Event', 'bdac' ),
		'not_found'                  => __( 'Not Found', 'bdac' ),
		'no_terms'                   => __( 'No Types of Event', 'bdac' ),
		'items_list'                 => __( 'Type of Event list', 'bdac' ),
		'items_list_navigation'      => __( 'Type of Event list navigation', 'bdac' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'event_type_taxonomy', array( 'events' ), $args );

}