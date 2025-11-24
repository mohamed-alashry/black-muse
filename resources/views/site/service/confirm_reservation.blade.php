@extends('layouts.site')

@section('title', __('services.Confirm Booking'))
@section('meta_title', __('services.Confirm Booking'))
@section('meta_description', __('services.Confirm Booking'))


@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => ' ',
        'highlight' => __('services.Confirm Booking'),
        'breadcrumb' => $reservationData['service_name'] . ' / ' . $reservationData['package_name'],
    ])

    <!-- Section -->
    <section class="py-5 bg-main">
        <div class="container">
            <div class="row align-items-center">
                <div class="table-profile col-md-12">
                    @if ($reservationData['service_category'] == 'photography')
                        <div class="table-header">
                            <h4 class="">{{ __('services.You need to pay a down payment') }}</h4>
                            <h3 class="text-gold">
                                {{ number_format($reservationData['down_payment'], 0) }}
                                <span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                            </h3>
                        </div>
                    @else
                        <div class="table-header">
                            <h4 class="">{{ __('services.You need to pay') }}</h4>
                            <h3 class="text-gold">
                                {{ number_format($reservationData['total_price'], 0) }}
                                <span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                            </h3>
                        </div>
                    @endif
                    <div class="row d-flex px-2 py-4">
                        <div class="col-md-8">
                            @if (isset($termsPage))
                                @foreach ($termsPage->sections as $key => $section)
                                    <div class="fw-lighter d-flex flex-column gap-4">
                                        {!! $section->content !!}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="down-package-card bg-main">
                                <div class="header-card">
                                    <h6>{{ $reservationData['package_name'] }}</h6>
                                    <h3 class="text-gold">
                                        {{ number_format($reservationData['total_price'], 0) }}
                                        <span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                                    </h3>
                                </div>
                                @if (isset($reservationData['features']) && is_array($reservationData['features']))
                                    @foreach ($reservationData['features'] as $feature)
                                        <p>{{ getTranslation($feature['name']) }}</p>
                                    @endforeach
                                @else
                                    <p>{{ __('services.No features selected.') }}</p>
                                @endif
                            </div>

                            <div class="rounded-5" style="border: 1px solid rgba(255, 255, 255, 0.1)">
                                <form method="POST"
                                    action="{{ $reservationData['service_category'] == 'photography' ? route('payment.booking.checkout') : route('payment.order.checkout') }}">
                                    @csrf

                                    <div class="p-3 d-flex align-items-center flex-column gap-2">
                                        <button type="submit" class="btn text-black bg-white rounded-4 px-4">
                                            <i class="far fa-credit-card"></i>
                                            {{ __('services.Confirm Booking') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
