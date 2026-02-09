<?php
/**
 * MyCore Theme - Functions and definitions
 *
 * @package MyCore_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('MYCORE_THEME_VERSION', '1.0.0');
define('MYCORE_THEME_DIR', get_template_directory());
define('MYCORE_THEME_URI', get_template_directory_uri());

/**
 * Theme setup
 */
function mycore_theme_setup() {
    load_theme_textdomain('mycore-theme', MYCORE_THEME_DIR . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => ['site-title', 'site-description'],
    ]);
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');

    register_nav_menus([
        'primary'   => __('Primary Menu', 'mycore-theme'),
        'footer'    => __('Footer Menu', 'mycore-theme'),
    ]);
}
add_action('after_setup_theme', 'mycore_theme_setup');

/**
 * Register widget areas
 */
function mycore_theme_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'mycore-theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'mycore-theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __('Footer 1', 'mycore-theme'),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
    register_sidebar([
        'name'          => __('Footer 2', 'mycore-theme'),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'mycore_theme_widgets_init');

/**
 * Enqueue scripts and styles
 */
function mycore_theme_scripts() {
    wp_enqueue_style(
        'mycore-theme-style',
        get_stylesheet_uri(),
        [],
        MYCORE_THEME_VERSION
    );
    wp_style_add_data('mycore-theme-style', 'rtl', 'replace');

    wp_enqueue_script(
        'mycore-theme-script',
        MYCORE_THEME_URI . '/assets/js/main.js',
        [],
        MYCORE_THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'mycore_theme_scripts');

/**
 * Custom template tags (optional helpers)
 */
require_once MYCORE_THEME_DIR . '/inc/template-tags.php';

/**
 * Helper functions - Các function tiêu chuẩn WordPress để lấy ảnh, dữ liệu
 */
require_once MYCORE_THEME_DIR . '/inc/helper-functions.php';

/**
 * Customizer additions (optional)
 */
if (file_exists(MYCORE_THEME_DIR . '/inc/customizer.php')) {
    require_once MYCORE_THEME_DIR . '/inc/customizer.php';
}
