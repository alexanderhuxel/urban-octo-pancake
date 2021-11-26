<div data-block="data-{{ $block['id'] }}" class="{{ $block['classes'] }} block">

    @php
    global $wp;
    $currentLink = ucfirst($wp->query_vars['category_name']);
    @endphp

    <div class="px-2.5 sm:px-5 md:px-7 lg:px-10">
        <div class="box mt-7  flex lg:flex-row flex-col">


            <div class="left-box lg:w-1/2">
                <h1 class="text-h1 text-primary  font-bold">{{ $currentLink }}
                </h1>
                <p class="text-primary">alle Posts in dieser Kategory</p>
                <div class="news flex flex-col">
                    @include('partials.frontPage.articleWPagination')
                </div>


            </div>
            <div class="right-box lg:ml-3 text-primary font-bold lg:w-1/2">

                <div class="mt-2">
                    @include('partials.categoryPage.antrag')
                </div>
                @include('partials.categoryPage.sponsoren')
            </div>


        </div>
        <div id="pagination" class="flex   flex-row   mt-5 mb-5 items-center md:mb-10">
            {!! paginate_links(
            array(
            'prev_text' => __('<'), 'next_text'=> __('>'),
                )
                )!!}
        </div>
    </div>
</div>