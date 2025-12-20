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
    wp_register_script("script-js", get_template_directory_uri() . '/assets/js/script.js', [], fileatime(get_template_directory() . "/assets/js/script.js"), true);


    // Enqueue Style
    wp_enqueue_style('main-css');
    wp_enqueue_style('tailwind-css');

    // Enqueue Scripts
    wp_enqueue_script("script-js");
}

function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('design_section', [
        'title' => 'Design System',
    ]);

    // Header background
    $wp_customize->add_setting('header_bg', [
        'default' => '#020617',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg',
            [
                'label' => 'Header Background',
                'section' => 'design_section',
            ]
        )
    );

    // Page background
    $wp_customize->add_setting('page_bg', [
        'default' => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'page_bg',
            [
                'label' => 'Page Background',
                'section' => 'design_section',
            ]
        )
    );

    $wp_customize->add_setting('section_padding_y', [
        'default' => '4rem',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('section_padding_y', [
        'label' => 'Section Vertical Padding',
        'section' => 'design_section',
        'type' => 'select',
        'choices' => [
            '2rem' => 'Small',
            '4rem' => 'Medium',
            '6rem' => 'Large',
        ],
    ]);

    // Text alignment
    $wp_customize->add_setting('page_text_align', [
        'default' => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('page_text_align', [
        'label' => 'Page Text Alignment',
        'section' => 'design_section',
        'type' => 'select',
        'choices' => [
            'left' => 'Left',
            'center' => 'Center',
            'right' => 'Right',
        ],
    ]);
}

// Add Actions
add_action('customize_register', 'theme_customize_register');
add_action('wp_enqueue_scripts', 'testt3_enqueue_scripts');



function theme_runtime_css_vars() {
    ?>
    <style>
        :root {
            --header-bg: <?php echo esc_attr( get_theme_mod('header_bg') ); ?>;
            --page-bg: <?php echo esc_attr( get_theme_mod('page_bg') ); ?>;
            --section-padding-y: <?php echo esc_attr( get_theme_mod('section_padding_y') ); ?>;
            --page-text-align: <?php echo esc_attr( get_theme_mod('page_text_align') ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'theme_runtime_css_vars' );
