@extends('layouts.site')

@section('title', 'Contact Us')

@section('content')

  <!-- hero section -->
   @include('partials.site.hero-section', [
        'title' => 'Our',
        'highlight' => 'Contact Us',
        'breadcrumb' => 'Contact Us'
    ])

  <!-- About Section -->
  <section class="bg-main py-5">
    <div class="container">
      <div class=" row col-gap-md-4 gap-4">
        
         <form id="contactForm" class="col-md-5 col-12 gap-3 gap-md-0 row contact-us-form">
          @csrf

          <div id="formMsg" class="text-white mt-3"></div>
         
          <div class="col-12 col-md-6">
            <input type="email" name="email" class="form-control bg-main rounded-4" placeholder="Email address">
          </div>

          <div class="col-12 col-md-6">
            <input type="text" name="name" class="form-control bg-main rounded-4" placeholder="Full Name">
          </div>

          <div class="">
            <input type="text" name="subject" class="form-control bg-main rounded-4" placeholder="Subject">
          </div>

          <div class="">
            <textarea name="message" class="form-control bg-main rounded-4" placeholder="Your message here..." rows="3"></textarea>
          </div>

          <button type="submit" class="btn bg-white rounded-4 py-1 px-4 w-50 mx-auto" id="submitBtn">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> Send Now
          </button>

          
        </form>

          <div class="col-12 col-md-7" >
            <div class="d-flex flex-column gap-3 text-white ">
              <h2 class="fw-lighter text-white">
                About
                <strong class="text-gold">Black Muse</strong>
              </h2>
              <p class="fw-lighter fs-5"> My journey behind the lens began in 2012 when I chose photography as an elective
                course at
                King Abdulaziz University in Jeddah a surprising pairing with my medical studies. Graduating in 2015, I held not
                only a degree but also a passion yearning for expression.</p>
              <div>
                <h6 class="fs-4">
                  Honing My Craft and Building My Studio: Between 2015
                </h6>
                <p class="fw-lighter fs-5">
                  and 2019, I dedicated myself to refining my photography skills under the guidance of world-class trainers and
                  photographers. In 2018, my dream of establishing 'Reem Awad Studio' became a reality
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@push('scripts')
<script src="{{ asset('js/pages/contact.js') }}"></script>
@endpush

@endsection
