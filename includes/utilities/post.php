<?php

function get_post_thumbnail_img( $post ) {
	$featured_img = get_the_post_thumbnail_url( $post->ID, 'medium' );

	if ( $featured_img ) {
		$img = $featured_img;
	} else {
		$header_image = ucfwp_get_header_images( $post )['header_image'];
		$img = ucfwp_get_attachment_src_by_size( $header_image, 'medium' );

		// if both the featured image and header background image are missing, use fallback
		if ( !$img ) {
			$img = DEPARTMENT_THEME_IMG_URL . '/thumbnail-fallback.jpg';
		}
	}

	return $img;
}
