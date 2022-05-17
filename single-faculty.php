<?php

get_header();
the_post();

$headshot = get_field('faculty_headshot') ?: DEPARTMENT_THEME_IMG_URL . '/pegasus.jpg';
$name = get_field('faculty_first_name') . ' ' . get_field('faculty_last_name');
$position = get_field('faculty_position');
$office = get_field('faculty_office');
$phone = get_field('faculty_phone');
$email = get_field('faculty_email');
$cv = get_field('faculty_cv');
$website = get_field('faculty_website');
$bio = get_field('faculty_bio');
$education = get_field('faculty_education');
$specialties = get_field('faculty_specialties');

$hasTabs = $bio || $education || $specialties;

if ( $bio ) {
	$showBioTab = true;
	$showEducationTab = false;
	$showSpecialtiesTab = false;
} else if ( $education ) {
	$showBioTab = false;
	$showEducationTab = true;
	$showSpecialtiesTab = false;
} else if ( $specialties ) {
	$showBioTab = true;
	$showEducationTab = false;
	$showSpecialtiesTab = false;
}

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

					<?php if ($cv) : ?>
						<tr>
							<th class="w-25">CV:</th>
							<td><a href="<?php echo $cv; ?>" target="_blank">Download</a></td>
						</tr>
					<?php endif; ?>

					<?php if ($website) : ?>
						<tr>
							<th class="w-25">Website:</th>
							<td><a href="<?php echo $website; ?>">Link</a></td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

	<?php if ($hasTabs) : ?>
		<div class="row">
			<div class="col-3 ">
				<nav class="nav nav-pills flex-column bg-faded mb-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
					<?php if ($bio) : ?>
						<a class="nav-link text-secondary <?php if ( $showBioTab ) { echo 'active'; } ?>" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="<?php if ( $showBioTab ) { echo 'true'; } else { echo 'false'; } ?>">Biography</a>
					<?php endif; ?>
					<?php if ($education) : ?>
						<a class="nav-link text-secondary <?php if ( $showEducationTab ) { echo 'active'; } ?>" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="<?php if ( $showEducationTab ) { echo 'true'; } else { echo 'false'; } ?>">Education</a>
					<?php endif; ?>
					<?php if ($specialties) : ?>
						<a class="nav-link text-secondary <?php if ( $showSpecialtiesTab ) { echo 'active'; } ?>" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="<?php if ( $showSpecialtiesTab ) { echo 'true'; } else { echo 'false'; } ?>">Specialties</a>
					<?php endif; ?>
				</nav>
			</div>
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
					<?php if ($bio) : ?>
						<div class="tab-pane fade <?php if ( $showBioTab ) { echo 'active show'; } ?>" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<h4><span class="font-slab-serif">Biography</span></h4>
							<?php echo $bio; ?>
						</div>
					<?php endif; ?>
					<?php if ($education) : ?>
						<div class="tab-pane fade <?php if ( $showEducationTab ) { echo 'active show'; } ?>" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<h4><span class="font-slab-serif">Education</span></h4>
							<ul>
								<?php foreach( $education as $educationLevel ): ?>
									<li><?php echo $educationLevel['faculty_education_level']; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
					<?php if ($specialties) : ?>
						<div class="tab-pane fade <?php if ( $showSpecialtiesTab ) { echo 'active show'; } ?>" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<h4><span class="font-slab-serif">Specialties</span></h4>
							<ul>
								<?php foreach( $specialties as $specialty ): ?>
									<li><?php echo $specialty['area_of_specialty']; ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!--  -->
</div>

<?php get_footer(); ?>
