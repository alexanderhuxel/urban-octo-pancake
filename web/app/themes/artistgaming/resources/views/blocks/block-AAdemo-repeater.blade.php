{{--
  Title: Demo Repeater
  Description: Demo Repeater Block
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
$count = count(get_field('repeater_field_name'));
@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-block="data-{{ $block['id'] }}" class="{{ $block['classes'] }} block">

  @if( have_rows('repeater_field_name'))
  @while( have_rows('repeater_field_name') )

  @php
  the_row();

  // vars
  $image = get_sub_field('image');
  $content = get_sub_field('content');
  $link = get_sub_field('link');

  @endphp

  {{ $content }}

  <img src="{{ $image['url'] }}" alt="{{ $image['alt'] }}" />

  @if( $link )
  <a href="{{ $link }}">
    {{ $link }}
  </a>
  @endif


  @endwhile
  @endif


</div>
@overwrite