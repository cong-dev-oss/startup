<?php
/**
 * REST API extensions - Expose CPT and meta for integrations
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_REST_API {

    public static function init() {
        add_action('rest_api_init', [__CLASS__, 'register_routes']);
        add_filter('rest_prepare_product', [__CLASS__, 'prepare_product'], 10, 3);
        add_filter('rest_prepare_event', [__CLASS__, 'prepare_event'], 10, 3);
    }

    public static function register_routes() {
        register_rest_route('mycore/v1', '/health', [
            'methods'             => 'GET',
            'callback'            => [__CLASS__, 'health_check'],
            'permission_callback' => '__return_true',
        ]);
    }

    public static function health_check() {
        return rest_ensure_response([
            'status'  => 'ok',
            'plugin'  => 'mycore-plugin',
            'version' => MYCORE_PLUGIN_VERSION,
        ]);
    }

    public static function prepare_product($response, $post, $request) {
        $data = $response->get_data();
        $data['mycore_price'] = get_post_meta($post->ID, '_mycore_product_price', true);
        $data['mycore_sku']  = get_post_meta($post->ID, '_mycore_product_sku', true);
        $data['mycore_stock'] = (int) get_post_meta($post->ID, '_mycore_product_stock', true);
        $response->set_data($data);
        return $response;
    }

    public static function prepare_event($response, $post, $request) {
        $data = $response->get_data();
        $data['mycore_event_date']     = get_post_meta($post->ID, '_mycore_event_date', true);
        $data['mycore_event_time']     = get_post_meta($post->ID, '_mycore_event_time', true);
        $data['mycore_event_location'] = get_post_meta($post->ID, '_mycore_event_location', true);
        $response->set_data($data);
        return $response;
    }
}
