<?php


/**
 *
 * Add custom Newsroom page layout for UCF Post List shortcode
 *
 * @since 1.0.0
 *
 **/

function dept_post_list_display_newsroom_before($content, $posts, $atts)
{
    ob_start();
    ?>
        <div class="ucf-post-list card-layout" id="post-list-<?php echo $atts['list_id']; ?>">
    <?php
    return ob_get_clean();
}

add_filter('ucf_post_list_display_newsroom_before', 'dept_post_list_display_newsroom_before', 10, 3);


function dept_post_list_display_newsroom_title($content, $posts, $atts)
{
    $formatted_title = '';

    if ($list_title = $atts['list_title']) {
        $formatted_title = '<h2 class="ucf-post-list-title">' . $list_title . '</h2>';
    }

    return $formatted_title;
}

add_filter('ucf_post_list_display_newsroom_title', 'dept_post_list_display_newsroom_title', 10, 3);


function dept_post_list_display_newsroom($content, $posts, $atts)
{
    if ($posts && !is_array($posts)) {
        $posts = array($posts);
    }
    ob_start();
    ?>
    <?php if ($posts) : ?>
        <div class="row ucf-post-list ucfwp-post-list-news">
            <?php foreach ($posts as $index => $item):
                $date = date("M d, Y", strtotime($item->post_date)); ?>

                <?php if ($index == 0): ?>

                    <div class="col-12 mb-4">
                        <article class="ucf-post-list-item">
							<div class="row">
								<div class="col-md-6 col-xl-7 mb-3 mb-md-0 pr-lg-4">
									<img src="<?php echo dept_get_newsroom_img_url($item); ?>" class="img-fluid" alt="<?php echo $item->post_title; ?>">
								</div>

								<div class="col pt-lg-4">
									<a class="text-secondary stretched-link text-decoration-none hover-text-underline" href="<?php echo get_permalink($item->ID); ?>">
										<h3 class="newsitem-heading"><span class="h3"><?php echo $item->post_title; ?></span></h3>
									</a>

									<div class="newsitem-excerpt"><?php echo ucfwp_get_excerpt($item, 50); ?></div>

									<div class="small text-default mt-2 newsitem-subhead"><?php echo $date; ?></div>
								</div>
							</div>
                        </article>
                    </div>

                <?php else: ?>

                    <?php if ($index > 0 && $index < 4): ?>
                    	<div class="col-md-4 mb-4">
                    <?php else: ?>
                    	<div class="col-lg-3 col-md-4 mb-4">
                    <?php endif; ?>
                        <article class="ucf-post-list-item">

                                <div class="aspect-ratio-box mb-3">
                                    <img src="<?php echo dept_get_newsroom_img_url($item); ?>" class="img-fluid" alt="<?php echo $item->post_title; ?>">
                                </div>

								<a class="text-secondary stretched-link text-decoration-none hover-text-underline" href="<?php echo get_permalink($item->ID); ?>">
                                	<h3 class="newsitem-heading"><?php echo $item->post_title; ?></h3>
								</a>

                                <div class="newsitem-excerpt"><?php echo ucfwp_get_excerpt($item, 25); ?></div>

                                <div class="small text-default mt-2 newsitem-subhead"><?php echo $date; ?></div>
                        </article>
                    </div>

                <?php endif; ?>
            <?php endforeach; ?>

        </div>

    <?php else : ?>
        <div class="ucf-post-list-error">No results found.</div>
    <?php endif;

        return ob_get_clean();
    }

    add_filter('ucf_post_list_display_newsroom', 'dept_post_list_display_newsroom', 10, 3);


function dept_post_list_display_newsroom_after($content, $posts, $atts)
{
        ob_start();
        ?>
</div>
<?php
    return ob_get_clean();
}

add_filter('ucf_post_list_display_newsroom_after', 'dept_post_list_display_newsroom_after', 10, 3);
