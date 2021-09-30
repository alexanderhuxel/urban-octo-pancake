@if (has_nav_menu("frontpageMenu"))
@php

$args = array(
"menu"=>"menuFrontPage",
"menu_class"=>"aa-frontPageMenu"
);
wp_nav_menu($args);
@endphp
@endif