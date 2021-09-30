@php
$anchorjump = strtolower(str_replace(' ', '-', strip_tags(get_field('title'))));
$anchorjump = preg_replace('/[^A-Za-z0-9\-]/', '', $anchorjump);
@endphp

<div class="bg-{{ get_field('background-color') }}">
    <div
        class="content-container @if(get_field('margin_top') === false) {{ 'pt-0' }} @endif @if(get_field('margin_bottom') === false) {{ 'pb-0' }} @endif">
        <span class="anchorjump" id="{{ $anchorjump }}" name="{{ $anchorjump }}"></span>

        <div class="@if(get_field('full_width') === false) container @endif">
            @if(get_field('title') && get_field('show_title') === true && isset($blockHasOwnTitle) &&
            $blockHasOwnTitle === false )
            <h2 class="text-h3 text-secondary mb-5 hyphens-auto reveal">
                {{ the_field('title') }}
            </h2>
            @endif

            @yield('block')
        </div>
    </div>
</div>