@extends('layouts.app')


@section('content')
@php

@endphp
@while(have_posts()) @php the_post() @endphp
@include('partials.content-single-'.get_post_type())
@endwhile
@endsection