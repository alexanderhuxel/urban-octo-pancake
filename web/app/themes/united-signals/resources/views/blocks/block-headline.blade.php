{{--
  Title: Block: Headline
  Description: Block: Headline
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
$headline = get_field('headline');
// vars
@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
    <h1 class="text-white font-roadrage text-h1 text-center mt-2 mb-15">{{ $headline }}</h1>
</div>
@overwrite