@extends('layouts.app')

@section('content')

<div>
    <div class=" py-10 md:py-20">
        <div class="px-2.5 sm:px-5 md:px-7 lg:px-10">
            <div>
                <div class="w-full md:w-2/3">
                    <img src="@asset('images/404.svg')" alt="404" class="mb-5">
                </div>

                <p class="text-h2 text-black mb-0">
                    {{ __('Ups, da ist etwas schief gelaufen.') }}
                </p>

                <p>
                    {{ __('Die angeforderte Seite konnte nicht gefunden werden.') }}
                </p>
            </div>
        </div>
    </div>
</div>


@endsection