<?php

/**
 * strip seo content
 */

function strip_seo_content($stripcontent, $length, $type)
{

    // Strip Shortcodes
    $stripcontent = preg_replace("~(?:\[/?)[^/\]]+/?\]~s", '', $stripcontent);
    $stripcontent = apply_filters('the_content', $stripcontent);

    // Strip HTML-Tags
    $stripcontent = strip_tags($stripcontent);

    $stripcontentMore = '';

    // if type == description: delete everything after first dot (.)
    if ($type === 'description') {
        $str = explode('.', $stripcontent);
        $stripcontent = $str[0];
    }

    // if content is longer than lenght shorten it
    if (strlen($stripcontent) > $length) {
        $stripcontent = substr($stripcontent, 0, $length);
        $stripcontentMore = ' ...';
        $stripcontent = $stripcontent . $stripcontentMore;
    }

    return $stripcontent;
}

// todo custom functions for cpt titles
// add_filter('the_seo_framework_generated_description', function ($description, $args) {
