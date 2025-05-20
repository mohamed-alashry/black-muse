@extends('layouts.site')

@section('title', $aboutPage->title)
@section('meta_title', $aboutPage->meta_title)
@section('meta_description', $aboutPage->meta_desc)

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
         'title' => "",
         'highlight' => __('site.about_us'),
         'breadcrumb' => __('site.about_us')
     ])

    <!-- sections -->
    @foreach($aboutPage->sections as $key => $section)
        @if($key % 2 == 0)
            <section class="about-section py-5 bg-main">
        @else
            <section class="about-section py-5" style="background-image: url({{ asset('images/about-bg.png') }});">
        @endif
                <div class="container d-flex flex-column gap-3 text-white">
                    {!! $section->content !!}

                    @if($section->photos && count($section->photos))
                        <div class="row">
                            @foreach($section->photos as $photo)
                                <a href="{{ asset($photo) }}" class="m-2" target="_blank" style="max-width: 30%">
                                    <img src="{{ asset($photo) }}" alt="" class="img-fluid">
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
    @endforeach

@endsection
