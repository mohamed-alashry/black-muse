<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <title>@yield('title', 'Black Muse')</title>
</head>
<body>

  @include('partials.site.header')
  @include('partials.site.navbar')

  <main>
    @yield('content')
  </main>



  <!-- Map & contact -->
  @include('partials.site.contact-map')
  
  @include('partials.site.footer')

  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')

</body>
</html>
