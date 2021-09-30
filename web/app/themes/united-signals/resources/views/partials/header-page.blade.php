{{-- @php
$title = get_field('title');
$grey_header = get_field('grey_header');

if(!$title):
$title = App::title();
endif
@endphp

<header
    class="@if($grey_header) bg-gray-100 @else bg-secondary @endif bg-cover bg-repeat-x min-h-40 pb-10 pt-6 flex items-center">
    <div class="container">
        <h2
            class="text-h1-mobile md:text-h1 font-bold @if($grey_header) text-secondary @else text-white @endif mb-0 reveal">
            {!! $title !!}
        </h2>
    </div>
</header>

 --}}
<?php
/**
 * The header for the theme
 *
 */

?>









<header class="z-50 relative ">
    <div class="aa-wrapper  flex justify-between  items-center  z-50">
        <a href="<?php echo(home_url()); ?>">
            <img class="w-1/2  ml-2.5 mt-2.5 lg:w-full"
                src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_white.svg" />
        </a>

        <button id="button" class="
          aa-gradient
          mr-2
          xl:mr-0
          rounded-full
          w-5
          h-5
          hover:cursor-pointer
          ">
            <span id="menu" class="
            flex flex-col
            transition-all
            ease-in-out
            duration-300
            justify-center
            items-center
          ">
                <span id="firstSpan" class="w-2 h-0.25 bg-white mb-0.5 transition"></span>
                <span id="secondSpan" class="w-2 h-0.25 bg-white mb-0.5"></span>
                <span id="thirdSpan" class="w-2 h-0.25 bg-white transition"></span>
            </span>
        </button>
    </div>

</header>
<div id="menuContainer" class="
        z-30
        top-0
        transform
        bg-primary
        transition-all
        ease-in-out
        duration-300
        fixed
        w-full
        h-full
      ">
</div>

<img class="absolute  aa-headerGradient  top-0   w-full" src="
    
     " />


<div id="content" class="site-content">