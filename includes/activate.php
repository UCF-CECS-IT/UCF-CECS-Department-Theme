<?php

/**
 * Prints an error message in the WordPress admin notifying the user
 * that UCF Post List Shortcode is a required plugin for this theme.
 *
 * @since 0.2.7
 * @author Jo Dickson
 */
function dept_activation_error_post_list() {
	ob_start();
?>
	<div class="notice notice-error">
		<p><strong>Theme not activated:</strong> The UCF WordPress Theme requires the <a href="https://github.com/UCF/UCF-Post-List-Shortcode" target="_blank">UCF Post List Shortcode</a> plugin.  Please install and activate the Post List plugin and try again.</p>
	</div>
<?php
	echo ob_get_clean();
}

/**
 * Performs verification checks immediately upon theme activation
 * to ensure required dependencies are installed. Will revert to the
 * previously-active theme if a requirement isn't met.
 *
 * @since 1.0.0
 * @param string $oldtheme_name The name of the theme that was active prior to switching to this theme
 * @param object $oldtheme WP_Theme instance of the old theme.
 */
function dept_activation_checks( $oldtheme_name, $oldtheme ) {
	$do_revert = false;

	// Require UCF Post List Shortcode
	if ( ! class_exists( 'UCF_Post_List_Common' ) ) {
		$do_revert = true;
		add_action( 'admin_notices', 'dept_activation_error_post_list' );
	}

	// Switch back to previous theme if a requirement is missing
	if ( $do_revert ) {
		switch_theme( $oldtheme->stylesheet );
	}

	return false;
}

add_action( 'after_switch_theme', 'dept_activation_checks', 10, 2 );
