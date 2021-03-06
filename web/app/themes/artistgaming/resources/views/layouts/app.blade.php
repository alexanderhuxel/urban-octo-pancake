<!doctype html>
<html id="html" {!! get_language_attributes() !!}>
    @include('partials.head')

    <body id="body" class="flex relative flex-col overflow-x-hidden justify-center items-center bg-black-100">
        {{ wp_nav_menu(array('menu' => 'frontpageMenu')) }}
        <div class="overflow-x-hidden md:overflow-x-visible relative">
            {{-- <div class="barba-animation"></div>
            <div class="barba-container" data-barba="container">
                <div id="barba-wrapper" data-barba="wrapper"> --}}

            <div id="body-classes" class="common">

                @php do_action('get_header') @endphp
                @include('partials.header')






                @yield('content')





                @php do_action('get_footer') @endphp
                @include('partials.footer')




            </div>
        </div>
        </div>
        @php wp_footer() @endphp
        </div>

    </body>

</html>