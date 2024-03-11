<article class="bg-white">
    @if(has_post_thumbnail())
    <div class="sm:mx-auto sm:max-w-[600px] md:max-w-[670px] xl:max-w-[1100px]">
        <div class="relative w-full h-[300px] md:h-[400px] xl:h-[580px]">
            <img alt="10 hilarious cartoons that depict Reat-life Problems of programmers Image" loading="lazy" decoding="async" data-nimg="fill" class="sm:rounded-lg my-transition opacity-100" src="{{ get_the_post_thumbnail_url() }}" style="position: absolute; height: 100%; width: 100%; inset: 0px; object-fit: cover; color: transparent;">
        </div>
    </div>
    @endif

    <div class="py-6 xl:py-12 px-5 bg-white">
        <div class="sm:mx-auto sm:max-w-[550px] md:max-w-[600px] xl:max-w-[780px]">
            <div id="content-wrapper" class="flex flex-col gap-4 md:gap-y-5 xl:gap-y-7 font-base text-gray-800">
                @php(the_content())
            </div>
        </div>
    </div>
</article>
