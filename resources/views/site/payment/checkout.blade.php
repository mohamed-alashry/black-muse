@extends('layouts.site')

@section('title', __('services.Checkout'))
@section('meta_title', __('services.Checkout'))
@section('meta_description', __('services.Checkout'))


@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => ' ',
        'highlight' => __('services.Checkout'),
        // 'breadcrumb' => $reservationData['service_name'] . ' / ' . $reservationData['package_name'],
    ])

    <!-- Section -->
    <section class="py-5 bg-main">
        <div class="container">
            <div class="row align-items-center">
                <form action="{{ $redirectUrl }}" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>
            </div>
        </div>
    </section>

    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}" integrity="{true}"
        crossorigin="anonymous"></script>
@endsection
