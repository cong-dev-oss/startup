<?php
/**
 * Custom Post Types
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_Post_Types {

    public static function init() {
        add_action('init', [__CLASS__, 'register_post_types'], 0);
    }

    public static function register_post_types() {
        // Product
        register_post_type('product', [
            'labels'             => [
                'name'               => _x('Products', 'post type general name', 'mycore-plugin'),
                'singular_name'      => _x('Product', 'post type singular name', 'mycore-plugin'),
                'menu_name'          => _x('Products', 'admin menu', 'mycore-plugin'),
                'add_new'            => _x('Add New', 'product', 'mycore-plugin'),
                'add_new_item'       => __('Add New Product', 'mycore-plugin'),
                'edit_item'          => __('Edit Product', 'mycore-plugin'),
                'new_item'           => __('New Product', 'mycore-plugin'),
                'view_item'          => __('View Product', 'mycore-plugin'),
                'search_items'       => __('Search Products', 'mycore-plugin'),
                'not_found'          => __('No products found.', 'mycore-plugin'),
                'not_found_in_trash' => __('No products found in Trash.', 'mycore-plugin'),
            ],
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'product'],
            'capability_type'     => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-cart',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        ]);

        // Portfolio
        register_post_type('portfolio', [
            'labels'             => [
                'name'               => _x('Portfolio', 'post type general name', 'mycore-plugin'),
                'singular_name'      => _x('Portfolio Item', 'post type singular name', 'mycore-plugin'),
                'menu_name'          => _x('Portfolio', 'admin menu', 'mycore-plugin'),
                'add_new'            => _x('Add New', 'portfolio', 'mycore-plugin'),
                'add_new_item'       => __('Add New Portfolio Item', 'mycore-plugin'),
                'edit_item'          => __('Edit Portfolio Item', 'mycore-plugin'),
                'new_item'           => __('New Portfolio Item', 'mycore-plugin'),
                'view_item'          => __('View Portfolio Item', 'mycore-plugin'),
                'search_items'       => __('Search Portfolio', 'mycore-plugin'),
                'not_found'          => __('No portfolio items found.', 'mycore-plugin'),
                'not_found_in_trash' => __('No portfolio items found in Trash.', 'mycore-plugin'),
            ],
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'portfolio'],
            'capability_type'     => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 6,
            'menu_icon'          => 'dashicons-portfolio',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        ]);

        // Event
        register_post_type('event', [
            'labels'             => [
                'name'               => _x('Events', 'post type general name', 'mycore-plugin'),
                'singular_name'      => _x('Event', 'post type singular name', 'mycore-plugin'),
                'menu_name'          => _x('Events', 'admin menu', 'mycore-plugin'),
                'add_new'            => _x('Add New', 'event', 'mycore-plugin'),
                'add_new_item'       => __('Add New Event', 'mycore-plugin'),
                'edit_item'          => __('Edit Event', 'mycore-plugin'),
                'new_item'           => __('New Event', 'mycore-plugin'),
                'view_item'          => __('View Event', 'mycore-plugin'),
                'search_items'       => __('Search Events', 'mycore-plugin'),
                'not_found'          => __('No events found.', 'mycore-plugin'),
                'not_found_in_trash' => __('No events found in Trash.', 'mycore-plugin'),
            ],
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_rest'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => 'event'],
            'capability_type'     => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 7,
            'menu_icon'          => 'dashicons-calendar-alt',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
        ]);
    }
}
