<?php

/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (! function_exists('elementor_theme_do_location') || ! elementor_theme_do_location('footer')) {
	if (hello_elementor_display_header_footer()) {
		if (did_action('elementor/loaded') && hello_header_footer_experiment_active()) {
			get_template_part('template-parts/dynamic-footer');
		} else {
			get_template_part('template-parts/footer');
		}
	}
}
?>

<?php wp_footer(); ?>
<button class="back-to-top" type="button">
	
</button>
<!-- Start of HubSpot Embed Code -->
<!-- <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/48223765.js"></script> -->
<!-- End of HubSpot Embed Code -->
</body>

</html>
