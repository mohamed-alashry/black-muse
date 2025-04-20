@extends('layouts.site')

@section('title', $portfolio->title)
@section('meta_title', $portfolio->meta_title)
@section('meta_description', $portfolio->meta_desc)

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
        'highlight' => $portfolio->title,
        'breadcrumb' => $portfolio->title
    ])

    <!-- sections -->
    @foreach($portfolio->items as $key => $item)
        @if($key % 2 == 0)
            <section class="about-section py-5 bg-main">
        @else
            <section class="about-section py-5"
                     style="background-image: url({{asset('images/about-bg.png')}});">
        @endif
                <div class="container d-flex flex-column gap-3 text-white">
                    {!! $item->content !!}
                </div>
            </section>
    @endforeach


@endsection



