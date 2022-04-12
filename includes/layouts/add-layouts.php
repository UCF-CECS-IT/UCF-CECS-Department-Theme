<?php

/**
 * Adds custom layouts for the UCF Post List plugin.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'department_post_list_layouts' ) ) {
	function department_post_list_layouts( $layouts ) {
		$layouts['news'] = 'Vertical Feature Layout';

		if ( class_exists( 'UCF_People_PostType' ) ) {
			$layouts['people'] = 'People Layout';
		}

		$layouts['faculty'] = 'Faculty Cards';
		$layouts['newsroom'] = 'News layout for Newsroom page';

		return $layouts;
	}
}

add_filter( 'ucf_post_list_get_layouts', 'department_post_list_layouts' );
