<?php
/**
 * Template part for displaying posts
 */

?>
@php

$category = 'Allgemein';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
'post_type' => 'post',
'posts_per_page' => 4,
'order' => 'DESC',
'orderby' => 'date',
'category_name' => $category,
'paged' => $paged
);

@endphp
@php
$wp_query = new WP_Query($args);
@endphp
@include('partials.categoryPage.article')