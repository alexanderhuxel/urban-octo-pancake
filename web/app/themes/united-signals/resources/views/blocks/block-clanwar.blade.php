{{--
  Title: Block Clanwar
  Description: Block Clanwar
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
$clanwar = new WP_Query(array('post_type'=>'Clanwars'));
@endphp


@if ($clanwar->have_posts())
<div class="mb-10">
    <div class="flex flex-col items-center">

        @while ($clanwar->have_posts())
        @php
        $clanwar->the_post();
        @endphp
        @php


        $teamName1 = get_field('clanwarTeam1',get_the_ID());
        $teamLogo1 = get_field('clanwarTeamlogo1',get_the_ID());
        $teamPoints1 = get_field('clanwarPointsTeam1',get_the_ID());
        $teamName2 = get_field('clanwarTeam2',get_the_ID());
        $teamLogo2 = get_field('clanwarTeamlogo2',get_the_ID());
        $teamPoints2 = get_field('clanwarPointsTeam2',get_the_ID());
        $date = get_field('clanwarDate');
        $size = 'full';
        $imageUrl1 = wp_get_attachment_image_src($teamLogo1,$size);
        $imageUrl2 = wp_get_attachment_image_src($teamLogo2,$size);
        @endphp
        <div class="flex border-b mt-2 border-white-200 border-opacity-50 border-opa flex-row">
            <span class="flex items-center flex-row">
                <p class="font-quicksand mr-2.5 ml-0 font-bold text-white-100">{{ $teamName1 }}</p>
                <img class="w-12 h-12 mr-2" src="{!! $imageUrl1['0'] !!}">
            </span>
            <span class="mx-2">
                <p class="font-quicksand text-body text-white-100 opacity-75">{{ $date }}</p>
                <span class="flex  flex-row ">
                    <p class="font-roadrage  text-white-100 text-h2">{{ $teamPoints1 }}</p>
                    <p class="font-roadrage text-white-100 mx-1.5 text-h2">:</p>
                    <p class="font-roadrage text-white-100 text-h2">{{ $teamPoints2 }}</p>
                </span>
            </span>
            <span class="flex items-center flex-row">
                <img class="w-12 h-12 ml-2" src="{!! $imageUrl2['0'] !!}">
                <p class="font-quicksand ml-2.5 mr-0 font-bold text-white-100">{{ $teamName2 }}</p>
            </span>
        </div>

        @endwhile


    </div>

</div>
@endif