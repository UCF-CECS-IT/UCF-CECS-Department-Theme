<?php

get_header();
the_post();

/**
 * Preserve content, sidebar loading may reset the global WP_Query if it
 * contains certain shortcodes, like [ucf-post-list]
 */
$content = get_the_content();
$content = apply_filters( 'the_content', $content );

/**
 * Checks the post's sidebar selection checkbox results. These are dynamically
 * populated based on the Theme Settings > Sidebar items.
 */
$sidebarSelector = get_field( 'sidebar_selector' );

// Sidebar selections are matched against the sidebar items and added if found
if ( $sidebarSelector ) {
	$sidebars = get_field ( 'sidebars', 'option' );
	$selected = [];

	foreach( $sidebars as $index => $sidebar ) {
		if (in_array($sidebar['name'], $sidebarSelector)) {
			$selected[] = $sidebar;
		}
	}
}

?>

<div class="container mt-4 mb-5 pb-sm-4">

	<?php if ( $sidebarSelector ): ?>
		<div class="row">
			<div class="col-lg-9">
				<?php echo $content; ?>
			</div>

			<div class="col-lg-3">
				<?php foreach( $selected as $sidebar): ?>
					<div class="mb-4">
						<?php echo $sidebar['content']; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php else: ?>
		<?php echo $content; ?>
	<?php endif; ?>

</div>

<?php

get_footer();

?>
