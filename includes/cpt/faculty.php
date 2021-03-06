<?php

/**
 * Creates custom post type for recording/displaying faculty info
 *
 * @since 1.0.0
 */
function faculty_post_type() {

	$labels = array(
		'name'                  => _x( 'Faculty', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Faculty', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Faculty', 'text_domain' ),
		'name_admin_bar'        => __( 'Faculty', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Faculty', 'text_domain' ),
		'taxonomies' 			=> array( 'letter', 'faculty-category' ),
		'labels'                => $labels,
		'menu_position'     	=> 5,
		'public'            	=> true,
		'has_archive'       	=> true,
		'supports'          	=> array('title', 'thumbnail', 'revisions')
	);
	register_post_type('faculty', $args);

	$expertiseLabels = array(
		'name'                          => 'Expertise',
        'all_items'                     => 'All Areas of Expertise',
        'edit_item'                     => 'Edit Expertise',
        'view_item'                     => 'View Expertise',
        'update_item'                   => 'Update Expertise',
        'add_new_item'                  => 'Add new Expertise',
        'new_item_name'                 => 'New Expertise',
        'search_items'                  => 'Search Areas of Expertise',
        'popular_items'                 => 'Common Areas of Expertise',
        'separate_items_with_commas'    => 'Separate areas of expertise with commas',
        'add_or_remove_items'           => 'Add or remove Areas of Expertise',
        'choose_from_most_used'         => 'Choose from common Areas of Expertise',
        'not_found'                     => 'No areas of expertise found'
	);

	$expertiseArgs = array(
		'hierarchical'          => false,
		'labels'                => $expertiseLabels,
		'show_admin_column' => true
	);

	register_taxonomy('expertise', 'faculty', $expertiseArgs);

	$categoryLabels = array(
		'name'                          => 'Faculty Category',
        'all_items'                     => 'All Faculty Categories',
        'edit_item'                     => 'Edit Faculty Category',
        'view_item'                     => 'View Faculty Category',
        'update_item'                   => 'Update Faculty Category',
        'add_new_item'                  => 'Add new Faculty Category',
        'new_item_name'                 => 'New Faculty Category',
        'search_items'                  => 'Search Faculty Category',
        'popular_items'                 => 'Common Faculty Categories',
        'separate_items_with_commas'    => 'Separate Faculty Categories with commas',
        'add_or_remove_items'           => 'Add or remove Faculty Category',
        'choose_from_most_used'         => 'Choose from common Faculty Category',
        'not_found'                     => 'No Faculty Categories found'
	);

	$categoryArgs = array(
		'hierarchical'          => true,
		'labels'                => $categoryLabels,
		'show_admin_column' => true
	);

	register_taxonomy('faculty-category', 'faculty', $categoryArgs);

	$letterArgs = [
		'labels'            => array(
			'name'          => 'Letter',
		),
		'show_admin_column' => false,
		'show_ui'           => false,
		'show_in_nav_menus' => false,
		'meta_box_cb'       => false
	];

	register_taxonomy('letter', 'faculty', $letterArgs);

}
add_action( 'init', 'faculty_post_type', 0 );
