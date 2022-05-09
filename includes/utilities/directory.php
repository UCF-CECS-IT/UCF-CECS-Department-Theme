<?php

function sort_directory_posts( $a, $b ) {
	// check post type
	$type = $a->post_type;

	switch ($type) {
		case 'faculty':
			$nameA = get_faculty_orderby_name( $a );
			$nameB = get_faculty_orderby_name( $b );
			break;

		case 'person':
			$nameA = get_person_orderby_name( $a );
			$nameB = get_person_orderby_name( $b );
			break;

		default:
			$nameA = $nameB = 'invalid';
			break;
	}

	return $nameA <=> $nameB;
}

function get_faculty_orderby_name( $faculty ) {
	return get_field( 'faculty_last_name', $faculty->ID ) . ', ' . get_field( 'faculty_first_name', $faculty->ID );
}

function get_person_orderby_name( $person ) {
	$orderby_name = get_field( 'person_orderby_name', $person->ID );

	if ( $orderby_name ) {
		return $orderby_name;
	}

	$nameArray = explode( ' ', $person->post_title );
	$orderby_name = end($nameArray) . ', ' . $nameArray[0];

	return $orderby_name;
}
