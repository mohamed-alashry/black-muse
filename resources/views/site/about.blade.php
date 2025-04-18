@extends('layouts.site')

@section('title', 'About Us')

@section('content')

  <!-- hero section -->
   @include('partials.site.hero-section', [
        'title' => 'Know More',
        'highlight' => 'About Us',
        'breadcrumb' => 'About Us'
    ])

    <!-- About -->
  @include('partials.site.about')

@endsection