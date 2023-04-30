<?php

/**
 * Register a custom post type called "home".
 *
 * @see get_post_type_labels() for label keys.
 */
function softuni_home_cpt() {
	$labels = array(
		'name'                  => _x( 'Homes', 'Post type general name', 'softuni-homes' ),
		'singular_name'         => _x( 'Home', 'Post type singular name', 'softuni-homes' ),
		'menu_name'             => _x( 'Homes', 'Admin Menu text', 'softuni-homes' ),
		'name_admin_bar'        => _x( 'Home', 'Add New on Toolbar', 'softuni-homes' ),
		'add_new'               => __( 'Add New', 'softuni-homes' ),
		'add_new_item'          => __( 'Add New Home', 'softuni-homes' ),
		'new_item'              => __( 'New Home', 'softuni-homes' ),
		'edit_item'             => __( 'Edit Home', 'softuni-homes' ),
		'view_item'             => __( 'View Home', 'softuni-homes' ),
		'all_items'             => __( 'All Homes', 'softuni-homes' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'home' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'custom-fields', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true,
	);

	register_post_type( 'home', $args );
}

add_action( 'init', 'softuni_home_cpt' );


/**
 * Create taxonomie "location" for the post type "home".
 *
 * @see register_post_type() for registering custom post types.
 */
function softuni_home_location_taxonomy() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name', 'softuni-homes' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'softuni-homes' ),
		'search_items'      => __( 'Search Locations', 'softuni-homes' ),
		'all_items'         => __( 'All Locations', 'softuni-homes' ),
		'parent_item'       => __( 'Parent Location', 'softuni-homes' ),
		'parent_item_colon' => __( 'Parent Location:', 'softuni-homes' ),
		'edit_item'         => __( 'Edit Location', 'softuni-homes' ),
		'update_item'       => __( 'Update Location', 'softuni-homes' ),
		'add_new_item'      => __( 'Add New Location', 'softuni-homes' ),
		'new_item_name'     => __( 'New Location Name', 'softuni-homes' ),
		'menu_name'         => __( 'Location', 'softuni-homes' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'location' ),
        'show_in_rest'       => true,
	);

	register_taxonomy( 'location', array( 'home' ), $args );
}
// hook into the init action and call create_home_taxonomies when it fires
add_action( 'init', 'softuni_home_location_taxonomy', 0 );