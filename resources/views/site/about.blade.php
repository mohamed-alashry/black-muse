@extends('layouts.site')

@section('title', $aboutPage->title)
@section('meta_title', $aboutPage->meta_title)
@section('meta_description', $aboutPage->meta_desc)

@section('content')

  <!-- hero section -->
   @include('partials.site.hero-section', [
        'title' => 'Know More',
        'highlight' => 'About Us',
        'breadcrumb' => 'About Us'
    ])

   <!-- sections -->
  @foreach($aboutPage->sections()->where('status', 'active')->orderBy('sort')->get() as $section)
   {!! $section->content !!}
  @endforeach


@endsection