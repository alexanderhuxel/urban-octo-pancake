</main>
<div class="aa-wrapper    lg:flex px-0 mb-2.5">
    <footer id="footer" class="pb-10 text-black aa-wrapper">

        @php if (has_nav_menu("menuFooter")) {
        $args = array(
        "menu"=>"menuFooter",
        "menu_class"=>"aa-menuFooter",

        );
        wp_nav_menu($args);
        }@endphp
    </footer>
</div>