@extends('layouts.site')

@section('title', "Confirm Booking")
@section('meta_title', "Confirm Booking")
@section('meta_description', "Confirm Booking")


@section('content')
    <!-- hero section -->
     @include('partials.site.hero-section', [
         'title' => 'Your Booking  ',
         'highlight' => 'Details',
         'breadcrumb' => $booking->service->name .' / '.$booking->package->name.' / '.$booking->reference_number
     ])

<!-- Section -->
  <section class="py-5 bg-main">
    <div class="container">
      <div class="table-profile">
                <div class="table-header">
                  <h5 class="fw-light">{{$booking->service->name}} - {{$booking->package->name}} </h5>
                  <h3 class="text-gold">
                    {{$booking->total_price}}<span class="fs-6 fw-lighter">SAR</span>
                  </h3>
                </div>
                <div class="row p-4">
                  <!-- First Section -->
                  <div class="col-md-9">
                    <div class="row row-cols-3 fs-6">
                    
                      <div class="col">
                        <p class="fw-lighter">Booking Number:</p>
                        <p>{{$booking->reference_number}}</p>
                      </div>
                      
                      <div class="col">
                        <p class="fw-lighter">Event Date:</p>
                        <p>{{\Carbon\Carbon::parse($booking->event_date)->format('d-m-Y')}}</p>
                      </div>

                      <div class="col">
                        <p class="fw-lighter">Total Amount: </p>
                        <p>
                          {{$booking->total_price}} 
                          <span class="fs-6 fw-lighter">SAR</span>
                        </p>
                      </div>
                    </div>

                     <div class="row row-cols-3 fs-6" style="margin-top:20px;">
                      <div class="col">
                        <p class="fw-lighter">Paid Amount: </p>
                        <p>
                          {{$booking->paid_amount}} 
                          <span class="fs-6 fw-lighter">SAR</span>
                        </p>
                      </div>

                      <div class="col">
                        <p class="fw-lighter">Booking Status: </p>
                        <p>
                          {{ ucfirst($booking->booking_status) }}
                        </p>
                      </div>

                      <div class="col">
                        <p class="fw-lighter">Payment Status: </p>
                        <p>
                          {{ ucwords(str_replace('_', ' ', $booking->payment_status)) }}
                        </p>
                      </div>
                     </div>

                     <div class="row fs-6" style="margin-top:40px;">
                          <div class="col-12">
                              <p class="fw-lighter">Features:</p>
                          </div>
                          <div class="row">
                              @foreach($booking->package->features as $feature)
                                  <div class="col-4 mb-2"> 
                                      {{ $feature->name }}
                                  </div>
                              @endforeach
                          </div>
                      </div>
                    
                  </div>
                  <div class="col-md-3">
                    <div class="h-100 w-100 rounded-4 overflow-hidden position-relative text-center">
                      <img src="{{ asset('storage/'.$booking->service->photo) }}" class="w-100 h-100 object-fit-contain" alt="imagecard">
                      <p class="position-absolute bottom-0 bg-main w-100 p-1 rounded-4">Wedding Services </p>
                    </div>
                  </div>
                </div>

              </div>
    </div>
  </section>
@endsection
