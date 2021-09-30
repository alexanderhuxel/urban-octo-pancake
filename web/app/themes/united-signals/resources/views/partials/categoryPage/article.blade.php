<?php
/**
 * Template part for displaying posts
 */

?>


@if ($wp_query->have_posts())
@while ($wp_query->have_posts())
@php
$wp_query->the_post();
@endphp
<article id="post-{{ the_ID() }}" class="entry">
    <a class="group" href="<?php the_permalink(); ?>">
        <div class="
    			news-element
    			flex-col
    			md:flex-row
    			pt-3
    			md:pt4
    			pb-5
    			flex
    			border-b
    			">
            <div class=" flex w-full lg:w-1/2 justify-center items-center h-auto overflow-hidden">
                <img class="
    				h-36
    				w-full
    				md:max-h-20
    				lg:max-h-full
    				md:w-21
    				md:h-21
                    mb-2
    				border
    				transition-all
    				ease-in-out
    				duration-500
    				group-hover:scale-110
    				aa-customImgSize
    				object-cover
    				" src="
    
                    @if (has_post_thumbnail()) 
                            @php
    						the_post_thumbnail();
                            @endphp
                    @else 
    						 {{ get_template_directory_uri() }}/assets/images/img/newsFallback.jpg" />

                @endif
            </div>


            <div class="news-text w-4/5 ml-3 flex justify-between flex-col">
                <p class="mb-0.5 text-gray-300    overline">
                    {{ the_time("H:i d.m.y")}} /
                    @php
                    global $post;
                    $cat = get_the_category($post->id);
                    $categoryName = $cat[0]->name;
                    @endphp

                    {{ $categoryName}}
                    /
                    {{ get_the_author() }}
                </p>
                <h5 class="h5 text-black">
                    {{ the_title() }}
                </h5>
                <p class="mb-1">
                    {{ the_content() }}
                </p>
                <p class="
    				text-primary
    				group-hover:text-gray-400
    				duration-500
    				transition-all
    				ease-in-out
                    mt-2
    				">
                    weiterlesen
                </p>
            </div>
        </div>
    </a>
</article>
@endwhile

@endif