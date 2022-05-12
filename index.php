<?php

get_header();

?>

<div class="container mt-4 mb-5 pb-sm-4">
	<?php if ( have_posts() ): ?>
		<?php while ( have_posts() ) : the_post();

			$img = get_post_thumbnail_img( $post );
			$date = date( "M d, Y", strtotime( $post->post_date ) );

			?>
			<div class="row justify-content-center position-relative mb-4">
				<div class="col-lg-2 col-md-3 col-sm-4 col-8 pr-0 aspect-ratio-square mb-3 mb-sm-0">
					<img src="<?php echo $img; ?>">
				</div>
				<div class="col-lg-10 col-md-9 col-sm-8 col-12 position-static pt-1">
					<a class="text-secondary stretched-link text-decoration-none hover-text-underline" href="<?php echo get_permalink( $post->ID ); ?>"><h6><?php echo $post->post_title; ?></h6></a>
					<div class="font-size-sm"><?php echo ucfwp_get_excerpt( $post, 50 ); ?></div>
					<div class="small text-default mt-2 "><?php echo $date; ?></div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
