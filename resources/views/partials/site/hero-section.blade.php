<section class="hero-inner bg-main">
  <div class="text-hero">
    <h1 class="mb-1 fs-1 fw-lighter">{{ $title ?? '' }} <strong class="text-gold">{{ $highlight ?? '' }}</strong></h1>
    <div aria-label="text-center text-white">
      <a class="text-white fs-5 fw-lighter" href="{{ route('site.home') }}">Home</a>
      <span class="fw-lighter fs-5">/</span>
      <span class="text-white fs-5 fw-lighter">{{ $breadcrumb ?? '' }}</span>
    </div>
  </div>
</section>