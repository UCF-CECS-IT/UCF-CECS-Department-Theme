<?php

function dept_get_newsroom_img_url( $item ) {
	return UCF_Post_List_Common::get_image_or_fallback( $item, 'large' );
}
