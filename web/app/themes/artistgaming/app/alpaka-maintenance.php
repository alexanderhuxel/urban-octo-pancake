<?php

function wp_maintenance_mode()
{
    global $current_user;
    wp_get_current_user();

    if ((strpos($current_user->user_login, 'alpaka') !== false) || (strpos($current_user->user_login, 'admin') !== false)) {
        return;
    }

    if (env('WP_ENV') !== 'production') :
        return;
    endif;

    wp_die('<h1>Website im Wartungsmodus</h1><br /> Bitte habe etwas Geduld, wir sind so schnell wie möglich wieder online.');
}
// add_action('get_header', 'wp_maintenance_mode');

/**
 * Admin Maintenance Mode
 */
/*
add_action('admin_head', function () {
    global $current_user;
    wp_get_current_user();

    // check if username contains "alpaka"
    if (strpos($current_user->user_login, 'alpaka') === false) {
        echo '<style> .updated{margin:30px !important;} </style>';
        wp_die('<div id="message" class="updated"><p><b>Wartungsmodus</b> Wir führen gerade ein Systemupdate durch. Der Administrationsbereich wird in einigen Stunden wieder erreichbar sein.</p></div>');
    }
});
*/

/**
 * Empty / Wipe / Clear Comet Cache
 */

if (class_exists('comet_cache') && isset($_GET['clearcache']) && $_GET['clearcache'] === 'qwd12e12r23f23f') {
    comet_cache::clear();
    comet_cache::wipe();
    comet_cache::purge();
}
