<?php
/**
 * Startup Theme - Functions and definitions
 *
 * @package Startup_Theme
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

define('STARTUP_THEME_VERSION', '1.0.0');
define('STARTUP_THEME_DIR', get_template_directory());
define('STARTUP_THEME_URI', get_template_directory_uri());

/**
 * Theme setup
 */
function startup_theme_setup() {
    load_theme_textdomain('startup-theme', STARTUP_THEME_DIR . '/languages');

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
        'primary'   => __('Primary Menu', 'startup-theme'),
        'footer'    => __('Footer Menu', 'startup-theme'),
    ]);
}
add_action('after_setup_theme', 'startup_theme_setup');

/**
 * Register widget areas
 */
function startup_theme_widgets_init() {
    register_sidebar([
        'name'          => __('Footer About', 'startup-theme'),
        'id'            => 'footer-about',
        'description'   => __('Add widgets here for footer about section.', 'startup-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
    register_sidebar([
        'name'          => __('Footer 1', 'startup-theme'),
        'id'            => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
    register_sidebar([
        'name'          => __('Footer 2', 'startup-theme'),
        'id'            => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
    register_sidebar([
        'name'          => __('Footer 3', 'startup-theme'),
        'id'            => 'footer-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'startup_theme_widgets_init');

/**
 * Enqueue scripts and styles
 */
function startup_theme_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'startup-google-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap',
        [],
        null
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css',
        [],
        '5.10.0'
    );

    // Bootstrap Icons
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css',
        [],
        '1.4.1'
    );

    // Owl Carousel CSS
    wp_enqueue_style(
        'owl-carousel',
        STARTUP_THEME_URI . '/assets/lib/owlcarousel/assets/owl.carousel.min.css',
        [],
        STARTUP_THEME_VERSION
    );

    // Animate CSS
    wp_enqueue_style(
        'animate',
        STARTUP_THEME_URI . '/assets/lib/animate/animate.min.css',
        [],
        STARTUP_THEME_VERSION
    );

    // Theme Stylesheet
    wp_enqueue_style(
        'startup-theme-style',
        get_stylesheet_uri(),
        [],
        STARTUP_THEME_VERSION
    );

    // jQuery (WordPress includes it, but we ensure it's loaded)
    wp_enqueue_script('jquery');

    // Bootstrap Bundle JS
    wp_enqueue_script(
        'bootstrap-bundle',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        '5.0.0',
        true
    );

    // WOW.js
    wp_enqueue_script(
        'wow',
        STARTUP_THEME_URI . '/assets/lib/wow/wow.min.js',
        [],
        STARTUP_THEME_VERSION,
        true
    );

    // Easing
    wp_enqueue_script(
        'easing',
        STARTUP_THEME_URI . '/assets/lib/easing/easing.min.js',
        ['jquery'],
        STARTUP_THEME_VERSION,
        true
    );

    // Waypoints
    wp_enqueue_script(
        'waypoints',
        STARTUP_THEME_URI . '/assets/lib/waypoints/waypoints.min.js',
        ['jquery'],
        STARTUP_THEME_VERSION,
        true
    );

    // Counter Up
    wp_enqueue_script(
        'counterup',
        STARTUP_THEME_URI . '/assets/lib/counterup/counterup.min.js',
        ['jquery', 'waypoints'],
        STARTUP_THEME_VERSION,
        true
    );

    // Owl Carousel JS
    wp_enqueue_script(
        'owl-carousel',
        STARTUP_THEME_URI . '/assets/lib/owlcarousel/owl.carousel.min.js',
        ['jquery'],
        STARTUP_THEME_VERSION,
        true
    );

    // Main JS
    wp_enqueue_script(
        'startup-theme-script',
        STARTUP_THEME_URI . '/assets/js/main.js',
        ['jquery', 'bootstrap-bundle', 'wow', 'easing', 'counterup', 'owl-carousel'],
        STARTUP_THEME_VERSION,
        true
    );
}
add_action('wp_enqueue_scripts', 'startup_theme_scripts');

/**
 * Fallback menu function
 */
function startup_theme_fallback_menu() {
    echo '<div class="navbar-nav ms-auto py-0">';
    echo '<a href="' . esc_url(home_url('/')) . '" class="nav-item nav-link">' . esc_html__('Home', 'startup-theme') . '</a>';
    wp_list_pages([
        'title_li' => '',
        'walker' => new Startup_Theme_Walker_Nav_Menu(),
    ]);
    echo '</div>';
}

/**
 * Custom Walker for Nav Menu
 */
class Startup_Theme_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"dropdown-menu m-0\">\n";
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div>\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $has_children = in_array('menu-item-has-children', $classes);

        if ($depth == 0) {
            $output .= $indent . '<div class="nav-item' . ($has_children ? ' dropdown' : '') . '">';
        }

        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

        $item_output = isset($args->before) ? $args->before : '';
        
        if ($depth == 0) {
            if ($has_children) {
                $item_output .= '<a' . $attributes . ' class="nav-link dropdown-toggle" data-bs-toggle="dropdown">';
            } else {
                $item_output .= '<a' . $attributes . ' class="nav-item nav-link' . (in_array('current-menu-item', $classes) ? ' active' : '') . '">';
            }
        } else {
            $item_output .= '<a' . $attributes . ' class="dropdown-item">';
        }

        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        if ($depth == 0) {
            $output .= "</div>\n";
        }
    }
}

/**
 * Footer Menu Walker
 */
class Startup_Theme_Footer_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $attributes = !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $output .= '<a class="text-light mb-2"' . $attributes . '><i class="bi bi-arrow-right text-primary me-2"></i>' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
    }
}
