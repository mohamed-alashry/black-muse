@extends('layouts.site')

@section('title', $portfolio->title)
@section('meta_title', $portfolio->meta_title)
@section('meta_description', $portfolio->meta_desc)

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
        'highlight' => $portfolio->title,
        'breadcrumb' => $portfolio->title
    ])

    <!-- sections -->
    @foreach($portfolio->items as $item)
        {!! $item->content !!}
    @endforeach

@endsection



