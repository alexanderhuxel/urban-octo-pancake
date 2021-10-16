{{--
  Title: Block: Subline
  Description: Block: Subline
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
$subline = get_field('subline');
// vars
@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
  <h2 class="text-white font-deathrattle text-h2 text-center mb-4"> {{ $subline }} </h2>
</div>
@overwrite