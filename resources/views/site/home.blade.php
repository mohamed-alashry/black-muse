@extends('layouts.site')

@section('title', $homePage->title)
@section('meta_title', $homePage->meta_title)
@section('meta_description', $homePage->meta_desc)

@section('content')
    <button id="backToTopBtn" title="@lang('site.go_to_top')">↑</button>

    <div class="position-relative">
        @include('partials.site.navbar')
        <section class="hero">
            <video autoplay muted loop preload="auto" playsinline>
                <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
            </video>
        </section>
    </div>

    <!-- Services section -->
    <section class="bg-main py-5" id="services">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-white fw-lighter">
                    <h2 class="fw-lighter">@lang('site.our') <strong class="text-gold">Black Muse</strong> @lang('site.our_services')
                    </h2>
                    <p class="fs-4">@lang('site.what_we_offer')</p>
                </div>
            </div>

            <div class="services-carousel owl-carousel">
                @foreach ($services->where('category', 'photography') as $service)
                    <div class="service-card">
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="imagecard">
                        <div class="info-service px-1 py-3">
                            <h5>{{ $service->name }}</h5>
                            <button type="button" class="btn btn-service"
                                @if (auth('client')->check()) data-bs-toggle="modal"
                            data-bs-target="#calendarModalToggle"
                            data-service-id="{{ $service->id }}"
                          @else
                            data-bs-toggle="modal"
                            data-bs-target="#loginModal" @endif>
                                @lang('site.choose_package_now')
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Portfolio photography section -->
    <section class="bg-main py-3 porto-section" id="protofolios"
        style="background-image: url({{ asset('images/portohero.png') }});">
        <div class="row h-100">
            <div class="col-md-4 my-auto">
                <div class="porto-summry text-white d-flex flex-column gap-2 z-3 mb-2 mx-md-5 mx-2">
                    <p class="fw-lighter">@lang('site.portfolio_category')</p>
                    <h1 class="text-gold lh-1">Black Muse</h1>
                    <h1 class="fw-bolder lh-1">@lang('site.portfolio_photography')</h1>
                    {{-- <p class="fw-lighter">@lang('site.portfolio_description')</p> --}}
                </div>
            </div>
            <div class="col-md-8 mt-auto ps-md-5 mb-4">
                <div class="portfolio-carousel owl-carousel z-3">
                    @foreach ($portfolios->where('category', 'photography') as $portfolio)
                        <div class="porto-card ">
                            <a href="{{ route('site.portfolio.show', $portfolio->id) }}">
                                <img class="porto-img" src="{{ asset('storage/' . $portfolio->photo) }}" alt="imagecard">
                                <p class="porto-title w-75 text-wrap">{{ $portfolio->title }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio bindery section -->
    <section class="bg-main pt-5">
        <div class="container" id="binderies">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-white fw-lighter">
                    <h2 class="fw-lighter">@lang('site.our') <strong class="text-gold">Black Muse</strong> @lang('site.portfolio_bindery')
                    </h2>
                </div>
            </div>

            <div class="portfolio-carousel owl-carousel">
                @foreach ($portfolios->where('category', 'bindery') as $portfolio)
                    <div class="service-card">
                        <a href="{{ route('site.portfolio.show', $portfolio->id) }}">
                            <img src="{{ asset('storage/' . $portfolio->photo) }}" alt="imagecard">
                            <div class="info-service">
                                <h5>{{ $portfolio->title }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div><br>
    </section>

    <!-- Bindery & Lab section -->
    <section class="bg-main pb-5"><br>
        <div class="container">
            <div class="respnsive-section">
                <div class="fw-lighter">
                    <h2 class="fw-lighter text-white"><strong class="text-gold">@lang('site.bindery_lab')</strong></h2>
                    <p class="fs-4 text-white">@lang('site.explore_more')</p>
                </div>
                @foreach ($services->where('category', '!=', 'photography') as $service)
                    <div class="service-card">
                        <img src="{{ asset('storage/' . $service->photo) }}" alt="imagecard">
                        <div class="info-service">
                            <h5>{{ $service->name }}</h5>
                            @if (auth('client')->check())
                                <a href="{{ route('site.service.packages', $service->id) }}" class="btn btn-service"
                                    type="button">@lang('site.choose_package_now')</a>
                            @else
                                <button type="button" class="btn btn-service" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    @lang('site.choose_package_now')
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Sections from DB -->
    @foreach ($homePage->sections as $key => $section)
        @if ($key % 2 == 0)
            <section class="about-section py-5 bg-main">
            @else
                <section class="about-section py-5" style="background-image: url({{ asset('images/about-bg.png') }});">
        @endif
        <div class="container d-flex flex-column gap-3 text-white">
            {!! $section->content !!}
        </div>
        </section>
    @endforeach

    @include('partials.site.modals.booking_date')

@endsection
