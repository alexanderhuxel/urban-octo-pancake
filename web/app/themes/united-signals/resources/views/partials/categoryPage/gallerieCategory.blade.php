@php
$args = array(
'category_name' => 'Allgemein',
'post_type' => 'attachment'
);

$wp_query = new WP_Query($args);
$attachments = get_posts($args);

// get all ids from atteched imgages push to array and get thumbnail with id


$counter = 0;
@endphp




<div class="mb-5 pb-5 px-10 ">
    <h2 class="mb-2  text-h2 font-bold text-primary">Bildergalerie</h2>
    <div class="grid mb-7 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
        @while ($counter < 8) <div class="overflow-hidden">
            @php
            $counter = $counter +1;
            @endphp

            <a rel="lightbox[gallery-0]" href="">
                <img class="aa-rotate transition-all ease-in-out duration-500"
                    src="{{ get_template_directory_uri() }}/assets/images/img/news.jpg" />
            </a>
    </div>
    @endwhile




</div>
</div>