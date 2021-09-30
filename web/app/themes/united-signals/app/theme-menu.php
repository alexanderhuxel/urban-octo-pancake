<?php

add_action('after_setup_theme', function () {
    register_nav_menus(array(
        'frontpageMenu' => __('frontpageMenu'),
        'menuFooter'  => __('menuFooter'),
        'menuMobile'  => __('menuMobile')
    ));
}, 0);
