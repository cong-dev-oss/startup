<?php
/**
 * Plugin Name: MyCore Plugin
 * Plugin URI: https://github.com/your-org/CorePress
 * Description: Core plugin cho CorePress - CPT, Taxonomies, SEO, Security, REST API, User Roles.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yoursite.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: mycore-plugin
 * Requires at least: 6.0
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit;
}

define('MYCORE_PLUGIN_VERSION', '1.0.0');
define('MYCORE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MYCORE_PLUGIN_URI', plugin_dir_url(__FILE__));

/**
 * Load modules
 */
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-post-types.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-taxonomies.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-custom-fields.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-seo.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-security.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-performance.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-rest-api.php';
require_once MYCORE_PLUGIN_DIR . 'includes/class-mycore-user-roles.php';

/**
 * Initialize plugin
 */
function mycore_plugin_init() {
    MyCore_Post_Types::init();
    MyCore_Taxonomies::init();
    MyCore_Custom_Fields::init();
    MyCore_SEO::init();
    MyCore_Security::init();
    MyCore_Performance::init();
    MyCore_REST_API::init();
    MyCore_User_Roles::init();
}
add_action('plugins_loaded', 'mycore_plugin_init');

/**
 * Activation: flush rewrite rules, create roles
 */
function mycore_plugin_activate() {
    mycore_plugin_init();
    MyCore_Post_Types::register_post_types();
    MyCore_Taxonomies::register_taxonomies();
    MyCore_User_Roles::add_roles_on_activation();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'mycore_plugin_activate');

/**
 * Deactivation: flush rewrite rules
 */
function mycore_plugin_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'mycore_plugin_deactivate');
