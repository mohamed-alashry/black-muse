  <!-- main navbar -->
  <nav class="navbar navbar-expand-sm bg-main border-body pt-4" data-bs-theme="dark">
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
        <div class="d-flex gap-2 ">
          <button class="btn  btn-outline-light rounded-4"> <i class="fa-solid fa-arrow-right-to-bracket"></i>
            Login</button>
          <button class="btn  bg-white text-black rounded-4"><i class="fa-solid fa-user-plus"></i>
            Register</button>
          <button class="text-white btn"> <i class="fa-solid fa-globe"></i> عربي</button>
        </div>

         <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('site.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="">Bindery & Lab</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('site.portfolio') }}">Portfolio</a>
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