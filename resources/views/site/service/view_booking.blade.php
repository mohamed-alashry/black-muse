@extends('layouts.site')

@section('title', __('services.Booking Details'))
@section('meta_title', __('services.Booking Details'))
@section('meta_description', __('services.Booking Details'))


@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => ' ',
        'highlight' => __('services.Booking Details'),
        'breadcrumb' =>
            $booking->service->name . ' / ' . $booking->package->name . ' / ' . $booking->reference_number,
    ])


    <!-- Section -->
    <section class="py-5 bg-main" id="details">
        <div class="container">

            <div class="table-profile">
                <div class="table-header">
                    <h5 class="fw-light">{{ $booking->service->name }} - {{ $booking->package->name }} </h5>
                    <h3 class="text-gold">
                        {{ $booking->total_price }}<span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                    </h3>
                </div>
                <div class="row p-4">
                    <!-- First Section -->
                    <div class="col-md-9">
                        <div class="row row-cols-3 fs-6">

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Reference Number') }}:</p>
                                <p>{{ $booking->reference_number }}</p>
                            </div>

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Event Date') }}:</p>
                                <p>{{ \Carbon\Carbon::parse($booking->event_date)->format('d-m-Y') }}</p>
                            </div>

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Total Amount') }}: </p>
                                <p>
                                    {{ $booking->total_price }}
                                    <span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="row row-cols-3 fs-6" style="margin-top:20px;">
                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Paid Amount') }}: </p>
                                <p>
                                    {{ $booking->paid_amount }}
                                    <span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                                </p>
                            </div>

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Booking Status') }}: </p>
                                <p>
                                    {{ __(ucfirst($booking->status)) }}
                                </p>
                            </div>

                            <div class="col">
                                <p class="fw-lighter">{{ __('services.Payment Stage') }}: </p>
                                <p>
                                    {{ __(ucwords(str_replace('_', ' ', $booking->payment_stage))) }}
                                </p>
                            </div>
                        </div>

                        <div class="row fs-6" style="margin-top:40px;">
                            <div class="col-12">
                                <p class="fw-lighter">{{ __('services.Features') }}:</p>
                            </div>
                            <div class="row">
                                @foreach ($booking->package->features as $feature)
                                    <div class="col-4 mb-2">
                                        {{ getTranslation($feature->name) }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="h-100 w-100 rounded-4 overflow-hidden position-relative text-center">
                            <img src="{{ asset('storage/' . $booking->service->photo) }}"
                                class="w-100 h-100 object-fit-contain" alt="imagecard">
                            <p class="position-absolute bottom-0 bg-main w-100 p-1 rounded-4">{{ $booking->service->name }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            @if ($booking->remaining_amount > 0)
                <br>
                <div class="table-profile">
                    <div class="table-header">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-credit-card fs-3"></i>
                            <div class="d-flex flex-column gap-2 fw-light">
                                <h4 class="">{{ __('services.Pay the Rest of amount') }}</h4>
                                <p class="">Ref. No. {{ $booking->reference_number }} ({{ $booking->service->name }}
                                    - {{ $booking->package->name }}) </p>
                            </div>
                        </div>
                        <h3 class="text-gold">
                            {{ $booking->paid_amount }}<span class="fs-6 fw-lighter">{{ __('services.SAR') }}</span>
                        </h3>
                    </div>
                    <div class="row d-flex p-4">
                        <!-- Left Column -->
                        <div class="col-md-7">
                            @foreach ($photographyTermsPage->sections as $key => $section)
                                <div class="fw-lighter d-flex flex-column gap-4">
                                    {!! $section->content !!}
                                </div>
                            @endforeach
                        </div>
                        <!-- Right Column -->
                        <div class="col-md-5">
                            <div class="rounded-5" style="border: 1px solid rgba(255, 255, 255, 0.1);">
                                <div class="table-header">
                                    <h6>{{ __('services.Choose your Payment Method') }}</h6>
                                </div>
                                <div class="p-3 d-flex align-items-center flex-column gap-2">
                                    <form action="{{ route('booking.complete', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn text-black bg-white rounded-4 px-4">
                                            <i class="far fa-credit-card"></i>
                                            {{ __('services.Pay with Debit/Credit Card') }}
                                        </button>
                                    </form>
                                    <div class="d-flex gap-2">
                                        <img src="{{ asset('images/mastercard.svg') }}" alt="item">
                                        <img src="{{ asset('images/visa.svg') }}" alt="item">
                                        <img src="{{ asset('images/ex.svg') }}" alt="item">
                                        <img src="{{ asset('images/cash.svg') }}" alt="item">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <br>
            <div class="table-profile">
                <div class="table-header">
                    <p>#{{ $booking->id }} {{ $booking->service->name }}</p>
                    <h3 class="fs-md-3 fs-5">
                        {{ __('services.Your Meeting Confirmed') }}
                        <span class="bg-white text-black rounded px-1">
                            <i class="fas fa-check"></i>
                        </span>
                    </h3>
                </div>
                <div class="row d-flex align-items-center p-4">
                    <div class="col-md-6">
                        @foreach ($MeetingTermsPage->sections as $key => $section)
                            <div class="d-flex flex-column gap-2">
                                {!! $section->content !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <div class="rounded-5" style="border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="table-header">
                                <h5>{{ __('services.Your Meeting Details') }}</h5>
                            </div>
                            <div class="p-3 ps-5">

                                <ul class="meeting-details-list d-flex flex-column gap-3">
                                    @if ($booking->meeting)
                                        <li>
                                            <span class="label">{{ __('services.Meeting Date') }}:</span>
                                            <span>
                                                {{ \Carbon\Carbon::parse($booking->meeting->start_time)->format('d M Y') }}
                                            </span>
                                        </li>
                                        <li>
                                            <span class="label">{{ __('services.Meeting Time') }}:</span>
                                            <span>
                                                {{ \Carbon\Carbon::parse($booking->meeting->start_at)->format('h:i') }} -
                                                {{ \Carbon\Carbon::parse($booking->meeting->end_at)->format('h:i') }}

                                                <span
                                                    class="small">{{ \Carbon\Carbon::parse($booking->meeting->start_at)->format('a') }}</span>

                                            </span>
                                        </li>
                                        <li>
                                            <span class="label">{{ __('services.Meeting Location') }}:</span>
                                            <span>{{ __('services.Online Meeting') }}</span>
                                        </li>
                                        <li>
                                            <span class="label">{{ __('services.Meeting Link') }}:</span>
                                            <a target="_blank"
                                                href="{{ $booking->meeting->link }}">{{ __('services.Join Meeting') }}</a>
                                        </li>
                                    @else
                                        <a href="{{ url('booking/meeting/confirm/' . $booking->id) }}"
                                            id="confirm_date_meeting" style="margin:auto;"
                                            class="btn bg-white mb-1 fw-bold text-black rounded-3">
                                            <i class="far fa-calendar-plus"></i>
                                            {{ __('services.Confirm Meeting') }}
                                        </a>
                                    @endif

                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
