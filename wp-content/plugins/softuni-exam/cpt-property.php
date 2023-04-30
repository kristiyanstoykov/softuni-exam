<?php

/**
 * Register a custom post type called "property".
 *
 * @see get_post_type_labels() for label keys.
 */
function softuni_property_cpt() {
	$labels = array(
		'name'                  => _x( 'Properties', 'Post type general name', 'softuni-homes' ),
		'singular_name'         => _x( 'Property', 'Post type singular name', 'softuni-homes' ),
		'menu_name'             => _x( 'Properties (homes)', 'Admin Menu text', 'softuni-homes' ),
		'name_admin_bar'        => _x( 'Property', 'Add New on Toolbar', 'softuni-homes' ),
		'add_new'               => __( 'Add New', 'softuni-homes' ),
		'add_new_item'          => __( 'Add New Property', 'softuni-homes' ),
		'new_item'              => __( 'New Property', 'softuni-homes' ),
		'edit_item'             => __( 'Edit Property', 'softuni-homes' ),
		'view_item'             => __( 'View Property', 'softuni-homes' ),
		'all_items'             => __( 'All Properties', 'softuni-homes' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'property' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'custom-fields', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'       => true,
	);

	register_post_type( 'property', $args );
}

add_action( 'init', 'softuni_property_cpt' );


/**
 * Create taxonomie "location" for the post type "property".
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

	register_taxonomy( 'location', array( 'property' ), $args );
}
// hook into the init action and call create_home_taxonomies when it fires
add_action( 'init', 'softuni_home_location_taxonomy', 0 );