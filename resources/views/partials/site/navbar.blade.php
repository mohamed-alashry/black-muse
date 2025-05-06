  <!-- main navbar -->
  <nav class="navbar navbar-expand-sm bg-main border-body pt-4 opacity-75 position-absolute w-100 z-3" data-bs-theme="dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('site.home') }}">
        <img src="{{ asset('images/mainLogo.svg') }}" alt="Bootstrap" width="122" height="86">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
        aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse  d-md-flex flex-md-column align-items-end flex-sm-column-reverse "
        id="navbarToggler">

      @if (auth('client')->check())
        <div class="dropdown">
            <div class="d-flex align-items-center gap-1 btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="h-100 w-100 overflow-hidden">
                <img src="{{ asset('images/profile.png') }}" alt="" srcset="">
              </div>
              <p class="text-white fw-light d-flex gap-1 align-items-center">
                Welcome, <span class="fw-bold">{{ auth('client')->user()->name }}</span>
                <i class="fas fa-chevron-down dropdown-icon"></i>
              </p>
            </div>
            <ul class="dropdown-menu bg-main">
              <li><a href="{{ route('site.profile') }}" class="dropdown-item" type="button"><i class="fa-regular fa-user"></i> My Profile</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <form action="{{ route('site.logout') }}" method="POST">
                @csrf
                 <button class="dropdown-item" type="submit"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Log
                  Out</button>
                </form>
              </li>
            </ul>
        </div>
      @else
        <div class="d-flex gap-2 ">
           <button class="btn btn-outline-light rounded-4" data-bs-toggle="modal" data-bs-target="#loginModal"> <i
              class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</button>
          <button class="btn  bg-white text-black rounded-4" data-bs-toggle="modal" data-bs-target="#registerModal"><i class="fa-solid fa-user-plus"></i>
            Register</button>
          <button class="text-white btn"> <i class="fa-solid fa-globe"></i> عربي</button>
        </div>
      @endif

         <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('site.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="@if(Route::currentRouteName() !== 'site.home'){{ route('site.home') }}@endif#services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="@if(Route::currentRouteName() !== 'site.home'){{ route('site.home') }}@endif#binderies">Bindery & Lab</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="@if(Route::currentRouteName() !== 'site.home'){{ route('site.home') }}@endif#protofolios">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('site.about') }}">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('site.contact') }}">Contact Us</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
