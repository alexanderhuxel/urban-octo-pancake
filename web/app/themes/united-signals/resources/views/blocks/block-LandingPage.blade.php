{{--
  Title: Block LandingPage
  Description: Block Landingpage
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
@endphp

@extends('blocklayout.blocklayout')

@section('block')
@php
$firstRow = get_field('firstRow');
$secondRow = get_field('secondRow');
$description = get_field('description');
$buttonText = get_field('buttonText');
$discordState = get_field('discordState');
@endphp
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
  @if ($discordState == 'Anzeigen')

  <img id="discord" onclick="openDicord()"
    class="w-5 h-5  transition-all ease-in-out duration-300 rounded-full hover:shadow-discord hover:cursor-pointer  absolute z-10 right-0 bottom-15"
    src="@asset('images/discord.svg')">
  <iframe id="iframe" class="absolute w-0 h-0 z-10  transition-all ease-in-out duration-300  right-6 bottom-15 "
    src="https://discordapp.com/widget?id=894213761102123128&theme=dark&username=" allowtransparency="true"
    frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts">
  </iframe>


  @endif


  <div class="flex flex-col lg:flex-row ">
    <img class="w-1/2 h-1/2 ml-half lg:ml-0" src="@asset('images/logo_plain.png')" />
    <div class=" transform scale-75 lg:scale-100 flex flex-col relative w-full md:w-2/3 lg:mt-32">
      <h1 class=" text-h3 lg:text-h1 mb-6 font-roadrage text-white-200 flex flex-col">
        <span>{{ $firstRow }}</span>
        <span>{{ $secondRow }}</span>
      </h1>
      <p class="text-body mb-5 font-quicksand text-white-200 w-auto max-w-xs sm:w-56">
        {{ $description }}
      </p>
      <a href="" class="aa-customButton">
        {{ $buttonText }}
      </a>
    </div>
  </div>
</div>
@overwrite