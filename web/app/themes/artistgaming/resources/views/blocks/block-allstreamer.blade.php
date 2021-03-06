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
    <div class="flex justify-center mt-10">
        <div class="flex justify-center items-start flex-row flex-wrap gap-4">

            @while ($streamer->have_posts())
            @php
            $streamer->the_post();
            $imageID = get_field('streamerImage', get_the_ID());
            $size = 'full';
            $imageUrl = wp_get_attachment_image_src($imageID,$size);
            $streamerName = get_field('streamerName', get_the_ID());
            $streamerDescription = get_field('streamerDescription', get_the_ID());
            $streamName = get_field('streamerStreamName', get_the_ID());
            @endphp

            <div class="flex w-38  bg-black-200 flex-col relative">
                <a class="absolute inset-0" href="{{ get_permalink() }}"></a>
                <img class="h-38 object-cover" src="{!! $imageUrl['0'] !!}">
                <div class="flex flex-col">
                    <span class="ml-2.5 mt-4 mb-1.5">
                        <h2 class="text-white-200 text-h2 mb-1 font-deathrattle">
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
                            <li class="pl-2 p-1 mb-0 z-10">
                                <a target="_blank" href="{{ $link }}">
                                    @switch($link)
                                    @case(str_contains($link, 'facebook'))
                                    <img class="w-2 h-2" src="@asset('images/social/facebook.png')" />
                                    @break
                                    @case(str_contains($link, 'instagram'))
                                    <img class="w-2 h-2" src="@asset('images/social/instagram.png')" />
                                    @break
                                    @case(str_contains($link, 'tiktok'))
                                    <img class="w-2 h-2" src="@asset('images/social/tiktok.png')" />
                                    @break
                                    @case(str_contains($link, 'twitch'))
                                    <img class="w-2 h-2" src="@asset('images/social/twitch.png')" />
                                    @endswitch
                                </a>
                            </li>
                            @endwhile
                        </ul>
                        @endif
                        <div class="flex mr-2.5 items-center justify-center">
                            @php
                            $curl = curl_init();

                            curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://api.twitch.tv/helix/streams?user_login='.$streamName,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'GET',
                            CURLOPT_HTTPHEADER => array(
                            'Client-ID: gwn6pvqupxfwfn73yvs0hlh6zmzhyv',
                            'Authorization: Bearer 9dc8a53mb0qc8bww57jxek6gs802df'
                            ),
                            ));

                            $response = curl_exec($curl);

                            curl_close($curl);
                            $response = json_decode($response, true);
                            $online = true;
                            if (sizeof($response['data']) !== 0) :
                            $online = true;
                            else :
                            $online = false;
                            endif;
                            @endphp

                            <p class="text-white-200 font-quicksand mr-1.5 font-bold">
                                @if ($online)
                                LIVE
                                @else
                                Offline
                                @endif

                                @php
                                @endphp
                            </p>
                            @if (sizeof($response['data']) !== 0)
                            <span class="w-4 h-4 animate- rounded-full animate-pulse bg-red"></span>
                            @endif

                        </div>
                    </div>
                </div>
            </div>


            @endwhile

            @endif








        </div>

    </div>
</div>

@overwrite