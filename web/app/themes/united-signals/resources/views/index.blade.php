@extends('layouts.app')

@section('content')


@if(!have_posts())
<div class="container">
    <div class="alert alert-warning">
        {{ __('Nichts gefunden', 'theme') }}
    </div>
</div>
@else
<div class="">
    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1  border-r border-gray-200">
        @while(have_posts()) @php the_post() @endphp

        @endwhile
    </div>

</div>

{{-- <div class="container aa-asterixBlack mb-5">
    {!! get_the_posts_pagination() !!}
</div> --}}
@endif

@endsection