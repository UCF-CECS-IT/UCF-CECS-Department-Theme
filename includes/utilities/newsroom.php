<?php

/**
 * Returns a string URL of the featured img or
 *
 * @param WP_POST $item
 * @return string
 *
 * @since 1.0.0
 */
function dept_get_newsroom_img_url( $item ) {
	return UCF_Post_List_Common::get_image_or_fallback( $item, 'large' );
}
