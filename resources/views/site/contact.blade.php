@extends('layouts.site')

@section('title', $contactPage->title)
@section('meta_title', $contactPage->meta_title)
@section('meta_description', $contactPage->meta_desc)

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

                    <input type="hidden" name="client_id" value="{{ auth('client')->id() }}">

                    <div id="formMsg" class="text-white mt-3"></div>

                    <div class="col-12 col-md-6">
                        <input type="email" name="email" class="form-control bg-main rounded-4"
                               placeholder="Email address">
                    </div>

                    <div class="col-12 col-md-6">
                        <input type="text" name="name" class="form-control bg-main rounded-4" placeholder="Full Name">
                    </div>

                    <div class="">
                        <input type="text" name="subject" class="form-control bg-main rounded-4" placeholder="Subject">
                    </div>

                    <div class="">
                        <textarea name="message" class="form-control bg-main rounded-4"
                                  placeholder="Your message here..." rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn bg-white rounded-4 py-1 px-4 w-50 mx-auto" id="submitBtn">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Send Now
                    </button>

                </form>

                <div class="col-12 col-md-7" style="color: #fff">
                    <!-- sections -->
                    @foreach($contactPage->sections as $section)
                        {!! $section->content !!}
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('js/pages/contact.js') }}"></script>
    @endpush

@endsection
