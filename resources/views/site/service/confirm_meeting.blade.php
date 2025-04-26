@extends('layouts.site')

@section('title', "Confirm Meeting")
@section('meta_title', "Confirm Meeting")
@section('meta_description', "Confirm Meeting")


@section('content')
    <!-- hero section -->
     @include('partials.site.hero-section', [
         'title' => 'Confirm  ',
         'highlight' => 'Meeting',
         'breadcrumb' => 'Meeting'
     ])


  <section class="py-5 bg-main">
    <div class="container">
      <div class="table-profile">
        <div class="table-header justify-content-center">
          <h4>
            You’ve Successfully Paid the downpayment
            <span class="bg-white text-black rounded px-1">
              <i class="fas fa-check"></i>
            </span>
          </h4>
        </div>
        <div class="row p-4">
          <!-- First Section -->
          <div class="col-md-6">
            <div class="d-flex flex-column gap-2 pt-5">
              <h5>Choose your Meeting way</h5>
              <span class="py-2 fw-lighter">
                Text to explain why user should pay this downpayment Text to
                explain why user should pay this downpayment Text to explain
                why user should pay this downpayment Text to explain why user
                should pay this downpayment Text to explain why user should
                pay this downpayment Text to explain why user should pay this
                downpayment Text should pay this downpayment
              </span>
              <h5 class="fw-bold">List of terms:</h5>
              <ul class="ms-4">
                <li>Text to explain why user should pay</li>
                <li>This downpayment Text to explain why user</li>
                <li>Should pay this downpayment</li>
                <li>Text to explain why user should pay</li>
                <li>This downpayment Text to explain why user</li>
                <li>Should pay this downpayment</li>
                <li>Text to explain why user should pay</li>
                <li>This downpayment Text to explain why user</li>
                <li>Should pay this downpayment</li>
                <li>Text to explain why user should pay</li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="rounded-5" style="border: 1px solid rgba(255, 255, 255, 0.1)">
              <div class="table-header">
                <h5>Your Meeting Details</h5>
              </div>
              <div class="p-4 d-flex flex-column gap-3 align-items-center">
                <button class="btn bg-white text-black rounded-3 w-100">
                  <i class="far fa-calendar-plus"></i>
                  Online Meeting
                </button>
                <button class="btn bg-white text-black rounded-3 w-100">
                  <i class="fa-solid fa-building"></i>
                  Meeting at our Office
                </button>
                <button class="btn bg-white text-black rounded-3 w-100">
                  <i class="fa-solid fa-location-crosshairs"></i> Meeting at
                  your Location
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
