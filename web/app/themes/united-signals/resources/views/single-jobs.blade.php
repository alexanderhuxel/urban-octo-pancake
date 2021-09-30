@extends('layouts.app')

@section('content')
@include('partials.jobs.header')
@while(have_posts()) @php the_post() @endphp

@php
$post_id = get_the_ID();
$structuredJobData = App::structuredJobData($post_id);
@endphp
@include('partials.jobs.structureddata')

@include('partials.jobs.content')
@include('partials.jobs.footer')
@endwhile
@endsection