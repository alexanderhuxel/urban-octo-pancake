@section('content')
<article {!! post_class() !!}>



    <div class="container flex flex-col lg:flex-row px-2 md:px-5 lg:px-10">
        <div class="left-box ml-2 lg:w-1/2">
            <p class=" text-gray-300 overline">
                {{ the_time("H:i d.m.y") }} /
                @php
                $cat = get_the_category()
                @endphp
                {{ $cat[0]->cat_name }} /
                {{  get_the_author() }}
            </p>
            <h1 class="text-h2 font-bold md:text-h1 text-primary mb-2.5"></h1>
            <h2 class="h2 text-primary  font-bold">
                {{ the_title() }}
            </h2>

            <p class=" text-h4">
                {{ the_content() }}
            </p>
            <p class=" text-primary hover:cursor-pointer pt-3"> alle News anzeigen</p>
        </div>
        <div class="right-box lg:ml-3 text-primary font-bold lg:w-1/2">
            <div class="departments flex flex-row flex-wrap">
                <h2 class="h2 text-primary w-full font-bold">Kategorien</h2>
                @php
                loadAllCategorys();
                @endphp

                <div class="flex flex-wrap flex-row justify-start">

                </div>
                <div class="join mt-7">
                    @include ('partials.categoryPage.antrag')
                </div>

                <div class="sponsors mb-3">
                    @include('partials.categoryPage.sponsoren')
                </div>

            </div>
        </div>

    </div>
</article>
@include ('partials.categoryPage.gallerieCategory')

@endsection