{{--
  Title: Block: All Streamer
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
$orderby = get_field('orderby');
$order = get_field('order');
$posts_per_page = get_field('posts_per_page');
$layout = get_field('layout');
// vars

$streamer = new WP_Query(array
('post_type' => 'Streamer',
'posts_per_page' => $posts_per_page,
'orderby'=> $orderby,
'order' => $order )
);
console_log($streamer);
@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
    @if ($streamer->have_posts())

    <h1 class="text-white text-h1 text-center font-roadrage mt-2">
        {{ get_the_title() }}
    </h1>
    @if ($layout == 2)

    <div class=" grid grid-cols-1
        justify-items-center
        items-center
        sm:grid-cols-2
        gap-10">

        @endif
        @if ($layout == 3)
        <div class="  grid grid-cols-1
            justify-items-center
            sm:grid-cols-2
            items-center
            lg:grid-cols-3
            gap-10">
            @endif


            @while ($streamer->have_posts())
            @php
            $streamer->the_post();
            $imageID = get_field('streamerImage', get_the_ID());
            $size = 'full';
            $imageUrl = wp_get_attachment_image_src($imageID,$size);
            $streamerName = get_field('streamerName', get_the_ID());
            $streamerDescription = get_field('streamerDescription', get_the_ID());
            @endphp

            <div class="flex w-38 bg-black-200 flex-col">
                <img src="{!! $imageUrl['0'] !!}">
                <div class="flex flex-col">
                    <span class="ml-2.5 mt-4 mb-1.5">
                        <h2 class="text-white-200 mb-1 font-deathrattle">
                            {{$streamerName }}
                        </h2>
                        <p class="text-white-200 font-quicksand">
                            {{ $streamerDescription }}
                        </p>
                    </span>
                    <hr class="text-white-300 opacity-10" />
                    <div class="flex mt-1.5 mb-2 justify-between items-center">
                        @if (have_rows('streamerLinkSlots', get_the_ID()))
                        <ul class="list-none pl-0 ml-2.5 mb-0 flex flex-row">
                            @while (have_rows('streamerLinkSlots', get_the_ID()))
                            @php
                            the_row();
                            $link = get_sub_field('streamerLink');
                            @endphp
                            <li class="pl-0 mb-0">
                                <a target="_blank" href="{{ $link }}">
                                    @switch($link)
                                    @case(str_contains($link, 'facebook'))
                                    <img class="w-2 h-2 ml-2" src="@asset('images/facebook.svg')" />
                                    @break
                                    @case(str_contains($link, 'instagram'))
                                    <img class="w-2 h-2 ml-2" src="@asset('images/instagram.svg')" />
                                    @break
                                    @case(str_contains($link, 'twitch'))
                                    <img class="w-2 h-2 ml-2" src="@asset('images/twitch.svg')" />
                                    @endswitch
                                </a>
                            </li>
                            @endwhile
                        </ul>
                        @endif
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