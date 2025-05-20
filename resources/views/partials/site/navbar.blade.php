<!-- main navbar -->
<nav class="navbar navbar-expand-sm bg-main border-body pt-4 opacity-75 position-absolute w-100 z-3" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('site.home') }}">
      <img src="{{ asset('images/mainLogo.svg') }}" alt="Logo" width="122" height="86">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
      aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse d-md-flex flex-md-column align-items-end flex-sm-column-reverse" id="navbarToggler">

      @if (auth('client')->check())
        <div class="dropdown">
          <div class="d-flex align-items-center gap-1 btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <div class="h-100 w-100 overflow-hidden">
              <img src="{{ asset('images/profile.png') }}" alt="">
            </div>
            <p class="text-white fw-light d-flex gap-1 align-items-center">
              {{ __('site.welcome') }}, <span class="fw-bold">{{ auth('client')->user()->name }}</span>
              <i class="fas fa-chevron-down dropdown-icon"></i>
            </p>
          </div>
          <ul class="dropdown-menu bg-main">
            <li>
              <a href="{{ route('site.profile') }}" class="dropdown-item" type="button">
                <i class="fa-regular fa-user"></i> {{ __('site.my_profile') }}
              </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('site.logout') }}" method="POST">
                @csrf
                <button class="dropdown-item" type="submit">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i> {{ __('site.logout') }}
                </button>
              </form>
            </li>
          </ul>
        </div>
      @else
        <div class="d-flex gap-2">
          <button class="btn btn-outline-light rounded-4" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('site.login') }}
          </button>
          <button class="btn bg-white text-black rounded-4" data-bs-toggle="modal" data-bs-target="#registerModal">
            <i class="fa-solid fa-user-plus"></i> {{ __('site.register') }}
          </button>

          <form method="get" action="{{ LaravelLocalization::getLocalizedURL(app()->getLocale() == 'ar' ? 'en' : 'ar') }}">
            <button type="submit" class="text-white btn">
              <i class="fa-solid fa-globe"></i> {{ __('site.language') }}
            </button>
          </form>
        </div>
      @endif

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('site.home') }}">{{ __('site.home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="@if(Route::currentRouteName() !== 'site.home'){{ route('site.home') }}@endif#services">
            {{ __('site.services') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="@if(Route::currentRouteName() !== 'site.home'){{ route('site.home') }}@endif#binderies">
            {{ __('site.binderies') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="@if(Route::currentRouteName() !== 'site.home'){{ route('site.home') }}@endif#protofolios">
            {{ __('site.portfolio') }}
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('site.gallery') }}">{{ __('site.gallery') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('site.about') }}">{{ __('site.about') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('site.contact') }}">{{ __('site.contact') }}</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
