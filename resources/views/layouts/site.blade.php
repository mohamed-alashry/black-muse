<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="@yield('meta_title', 'Black Muse')">
    <meta name="description" content="@yield('meta_description', 'Black Muse')">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <title>@yield('title', 'Black Muse')</title>
    @stack('styles')

</head>
<body>
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

@include('partials.site.header')


<main>
    @yield('content')
</main>


<!-- Map & contact -->
@include('partials.site.contact-map')

@include('partials.site.footer')


<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ar.js"></script>

@stack('scripts')

<script>
    @if(session('success'))
    toastr.success('{{ session('success') }}');
    @endif

    @if(session('error'))
    toastr.error('{{ session('error') }}');
    @endif

    @if(session('info'))
    toastr.info('{{ session('info') }}');
    @endif

    @if(session('warning'))
    toastr.warning('{{ session('warning') }}');
    @endif

    flatpickr(".datepicker", {
      minDate: "today",
      dateFormat: "Y-m-d",
    });

</script>


@if (!auth('client')->check())
    @include('partials.site.modals.login')
    @include('partials.site.modals.register')
@endif


</body>
</html>
