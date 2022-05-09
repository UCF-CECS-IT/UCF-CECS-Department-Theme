<?php
namespace Department\Theme;

define( 'DEPARTMENT_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );

include DEPARTMENT_THEME_DIR . 'includes/activate.php';

// Theme foundation
include_once DEPARTMENT_THEME_DIR . 'includes/config.php';
include_once DEPARTMENT_THEME_DIR . 'includes/meta.php';

// Add other includes to this file as needed.
include DEPARTMENT_THEME_DIR . 'includes/acf/faculty.php';
include DEPARTMENT_THEME_DIR . 'includes/acf/sidebar.php';

include DEPARTMENT_THEME_DIR . 'includes/cpt/faculty.php';

include DEPARTMENT_THEME_DIR . 'includes/layouts/add-layouts.php';
include DEPARTMENT_THEME_DIR . 'includes/layouts/directory.php';
include DEPARTMENT_THEME_DIR . 'includes/layouts/faculty.php';
include DEPARTMENT_THEME_DIR . 'includes/layouts/newsroom.php';

include DEPARTMENT_THEME_DIR . 'includes/utilities/directory.php';
include DEPARTMENT_THEME_DIR . 'includes/utilities/newsroom.php';
include DEPARTMENT_THEME_DIR . 'includes/utilities/post.php';

// Adds an ACF Options page to control page-specific sidebars
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Sidebar Settings',
		'menu_title'	=> 'Sidebar',
		'parent_slug'	=> 'theme-settings',
	));

}
