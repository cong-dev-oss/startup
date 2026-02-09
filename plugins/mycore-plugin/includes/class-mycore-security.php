<?php
/**
 * Security - Limit XML-RPC, hide version, etc.
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_Security {

    public static function init() {
        add_filter('xmlrpc_enabled', '__return_false');
        remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');
        add_filter('rest_authentication_errors', [__CLASS__, 'rest_allow_public_read'], 99);
        add_action('wp_head', [__CLASS__, 'remove_wp_version'], 1);
        add_filter('the_generator', [__CLASS__, 'remove_version_from_generator']);
    }

    /**
     * Allow unauthenticated GET requests to REST (for public content). Tighten if needed.
     */
    public static function rest_allow_public_read($result) {
        if (is_wp_error($result) && $result->get_error_code() === 'rest_not_logged_in') {
            if (wp_is_serving_rest_request() && $_SERVER['REQUEST_METHOD'] === 'GET') {
                return true;
            }
        }
        return $result;
    }

    public static function remove_wp_version() {
        remove_action('wp_head', 'wp_generator');
    }

    public static function remove_version_from_generator() {
        return '';
    }
}
