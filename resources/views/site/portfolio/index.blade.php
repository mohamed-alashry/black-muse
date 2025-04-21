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
    @foreach($portfolioPage->sections as $key => $section)
        @if($key % 2 == 0)
            <section class="about-section py-5 bg-main">
                @else
                    <section class="about-section py-5"
                             style="background-image: url({{asset('images/about-bg.png')}});">
                        @endif
                        <div class="container d-flex flex-column gap-3 text-white">
                            {!! $section->content !!}
                        </div>
                    </section>
            @endforeach

@endsection
