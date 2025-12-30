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

    // leaflet.js style

    wp_enqueue_style(
        'leaflet-css',
        'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
        [],
        '1.9.4'
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

    // Leaflet.js script add
    wp_enqueue_script(
        'leaflet-js',
        'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js',
        [],
        '1.9.4',
        true
    );

    // Custom Leaflet.js script
    $custom_leaflet_path = get_template_directory() . '/assets/js/custom-leaflet-js.js';

    wp_enqueue_script(
        'custom-leaflet-js',
        get_template_directory_uri() . '/assets/js/custom-leaflet-js.js',
        ['leaflet-js'],
        file_exists($custom_leaflet_path) ? filemtime($custom_leaflet_path) : null,
        true
    );

    // Map_form Script
    $custom_map_js_path = get_template_directory() . '/assets/js/map-form.js';

    wp_enqueue_script(
        'map-form-js',
        get_template_directory_uri() . '/assets/js/map-form.js',
        [],
        file_exists($custom_map_js_path) ? filemtime($custom_map_js_path) : null,
        true
    );

    // Blog script
    $custom_blog_js_path = get_template_directory() . '/assets/js/blog.js';

    wp_enqueue_script(
        'blog-js',
        get_template_directory_uri() . '/assets/js/blog.js',
        [],
        file_exists($custom_blog_js_path) ? filemtime($custom_blog_js_path) : null,
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



// function fetch_hotelbeds_data_handler()
// {

//     check_ajax_referer('my_api_nonce_action', 'security');


//     $api_key = '1e8234c861f59b71091515efa946ed32';
//     $shared_secret = '4c2cf69797';


//     $timestamp = time();
//     $signature_string = $api_key . $shared_secret . $timestamp;
//     $signature = hash('sha256', $signature_string);


//     $api_url = 'https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?from=1&to=6';


//    $ch = curl_init($api_url);
//     curl_setopt_array($ch, [
//         CURLOPT_POST => false,
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_HTTPHEADER => [
//             'Content-Type: application/json',
//             'Accept: application/json',
//             'Api-key: ' . $api_key,
//             'X-Signature: ' . $signature
//         ],
//         CURLOPT_TIMEOUT => 30
//     ]);

//     $response = curl_exec($ch);
//     curl_close($ch);

//     if (is_wp_error($response)) {
//         wp_send_json_error('API connection failed: ' . $response->get_error_message());
//     }


//     $response_code = wp_remote_retrieve_response_code($response);
//     if ($response_code != 200) {
//         wp_send_json_error("API Error Code: " . $response_code);
//     }


//     $body = wp_remote_retrieve_body($response);
//     $data = json_decode($body);

//     if (json_last_error() !== JSON_ERROR_NONE) {
//         wp_send_json_error('Invalid JSON received');
//     }

//     wp_send_json_success($data);
//     wp_die();
// }


// add_action('wp_ajax_fetch_hotels', 'fetch_hotelbeds_data_handler');
// add_action('wp_ajax_nopriv_fetch_hotels', 'fetch_hotelbeds_data_handler');









// functions.php এর একদম নিচে এটি পেস্ট করুন

add_action('wp_ajax_get_osm_address', 'wporg_get_address_proxy');
add_action('wp_ajax_nopriv_get_osm_address', 'wporg_get_address_proxy');

function wporg_get_address_proxy() {
    // 1. Get Coordinates
    $lat = isset($_GET['lat']) ? sanitize_text_field($_GET['lat']) : '';
    $lon = isset($_GET['lon']) ? sanitize_text_field($_GET['lon']) : '';

    if (!$lat || !$lon) {
        wp_send_json_error('Invalid coordinates');
    }

    // 2. Call Nominatim API from PHP (Server to Server)
    // PHP তে User-Agent সেট করা খুব সহজ এবং এখানে কোনো CORS এরর আসে না।
    $api_url = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat={$lat}&lon={$lon}&accept-language=en";

    $response = wp_remote_get($api_url, array(
        'headers' => array(
            'User-Agent' => get_bloginfo('name') . ' MapPicker/1.0 (admin@' . $_SERVER['HTTP_HOST'] . ')' 
        )
    ));

    // 3. Return Data back to JavaScript
    if (is_wp_error($response)) {
        wp_send_json_error('API Failed');
    }

    $body = wp_remote_retrieve_body($response);
    echo $body; // Send raw JSON back
    wp_die();
}