<?php

namespace App;

/**
 * Modify excerpt length
 */

add_filter('excerpt_length', function ($length) {
    return 25;
}, 999);


/**
 * Change More excerpt
 */

add_filter('excerpt_more', function ($more) {
    return ' ' . __('...', 'sage');
});


/**
 * Render Core Gutenberg Blocks
 */

// add_filter('render_block', function ($block_content, $block) {
//     // Target core/* and core-embed/* blocks.
//     if (preg_match('~^core/|core-embed/~', $block['blockName'])) {
//         $block_content = sprintf('<div class="container content-container pt-0"><div class="row"><div class="col-12">%s</div></div></div>', $block_content);
//     }
//     return $block_content;
// }, 999, 2);

// Add Logoslider to body classes if has block
add_filter('body_class', function ($classes) {
    global $post;

    if (has_block('acf/block-logoslider')) :
        $classes[] = 'logoslider';
    endif;

    return $classes;
});

// Add Map to body classes if has block
add_filter('body_class', function ($classes) {
    global $post;

    if (has_block('acf/block-map')) :
        $classes[] = 'block-map';
    endif;

    return $classes;
});

// Add Lottie to body classes if has block
add_filter('body_class', function ($classes) {
    global $post;

    if (has_block('acf/block-textandboxedimage')) :
        $classes[] = 'block-lottie';
    endif;

    return $classes;
});

// add transparentheader class if is front-page
add_filter('body_class', function ($classes) {
    global $post;

    if (is_front_page()) :
        $classes[] = 'transparentheader';
    endif;

    return $classes;
});

add_action('after_setup_theme', function () {
    show_admin_bar(false);
});
/*
add_filter('allowed_block_types', function ($allowed_blocks) {

    return array(
        'acf/block-centeredtext',
        'acf/block-contactform',
        'acf/block-contactrow',
        'acf/block-cta-teaser',
        'acf/block-employees',
        'acf/block-frontpageheader',
        'acf/block-iconboxes-blue',
        'acf/block-iconboxes-small',
        'acf/block-iconboxes-white',
        'acf/block-iconslider',
        'acf/block-image',
        'acf/block-joblist',
        'acf/block-line',
        'acf/block-line',
        'acf/block-locationrow',
        'acf/block-locationrow',
        'acf/block-logogrid',
        'acf/block-logoslider',
        'acf/block-map',
        'acf/block-pageheader',
        'acf/block-parallaximage',
        'acf/block-parallaxproduct',
        'acf/block-positivelist-double',
        'acf/block-positivelist',
        'acf/block-pressedownload',
        'acf/block-pressemeldungen',
        'acf/block-textandboxedimage',
        'acf/block-textcolumns',
        'acf/block-wysiwyg',
    );
});
*/
