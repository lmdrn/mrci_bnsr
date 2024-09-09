<?php

/***
 *
 *
 * INCLUDES
 *
 *
 */

require_once 'includes/bs4Navwalker.php';

/***
 *
 *
 * SUPPORTS SETUP
 *
 *
 */

// add basic theme supports
add_theme_support('post-thumbnails');
add_theme_support('title-tag');
load_theme_textdomain('mrci_bnsr', get_template_directory() . '/languages');
add_theme_support('automatic-feed-links');

// This theme uses wp_nav_menu() in two locations.
register_nav_menus(
    array(
        'top' => 'Top menu',
        'footer' => 'Footer menu'
    )
);

// Add support for core custom logo.
add_theme_support(
    'custom-logo',
    array(
        'height' => 75,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
    )
);

// Remove customizer options.
function mrci_bnsr_remove_customizer_options($wp_customize)
{
    // $wp_customize->remove_section( 'static_front_page' );
    // $wp_customize->remove_section( 'title_tagline' );
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    // $wp_customize->remove_section( 'nav' );
    // $wp_customize->remove_section( 'themes' );
    // $wp_customize->remove_section( 'featured_content' );
    // $wp_customize->remove_panel( 'widgets' );
}

add_action('customize_register', 'mrci_bnsr_remove_customizer_options', 30);

// Proper way to enqueue scripts and styles.
function mrci_bnsr_scripts()
{
    // Add version number to css
    $theme_v = wp_get_theme()->get('Version');

    // bootstrap [CDN]
    wp_enqueue_style('bootstrap-4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), null);
    wp_enqueue_script('bootstrap-4-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);

    // bodymovin
    wp_enqueue_script('bodymovin animations', 'https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js', array(), null, true);

    // google fonts [CDN]
    wp_enqueue_style('fonts-google', 'https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap', array(), null);

    // font awesome 4.7.0 [CDN]
    wp_enqueue_style('font-awesome-4.7', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);

    // jquery use version 3
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), null, true);

   // slick [CDN]
   wp_enqueue_style('slick-1.9.0-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css');
   wp_enqueue_style('slick-1.9.0-theme-min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css');
   wp_enqueue_script('slick-1.9.0-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array('jquery'), null, true);

    //GSAP + SCROLL MAGIC
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js', array('jquery'), null, true);
    wp_enqueue_script('tweenmax-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', array('jquery'), null, true);
    wp_enqueue_script('gsapjquery-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array('jquery'), null, true);
    wp_enqueue_script('scrollmagic-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/jquery.ScrollMagic.min.js', array('jquery'), null, true);
    wp_enqueue_script('animationgsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array('jquery'), null, true);
    wp_enqueue_script('velocty-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.8/plugins/animation.velocity.min.js', array('jquery'), null, true);
    wp_enqueue_script('indicators-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array('jquery'), null, true);

    // custom JS
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), $theme_v, true);

    // main style file
    wp_enqueue_style('base-style', get_stylesheet_uri(), array(), $theme_v, 'all');
}

add_action('wp_enqueue_scripts', 'mrci_bnsr_scripts');

// Remove WP emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

// Accept SVGs
function add_svg_to_upload_mimes($upload_mimes)
{
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}

add_filter('upload_mimes', 'add_svg_to_upload_mimes', 10, 1);

// Simple options page
acf_add_options_page();


/** Enqueue Adobe Fonts **/

function mrci_bnsr_webfont_url($webfont_url) {
	return 'https://use.typekit.net/fxg7kke.css';
}
add_filter('mrci_bnsr_custom_webfont', 'mrci_bnsr_webfont_url');

function mrci_bnsr_add_late_assets() {
	wp_enqueue_style('my-theme-font', apply_filters( 'mrci_bnsr_custom_webfont', ''), array(), null);
}

add_action( 'wp_footer', 'mrci_bnsr_add_late_assets');


function mrci_bnsr_add_editor_styles() {
	add_editor_style( array( apply_filters( 'mrci_bnsr_custom_webfont', '') ));

}

// add wepml classes
add_filter( 'wpml_ls_model_language_css_classes', 'my_custom_ls_item_css_classes' );
function my_custom_ls_item_css_classes( $classes ) {
    $classes[] = 'my-custom-item-class';
    return $classes;
}
