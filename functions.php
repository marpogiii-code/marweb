<?php
/**
 * Marpogi Rapper Theme - Functions
 *
 * @package Marpogi_Rapper
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Theme Setup
 */
function marpogi_theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'custom-background', array(
        'default-color' => '0a0a0a',
    ) );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'marpogi-rapper' ),
    ) );
}
add_action( 'after_setup_theme', 'marpogi_theme_setup' );

/**
 * Enqueue Styles & Scripts
 */
function marpogi_enqueue_assets() {
    // Google Fonts
    wp_enqueue_style(
        'marpogi-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Oswald:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'marpogi-style',
        get_stylesheet_uri(),
        array( 'marpogi-google-fonts' ),
        wp_get_theme()->get( 'Version' )
    );

    // Theme JS
    wp_enqueue_script(
        'marpogi-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'marpogi_enqueue_assets' );

/**
 * Customizer Settings
 */
function marpogi_customizer( $wp_customize ) {
    // Hero Section
    $wp_customize->add_section( 'marpogi_hero', array(
        'title'    => __( 'Hero Section', 'marpogi-rapper' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'hero_subtitle', array(
        'default'           => 'Artist / Rapper / Producer',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_subtitle', array(
        'label'   => __( 'Hero Subtitle', 'marpogi-rapper' ),
        'section' => 'marpogi_hero',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'hero_tagline', array(
        'default'           => 'Bringing raw energy and authentic bars. Music that hits different.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'hero_tagline', array(
        'label'   => __( 'Hero Tagline', 'marpogi-rapper' ),
        'section' => 'marpogi_hero',
        'type'    => 'textarea',
    ) );

    // About Section
    $wp_customize->add_section( 'marpogi_about', array(
        'title'    => __( 'About Section', 'marpogi-rapper' ),
        'priority' => 35,
    ) );

    $wp_customize->add_setting( 'about_text', array(
        'default'           => 'Marpogi is an artist who blends raw lyricism with modern beats, creating music that resonates with the soul. Every track is a journey, every bar tells a story.',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'about_text', array(
        'label'   => __( 'About Text', 'marpogi-rapper' ),
        'section' => 'marpogi_about',
        'type'    => 'textarea',
    ) );

    // Social Links
    $wp_customize->add_section( 'marpogi_social', array(
        'title'    => __( 'Social Links', 'marpogi-rapper' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'soundcloud_url', array(
        'default'           => 'https://soundcloud.com/marpogi23',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'soundcloud_url', array(
        'label'   => __( 'SoundCloud URL', 'marpogi-rapper' ),
        'section' => 'marpogi_social',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'instagram_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'instagram_url', array(
        'label'   => __( 'Instagram URL', 'marpogi-rapper' ),
        'section' => 'marpogi_social',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'youtube_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'youtube_url', array(
        'label'   => __( 'YouTube URL', 'marpogi-rapper' ),
        'section' => 'marpogi_social',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'spotify_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'spotify_url', array(
        'label'   => __( 'Spotify URL', 'marpogi-rapper' ),
        'section' => 'marpogi_social',
        'type'    => 'url',
    ) );

    $wp_customize->add_setting( 'contact_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'contact_email', array(
        'label'   => __( 'Contact Email', 'marpogi-rapper' ),
        'section' => 'marpogi_social',
        'type'    => 'email',
    ) );
}
add_action( 'customize_register', 'marpogi_customizer' );

/**
 * Allow iframes in post content (for SoundCloud embeds)
 */
function marpogi_allow_iframes( $tags, $context ) {
    if ( 'post' === $context ) {
        $tags['iframe'] = array(
            'src'             => true,
            'height'          => true,
            'width'           => true,
            'frameborder'     => true,
            'allow'           => true,
            'scrolling'       => true,
            'allowfullscreen' => true,
            'style'           => true,
        );
    }
    return $tags;
}
add_filter( 'wp_kses_allowed_html', 'marpogi_allow_iframes', 10, 2 );
