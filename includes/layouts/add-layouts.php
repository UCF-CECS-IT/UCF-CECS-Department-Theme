<?php

/**
 * Adds custom layouts for the UCF Post List plugin.
 *
 * @since 1.0.0
 */
function department_post_list_layouts( $layouts ) {

	$layouts['faculty'] = 'Faculty Cards';
	$layouts['newsroom'] = 'News layout for Newsroom page';
	$layouts['directory'] = 'Staff & Faculty directory for Faculty and Person CPT';

	return $layouts;
}

add_filter( 'ucf_post_list_get_layouts', 'department_post_list_layouts' );
