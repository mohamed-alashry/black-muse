@extends('layouts.site')

@section('title', $homePage->title)
@section('meta_title', $homePage->meta_title)
@section('meta_description', $homePage->meta_desc)

@section('content')
    <!-- hero section -->
    <section class="hero bg-main">
        <div class="text-hero">
            <h1 class=" mb-1 fs-1 fw-lighter">Explore <strong class="text-gold"> Black Muse</strong></h1>
            <h2 class="fs-1 fw-lighter">Photography Studio </h2>
        </div>
        <div class="w-100 overflow-hidden">
            <img src="{{ asset('images/heroImg.png') }}" class="w-100" alt="">
        </div>
    </section>

    <!-- Services section -->
    <section class="bg-main py-5" id="services">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="text-white fw-lighter">
                    <h2 class="fw-lighter">Our <strong class="text-gold">Black Muse</strong> Services</h2>
                    <p class="fs-4">What we offer</p>
                </div>
                <!-- <a class="d-flex align-items-center text-secondary gap-1 btn">
                    <p>View All</p>
                    <i class="fa-solid fa-chevron-right"></i>
                </a> -->
            </div>

         <div class="services-carousel owl-carousel">
             <!-- Services slider -->
            @foreach($services->where('category', 'photography') as $service)
                    <div class="service-card">
                        <img src="{{ asset('storage/'.$service->photo) }}" alt="imagecard">
                        <div class="info-service px-1 py-3">
                            <h5>{{$service->name}}</h5>
                            <button
                              type="button"
                              class="btn btn-service"
                              @if(auth('client')->check())
                                data-bs-toggle="modal"
                                data-bs-target="#calendarModalToggle"
                                data-service-id="{{ $service->id }}"
                              @else
                                data-bs-toggle="modal"
                                data-bs-target="#loginModal"
                              @endif
                            >
                              Choose a Package Now
                            </button>
                        </div>
                    </div>
            @endforeach
         </div>
        </div>
      </section>

    <!-- Portfolio section -->
      <section class="bg-main py-3 porto-section" id="protofolios" style="background-image: url({{asset('images/portohero.png')}});">
          <div class="row h-100">
            <div class="col-md-4 my-auto">
              <div class="porto-summry text-white d-flex flex-column gap-2 z-3 mb-2 mx-md-5 mx-2">
                <p class="fw-lighter">protofolio Category</p>
                <h1 class="text-gold lh-1">Black Muse</h1>
                <h1 class="fw-bolder lh-1">Portfolio classic</h1>
                <p class="fw-lighter">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
              </div>
            </div>
            <div class="col-md-8 mt-auto ps-md-5">
              <div class="portfolio-carousel owl-carousel z-3">

                <!-- Portfolios slider-->
                @foreach($portfolios as $portfolio)
                   <div class="porto-card ">
                    <a href="{{ route('site.portfolio.show', $portfolio->id) }}">
                       <img class="porto-img" src="{{ asset('storage/'.$portfolio->photo) }}" alt="imagecard">
                       <p class="porto-title w-75 text-wrap">{{$portfolio->title}}</p>
                    </a>
                  </div>
                @endforeach

              </div>
            </div>
          </div>
     </section>


    <!-- Bindery & Lab section -->
    <section class="bg-main py-5" id="binderies">
        <div class="container">
            <div class="respnsive-section">
                <div class="fw-lighter">
                    <h2 class="fw-lighter text-white"><strong class="text-gold">Bindery & Lab</strong> Services</h2>
                    <p class="fs-4 text-white">Explore More!</p>
                    <a class="d-flex align-items-center text-secondary gap-1 btn">
                        <p>View All</p>
                        <i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
                <!-- Two example cards -->
                @foreach($services->where('category', '!=', 'photography') as $service)
                    <div class="service-card">
                        <img src="{{ asset('storage/'.$service->photo) }}" alt="imagecard">
                        <div class="info-service px-1 py-3">
                                <h5>{{ $service->name  }}</h5>
                            <button class="btn btn-service" type="button">Choose a Package Now</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- sections -->
    @foreach($homePage->sections as $key => $section)
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


    @include('partials.site.modals.booking_date')


@endsection
