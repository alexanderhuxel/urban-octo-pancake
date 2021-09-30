<nav class="menu overflow-hidden  z-50 h-screen w-screen aa-customBackgroundGradient relative">
    <img class="absolute lg:top-0 left-0 bottom-0"
        src="{{ get_template_directory_uri() }}/assets/images/fadeInMenu/Rehbock.png" />


    @if(has_nav_menu("menuMobile"))
    @php
    $args = array(
    "menu"=>"menuMobile",
    "menu_class"=>"aa-menuFullScreen"
    );
    wp_nav_menu($args);
    @endphp


    <div class="aa-wrapper hidden lg:flex px-0 mb-2.5">
        <footer class="px-10 pb-10 aa-menuFooterMobile  aa-wrapper">

            @if (has_nav_menu("menuFooter"))
            @php
            $args = array(
            "menu"=>"menuFooter",
            "menu_class"=>"aa-menuFooter"
            );
            wp_nav_menu($args)
            @endphp
        </footer>

        @endif
        @endif
</nav>