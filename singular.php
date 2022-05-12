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
 * Checks the page's sidebar selection checkbox results. These are dynamically
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

$subnavSelector = get_field( 'subnav_selector' );

if ( $subnavSelector ) {
	$parent = get_post_parent();
	$args = array(
		'post_type' 	 => 'page',
		'posts_per_page' => 20,
		'post_parent'    => $parent->ID,
		'orderby'		 => 'menu_order',
	);
	$children = get_posts( $args );
}

?>

<div class="container mt-4 mb-5 pb-sm-4">

	<?php if ( $sidebarSelector || $subnavSelector ): ?>
		<div class="row">
			<div class="col-lg-9">
				<?php echo $content; ?>
			</div>

			<div class="col-lg-3">
				<?php if ( $subnavSelector ): ?>
					<div class="list-group font-size-sm mb-4">
						<!-- Parent  -->
						<a class="text-center text-white bg-inverse-t-3 list-group-item list-group-item-action">
							<h6 class="mb-0"><?php echo $parent->post_title; ?></h6>
						</a>

						<!-- children -->
						<?php foreach( $children as $child ): ?>
							<a class="bg-faded list-group-item list-group-item-action" href="<?php echo get_permalink( $child->ID ); ?>"><?php echo $child->post_title; ?></a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<?php if ( $sidebarSelector ): ?>
					<?php foreach( $selected as $sidebar): ?>
						<div class="mb-4">
							<?php echo $sidebar['content']; ?>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	<?php else: ?>
		<?php echo $content; ?>
	<?php endif; ?>

</div>

<?php

get_footer();

?>
