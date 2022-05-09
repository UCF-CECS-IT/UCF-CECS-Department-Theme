<?php

/**
 * Directory layout for faculty CPT or Person CPT
 *
 * @since 1.0.0
 */
if ( !function_exists( 'dept_post_list_display_directory_before' ) ) {

	function dept_post_list_display_directory_before( $content, $posts, $atts ) {
		ob_start();
	?>
	<div class="ucf-post-list ucf-post-list-directory" id="post-list-<?php echo $atts['list_id']; ?>">
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_post_list_display_directory_before', 'dept_post_list_display_directory_before', 10, 3 );

}

if ( !function_exists( 'dept_post_list_display_directory_title' ) ) {

	function dept_post_list_display_directory_title( $content, $posts, $atts ) {
		$formatted_title = '';

		if ( $list_title = $atts['list_title'] ) {
			$formatted_title = '<h2 class="ucf-post-list-title">' . $list_title . '</h2>';
		}

		return $formatted_title;
	}

	add_filter( 'ucf_post_list_display_directory_title', 'dept_post_list_display_directory_title', 10, 3 );

}

if ( !function_exists( 'dept_post_list_display_directory' ) ) {

	function dept_post_list_display_directory( $content, $posts, $atts ) {
		if ( ! is_array( $posts ) && $posts !== false ) {
			$posts = array( $posts );

		}
		uasort($posts, "sort_directory_posts");
		ob_start();
	?>
		<?php if ( $posts ): ?>
			<table class="table table-hover font-size-sm">
				<thead>
					<tr class="bg-primary">
						<th>Name</th>
						<th>Title</th>
						<th>Phone</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ( $posts as $item ): ?>
						<?php
							if ($item->post_type == 'faculty') {
								$name = get_field( 'faculty_first_name', $item->ID ) . ' ' . get_field( 'faculty_last_name', $item->ID );
								$position = get_field( 'faculty_position', $item->ID );
								$phone = get_field( 'faculty_phone', $item->ID );
								$email = get_field( 'faculty_email', $item->ID );
							} else {
								$name = $item->post_title;
								$position = get_field( 'person_jobtitle', $item->ID );
								$phone = get_field( 'person_phone', $item->ID );
								$email = get_field( 'person_email', $item->ID );
							}

						?>
						<tr>
							<td><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $name; ?></a></td>
							<td>
								<?php if ( $position ): ?>
									<?php echo $position; ?>
								<?php else: ?>
									N/A
								<?php endif; ?>
							</td>
							<td>
								<?php if ( $phone ): ?>
									<?php echo $phone; ?>
								<?php else: ?>
									N/A
								<?php endif; ?>
							</td>
							<td>
								<?php if ( $email ): ?>
									<a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								<?php else: ?>
									N/A
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<div class="ucf-post-list-error">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_post_list_display_directory', 'dept_post_list_display_directory', 10, 3 );

}

if ( !function_exists( 'dept_post_list_display_directory_after' ) ) {

	function dept_post_list_display_directory_after( $content, $posts, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_post_list_directory_default_after', 'dept_post_list_directory_default_after', 10, 3 );

}
