<?php

/**
 * Custom layout for faculty CPT
 *
 * @since 1.0.0
 */
if ( !function_exists( 'dept_post_list_display_faculty_before' ) ) {

	function dept_post_list_display_faculty_before( $content, $posts, $atts ) {
		ob_start();
	?>
	<div class="ucf-post-list ucf-post-list-faculty" id="post-list-<?php echo $atts['list_id']; ?>">
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_post_list_display_faculty_before', 'dept_post_list_display_faculty_before', 10, 3 );

}

if ( !function_exists( 'dept_post_list_display_faculty_title' ) ) {

	function dept_post_list_display_faculty_title( $content, $posts, $atts ) {
		$formatted_title = '';

		if ( $list_title = $atts['list_title'] ) {
			$formatted_title = '<h2 class="ucf-post-list-title">' . $list_title . '</h2>';
		}

		return $formatted_title;
	}

	add_filter( 'ucf_post_list_display_faculty_title', 'dept_post_list_display_faculty_title', 10, 3 );

}

if ( !function_exists( 'dept_post_list_display_faculty' ) ) {

	function dept_post_list_display_faculty( $content, $posts, $atts ) {
		if ( ! is_array( $posts ) && $posts !== false ) {
			$posts = array( $posts );

		}
		uasort($posts, "sort_faculty_posts");
		ob_start();
	?>
		<?php if ( $posts ): ?>
			<div class="row justify-content-center ucf-post-list-items">
				<?php foreach ( $posts as $item ): ?>
					<?php
						$metaArray = get_metadata('post', $item->ID);
						$positionArray = faculty_get_positions($metaArray);
						$title = ($metaArray['featured_position'][0] ?? false) ?: faculty_get_display_title($positionArray);
					?>
					<div class="col-lg-4 col-md-6 col-11 mb-3 ucf-post-list-item small-hover-zoom">
						<div class="row no-gutters">
							<div class="col">
								<a href="<?php echo get_permalink($item->ID); ?>">
									<div class="media-background-container person-photo mx-auto rounded box-shadow-soft h-75">
										<img src="<?php echo faculty_get_photo( $item->ID ); ?>" class="media-background object-fit-cover" data-object-fit="cover">
									</div>
								</a>
							</div>
							<div class="col p-2 d-flex flex-column align-items-start">
								<h3 class="mt-2 mb-1 person-name"><?php echo faculty_get_display_name($metaArray); ?></h3>
								<?php if ( $title ?? false): ?>
									<div class="font-italic person-job-title <?php
											if (strlen($title) > 20) {
												echo 'small font-italic';
											} else {
												echo 'font-italic';
											}
										?>">
										<?php echo $title; ?>
									</div>
								<?php endif; ?>
								<?php if ( $metaArray['email'][0] ?? false ): ?>
									<div class="person-email"><a href="mailto:<?php echo $metaArray['email'][0]; ?>"><span class="fa-stack fa-lg text-primary"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></a></div>
								<?php endif; ?>
								<?php if ( $metaArray['phone'][0] ?? false): ?>
									<div class="person-job-title"><?php echo $metaArray['phone'][0] ?? false;?></div>
								<?php endif; ?>
								<div class="mt-auto"><a class="btn btn-primary btn-sm font-weight-light" href="<?php echo get_permalink($item->ID); ?>"><small>Profile</small></a></div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>



		<?php else: ?>
			<div class="ucf-post-list-error">No results found.</div>
		<?php endif; ?>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_post_list_display_faculty', 'dept_post_list_display_faculty', 10, 3 );

}

if ( !function_exists( 'dept_post_list_display_faculty_after' ) ) {

	function dept_post_list_display_faculty_after( $content, $posts, $atts ) {
		ob_start();
	?>
	</div>
	<?php
		return ob_get_clean();
	}

	add_filter( 'ucf_post_list_faculty_default_after', 'dept_post_list_faculty_default_after', 10, 3 );

}
