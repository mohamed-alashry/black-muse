@extends('layouts.site')

@section('title', $termsPage->title)
@section('meta_title', $termsPage->meta_title)
@section('meta_description', $termsPage->meta_desc)

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
         'title' => 'Terms & Conditions – ',
         'highlight' => ' Black Muse',
         'breadcrumb' => 'Terms & Conditions'
     ])

    <!-- sections -->
    @foreach($termsPage->sections as $key => $section)
        @if($key % 2 == 0)
            <section class="about-section py-5 bg-main">
                @else
                    <section class="about-section py-5"
                             style="background-image: url({{asset('images/about-bg.png')}});">
                        @endif
                        <div class="container d-flex flex-column gap-3 text-white">
                            {!! str($section->content)->markdown() !!}
                        </div>
                    </section>
   @endforeach

@endsection
