{{--
  Title: Block Tournaments
  Description: Block Tournaments
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
$tournaments = new WP_Query(array('post_type' => 'Tournaments'));


@endphp

@if ($tournaments->have_posts())
<div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 justify-items-center mb-3 gap-5 ">
    @while ($tournaments->have_posts())
    @php
    $tournaments->the_post();
    $tournamentDate = get_field('date',get_the_ID());
    $tournamentDescription = get_field('description',get_the_ID());
    console_log($tournamentDate);
    @endphp



    <div class="flex flex-col">
        <span class="flex items-center flex-col">
            <p class="font-quicksand text-body mb-2.5  text-white-100">{{ $tournamentDate }}
                {{ $tournamentDescription }}

            </p>
            @if (have_rows('tournament', get_the_ID()))
            @while (have_rows('tournament', get_the_ID()))
            @php
            the_row();
            $tournamentTeam = get_sub_field('teamName',get_the_ID());
            $tournamentResult = get_sub_field('pointsResult');
            $index = get_row_index();
            console_log($tournamentTeam);
            @endphp

            <span class="flex flex-row mb-2 items-center w-full max-w-37">
                @switch($index)
                @case(1)
                <img class="mr-1 w-6 h-6" src="@asset('images/first.svg')">
                @break
                @case(2)
                <img class="mr-1 w-6 h-6" src="@asset('images/second.svg')">
                @break
                @case(3)
                <img class="mr-1 w-6 h-6" src="@asset('images/third.svg')">
                @break
                @default
                <p class="mr-1 w-6 h-6 flex items-center justify-center">{{$index}} .</p>
                @break
                @endswitch

                <p class="font-quicksand text-body w-15 mr-2.5 text-white-100">{{ $tournamentTeam }}</p>

                <span class="flex w-15 justify-center">
                    @if (have_rows('pointSlots' , get_the_ID()))
                    @while (have_rows('pointSlots', get_the_ID()))
                    @php
                    the_row();
                    $tournamentPoints = get_sub_field('points', get_the_ID());
                    @endphp
                    <p class="font-quicksand  text-body mx-1 text-white-100">{{ $tournamentPoints }}
                    </p>
                    @endwhile
                    @endif
                </span>


                <p
                    class="font-quicksand text-body ml-1 border border-white-100 flex items-center rounded-full p-1 h-4 w-4 text-white-100">
                    {{ $tournamentResult }}</p>

            </span>

        </span>

        @endwhile
        @endif






    </div>







    @endwhile

</div>

@endif