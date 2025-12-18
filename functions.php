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
}

add_action('wp_enqueue_scripts', 'testt3_enqueue_scripts');
