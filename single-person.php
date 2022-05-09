<?php

get_header();
the_post();

$headshot = get_the_post_thumbnail_url() ?: DEPARTMENT_THEME_IMG_URL . '/faculty-fallback.jpg';
// $name = get_field('faculty_first_name') . ' ' . get_field('faculty_last_name');
$position = get_field('person_jobtitle');
$office = get_field('faculty_office');
$phone = get_field('faculty_phone');
$email = get_field('faculty_email');


?>

<div class="container mt-4 mb-5 pb-sm-4">

	<div class="row justify-content-center mb-4">
		<div class="col-lg-3 col-md-3 col-sm-4 col-10 mb-3 mb-sm-0">
			<img class="w-100" src="<?php echo $headshot; ?>">
		</div>

		<div class="col-lg-9 col-md-9 col-sm-8 col-12 pt-0 pt-md-2 mb-3 mb-sm-0">
			<h4 class="font-weight-light text-sm-left text-center mb-3"><?php echo $position; ?></h4>
			<table class="table faculty-info-text">
				<tbody>
					<?php if ($office) : ?>
						<tr>
							<th class="w-25">Office:</th>
							<td><?php echo $office; ?></td>
						</tr>
					<?php endif; ?>

					<?php if ($phone) : ?>
						<tr>
							<th class="w-25">Phone:</th>
							<td><?php echo $phone; ?></td>
						</tr>
					<?php endif; ?>

					<?php if ($email) : ?>
						<tr>
							<th class="w-25">Email:</th>
							<td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
						</tr>
					<?php endif; ?>

				</tbody>
			</table>
		</div>
	</div>

	<div>
		<?php the_content(); ?>
	</div>
</div>

<?php get_footer(); ?>
