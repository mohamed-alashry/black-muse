@extends('layouts.site')

@section('title', $portfolioPage->title)
@section('meta_title', $portfolioPage->meta_title)
@section('meta_description', $portfolioPage->meta_desc)

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => 'Our',
        'highlight' => 'Portfolio',
        'breadcrumb' => 'Portfolio'
    ])


  @include('partials.site.portfolio-section')

  <!-- sections -->
  @foreach($portfolioPage->sections()->where('status', 'active')->orderBy('sort')->get() as $section)
   {!! $section->content !!}
  @endforeach

@endsection
