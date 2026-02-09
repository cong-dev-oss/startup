<?php
/**
 * Custom Fields (native meta boxes, no ACF dependency)
 *
 * @package MyCore_Plugin
 */

if (!defined('ABSPATH')) {
    exit;
}

class MyCore_Custom_Fields {

    public static function init() {
        add_action('add_meta_boxes', [__CLASS__, 'add_meta_boxes']);
        add_action('save_post', [__CLASS__, 'save_meta'], 10, 2);
    }

    public static function add_meta_boxes() {
        add_meta_box(
            'mycore_product_details',
            __('Product Details', 'mycore-plugin'),
            [__CLASS__, 'render_product_meta'],
            'product',
            'normal'
        );
        add_meta_box(
            'mycore_event_details',
            __('Event Details', 'mycore-plugin'),
            [__CLASS__, 'render_event_meta'],
            'event',
            'normal'
        );
        add_meta_box(
            'mycore_seo_meta',
            __('SEO (MyCore)', 'mycore-plugin'),
            [__CLASS__, 'render_seo_meta'],
            ['post', 'page', 'product', 'portfolio', 'event'],
            'normal'
        );
    }

    public static function render_product_meta($post) {
        wp_nonce_field('mycore_product_meta', 'mycore_product_meta_nonce');
        $price    = get_post_meta($post->ID, '_mycore_product_price', true);
        $sku      = get_post_meta($post->ID, '_mycore_product_sku', true);
        $stock    = get_post_meta($post->ID, '_mycore_product_stock', true);
        ?>
        <p>
            <label for="mycore_product_price"><?php esc_html_e('Price', 'mycore-plugin'); ?></label><br>
            <input type="text" id="mycore_product_price" name="mycore_product_price" value="<?php echo esc_attr($price); ?>" class="regular-text">
        </p>
        <p>
            <label for="mycore_product_sku"><?php esc_html_e('SKU', 'mycore-plugin'); ?></label><br>
            <input type="text" id="mycore_product_sku" name="mycore_product_sku" value="<?php echo esc_attr($sku); ?>" class="regular-text">
        </p>
        <p>
            <label for="mycore_product_stock"><?php esc_html_e('Stock', 'mycore-plugin'); ?></label><br>
            <input type="number" id="mycore_product_stock" name="mycore_product_stock" value="<?php echo esc_attr($stock); ?>" min="0" class="small-text">
        </p>
        <?php
    }

    public static function render_event_meta($post) {
        wp_nonce_field('mycore_event_meta', 'mycore_event_meta_nonce');
        $event_date = get_post_meta($post->ID, '_mycore_event_date', true);
        $event_time = get_post_meta($post->ID, '_mycore_event_time', true);
        $location   = get_post_meta($post->ID, '_mycore_event_location', true);
        ?>
        <p>
            <label for="mycore_event_date"><?php esc_html_e('Date', 'mycore-plugin'); ?></label><br>
            <input type="date" id="mycore_event_date" name="mycore_event_date" value="<?php echo esc_attr($event_date); ?>">
        </p>
        <p>
            <label for="mycore_event_time"><?php esc_html_e('Time', 'mycore-plugin'); ?></label><br>
            <input type="text" id="mycore_event_time" name="mycore_event_time" value="<?php echo esc_attr($event_time); ?>" placeholder="e.g. 19:00">
        </p>
        <p>
            <label for="mycore_event_location"><?php esc_html_e('Location', 'mycore-plugin'); ?></label><br>
            <input type="text" id="mycore_event_location" name="mycore_event_location" value="<?php echo esc_attr($location); ?>" class="large-text">
        </p>
        <?php
    }

    public static function render_seo_meta($post) {
        wp_nonce_field('mycore_seo_meta', 'mycore_seo_meta_nonce');
        $meta_title = get_post_meta($post->ID, '_mycore_meta_title', true);
        $meta_desc  = get_post_meta($post->ID, '_mycore_meta_description', true);
        ?>
        <p>
            <label for="mycore_meta_title"><?php esc_html_e('Meta Title', 'mycore-plugin'); ?></label><br>
            <input type="text" id="mycore_meta_title" name="mycore_meta_title" value="<?php echo esc_attr($meta_title); ?>" class="large-text" maxlength="70">
            <span class="description"><?php esc_html_e('Recommended: 50–60 characters.', 'mycore-plugin'); ?></span>
        </p>
        <p>
            <label for="mycore_meta_description"><?php esc_html_e('Meta Description', 'mycore-plugin'); ?></label><br>
            <textarea id="mycore_meta_description" name="mycore_meta_description" rows="3" class="large-text" maxlength="160"><?php echo esc_textarea($meta_desc); ?></textarea>
            <span class="description"><?php esc_html_e('Recommended: 150–160 characters.', 'mycore-plugin'); ?></span>
        </p>
        <?php
    }

    public static function save_meta($post_id, $post) {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Product
        if ($post->post_type === 'product') {
            if (!isset($_POST['mycore_product_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mycore_product_meta_nonce'])), 'mycore_product_meta')) {
                return;
            }
            if (isset($_POST['mycore_product_price'])) {
                update_post_meta($post_id, '_mycore_product_price', sanitize_text_field(wp_unslash($_POST['mycore_product_price'])));
            }
            if (isset($_POST['mycore_product_sku'])) {
                update_post_meta($post_id, '_mycore_product_sku', sanitize_text_field(wp_unslash($_POST['mycore_product_sku'])));
            }
            if (isset($_POST['mycore_product_stock'])) {
                update_post_meta($post_id, '_mycore_product_stock', absint($_POST['mycore_product_stock']));
            }
        }

        // Event
        if ($post->post_type === 'event') {
            if (!isset($_POST['mycore_event_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mycore_event_meta_nonce'])), 'mycore_event_meta')) {
                return;
            }
            if (isset($_POST['mycore_event_date'])) {
                update_post_meta($post_id, '_mycore_event_date', sanitize_text_field(wp_unslash($_POST['mycore_event_date'])));
            }
            if (isset($_POST['mycore_event_time'])) {
                update_post_meta($post_id, '_mycore_event_time', sanitize_text_field(wp_unslash($_POST['mycore_event_time'])));
            }
            if (isset($_POST['mycore_event_location'])) {
                update_post_meta($post_id, '_mycore_event_location', sanitize_text_field(wp_unslash($_POST['mycore_event_location'])));
            }
        }

        // SEO (all supported types)
        $types = ['post', 'page', 'product', 'portfolio', 'event'];
        if (in_array($post->post_type, $types, true)) {
            if (!isset($_POST['mycore_seo_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['mycore_seo_meta_nonce'])), 'mycore_seo_meta')) {
                return;
            }
            if (isset($_POST['mycore_meta_title'])) {
                update_post_meta($post_id, '_mycore_meta_title', sanitize_text_field(wp_unslash($_POST['mycore_meta_title'])));
            }
            if (isset($_POST['mycore_meta_description'])) {
                update_post_meta($post_id, '_mycore_meta_description', sanitize_textarea_field(wp_unslash($_POST['mycore_meta_description'])));
            }
        }
    }
}
