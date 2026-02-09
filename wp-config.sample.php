<?php
/**
 * Sample wp-config.php - Copy to wp-config.php and adjust for your environment.
 * CorePress - WordPress core starter
 */

// ** Database settings ** //
define('DB_NAME', 'your_database_name');
define('DB_USER', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

$table_prefix = 'wp_';

// ** Debug (disable on production) ** //
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);

// For local development only:
// define('WP_DEBUG', true);
// define('WP_DEBUG_LOG', true);
// define('WP_DEBUG_DISPLAY', false);

// ** Security: use unique keys ** //
// Generate at: https://api.wordpress.org/secret-key/1.1/salt/
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

// ** Performance: cache ** //
// Uncomment if using a persistent object cache (Redis/Memcached):
// define('WP_CACHE', true);

// ** Limit revisions (optional) ** //
define('WP_POST_REVISIONS', 5);

// ** Auto-updates (optional) ** //
// define('AUTOMATIC_UPDATER_DISABLED', true);

// ** Absolute path to WordPress ** //
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
