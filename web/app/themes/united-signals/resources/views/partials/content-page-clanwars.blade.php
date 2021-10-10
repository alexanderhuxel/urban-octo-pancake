<h2 class="text-white-200 text-center font-roadrage mb-2.5 text-h2">
    Erbenisse
</h2>

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


        $teamName1 = get_field('clanwarTeam1');
        $teamLogo1 = get_field('clanwarTeamlogo1');
        $teamPoints1 = get_field('clanwarPointsTeam1');
        $teamName2 = get_field('clanwarTeam2');
        $teamLogo2 = get_field('clanwarTeamlogo2');
        $teamPoints2 = get_field('clanwarPointsTeam2');
        $date = get_field('clanwarDate');
        $size = 'full';
        $imageUrl1 = wp_get_attachment_image_src($teamLogo1,$size);
        $imageUrl2 = wp_get_attachment_image_src($teamLogo2,$size);
        console_log($imageUrl2);

        @endphp
        <div class="flex border-b mt-2 border-white-200 border-opacity-50 border-opa flex-row">
            <span class="flex items-center flex-row">
                <p class="font-quicksand mr-2.5 ml-0 font-bold text-white-100">{{ $teamName1 }}</p>
                <img class="w-12 h-12 mr-2" src="{!! $imageUrl1['0'] !!}">
            </span>
            <span class="mx-2">
                <p class="font-quicksand text-body text-white-100 opacity-75">{{ $date }}</p>
                <span class="flex flex-row ">
                    <p class="font-roadrage text-white-100 text-h2">{{ $teamPoints1 }}</p>
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


@php
$tournaments = new WP_Query(array('post_type' => 'Tournaments'));
console_log($tournaments);
@endphp

@if ($tournaments->have_posts())
<div class="grid grid-cols-3 justify-items-center mb-3 gap-5 ">
    @while ($tournaments->have_posts())
    @php
    $tournaments->the_post();
    $tournamentDate = get_field('date');
    $tournamentDescription = get_field('description');

    @endphp

    @if (have_rows('tournament'))


    <div class="flex flex-col">
        <span class="flex items-center flex-col">
            <p class="font-quicksand text-body mb-2.5  text-white-100">{{ $tournamentDate }}
                {{ $tournamentDescription }}

            </p>
            @while (have_rows('tournament'))
            @php
            the_row();
            $tournamentTeam = get_sub_field('teamName');
            $tournamentResult = get_sub_field('pointsResult');
            @endphp

            <span class="flex flex-row mb-2 items-center">
                <img class="mr-1 w-6 h-6" src="@asset('images/first.svg')">
                <p class="font-quicksand text-body  mr-2.5 text-white-100">{{ $tournamentTeam }}</p>
                @if (have_rows('pointSlots'))
                @while (have_rows('pointSlots'))
                @php
                the_row();
                $tournamentPoints = get_sub_field('points');

                @endphp
                <p class="font-quicksand  text-body mx-1 text-white-100">{{ $tournamentPoints }}
                </p>

                @endwhile
                @php
                @endphp
                <p
                    class="font-quicksand text-body ml-1 border border-white-100 flex items-center rounded-full p-1 h-4 w-4 text-white-100">
                    {{ $tournamentResult }}</p>
                @endif
            </span>

        </span>
        @endwhile
    </div>




    @endif

    @endwhile

</div>
@php
wp_reset_postdata();
@endphp
@endif