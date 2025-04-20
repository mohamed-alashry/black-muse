@extends('layouts.site')

@section('title', trans('client.profile'))

@section('content')

  <!-- hero section -->
   @include('partials.site.hero-section', [
        'title' => trans('client.profile'),
        'highlight' => 'About Us',
        'breadcrumb' => 'About Us'
    ])

   

@endsection