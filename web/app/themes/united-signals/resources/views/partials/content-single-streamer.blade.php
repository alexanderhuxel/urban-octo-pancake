@section('content')




<div class="flex flex-col">
    <div class="flex mt-10 mb-7 transform flex-col items-center md:flex-row">
        @php
        $image = get_field('streamerImage');
        $size = 'full';
        $imageUrl = wp_get_attachment_image_src($image,$size);
        @endphp

        <img class="md:mr-4 self-center mb-2 md:mb-0 max-w-md" src="{!! $imageUrl['0'] !!}" />
        <div class="flex flex-col self-center md:ml-4 justify-center">
            <h2 class="text-white-200 font-deathrattle mb-2.5 text-h2">
                {{get_the_title()}}
            </h2>
            <span>
                <p class="text-white-200 font-quicksand text-body">Alter: 31</p>
                <p class="text-white-200 font-quicksand text-body">
                    Herkunft: {{get_field('streamerOrgin')}}
                </p>
                <p class="text-white-200 font-quicksand text-body">
                    Bundesland: {{get_field('streamerState')}}
                </p>
                <p class="text-white-200 mb-2.5 font-quicksand text-body">
                    Platform: {{get_field('streamerConsole')}}
                </p>
            </span>
            <a class="aa-customButton" href="#twitch-embed">zum Stream</a>
        </div>
    </div>

    @if (have_rows('streamerGameSlots'))
    <div class="flex flex-col mb-7">
        <h2 class="text-white-200 font-deathrattle text-h2 text-center">
            Spiele
        </h2>
        <div class="
                        grid grid-cols-1
                        gap-5
                        md:grid-cols-3
                        my-7
                        justify-items-center
                      ">


            @while (have_rows('streamerGameSlots'))

            @php
            the_row();
            $gameSelection = get_sub_field('streamerGame');
            @endphp

            @if ($gameSelection == 'Apex Legends')
            <img src="@asset('images/apex.png')" />
            @endif

            @if ($gameSelection == 'Call of Duty Warzone')
            <img src="@asset('images/warzone.png')" />
            @endif

            @if ($gameSelection == 'Naraka Bladepoint')
            <img src="@asset('images/naraka.png')" />
            @endif

            @endwhile
        </div>
    </div>
    @endif

    <div class="flex flex-col mb-7">
        <h2 class="text-h2 text-white-200 mb-7 text-center font-deathrattle">
            Stream Zeiten
        </h2>
        <div class="
                    grid grid-cols-1
                    gap-5
                    md:grid-cols-3
                    mb-7
                    justify-items-center
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
    <!-- TWITCH EMBED WITH SCRIPT -->
    <div class="mb-7" id="twitch-embed">

        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", () => {
                    new Twitch.Embed("twitch-embed", {
                      width: "100%",
                      height: 600,
                      channel: "energyx89",
                      parent: ["alexhuxel.de", "artistgaming.alexhuxel.de"],
                    });
                  });
        </script>
    </div>
    <!-- TWITCH EMBED WITH SCRIPT -->
</div>
</article>


@endsection