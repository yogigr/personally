@extends('layouts.app')
@php
[$term_id, $title, $desc] = current_category()
@endphp
@section('hero')

<x-hero :title="$title" :subtitle="$desc" />
@endsection

@section('content')
<section class="bg-gray-100 py-10 px-5">
    <div class="md:mx-auto md:max-w-[670px] xl:max-w-[960px] flex flex-col gap-y-10">
        @php
          $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
          $query = new WP_Query( 
              array(
                  'paged'         => $paged, 
                  'cat'           => $term_id,
                  'order'         => 'DESC',
                  'post_type'     => 'post',
                  'post_status'   => 'publish',
              )
          );
        @endphp
        
            
        @if($query->have_posts())
          <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-x-4 md:grid-cols-1 gap-y-4 xl:gap-y-5">
            @while($query->have_posts())
              @php $query->the_post() @endphp
              <x-post />
            @endwhile
          </div>
          <div id="pagination" class="flex items-center gap-x-1">
            {!! paginate_links([
              'prev_text' => __('« Prev'),
              'next_text' => __('Next »')
            ]) !!}
          </div>
          
          @php wp_reset_postdata(); @endphp
        @endif
        
    </div>
</section>
@endsection
