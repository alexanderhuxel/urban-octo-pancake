@php
global $post;
$page_slug = $post->post_name;
switch ($page_slug) {
case 'kontakt':
$color = "text-white ";
$border = "border-secondary border ";
break;
default:
$color = "text-primary";
$border = "border-none border";
break;
}
@endphp

<h2 class="text-h2 {{ $color }} font-bold">Mitglied werden</h2>
<button class="aa-customButton {{ $border }} shadow-button items-center mb-7 flex mt-4">
    <img class="w-2 h-2 mr-2" src="{{ get_template_directory_uri()}}'/assets/images/icons/arrow-down.svg'" />
    Antrag Herunterladen
</button>