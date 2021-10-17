</main>
</div>
<div class="wrapper w-full mb-2.5   px-2 md:px-5 xl:px-20">



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
            <a target="_blank" rel="noopener noreferrer“ href=" {{ $link['url'] }}">
              <img class="w-4 h-4 mr-1 md:mr-2" src="@asset('images/instagram.svg')" alt="{{$link['title']}}" /></a>
          </li>
          @break
          @case(str_contains($link['url'], 'facebook'))
          <li class="pl-0 mb-0">
            <a target="_blank" rel="noopener noreferrer“ href=" {{ $link['url'] }}">
              <img class="w-4 h-4 mr-1 md:mr-2" src="@asset('images/facebook.svg')" alt="{{$link['title']}}" /></a>
          </li>
          @break
          @case(str_contains($link['url'], 'twitch'))
          <li class="pl-0 mb-0">
            <a target="_blank" rel="noopener noreferrer“ href=" {{ $link['url'] }}">
              <img class="w-4 h-4 mr-1 md:mr-2" src="@asset('images/twitch.svg')" alt="{{$link['title']}}" /></a>
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