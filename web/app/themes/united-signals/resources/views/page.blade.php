@extends('layouts.app')

@section('content')

@while(have_posts()) @php the_post() @endphp
@if (get_the_title() == 'Clanwar Ergebnisse')
@include('partials.clanwars')
@else
@include('partials.content-page')
@endif

@endwhile
@endsection