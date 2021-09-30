<!doctype html>
<html {!! get_language_attributes() !!}>
    @include('partials.head')

    <body id="body" class="theme-standard">
        <div class="barba-animation"></div>
        <div id="barba-wrapper" data-barba="wrapper">
            <div class="barba-container" data-barba="container">
                <div id="body-classes" @php body_class() @endphp>

                    @php do_action('get_header') @endphp
                    @include('partials.header')

                    <div class="wrap" role="document">
                        <div class="content">

                            <main class="main ">
                                <div id="maincontent">
                                    @yield('content')
                                </div>
                            </main>

                        </div>
                    </div>

                    @php do_action('get_footer') @endphp
                    @include('partials.footer')
                    @php wp_footer() @endphp

                </div>
            </div>
        </div>
    </body>

</html>