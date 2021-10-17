<?php

add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'frontpageMenu' => __('frontpageMenu'),
        'footerMenu' => __('footerMenu'),
    ));
}, 0);
