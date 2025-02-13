<?php

// add_action('wp_enqueue_scripts', 'disable_eicons', 11);
function disable_eicons()
{
  wp_dequeue_style('elementor-icons');
  wp_deregister_style('elementor-icons');
}
// add_filter('elementor/frontend/print_google_fonts', '__return_false');
// add_action('elementor/frontend/after_register_styles', function () {
//   foreach (['solid', 'regular', 'brands'] as $style) {
//     wp_deregister_style('elementor-icons-fa-' . $style);
//   }
// }, 20);
