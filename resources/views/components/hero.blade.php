@props([
  'actionLink' => [],
  'title',
  'subtitle' => '',
  'post' => [] 
])

<section class="bg-white py-16 md:pt-24 xl:pt-32 xl:pb-20 px-5 xl:px-10">
    <div id="wrapper" class="mx-auto max-w-md md:max-w-[520px] xl:max-w-[970px] text-center flex flex-col gap-y-4 xl:gap-y-5">
        @if($actionLink && $actionLink['url']) 
        <a href="{{ $actionLink['url'] }}" type="button" target="_blank" class="bg-gray-100 py-2 px-3 rounded-full text-gray-800 font-medium self-center my-transition hover:bg-gray-800 hover:text-white">
            {{ $actionLink['text'] }}
        </a>
        @endif
        <h1 id="hero-title" class="opacity-0 text-3xl md:text-[46px] xl:text-[64px] font-bold leading-tight text-gradient">{{ $title }}</h1>
        @if($subtitle)
          <p class="text-gray-500 text-2xl font-light xl:mx-auto xl:max-w-[690px]">
            {{ $subtitle }}
          </p>
        @endif
        @if($post)
          <div class="uppercase flex justify-center gap-x-3 items-center">
            <span class="font-light text-gray-500">{{ $post['date'] }}</span>
            <span>•</span>
            <span class="text-gray-800">{{$post['category']}}</span>
          </div>
        @endif
    </div>
</section>