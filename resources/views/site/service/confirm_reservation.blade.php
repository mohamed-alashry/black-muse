@extends('layouts.site')

@section('title', "Confirm Booking")
@section('meta_title', "Confirm Booking")
@section('meta_description', "Confirm Booking")


@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => 'Confirm  ',
        'highlight' => 'Booking',
        'breadcrumb' => $reservationData['service_name'] .' / '.$reservationData['package_name']
    ])

    <!-- Section -->
    <section class="py-5 bg-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="table-profile col-md-12">
                    <div class="table-header">
                        <h4 class="">You need to pay a down payment</h4>
                        <h3 class="text-gold">
                            {{ number_format($reservationData['down_payment'], 0) }}
                            <span class="fs-6 fw-lighter">SAR</span>
                        </h3>
                    </div>
                    <div class="row d-flex px-2 py-4">
                        <div class="col-md-8">
                           @foreach($termsPage->sections as $key => $section)
                            <div class="fw-lighter d-flex flex-column gap-4">
                              {!! $section->content !!}
                            </div>
                           @endforeach
                        </div>
                        <div class="col-md-4">
                            <div class="down-package-card bg-main">
                                <div class="header-card">
                                    <h6>{{$reservationData['package_name']}}</h6>
                                    <h3 class="text-gold">
                                        {{ number_format($reservationData['total_price'], 0) }}
                                        <span class="fs-6 fw-lighter">SAR</span>
                                    </h3>
                                </div>
                                @if(isset($reservationData['features']) && is_array($reservationData['features']))
                                    @foreach($reservationData['features'] as $feature)
                                        <p>{{ getTranslation($feature['name']) }}</p>
                                    @endforeach
                                @else
                                    <p>No features selected.</p>
                                @endif
                            </div>

                            <div class="rounded-5" style="border: 1px solid rgba(255, 255, 255, 0.1)">
                                <form method="POST" action="{{ $reservationData['service_category'] == 'photography' ? route('service.booking.store') : route('service.order.store') }}">
                                    @csrf

                                    <div class="p-3 d-flex align-items-center flex-column gap-2">
                                        <button type="submit" class="btn text-black bg-white rounded-4 px-4">
                                            <i class="far fa-credit-card"></i>
                                            Confirm Booking
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>


                <!--   <div class="col-md-4">
          <div class="rounded-5" style="border: 1px solid rgba(255, 255, 255, 0.1)">
            <div class="table-header">
              <h6>Choose your Payment Method</h6>
            </div>
            <div class="p-3 d-flex align-items-center flex-column gap-2">
              <button class="btn text-black bg-white rounded-4 px-4">
                <i class="far fa-credit-card"></i>
                Pay with Debit/Credit Card
              </button>
              <div class="d-flex gap-2">
                <img src="{{ asset('images/mastercard.svg') }}" alt="item" />
                <img src="{{ asset('images/visa.svg') }}" alt="item" />
                <img src="{{ asset('images/ex.svg') }}" alt="item" />
                <img src="{{ asset('images/cash.svg') }}" alt="item" />
              </div>
            </div>
          </div>
        </div> -->
            </div>
        </div>
    </section>
@endsection
