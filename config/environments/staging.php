<?php

/**
 * Configuration overrides for WP_ENV === 'staging'
 */

use Roots\WPConfig\Config;

/**
 * You should try to keep staging as close to production as possible. However,
 * should you need to, you can always override production configuration values
 * with `Config::define`.
 *
 * Example: `Config::define('WP_DEBUG', true);`
 * Example: `Config::define('DISALLOW_FILE_MODS', false);`
 */

define('DEV_DISABLED_PLUGINS', serialize([
    'backwpup/backwpup.php',
    'autoptimize/autoptimize.php',
    'comet-cache/comet-cache.php',
    // 'borlabs-cookie/borlabs-cookie.php'
]));

define('WP_CACHE', false);
