<?php

get_header();
the_post();

$sidebarSelector = get_field( 'sidebar_selector' );

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
				<?php the_content(); ?>
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
		<?php the_content(); ?>
	<?php endif; ?>

</div>

<?php

get_footer();

?>
