{{--
  Title: Block All Streamer
  Description: Block All Streamer
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

$streamer = new WP_Query(array('post_type' => 'Streamer'));

@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
    @if ($streamer->have_posts())
    <div class="  grid grid-cols-1
                    justify-items-center
                    sm:grid-cols-2
                    items-center
                    lg:grid-cols-3
                    gap-10">

        @while ($streamer->have_posts())
        @php
        $streamer->the_post();
        $test = get_field('streamerName');
        console_log($test);
        @endphp
        <div class="flex w-38 bg-black-200 flex-col">
            <img src="" alt="">
            <div class="flex flex-col">
                <span class="ml-2.5 mt-4 mb-1.5">
                    <h2 class="text-white-200 mb-1 font-deathrattle">
                        {{ get_field('streamerName') }}
                    </h2>
                    <p class="text-white-200 font-quicksand">
                    </p>
                </span>
                <hr class="text-white-300 opacity-10" />
                <div class="flex mt-1.5 mb-2 justify-between items-center">
                    <ul class="list-none pl-0 ml-2.5 mb-0 flex flex-row">

                        <li class="pl-0 mb-0">
                            <img class="w-2 h-2 ml-2" src="assets/images/facebook.svg" />
                        </li>


                    </ul>
                    <div class="flex mr-2.5 items-center justify-center">
                        <p class="text-white-200 font-quicksand mr-1.5 font-bold">LIVE</p>
                        <span class="w-4 h-4 animate- rounded-full animate-pulse bg-red"></span>
                    </div>
                </div>
            </div>
        </div>

        @endwhile

        @endif








    </div>

</div>


@overwrite