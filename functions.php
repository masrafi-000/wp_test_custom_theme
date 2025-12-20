<?php

/**
 * Funtions to handle enqueue
 * 
 * @package TestT3
 */

function testt3_enqueue_scripts()
{
    // Register Styles
    wp_register_style('main-css', get_stylesheet_uri(), []);
    wp_register_style('tailwind-css', get_template_directory_uri() . '/src/output.css');

    // Register Scripts
    wp_register_script("script-js", get_template_directory_uri() . '/assets/js/script.js');


    // Enqueue Style
    wp_enqueue_style('main-css');
    wp_enqueue_style('tailwind-css');

    // Enqueue Scripts
    wp_enqueue_script("script-js");
}

add_action('wp_enqueue_scripts', 'testt3_enqueue_scripts');
