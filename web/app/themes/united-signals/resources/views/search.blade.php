@extends('layouts.app')

@section('content')
@include('partials.header-page')

@if(!have_posts())
    <div class="container">
        <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
    </div>
@endif

@while(have_posts()) @php the_post() @endphp
    <div class="container">
        @include('partials.content-search')
    </div>
@endwhile

{!! get_the_posts_navigation() !!}
@endsection