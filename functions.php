<?php
namespace Department\Theme;

define( 'DEPARTMENT_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once DEPARTMENT_THEME_DIR . 'includes/config.php';
include_once DEPARTMENT_THEME_DIR . 'includes/meta.php';

// Add other includes to this file as needed.
include DEPARTMENT_THEME_DIR . 'includes/cpt/faculty.php';

include DEPARTMENT_THEME_DIR . 'includes/layouts/add-layouts.php';
include DEPARTMENT_THEME_DIR . 'includes/layouts/faculty.php';
include DEPARTMENT_THEME_DIR . 'includes/layouts/newsroom.php';

include DEPARTMENT_THEME_DIR . 'includes/utilities/newsroom.php';
