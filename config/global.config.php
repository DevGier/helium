<?php

###################
## Global config ##
###################

/**
 * App info
 */
define('APP_NAME', 'Helium CMS');
define('APP_DESCRIPTION', 'Test');
define('APP_AUTHOR', 'Tim de Gier');
define('APP_VERSION', '0.0.1');

/**
 * Theming
 */
define('THEME_NAME', 'themename');

/**
 * Paths
 */
define('SITE_URL', '');

/**
 * Database
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', '');

/**
 * Security
 */
define('SALT', '00x7644saaa');
define('HASH', 'sha512');

/**
 * 404 configuration
 * true for custom 404 / false for pre-built 404
 */
define('CUSTOM_404_ENABLED', false);
define('CUSTOM_404_PATH', 'templates/404-error.php');

/**
 * Maintenance mode
 */
define('MAINTENANCE', false);

/**
 * CMS
 */
define('CMS', true);

?>
