{{--
  Title: Demo Query
  Description: Demo Query Block
  Category: alpha-alpaka 
  Icon: admin-comments
  Keywords:
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: center
  SupportsMode: true
  SupportsMultiple: true
--}}

@php
// alpaka Block-Configuration
$blockHasOwnTitle = false;

// vars
@endphp

@php
// Vars
$args = array(
'post_type' => 'projects',
'post_status' => 'publish',
'posts_per_page' => 3,
'orderby' => 'menu_order',
'order' => 'ASC',
);

$loop = new WP_Query( $args );
@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
  @while ( $loop->have_posts() )
  <div>

    @php
    $loop->the_post();
    $post_id = get_the_ID();
    $postThumbnail = get_the_post_thumbnail($post_id, 'referenzteaser', array( 'class' => 'mb-2 reveal' ));
    $title = get_the_title($post_id);
    $category = get_field('category',$post_id);
    @endphp

    {!! $postThumbnail !!}

    <h3 class="h4 mb-1 reveal">{{ $title }}</h3>
    <h4 class="h4 text-grey-02 mb-1 reveal">{{ $category }}</h4>

  </div>
  @endwhile
</div>

@php
wp_reset_postdata();
@endphp
@overwrite