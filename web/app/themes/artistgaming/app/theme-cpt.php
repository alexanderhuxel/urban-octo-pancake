<?php

// Template used for Gutenberg-Blocks that where loaded into each new post
/*
function block_template_custom_post()
{
    $post_type_object = get_post_type_object('custom-post');
    $post_type_object->template = array(
        array('core/paragraph'),
        array('acf/block-job-intro'),
        array('acf/block-job-descr'),
        array('acf/block-instascroll'),
    );
}
add_action('init', __NAMESPACE__ . '\\block_template_custom_post');
*/

// Template_lock is used to deny new blocks to be added with Gutenberg
/*
function block_lock_custom_post()
{
    $post_type_object = get_post_type_object('custom-post');
    $post_type_object->template_lock = 'all'; // prevents all operations. It is not possible to insert new blocks, move existing blocks, or delete blocks.
    $post_type_object->template_lock = 'insert'; // prevents inserting or removing blocks, but allows moving existing blocks.
}
add_action('init', __NAMESPACE__ . '\\block_lock_custom_post');
*/


// Add Custom Post Type
/*
function create_custom_post() {
    register_post_type( 'custom-post', // slug for custom post type
        array(
        'labels' => array(
            'name' => __( 'Custom Post' ),
        ),
        'public' => true,
        'publicly_queryable' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes',
            'revisions'
        ),
        'show_in_rest' => true,
        'can_export' => true,
        'taxonomies' => array(
            'post_tag',
            'category'
        )
    ));
}
add_action('init', 'create_custom_post');
*/


add_action('init', function () {
    register_post_type(
        'streamer', // slug for custom post type
        array(
            'labels' => array(
                'name' => __('Streamer'),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,
            'hierarchical' => false,
            'has_archive' => true,
            'supports' => array(
                'title',
                'page-attributes',
                'revisions',
            ),
            'show_in_rest' => false,
            'can_export' => true,
        )
    );
});


add_action('init', function () {
    register_post_type(
        'tournaments', // slug for custom post type
        array(
            'labels' => array(
                'name' => __('Tournaments'),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,
            'hierarchical' => false,
            'has_archive' => false,
            'supports' => array(
                'title',
                'page-attributes',
                'revisions',
            ),
            'show_in_rest' => false,
            'can_export' => true,
        )
    );
});


add_action('init', function () {
    register_post_type(
        'clanwars', // slug for custom post type
        array(
            'labels' => array(
                'name' => __('Clanwars'),
            ),
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_in_nav_menus' => false,
            'hierarchical' => false,
            'has_archive' => false,
            'supports' => array(
                'title',
                'page-attributes',
                'revisions',
            ),
            'show_in_rest' => false,
            'can_export' => true,
        )
    );
});