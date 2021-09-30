<header id="mobileMenu" class="z-50 lg:mx-0 lg:pt-0 mx-2 pt-2 relative ">
    <div class="aa-wrapper  flex justify-between  items-center  z-50">
        <a href="<?php echo(home_url()); ?>">
            <img class="w-1/2    lg:w-full"
                src="{{ get_template_directory_uri() }}/assets/images/logo/logo_white.svg" />
        </a>

        <button id="button" class="
        xl:mr-0
        rounded-full
        w-5
        h-5
        transition-all
        ease-in-out
        duration-1000
        hover:cursor-pointer
        ">
            <span id="menu" class="
        flex flex-col
        transition-all
        ease-in-out
        duration-1000
        rounded-full
        w-5
        h-5
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
<div id="menuContainer" class="absolute transform ease-in-out  duration-300 transition-all z-30 inset-0">
    @include('partials.frontpage.menuContainer')
</div>


<img class="absolute  .aa-imageLinearTopToBottomGradient  top-0   w-full" src="
        @if (has_post_thumbnail())
            {{the_post_thumbnail()}}
        @else 
            {{ get_template_directory_uri() . "/assets/images/header/headerFallback.jpg" }} " />
@endif
<main id=" main" class="site-main    
	aa-wrapper
    mobilemenu--open
	shadow-large
	mt-24
	md:mt-48
	relative
	h-full
	mb-5
	bg-white
	z-20
	pt-10" role="main">