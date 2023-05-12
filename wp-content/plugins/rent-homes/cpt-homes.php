<?php

/**
 * Register a custom post type called "home".
 *
 * @see get_post_type_labels() for label keys.
 */
function rent_homes_cpt() {
	$labels = array(
		'name'                  => _x( 'Homes', 'Post type general name', 'rent' ),
		'singular_name'         => _x( 'Home', 'Post type singular name', 'rent' ),
		'menu_name'             => _x( 'Homes', 'Admin Menu text', 'rent' ),
		'name_admin_bar'        => _x( 'Home', 'Add New on Toolbar', 'rent' ),
		'add_new'               => __( 'Add New', 'rent' ),
		'add_new_item'          => __( 'Add New Home', 'rent' ),
		'new_item'              => __( 'New Home', 'rent' ),
		'edit_item'             => __( 'Edit Home', 'rent' ),
		'view_item'             => __( 'View Home', 'rent' ),
		'all_items'             => __( 'All Homes', 'rent' ),
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
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions' ),
        'show_in_rest'         => true,
	);

	register_post_type( 'home', $args );

    flush_rewrite_rules();
}

add_action( 'init', 'rent_homes_cpt' );

/**
 * Register a 'field' taxonomy for post type 'home', with a rewrite to match book CPT slug.
 *
 * @see register_post_type for registering post types.
 */
function rent_homes_field_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Fields', 'taxonomy general name', 'rent' ),
		'singular_name'     => _x( 'Field', 'taxonomy singular name', 'rent' ),
		'search_items'      => __( 'Search Fields', 'rent' ),
		'all_items'         => __( 'All Fields', 'rent' ),
		'parent_item'       => __( 'Parent Field', 'rent' ),
		'parent_item_colon' => __( 'Parent Field:', 'rent' ),
		'edit_item'         => __( 'Edit Field', 'rent' ),
		'update_item'       => __( 'Update Field', 'rent' ),
		'add_new_item'      => __( 'Add New Field', 'rent' ),
		'new_item_name'     => __( 'New Field Name', 'rent' ),
		'menu_name'         => __( 'Field', 'rent' ),
	);

    $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'         => true,
	);

    register_taxonomy( 'field', 'home', $args ) ;      
    
}
add_action( 'init', 'rent_homes_field_taxonomy' );

/**
 * This is a function register a custom home Location taxonomy
 *
 * @return void
 */
function rent_homes_location_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Locations', 'taxonomy general name', 'rent' ),
		'singular_name'     => _x( 'Location', 'taxonomy singular name', 'rent' ),
		'search_items'      => __( 'Search Locations', 'rent' ),
		'all_items'         => __( 'All Locations', 'rent' ),
		'parent_item'       => __( 'Parent Location', 'rent' ),
		'parent_item_colon' => __( 'Parent Location:', 'rent' ),
		'edit_item'         => __( 'Edit Location', 'rent' ),
		'update_item'       => __( 'Update Location', 'rent' ),
		'add_new_item'      => __( 'Add New Location', 'rent' ),
		'new_item_name'     => __( 'New Location Name', 'rent' ),
		'menu_name'         => __( 'Location', 'rent' ),
	);

    $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'         => true,
	);

    register_taxonomy( 'location', 'home', $args ) ;      
    
}
add_action( 'init', 'rent_homes_location_taxonomy' );

/**
 * This is a function register a custom Homes-rent taxonomy
 *
 * @return void
 */
function rent_homes_room_taxonomy() {
	$labels = array(
		'name'              => _x( 'Rooms', 'taxonomy general name', 'rent' ),
		'singular_name'     => _x( 'Room', 'taxonomy singular name', 'rent' ),
		'search_items'      => __( 'Search Rooms', 'rent' ),
		'all_items'         => __( 'All Rooms', 'rent' ),
		'parent_item'       => __( 'Parent Room', 'rent' ),
		'parent_item_colon' => __( 'Parent Room:', 'rent' ),
		'edit_item'         => __( 'Edit Room', 'rent' ),
		'update_item'       => __( 'Update Room', 'rent' ),
		'add_new_item'      => __( 'Add New Room', 'rent' ),
		'new_item_name'     => __( 'New Room Name', 'rent' ),
		'menu_name'         => __( 'Room', 'rent' ),
	);

    $args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'         => true,
	);

    register_taxonomy( 'room', 'home', $args ) ;      
    
}
add_action( 'init', 'rent_homes_room_taxonomy' );