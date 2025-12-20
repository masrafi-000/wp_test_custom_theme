<?php

/**
 * Theme functions
 *
 * @package TestT3
 */

/**
 * Enqueue styles & scripts
 */
function testt3_enqueue_scripts()
{
    /* ---------- Styles ---------- */

    // Tailwind output
    $tailwind_path = get_template_directory() . '/src/output.css';
    wp_enqueue_style(
        'tailwind-css',
        get_template_directory_uri() . '/src/output.css',
        [],
        file_exists($tailwind_path) ? filemtime($tailwind_path) : null
    );

    // Main theme style (style.css)
    wp_enqueue_style(
        'main-css',
        get_stylesheet_uri(),
        ['tailwind-css'],
        filemtime(get_stylesheet_directory() . '/style.css')
    );

    /* ---------- Scripts ---------- */

    $script_path = get_template_directory() . '/assets/js/script.js';
    wp_enqueue_script(
        'theme-script',
        get_template_directory_uri() . '/assets/js/script.js',
        [],
        file_exists($script_path) ? filemtime($script_path) : null,
        true
    );
}
add_action('wp_enqueue_scripts', 'testt3_enqueue_scripts');


/**
 * Theme Customizer
 */
function theme_customize_register($wp_customize)
{
    $wp_customize->add_section('design_section', [
        'title'    => 'Design System',
        'priority' => 30,
    ]);

    // Text Color
    $wp_customize->add_setting('text_primary', [
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'text_primary',
            [
                'label'   => 'Text Color',
                'section' => 'design_section',
            ]
        )
    );

    // Header background
    $wp_customize->add_setting('header_bg', [
        'default'           => '#020617',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_bg',
            [
                'label'   => 'Header Background',
                'section' => 'design_section',
            ]
        )
    );

    // Page background
    $wp_customize->add_setting('page_bg', [
        'default'           => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'page_bg',
            [
                'label'   => 'Page Background',
                'section' => 'design_section',
            ]
        )
    );

    // Section padding Y
    $wp_customize->add_setting('section_padding_y', [
        'default' => '4rem',
        'sanitize_callback' => function ($value) {
            return preg_replace('/[^0-9a-z.%]/i', '', $value);
        },
    ]);

    $wp_customize->add_control('section_padding_y', [
        'label'   => 'Section Vertical Padding',
        'section' => 'design_section',
        'type'    => 'select',
        'choices' => [
            '2rem' => 'Small',
            '4rem' => 'Medium',
            '6rem' => 'Large',
        ],
    ]);

    // Text alignment
    $wp_customize->add_setting('page_text_align', [
        'default'           => 'center',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('page_text_align', [
        'label'   => 'Page Text Alignment',
        'section' => 'design_section',
        'type'    => 'select',
        'choices' => [
            'left'   => 'Left',
            'center' => 'Center',
            'right'  => 'Right',
        ],
    ]);
}
add_action('customize_register', 'theme_customize_register');


/**
 * Runtime CSS variables (Design System)
 */
function theme_runtime_css_vars()
{
    $css = ':root {
        --header-bg: ' . get_theme_mod('header_bg', '#020617') . ';
        --page-bg: ' . get_theme_mod('page_bg', '#FFFFFF') . ';
        --text-primary: ' . get_theme_mod('text_primary', '#000000') . ';
        --section-padding-y: ' . get_theme_mod('section_padding_y', '4rem') . ';
        --page-text-align: ' . get_theme_mod('page_text_align', 'center') . ';
    }';

    wp_add_inline_style('tailwind-css', $css);
}
add_action('wp_enqueue_scripts', 'theme_runtime_css_vars');
