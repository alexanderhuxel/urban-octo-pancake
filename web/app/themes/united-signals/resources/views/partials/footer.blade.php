</main>
</div>
<div class="wrapper w-full    px-2 md:px-5 xl:px-20">



  <footer class="flex flex-col items-center lg:items-end w-full h-auto">

    <div class="flex flex-col md:flex-row flex-wrap justify-end">

      {{ wp_nav_menu(array(
            'menu' => 'footerMenu')
        ) }}

      <div class="flex items-center justify-center md:justify-between">
        <ul class="list-none mb-0 items-center pl-0 flex ">
          @if (have_rows('footerSlots','option'))
          @while (have_rows('footerSlots','option'))
          @php
          the_row();
          $link = get_sub_field('footerLink','option');
          @endphp
          @switch($link['url'])
          @case(str_contains($link['url'], 'instagram'))
          <li class="pl-0 mb-0">
            <a target="_blank" rel="noopener noreferrer" href=" {{ $link['url'] }}">
              <img class="w-4 h-4 mr-1 md:mr-2" src="@asset('images/social/instagram.png')"
                alt="{{$link['title']}}" /></a>
          </li>
          @break
          @case(str_contains($link['url'], 'facebook'))
          <li class="pl-0 mb-0">
            <a target="_blank" rel="noopener noreferrer" href="{{ $link['url'] }}">
              <img class="w-4 h-4 mr-1 md:mr-2" src="@asset('images/social/facebook.png')"
                alt="{{$link['title']}}" /></a>
          </li>
          @break
          @case(str_contains($link['url'], 'twitch'))
          <li class="pl-0 mb-0">
            <a target="_blank" rel="noopener noreferrer href=" {{ $link['url'] }} ">
              <img class=" w-4 h-4 mr-1 md:mr-2" src="@asset('images/social/twitch.png')"
              alt="{{$link['title']}}" /></a>
          </li>
          @break

          @endswitch

          @endwhile
          @endif
        </ul>
      </div>
    </div>
  </footer>
  <div>



    {{-- <div class="text-white-100 flex items-center mr-5">Icons made by
      <a href="https://www.flaticon.com/authors/hight-quality-icons" title="Hight Quality Icons">Hight
        Quality Icons</a>
      from
      <a href="https://www.flaticon.com/" title="Flaticon">
        www.flaticon.com
      </a>
    </div> --}}