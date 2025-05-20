<!-- follow us section  -->
<section class="py-4 followus-section">
    <div class="container d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <p class="text-white fs-5 mb-2">{{ __('site.follow_us') }}</p>
            <div class="brands-icon">
                <a href="{{ setting('x') }}" class="text-white" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="{{ setting('facebook') }}" class="text-white" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="{{ setting('instagram') }}" class="text-white" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="{{ setting('youtube') }}" class="text-white" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>
                <a href="{{ setting('linkedin') }}" class="text-white" target="_blank">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </div>
        </div>
        <div class="d-flex gap-4">
            <a class="terms-text" href="{{ route('site.terms_conditions') }}">{{ __('site.terms_conditions') }}</a>
        </div>
    </div>
</section>

<!-- footer section  -->
<section class="bg-main py-4">
    <div class="container d-flex align-items-center justify-content-between flex-wrap gap-2 text-white">
        <p class="fw-lighter">{{ __('site.rights_reserved') }}</p>
        <div class="d-flex gap-2">
            <img src="{{ asset('images/mastercard.svg') }}" alt="item">
            <img src="{{ asset('images/visa.svg') }}" alt="item">
            <img src="{{ asset('images/tabby.svg') }}" alt="item">
            <img src="{{ asset('images/tamara.svg') }}" alt="item">
            <img src="{{ asset('images/ex.svg') }}" alt="item">
            <img src="{{ asset('images/cash.svg') }}" alt="item">
        </div>
        <p class="fw-lighter">{{ __('site.developed_by') }}: <strong>Exception.com.sa</strong></p>
    </div>
</section>
