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

<!-- Schedule section -->
<section class="bg-d-gray">
  <div class="container py-3 d-flex justify-content-between align-items-center">
    <h4 class="text-white fw-lighter">
      Schedule a <strong class="text-gold">Call or Meeting!</strong>
    </h4>
    <div class="d-flex gap-2">
      <button class="btn btn-outline-light rounded-4"><i class="fa-solid fa-arrow-right-to-bracket"></i> Schedule Call</button>
      <button class="btn bg-white text-black rounded-4"><i class="fa-solid fa-user-plus"></i> Schedule Call</button>
    </div>
  </div>
</section>

<!-- Services section -->
<section class="bg-main py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div class="text-white fw-lighter">
        <h2 class="fw-lighter">Our <strong class="text-gold">Black Muse</strong> Services</h2>
        <p class="fs-4">What we offer</p>
      </div>
      <a class="d-flex align-items-center text-secondary gap-1 btn">
        <p>View All</p>
        <i class="fa-solid fa-chevron-right"></i>
      </a>
    </div>
    <!-- Services slider -->
    <div class="services-carousel owl-carousel">
      <div class="service-card">
        <img src="{{ asset('images/imagecard.png') }}" alt="imagecard">
        <div class="info-service px-1 py-3">
          <h5>Wedding Services</h5>
          <button class="btn btn-service" type="button">Choose a Package Now</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Portfolio Category -->
@include('partials.site.portfolio-section')

<!-- Bindery & Lab section -->
<section class="bg-main py-5">
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
      @for ($i = 0; $i < 2; $i++)
      <div class="bindery-card">
        <img src="{{ asset('images/imagecard.png') }}" alt="imagecard">
        <div class="info-bindery p-3">
          <div class="d-flex justify-content-between align-items-center">
            <h5>Wedding Services</h5>
            <div>
              <span class="fw-lighter">starts from</span>
              <div class="d-flex align-items-center gap-1">
                <p class="fs-4 lh-1">200</p>
                <span class="text-uppercase fw-lighter lh-1">SAR</span>
              </div>
            </div>
          </div>
          <button class="btn btn-bindery" type="button">Choose a Package Now</button>
        </div>
      </div>
      @endfor
    </div>
  </div>
</section>

<!-- sections -->
@foreach($homePage->sections()->where('status', 'active')->orderBy('sort')->get() as $section)
 {!! $section->content !!}
@endforeach




@endsection
