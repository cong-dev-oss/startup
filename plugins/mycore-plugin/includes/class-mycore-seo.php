<?php
/**
 * Basic SEO - Meta title & description
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_SEO {

    public static function init() {
        add_action('wp_head', [__CLASS__, 'output_meta_tags'], 1);
    }

    public static function output_meta_tags() {
        if (is_singular()) {
            $post_id = get_queried_object_id();
            $title   = get_post_meta($post_id, '_mycore_meta_title', true);
            $desc    = get_post_meta($post_id, '_mycore_meta_description', true);

            if ($title) {
                echo '<meta name="mycore-meta-title" content="' . esc_attr($title) . '">' . "\n";
            }
            if ($desc) {
                echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
            }
        }
    }

    /**
     * Get meta title for use in theme (e.g. document title)
     */
    public static function get_meta_title($post_id = null) {
        if (!$post_id) {
            $post_id = get_queried_object_id();
        }
        return $post_id ? get_post_meta($post_id, '_mycore_meta_title', true) : '';
    }

    /**
     * Get meta description
     */
    public static function get_meta_description($post_id = null) {
        if (!$post_id) {
            $post_id = get_queried_object_id();
        }
        return $post_id ? get_post_meta($post_id, '_mycore_meta_description', true) : '';
    }
}
