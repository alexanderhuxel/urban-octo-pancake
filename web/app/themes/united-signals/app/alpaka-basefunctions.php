<?php

namespace App;

/**
 * Add Alpha Blocks as Gutenberg Block Category
 */

add_filter('block_categories', function ($categories) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'alpha-alpaka',
                'title' => 'Alpaka Blocks',
            ),
        )
    );
}, 10, 2);


/**
 * Hide WordPress update nag to all but admins
 */

add_action('admin_head', function () {
    if (!current_user_can('update_core')) {
        remove_action('admin_notices', 'update_nag', 3);
    }
}, 1);


/**
 * Remove Archives for Dates and Authors
 */

add_action('template_redirect', function () {
    // If we are on category or tag or date or author archive
    // to add Categories add is_category()
    if (is_date() || is_author() || is_attachment()) {
        global $wp_query;
        $wp_query->set_404(); // set to 404 not found page
    }
});


/**
 * Remove all dashboard widgets
 */

add_action('wp_dashboard_setup', function () {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
});


/**
 * Insert custom login logo
 */

add_action('login_head', function () {
    if (get_field('logo_svg', 'options')) {
        $logopathID = get_field('logo_svg', 'options');
        $logopath = wp_get_attachment_url($logopathID);
    } else {
        $logopath = get_template_directory_uri() . '/../dist/images/logo/logo-full.svg';
    }

    echo '
        <style>
            .login h1 a {
                background-image: url(' . $logopath . ') !important;
                background-repeat: no-repeat;
                background-size: contain;
                width: 100%;
                height: 75px;
                display:block;
            }
        </style>
    ';
});


/**
 * Insert custom login text
 */

add_filter('login_headertext', function ($title) {
    $title = get_bloginfo('name');
    return $title;
});


/**
 * Insert custom login URL for linked logo
 */

add_filter('login_headerurl', function ($url) {
    $url = home_url('/');
    return $url;
});


/**
 * Modify admin footer text
 */

add_filter('admin_footer_text', function () {
    echo __('alpha alpaka ux GmbH', 'alpha-alpaka');
});


/**
 * Change Read More link
 */

add_filter('the_content_more_link', function () {
    return '<a href="' . get_permalink() . '">' . __('read more', 'sage') . '</a>';
});


/**
 * Disable Emoji mess
 */

add_action('init', function () {
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    add_filter('tiny_mce_plugins', function ($plugins) {
        return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
    });
    add_filter('emoji_svg_url', '__return_false');
});


/**
 * Add categories for attachments
 */

add_action('init', function () {
    register_taxonomy_for_object_type('category', 'attachment');
});


/**
 * Add tags for attachments
 */

add_action('init', function () {
    register_taxonomy_for_object_type('post_tag', 'attachment');
});


/**
 * Sanitize File Names
 */

add_filter('sanitize_file_name', function ($filename) {

    $sanitized_filename = remove_accents($filename); // Convert to ASCII

    // Standard replacements
    $invalid = array(
        ' '   => '-',
        '%20' => '-',
        '_'   => '-',
    );

    $sanitized_filename = str_replace(array_keys($invalid), array_values($invalid), $sanitized_filename);

    $sanitized_filename = preg_replace('/[^A-Za-z0-9-\. ]/', '', $sanitized_filename); // Remove all non-alphanumeric except .
    $sanitized_filename = preg_replace('/\.(?=.*\.)/', '', $sanitized_filename); // Remove all but last .
    $sanitized_filename = preg_replace('/-+/', '-', $sanitized_filename); // Replace any more than one - in a row
    $sanitized_filename = str_replace('-.', '.', $sanitized_filename); // Remove last - if at the end
    $sanitized_filename = strtolower($sanitized_filename); // Lowercase

    return $sanitized_filename;
}, 10, 1);


/**
 * Automatically set the image Title, Alt-Text, Caption & Description upon upload
 */

add_action('add_attachment', function ($post_ID) {
    // Check if uploaded file is an image, else do nothing
    if (wp_attachment_is_image($post_ID)) {

        $my_image_title = get_post($post_ID)->post_title;

        // Sanitize the title
        // $my_image_title = upload_sanitize_file_name($my_image_title);

        // Create an array with the image meta (Title, Caption, Description) to be updated
        // Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
        $my_image_meta = array(
            'ID'        => $post_ID,            // Specify the image (ID) to be updated
            'post_title'    => $my_image_title,        // Set image Title to sanitized title
            'post_excerpt'    => $my_image_title,        // Set image Caption (Excerpt) to sanitized title
            'post_content'    => $my_image_title,        // Set image Description (Content) to sanitized title
        );

        // Set the image Alt-Text
        update_post_meta($post_ID, '_wp_attachment_image_alt', $my_image_title);

        // Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post($my_image_meta);
    }
});


/**
 * Disable xmlrpc.php
 */

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
add_filter('xmlrpc_enabled', '__return_false');


/**
 * Remove Recent Comments Style Tag
 */

add_action('widgets_init', function () {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
});


/**
 * Disable wp-embed
 */

add_action('wp_footer', function () {
    wp_dequeue_script('wp-embed');
});


/**
 * PHP Logger
 */

function php_logger($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    // print the result into the JavaScript console
    echo "<script>console.log( 'PHP LOG: " . $output . "' );</script>";
}


/**
 * Remove jQuery Migrate Message
 */

add_action('wp_default_scripts', function ($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});


/**
 * Post Order Random --> Pagination Fix
 */

if (!session_id()) {
    session_start();
}


/**
 * Add SVG Type to allowed upload mimes
 */

add_filter('upload_mimes', function ($svg_mime) {
    $svg_mime['svg'] = 'image/svg+xml';
    return $svg_mime;
});


/**
 * Ignore WP Upload-Restrictions
 */

add_filter('wp_check_filetype_and_ext', function ($checked, $file, $filename, $mimes) {

    if (!$checked['type']) {
        $wp_filetype = wp_check_filetype($filename, $mimes);
        $ext = $wp_filetype['ext'];
        $type = $wp_filetype['type'];
        $proper_filename = $filename;

        if ($type && 0 === strpos($type, 'image/') && $ext !== 'svg') {
            $ext = $type = false;
        }

        $checked = compact('ext', 'type', 'proper_filename');
    }

    return $checked;
}, 10, 4);


/**
 * Disable WP-Plugins by constant --> disabled plugins can be added in wp-config file
 */

add_action('admin_init', function () {
    if (defined('DEV_DISABLED_PLUGINS') && function_exists('is_plugin_active') && function_exists('deactivate_plugins')) {
        $plugins_to_disable = unserialize(DEV_DISABLED_PLUGINS);

        if (!empty($plugins_to_disable) && is_array($plugins_to_disable)) {
            foreach ($plugins_to_disable as $plugin_to_disable) {
                if (is_plugin_active($plugin_to_disable)) {
                    deactivate_plugins($plugin_to_disable);
                }
            }
        }
    }
});


/**
 * Disable Search Engines for Dev and Staging
 */

if (defined('WP_ENV') && WP_ENV !== 'production' && !is_admin()) {
    add_action('pre_option_blog_public', '__return_zero');
}


/**
 * Modify jQuery Version
 */

if (!is_admin()) add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', false, '3.2.1');
    wp_enqueue_script('jquery');
});


/**
 * Register Custom Searchform File
 */

// add_filter('get_search_form', function () {
//     $form = '';
//     echo template('partials.searchform');
//     return $form;
// });


/**
 * add filter "reverse" to wp_nav_menu to get the reverse order of menuitems
 */

add_filter('wp_nav_menu_objects', function ($menu, $args) {
    if (isset($args->reverse) && $args->reverse) {
        return array_reverse($menu);
    }
    return $menu;
}, 10, 2);


/**
 * Disable Gutenberg Autosave
 */

add_action('admin_init', function () {
    wp_deregister_script('autosave');
});


/**
 * Log if Mail Error
 */
add_action('wp_mail_failed', function ($wp_error) {
    return error_log(print_r($wp_error, true));
}, 10, 1);


/**
 * Remove Output Links and Oembed
 */

remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);


/**
 * Remove WP Shortlink
 */

add_filter('after_setup_theme', function () {
    // remove HTML meta tag
    // <link rel='shortlink' href='http://example.com/?p=25' />
    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // remove HTTP header
    // Link: <https://example.com/?p=25>; rel=shortlink
    remove_action('template_redirect', 'wp_shortlink_header', 11);
});


/**
 * Getting rid of archive “label”
 */


add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_home()) {
        $title = single_post_title('', false);
    }

    return $title;
});


/**
 * Highlight Archive Menu Items when is_single
 */

add_filter('nav_menu_css_class', function ($classes = array(), $menu_item = false) {
    if (get_post_type() === 'page') :
        return $classes;
    endif;

    if (get_post_type() === $menu_item->object) :
        $classes[] = 'current-menu-item';
    endif;

    if (get_post_type() === strtolower($menu_item->title)) :
        $classes[] = 'current-menu-item';
    endif;

    return $classes;
}, 10, 2);


/**
 * Add Gutenberg Editor Style
 */

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
}, 100);
