@extends('layouts.app')

@section('hero')
@php
[$tagline, $desc, $url] = homepage_settings();
@endphp
<x-hero :actionLink="['url' => $url, 'text' => '👋 Meet Personally']" :title="$tagline" :subtitle="$desc" />
@endsection
@section('content')
<section class="bg-gray-100 py-10 md:py-16 px-5 md:px-9">
    <div class="md:mx-auto md:max-w-[670px] xl:max-w-[960px] grid grid-1 gap-y-10 xl:gap-y-24">
        @foreach(get_custom_categories() as $cat)
          @php
          $query = new WP_Query(
            array(
              'posts_per_page'=> 3,
              'cat' => $cat['term_id'],
              'order' => 'DESC',
              'post_type' => 'post',
              'post_status' => 'publish',
            )
          );
          @endphp
          @if($query->have_posts())
          <div>
              <div class="flex justify-between items-center pb-5">
                  <h3 class="font-bold capitalize text-gray-800 text-xl xl:text-[26px]">{{ $cat['name'] }}</h3>
                  <a class="py-2 px-3 bg-white text-sm xl:text-base rounded-lg text-center border border-gray-200 hover:bg-gray-800 hover:border-gray-800 hover:text-white my-transition" href="{{ $cat['url'] }}">
                      View all
                  </a>
              </div>
              <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-4 md:grid-cols-1 gap-y-4 xl:gap-y-5">
                  @while($query->have_posts())
                    @php $query->the_post() @endphp
                    <x-post />
                  @endwhile
              </div>
          </div>
          @php wp_reset_postdata(); @endphp
          @endif
        @endforeach
    </div>
</section>
@endsection
