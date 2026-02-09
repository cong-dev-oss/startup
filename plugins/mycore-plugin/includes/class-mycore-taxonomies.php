<?php
/**
 * Custom Taxonomies
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_Taxonomies {

    public static function init() {
        add_action('init', [__CLASS__, 'register_taxonomies'], 0);
    }

    public static function register_taxonomies() {
        // Product Category
        register_taxonomy('product_cat', 'product', [
            'labels'            => [
                'name'              => _x('Product Categories', 'taxonomy general name', 'mycore-plugin'),
                'singular_name'     => _x('Product Category', 'taxonomy singular name', 'mycore-plugin'),
                'search_items'      => __('Search Categories', 'mycore-plugin'),
                'all_items'         => __('All Categories', 'mycore-plugin'),
                'parent_item'       => __('Parent Category', 'mycore-plugin'),
                'parent_item_colon' => __('Parent Category:', 'mycore-plugin'),
                'edit_item'         => __('Edit Category', 'mycore-plugin'),
                'update_item'       => __('Update Category', 'mycore-plugin'),
                'add_new_item'      => __('Add New Category', 'mycore-plugin'),
                'new_item_name'     => __('New Category Name', 'mycore-plugin'),
                'menu_name'         => __('Categories', 'mycore-plugin'),
            ],
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => 'product-category'],
        ]);

        // Product Tag
        register_taxonomy('product_tag', 'product', [
            'labels'            => [
                'name'          => _x('Product Tags', 'taxonomy general name', 'mycore-plugin'),
                'singular_name' => _x('Product Tag', 'taxonomy singular name', 'mycore-plugin'),
                'search_items'  => __('Search Tags', 'mycore-plugin'),
                'all_items'     => __('All Tags', 'mycore-plugin'),
                'edit_item'     => __('Edit Tag', 'mycore-plugin'),
                'update_item'   => __('Update Tag', 'mycore-plugin'),
                'add_new_item'  => __('Add New Tag', 'mycore-plugin'),
                'new_item_name' => __('New Tag Name', 'mycore-plugin'),
                'menu_name'     => __('Tags', 'mycore-plugin'),
            ],
            'hierarchical'      => false,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => 'product-tag'],
        ]);

        // Portfolio Category
        register_taxonomy('portfolio_cat', 'portfolio', [
            'labels'            => [
                'name'              => _x('Portfolio Categories', 'taxonomy general name', 'mycore-plugin'),
                'singular_name'     => _x('Portfolio Category', 'taxonomy singular name', 'mycore-plugin'),
                'search_items'      => __('Search Categories', 'mycore-plugin'),
                'all_items'         => __('All Categories', 'mycore-plugin'),
                'parent_item'       => __('Parent Category', 'mycore-plugin'),
                'edit_item'         => __('Edit Category', 'mycore-plugin'),
                'update_item'       => __('Update Category', 'mycore-plugin'),
                'add_new_item'      => __('Add New Category', 'mycore-plugin'),
                'new_item_name'     => __('New Category Name', 'mycore-plugin'),
                'menu_name'         => __('Categories', 'mycore-plugin'),
            ],
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => 'portfolio-category'],
        ]);

        // Event Category
        register_taxonomy('event_cat', 'event', [
            'labels'            => [
                'name'              => _x('Event Categories', 'taxonomy general name', 'mycore-plugin'),
                'singular_name'     => _x('Event Category', 'taxonomy singular name', 'mycore-plugin'),
                'search_items'      => __('Search Categories', 'mycore-plugin'),
                'all_items'         => __('All Categories', 'mycore-plugin'),
                'parent_item'       => __('Parent Category', 'mycore-plugin'),
                'edit_item'         => __('Edit Category', 'mycore-plugin'),
                'update_item'       => __('Update Category', 'mycore-plugin'),
                'add_new_item'      => __('Add New Category', 'mycore-plugin'),
                'new_item_name'     => __('New Category Name', 'mycore-plugin'),
                'menu_name'         => __('Categories', 'mycore-plugin'),
            ],
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => ['slug' => 'event-category'],
        ]);
    }
}
