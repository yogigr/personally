@extends('layouts.app')
@section('hero')
  <x-hero 
    :title="$title"
    :post="$meta"
  />
@endsection
@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
  @endwhile
@endsection
