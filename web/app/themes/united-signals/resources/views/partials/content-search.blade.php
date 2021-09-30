<article {{ post_class() }}>

    @if (get_post_type() === 'post')
        <time class="overline mb-1" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
    @endif
    <h2 class="entry-title mb-1"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    <div class="entry-summary mb-2">
        @if (get_post_type() === 'post')
            @if (get_field('intro_text'))
                <p>{{ get_field('intro_text') }}</p>
            @endif
        @endif
    </div>
    <hr class="mb-6">
</article>
