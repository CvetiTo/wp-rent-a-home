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