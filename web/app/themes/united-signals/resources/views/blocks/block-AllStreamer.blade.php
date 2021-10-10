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
console_log(get_post($post ='79'));
// vars
$loop = new WP_Query(array( 'post_type' => 'Streamer' ));
console_log($loop);
@endphp

@extends('blocklayout.blocklayout')

@section('block')
<div data-{{ $block['id'] }} class="{{ $block['classes'] }} block">
    @if ($loop->have_posts())
    @while ($loop->have_posts())
    @php
    $loop->the_post();
    @endphp


    <div class="  grid grid-cols-1
                justify-items-center
                sm:grid-cols-2
                items-center
                lg:grid-cols-3
                gap-10">

        <div class="flex w-38 bg-black-200 flex-col">
            {{-- {{ $imageURL }} --}}
            <div class="flex flex-col">
                <span class="ml-2.5 mt-4 mb-1.5">
                    <h2 class="text-white-200 mb-1 font-deathrattle" </h2> <p class="text-white-200 font-quicksand">
                        </p>
                </span>
                <hr class="text-white-300 opacity-10" />
                <div class="flex mt-1.5 mb-2 justify-between items-center">
                    <ul class="list-none pl-0 ml-2.5 mb-0 flex flex-row">
                        {{-- @if (have_rows('streamerSocialSlots'))
                        @while(have_rows('streamerSocialSlots')) --}}
                        @php
                        // the_row();
                        // $streamerLink = get_sub_field('streamerSocialLink');
                        @endphp
                        <li class="pl-0 mb-0">
                            <img class="w-2 h-2 ml-2" src="assets/images/facebook.svg" />
                        </li>
                        {{-- @endwhile
                        @endif --}}

                    </ul>
                    <div class="flex mr-2.5 items-center justify-center">
                        <p class="text-white-200 font-quicksand mr-1.5 font-bold">LIVE</p>
                        <span class="w-4 h-4 animate- rounded-full animate-pulse bg-red"></span>
                    </div>
                </div>
            </div>
        </div>
        {{-- @endwhile

        @endif --}}

    </div>
    @endwhile
</div>
</div>

@endif
@overwrite