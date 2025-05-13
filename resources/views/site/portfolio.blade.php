@extends('layouts.site')

@section('title', $portfolio->title)
@section('meta_title', $portfolio->meta_title)
@section('meta_description', $portfolio->meta_desc)

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
        'highlight' => $portfolio->title,
        'breadcrumb' => 'Our Portfolio / '.ucfirst($portfolio->category)." / ".$portfolio->title
    ])

    <!-- sections -->
    @foreach($portfolio->items as $key => $item)
        @if($key % 2 == 0)
            <section class="about-section py-5 bg-main">
        @else
            <section class="about-section py-5"
                     style="background-image: url({{asset('images/about-bg.png')}});">
                @endif
                <div class="container d-flex flex-column gap-3 text-white">
                    {!! $item->content !!}

                    @if($item->photos && count($item->photos))
                        <div class="row">
                            @foreach($item->photos as $photo)
                                <a href="{{ asset($photo) }}" class="m-2" target="_blank" style="max-width: 30%">
                                    <img src="{{ asset($photo) }}" alt="" class="img-fluid">
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </section>
    @endforeach


@endsection



