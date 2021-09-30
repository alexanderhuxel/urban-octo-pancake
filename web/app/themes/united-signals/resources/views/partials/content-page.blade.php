<div class="px-2.5 sm:px-5 md:px-7 lg:px-10">


    <div class="box mt-7 flex lg:flex-col flex-col">
        @php
        the_content()
        @endphp
    </div>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav">
        <p>' . __('Pages:', 'sage'), 'after' => '</p>
    </nav>']) !!}