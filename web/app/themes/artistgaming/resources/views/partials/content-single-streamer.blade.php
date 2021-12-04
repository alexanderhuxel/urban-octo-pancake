@section('content')




<div class="flex flex-col mt-5">
    <div class="flex mt-10 mb-7  flex-col items-center md:flex-row">
        @php
        $image = get_field('streamerImage');
        $size = 'full';
        $imageUrl = wp_get_attachment_image_src($image,$size);
        $streamerAge = get_field('streamerAge');
        $streamerOrgin = get_field('streamerOrgin');
        $streamerState = get_field('streamerState');
        $streamerConsole = get_field('streamerConsole');
        $streamerStreamName = get_field('streamerStreamName');
        @endphp

        <img class="md:mr-4 self-center mb-2 md:mb-0 max-w-md rounded-full w-32 h-32 object-cover"
            src="{!! $imageUrl['0'] !!}" />
        <div class="flex flex-col self-center md:ml-4 justify-center">
            <h2 class="text-white-200 font-deathrattle mb-2.5 text-h2">
                {{get_the_title()}}
            </h2>
            <p id="streamerName" class="hidden">
                {{ strtolower($streamerStreamName) }}
            </p>
            <span>
                @if ($streamerAge)
                <p class="text-white-200 font-quicksand text-body">
                    Alter: {{$streamerAge}}
                </p>
                @endif
                @if ($streamerOrgin)
                <p class="text-white-200 font-quicksand text-body">
                    Herkunft: {{$streamerOrgin}}
                </p>
                @endif
                @if ($streamerState)
                <p class="text-white-200 font-quicksand text-body">
                    Bundesland: {{$streamerState}}
                </p>
                @endif
                @if ($streamerConsole)
                <p class="text-white-200 mb-2.5 font-quicksand text-body">
                    Platform: {{$streamerConsole}}
                </p>
                @endif
            </span>
            <a class="aa-customButton" href="#twitch-embed">zum Stream</a>
        </div>
    </div>

    @if (have_rows('streamerGameSlots'))
    <div class="flex flex-col mb-7">
        <h2 class="text-white-200 font-deathrattle text-h2 text-center">
            Spiele
        </h2>
        <div class="flex flex-wrap gap-5 justify-center">


            @while (have_rows('streamerGameSlots'))

            @php
            the_row();
            $gameSelection = get_sub_field('streamerGame');
            @endphp
            @switch($gameSelection)
            @case(str_contains($gameSelection, 'Apex Legends'))
            <img class="w-36 h-48 object-cover" src="@asset('images/games/apex.jpg')" />
            @break
            @case(str_contains($gameSelection, 'Call of Duty Warzone'))
            <img class="w-36 h-48 object-cover" src="@asset('images/games/warzone.jpg')" />
            @break
            @case(str_contains($gameSelection, 'Naraka Bladepoint'))
            <img class="w-36 h-48 object-cover" src="@asset('images/games/naraka.png')" />
            @break
            @case(str_contains($gameSelection, 'New World'))
            <img class="w-36 h-48 object-cover" src="@asset('images/games/newworld.jpg')" />
            @endswitch

            @endwhile
        </div>
    </div>
    @endif

    <div class="flex flex-col mb-7">
        <h2 class="text-h2 text-white-200 mb-7 text-center font-deathrattle">
            Stream Zeiten
        </h2>
        <div class="
                   flex justify-center md:justify-between gap-5 flex-wrap items-center
                  ">


            @if (have_rows('streamerDatesSlots'))
            @while (have_rows('streamerDatesSlots'))
            @php
            the_row();
            $day = get_sub_field('streamerDatesDay');
            $times = get_sub_field('streamerDatesTime');

            @endphp
            <span>
                <p class="
                        text-white-200 text-center
                        font-quicksand
                        text-body
                        opacity-70
                      ">
                    {{ $day }}
                </p>
                <p class="text-white-200 font-quicksand font-bold">
                    {{ $times }}
                </p>
            </span>
            @endwhile
            @endif


        </div>
    </div>

    <div class="flex flex-col">
        <h2 class="text-h2 font-deathrattle text-white-200 mb-7 text-center">
            stream
        </h2>
    </div>

    <div class="mb-7 shadow-button" id="twitch-embed">


        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", () => {
                    new Twitch.Embed("twitch-embed", {
                      width: "100%",
                      height: 600,
                      channel: 'energyx87',
                      parent: ["https://artistgaming.alexhuxel.de"],
                    });
                  });
        </script>
    </div>
</div>


@endsection