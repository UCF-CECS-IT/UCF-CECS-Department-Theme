<?php

function sort_faculty_posts( $a, $b ) {
	$nameA = get_faculty_orderby_name( $a );
	$nameB = get_faculty_orderby_name( $b );

	return $nameA <=> $nameB;
}
