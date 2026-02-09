<?php
/**
 * Performance - Optimize queries, disable unnecessary features
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_Performance {

    public static function init() {
        add_action('wp_enqueue_scripts', [__CLASS__, 'dequeue_embeds'], 100);
        add_action('init', [__CLASS__, 'disable_emojis']);
        add_filter('pre_get_posts', [__CLASS__, 'optimize_main_query'], 10, 1);
    }

    /**
     * Dequeue wp-embed to reduce requests
     */
    public static function dequeue_embeds() {
        if (!is_admin()) {
            wp_deregister_script('wp-embed');
        }
    }

    /**
     * Disable emoji scripts/styles
     */
    public static function disable_emojis() {
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    }

    /**
     * Optimize main query: only select needed fields (optional), prevent redundant queries
     */
    public static function optimize_main_query($query) {
        if (!is_admin() && $query->is_main_query() && $query->is_home()) {
            $query->set('no_found_rows', true);
            $query->set('update_post_meta_cache', false);
            $query->set('update_post_term_cache', false);
        }
        return $query;
    }
}
