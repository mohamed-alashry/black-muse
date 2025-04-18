@extends('layouts.site')

@section('title', 'Our Portfolio')

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => 'Our',
        'highlight' => 'Portfolio',
        'breadcrumb' => 'Portfolio'
    ])


  @include('partials.site.portfolio-section')

  @include('partials.site.about')


@endsection
