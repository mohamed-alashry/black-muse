@extends('layouts.site')

@section('title', "Services")
@section('meta_title', "Services")
@section('meta_description', "Services")


@section('content')
    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => 'Our  ',
        'highlight' => 'Services',
        'breadcrumb' => 'Services'
    ])

    @if(count($packages)==0)
        <section class="py-5 bg-main">
            <div class="container">
                <div class="alert alert-info">
                    <p>No packages available.</p>
                </div>
            </div>
        </section>

    @else
        <section class="py-5 bg-main">
            <div class="container">
                <form id="formWizard" action="{{route('service.reservation.cache')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="text-white mt-3 Msgs"></div>
                    <!-- One "tab" for each step in the form: -->
                    <div class="tab">
                        <div class="text-white mb-2 ms-2">
                            <h1 class="fs-4 fw-lighter">
                                <strong class="text-gold">{{$service->name}}</strong> Service
                            </h1>
                            @if(request('event_date'))
                                <p class="fw-lighter">Available packages on: {{request('event_date')}} </p>
                            @endif
                        </div>
                        <div class="packages-section">
                            <input type="hidden" name="event_date" value="{{request('event_date')}}">
                            <input type="hidden" name="service_id" value="{{$service->id}}">
                            <input type="hidden" name="package_id" id="selectedPackageId">
                            @foreach($packages as $package)
                                <div class="package-card ">
                                    <div class="header-card">
                                        <h6>{{$package->name}}</h6>
                                        <h3 class="text-gold">
                                            {{$package->base_price}}<span class="fs-6 fw-lighter">SAR</span>
                                        </h3>
                                    </div>

                                    @foreach($package->features as $feature)
                                        @if($feature->pivot->is_default)
                                            <p>{{$feature->name}}</p>
                                        @endif
                                    @endforeach

                                    <button class="btn btn-choose-package" type="button"
                                            data-package-id="{{ $package->id }}">
                                        Choose a Package Now
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab">
                        <div class="text-white mb-2 ms-2">
                            <h1 class="fs-4 fw-lighter">
                                <strong class="text-gold">{{$service->name}}</strong> Service
                            </h1>
                            <p class="fw-lighter">Sample of Needed form you can change the inputs as you can</p>
                        </div>

                        <div class="form-packages-section d-grid gap-4" style="grid-template-columns: repeat(1, 1fr);padding: 30px;">
                            @foreach ($questions as $question)
                                @include('partials.site.question-field', ['question' => $question])
                            @endforeach
                        </div>
                    </div>

                    <div class="tab">
                        <div class="text-white mb-2 ms-2">
                            <h1 class="fs-4 fw-lighter">
                                Customize<strong class="text-gold"> {{$service->name}}</strong> Service
                            </h1>
                            <p class="fw-lighter">Custom It Now</p>
                        </div>
                        <div class="custom-packages-section">
                            <div class="package-card features-list">


                            </div>
                        </div>
                    </div>

                </form>

                <div class="overflow-auto">
                    <div class="d-flex align-items-center justify-content-end gap-2 mt-4">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)"
                                class="btn bg-transparent rounded-4 text-white border border-white me-2 px-5">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)" style="display: none;"
                                class="btn bg-white rounded-4 text-black px-5">
                            <i class="fas fa-arrow-right"></i>
                            Next Step
                        </button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>


            </div>
        </section>
    @endif


    @push('scripts')
        <script src="{{ asset('js/pages/questions.js') }}"></script>
        <script src="{{ asset('js/pages/packages.js') }}"></script>
        <script>
            var packagesData = @json($packages);
        </script>
    @endpush

@endsection
