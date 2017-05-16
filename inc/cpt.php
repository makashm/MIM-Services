<?php 

/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function mim_services_cpt() {

	$labels = array(
		'name'                => __( 'Services', 'services' ),
		'singular_name'       => __( 'Service', 'services' ),
		'add_new'             => _x( 'Add New Service', 'services', 'services' ),
		'add_new_item'        => __( 'Add New Service', 'services' ),
		'edit_item'           => __( 'Edit Service', 'services' ),
		'new_item'            => __( 'New Service', 'services' ),
		'view_item'           => __( 'View Service', 'services' ),
		'search_items'        => __( 'Search Services', 'services' ),
		'not_found'           => __( 'No Services found', 'services' ),
		'not_found_in_trash'  => __( 'No Services found in Trash', 'services' ),
		'parent_item_colon'   => __( 'Parent Service:', 'services' ),
		'menu_name'           => __( 'Services', 'services' ),
	);

	$args = array(
		'labels'                   => $labels,
		'hierarchical'        => true,
		'description'         => 'description',
		'taxonomies'          => array(),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => null,
		'menu_icon'           => null,
		'show_in_nav_menus'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'supports'            => array(
			'title', 'editor', 'thumbnail'
		)
	);

	register_post_type( 'mim-services', $args );
}

add_action( 'init', 'mim_services_cpt' );
