@extends('layouts.app')

@section('content')

@while(have_posts()) @php the_post() @endphp

<<<<<<< HEAD
@include('partials.content-page')




=======


@include('partials.content-page')

>>>>>>> master

@endwhile
@endsection