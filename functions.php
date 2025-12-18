<?php

/**
 * Funtions to handle enqueue
 * 
 * @package TestT3
 */

function testt3_enqueue_scripts()
{
    // Enqueue main style.css of your theme
    wp_enqueue_style('stylesheet', get_stylesheet_uri());

    wp_enqueue_style('tailwindcss', get_template_directory_uri() . '/src/output.css');
}

add_action('wp_enqueue_scripts', 'testt3_enqueue_scripts');
