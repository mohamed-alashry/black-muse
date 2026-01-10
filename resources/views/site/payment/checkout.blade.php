@extends('layouts.site')

@section('title', __('site.checkout'))
@section('meta_title', __('site.checkout'))
@section('meta_description', __('site.checkout'))


@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => ' ',
        'highlight' => __('site.checkout'),
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
