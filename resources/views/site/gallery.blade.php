@extends('layouts.site')
@section('title', "Gallery")
@section('meta_title', "Gallery")
@section('meta_description', "Gallery")

@section('content')
    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css"/>

        <style>
            /* Masonry container */
            #lightgallery {
                column-count: 3;
                column-gap: 10px;
            }

            /* Ensure each item stays intact */
            #lightgallery a {
                display: inline-block;
                width: 100%;
                margin-bottom: 10px;
                break-inside: avoid;
                text-decoration: none;
            }

            /* Responsive thumbnails */
            #lightgallery img {
                width: 100%;
                height: auto;
                display: block;
                border-radius: 6px;
            }
        </style>
    @endpush

    <!-- hero section -->
    @include('partials.site.hero-section', [
         'title' => '',
         'highlight' => 'Gallery',
         'breadcrumb' => 'Gallery'
     ])

    <div class="container mt-5">
        <div id="lightgallery">
            @foreach($gallery as $item)

                @switch($item->type)
                    @case('image')
                        <!-- Image 1 -->
                        <a href="{{ asset($item->media) }}" data-lg-size="1200-800">
                            <img src="{{ asset($item->media) }}" alt="Image 1"/>
                        </a>
                        @break
                    @case('video')
                        <a
                            data-lg-size="1280-720"
                            data-poster="https://storage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg"
                            data-video='{
                                            "source": [
                                              {
                                                "src": "{{ asset($item->media) }}",
                                                "type": "video/mp4"
                                              }
                                            ],
                                            "attributes": {
                                              "preload": false,
                                              "controls": true
                                            }
                                          }'
                            class="gallery-item"
                        >
                            <img
                                src="https://storage.googleapis.com/gtv-videos-bucket/sample/images/BigBuckBunny.jpg"
                                alt="MP4 Video"
                            />
                        </a>
                        @break
                    @default
                        <a
                            data-lg-size="1280-720"
                            data-poster="https://img.youtube.com/vi/EIUJfXk3_3w/hqdefault.jpg"
                            data-src="{{ asset($item->media) }}"
                            class="gallery-item"
                        >
                            <img
                                src="https://img.youtube.com/vi/EIUJfXk3_3w/hqdefault.jpg"
                                alt="YouTube Video"
                            />
                        </a>
                @endswitch

            @endforeach
        </div>
    </div>

    @push('scripts')
        <!-- LightGallery JS -->
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/lightgallery.min.js"></script>

        <!-- LightGallery Video plugin -->
        <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/plugins/video/lg-video.min.js"></script>

        <!-- Initialize LightGallery -->
        <script>
            lightGallery(document.getElementById("lightgallery"), {
                plugins: [lgVideo],
                speed: 500,
            });
        </script>
    @endpush
@endsection
