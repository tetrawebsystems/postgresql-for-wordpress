<?php
/*
Plugin Name: PostgreSQL for WordPress (PG4WP)
Plugin URI: http://www.hawkix.net
Description: PG4WP is a special 'plugin' enabling WordPress to use a PostgreSQL database.
Version: 1.3.1+
Author: Hawk__
Author URI: http://www.hawkix.net
License: GPLv2 or newer.
*/

// Ensure we only load this config once
if(!defined('PG4WP_ROOT')) {

    // You can choose the driver to load here
    if (!defined('DB_DRIVER')) {
        define('DB_DRIVER', pgsql);
    }

    // Set this to 'true' and check that `pg4wp` is writable if you want debug logs to be written
    if (!defined('PG4WP_DEBUG')) {
        define('PG4WP_DEBUG', false);
    }

    if (!defined('PG4WP_LOG_ERRORS')) {
        // If you just want to log queries that generate errors, leave PG4WP_DEBUG to "false"
        // and set this to true
        define('PG4WP_LOG_ERRORS', true);
    }

    if (!defined('PG4WP_INSECURE')) {
        // If you want to allow insecure configuration (from the author point of view) to work with PG4WP,
        // change this to true
        define('PG4WP_INSECURE', false);
    }

    // This defines the directory where PG4WP files are loaded from
    //   3 places checked : wp-content, wp-content/plugins and the base directory
    if(file_exists(ABSPATH . '/wp-content/pg4wp')) {
        define('PG4WP_ROOT', ABSPATH . '/wp-content/pg4wp');
    } elseif(file_exists(ABSPATH . '/wp-content/plugins/pg4wp')) {
        define('PG4WP_ROOT', ABSPATH . '/wp-content/plugins/pg4wp');
    } elseif(file_exists(ABSPATH . '/pg4wp')) {
        define('PG4WP_ROOT', ABSPATH . '/pg4wp');
    } else {
        die('PG4WP file directory not found');
    }

    // Here happens all the magic
    require_once(PG4WP_ROOT . '/core.php');
} // Protection against multiple loading
