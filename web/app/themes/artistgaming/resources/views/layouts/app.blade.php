<!doctype html>
<html id="html" {!! get_language_attributes() !!}>
    @include('partials.head')

    <body id="body" class="flex relative flex-col overflow-x-hidden justify-center items-center bg-black-100">
        {{-- <div class="barba-animation"></div>
        <div id="barba-wrapper" data-barba="wrapper">
            <div class="barba-container" data-barba="container"> --}}


        @php do_action('get_header') @endphp
        @include('partials.header')






        @yield('content')





        @php do_action('get_footer') @endphp
        @include('partials.footer')
        @php wp_footer() @endphp



        <div id="fullscreenMenu"
            class="w-screen h-screen  bg-black-200 z-10 transition-all ease-in-out duration-500 transform translate-x-full  absolute  inset-0">
            {{ wp_nav_menu(array('menu' => 'frontpageMenu')) }}


            {{-- </div>
        </div> --}}
        </div>
    </body>

</html>