@extends('layouts.site')

@section('title', __("services.View Order"))
@section('meta_title', __("services.View Order"))
@section('meta_description', __("services.View Order"))

@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => " ",
        'highlight' => __("services.View Order"),
        'breadcrumb' => $order->service->name .' / '.$order->package->name.' / '.$order->reference_number
    ])

    <!-- Section -->
    <section class="py-5 bg-main">
        <div class="container">

            <div class="table-profile">
                <div class="table-header">
                    <h5 class="fw-light">{{$order->service->name}} - {{$order->package->name}} </h5>
                    <h3 class="text-gold">
                        {{$order->total_price}}<span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                    </h3>
                </div>
                <div class="row p-4">
                    <!-- First Section -->
                    <div class="col-md-9">
                        <div class="row row-cols-3 fs-6">

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Reference Number') }}:</p>
                                <p>{{$order->reference_number}}</p>
                            </div>

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Total Amount') }}: </p>
                                <p>
                                    {{$order->total_price}}
                                    <span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="row row-cols-3 fs-6" style="margin-top:20px;">
                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Order Status') }}: </p>
                                <p>
                                    {{ __(ucfirst($order->status)) }}
                                </p>
                            </div>
                        </div>

                        <div class="row fs-6" style="margin-top:40px;">
                            <div class="col-12">
                                <p class="fw-lighter">{{ __('services.Features') }}:</p>
                            </div>
                            <div class="row">
                                @foreach($order->package->features as $feature)
                                    <div class="col-4 mb-2">
                                        {{ getTranslation($feature->name) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="h-100 w-100 rounded-4 overflow-hidden position-relative text-center">
                            <img src="{{ asset('storage/'.$order->service->photo) }}"
                                 class="w-100 h-100 object-fit-contain" alt="imagecard">
                            <p class="position-absolute bottom-0 bg-main w-100 p-1 rounded-4">{{$order->service->name}} </p>
                        </div>
                    </div>

                    <a class="btn bg-white text-black w-50 mt-2" href="{{route('site.service.packages', $order->service->id)}}">
                        <i class="fas fa-redo"></i>
                        {{ __('services.Re-order Again') }}
                    </a>

                </div>

            </div>

        </div>
    </section>
@endsection