<?php
add_action('wp_enqueue_scripts', 'shin_scripts');

function shin_scripts()
{
    $version = time();

    // Wiget Whatsapp
    wp_enqueue_script('wa-scripts-js', THEME_URL . '-child' . '/assets/js/widgetWhatsappOrigin.js', array('jquery'), $version, true);
}
