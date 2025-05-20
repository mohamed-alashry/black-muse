<!-- map section -->
<section class="position-relative">
    <div class="contact-box p-sm-1 p-md-4 gap-sm-1 gap-md-3 bg-black">
        <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-location-dot"></i>
            <div class="text-white">
                <p class="fw-lighter fs-5">{{ __('site.address') }}</p>
                <p class="fs-5">{{ setting('address') }}</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            <i class="fa-solid fa-mobile-screen-button"></i>
            <div class="text-white">
                <p class="fw-lighter fs-5">{{ __('site.phone_numbers') }}</p>
                <p class="fs-5">{{ setting('phone') }}</p>
            </div>
        </div>
        <div class="d-flex align-items-center gap-3">
            <i class="fa-regular fa-envelope"></i>
            <div class="text-white">
                <p class="fw-lighter fs-5">{{ __('site.email') }}</p>
                <p class="fs-5">{{ setting('email') }}</p>
            </div>
        </div>
    </div>
    {!! setting('map') !!}
</section>
