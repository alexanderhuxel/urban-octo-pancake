@if (get_the_title() == 'datenschutzerklaerung')

<style>
    p,
    h1,
    h2,
    h3,
    h4,
    li {
        color: white !important;
    }
</style>
@php
the_content();
@endphp

@else
@php
the_content()
@endphp
@endif
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav">
    <p>' . __('Pages:', 'sage'), 'after' => '</p>
</nav>']) !!}