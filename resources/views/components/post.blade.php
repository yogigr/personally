<article class="bg-white rounded-3xl border border-white hover:border-gray-800 transition ease-in-out duration-500">
    <a class="" href="{{ get_permalink() }}">
        <div class="flex flex-col md:flex-row md:p-6 md:items-center {{ has_post_thumbnail() ? 'md:gap-x-7' : '' }}">
            <div class="py-5 px-4 md:p-0 flex flex-col gap-y-3 {{ has_post_thumbnail() ?  'md:basis-2/3' : ''}}">
                <p class="text-gray-500 uppercase md:text-sm">{{ get_the_date() }}</p>
                <h3 class="font-semibold text-xl xl:text-2xl text-gray-800 capitalize">{{ the_title("", "", false) }}</h3>
                <p class="hidden md:block text-gray-600 xl:text-lg">{{ get_the_excerpt() }}</p>
            </div>
            @if(has_post_thumbnail())
            <div class="relative w-full h-[200px] md:h-[170px] xl:h-[210px] md:basis-1/3">
                <img alt="10 hilarious cartoons that depict Reat-life Problems of programmers Image" loading="lazy" decoding="async" data-nimg="fill" class="rounded-b-3xl md:rounded-xl my-transition opacity-100" src="{{ get_the_post_thumbnail_url() }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; object-fit: cover; color: transparent;">
            </div>
            @endif
        </div>
    </a>
</article>
