<?php

/**
 * Custom layout for faculty CPT
 *
 * @since 1.0.0
 */
function dept_post_list_display_faculty_before( $content, $items, $atts ) {
	ob_start();
?>
<div class="ucf-post-list ucfwp-post-list-people">
<?php
	return ob_get_clean();
}

add_filter( 'ucf_post_list_display_faculty_before', 'dept_post_list_display_faculty_before', 10, 3 );


function dept_post_list_display_faculty_title( $content, $items, $atts ) {
	$formatted_title = '';
	if ( $atts['list_title'] ) {
		$formatted_title = '<h2 class="ucf-post-list-title">' . $atts['list_title'] . '</h2>';
	}
	return $formatted_title;
}

add_filter( 'ucf_post_list_display_faculty_title', 'dept_post_list_display_faculty_title', 10, 3 );


function dept_post_list_display_faculty( $content, $items, $atts ) {
	if ( ! is_array( $items ) && $items !== false ) { $items = array( $items ); }

	$fa_version = get_theme_mod( 'font_awesome_version' );
	$fa_email_icon = '';
	$fa_phone_icon = '';
	switch ( $fa_version ) {
		case 'none':
			break;
		case '5':
			$fa_email_icon = 'fas fa-envelope fa-fw mr-1';
			$fa_phone_icon = 'fas fa-phone fa-fw mr-1';
			break;
		case '4':
		default:
			$fa_email_icon = 'fa fa-envelope fa-fw mr-1';
			$fa_phone_icon = 'fa fa-phone fa-fw mr-1';
			break;
	}

	ob_start();
	?>
	<?php if ( $items ): ?>
	<ul class="list-unstyled row ucf-post-list-items">
		<?php
		foreach ( $items as $item ):

			$thumbnail = get_field( 'faculty_headshot', $item->ID ) ?: DEPARTMENT_THEME_IMG_URL . '/faculty-fallback.jpg';
			$name = get_field( 'faculty_first_name', $item->ID ) . ' ' . get_field( 'faculty_last_name', $item->ID );
			$position = get_field( 'faculty_position', $item->ID );
			$email = get_field( 'faculty_email', $item->ID );
			$phone = get_field('faculty_phone', $item->ID );

			?>
			<li class="col-6 col-sm-4 col-md-3 col-xl-2 mt-3 mb-2 ucf-post-list-item">

				<a class="person-link" href="<?php echo get_permalink( $item->ID ); ?>">
					<div class="media-background-container person-photo mx-auto">
						<img src="<?php echo $thumbnail; ?>" alt="" class="media-background object-fit-cover">
					</div>
					<strong class="my-2 d-block person-name">
						<?php echo $name; ?>
					</strong>

					<?php if ( $position ): ?>
						<div class="mb-2 font-italic person-job-title">
							<?php echo $position; ?>
						</div>
					<?php endif; ?>
				</a>

				<?php if ( $email ): ?>
					<div class="person-email">
						<a href="mailto:<?php echo $email; ?>">
							<?php if ( $fa_email_icon ): ?><span class="<?php echo $fa_email_icon; ?>" aria-hidden="true"></span><?php endif; ?>Email
							<span class="sr-only"> <?php echo $email; ?></span>
						</a>
					</div>
				<?php endif; ?>

				<?php if ( $phone ): ?>
					<div class="person-phone">
						<?php if ( $fa_phone_icon ): ?><span class="<?php echo $fa_phone_icon; ?>" aria-hidden="true"></span><?php endif; ?><?php echo $phone; ?>
					</div>
				<?php endif; ?>

			</li>
		<?php endforeach; ?>
	</ul>
	<?php else: ?>
	<div class="ucf-post-list-error mb-4">No results found.</div>
	<?php endif; ?>
<?php
	return ob_get_clean();
}

add_filter( 'ucf_post_list_display_faculty', 'dept_post_list_display_faculty', 10, 3 );


function dept_post_list_display_faculty_after( $content, $items, $atts ) {
	ob_start();
	?>
		</div>
	<?php
	return ob_get_clean();
}

add_filter( 'ucf_post_list_display_faculty_after', 'dept_post_list_display_faculty_after', 10, 3 );
