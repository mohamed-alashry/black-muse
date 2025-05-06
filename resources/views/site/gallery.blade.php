@extends('layouts.site')
@section('title', "Gallery")
@section('meta_title', "Gallery")
@section('meta_description', "Gallery")

@section('content')
    @push('styles')
        <!-- LightGallery CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lightgallery.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-zoom.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/css/lg-video.min.css">
        
        <style>
            .gallery-container {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
                padding: 20px;
                background-color: #f5f5f5;
            }
            
            .gallery-item {
                border-radius: 10px;
                overflow: hidden;
                position: relative;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                background-color: #fff;
            }
            
            .gallery-item:hover {
                transform: scale(1.03);
                box-shadow: 0 6px 12px rgba(0,0,0,0.15);
            }
            
            .gallery-item img,
            .gallery-item .video-thumbnail,
            .gallery-item .external-thumbnail {
                width: 100%;
                height: 200px;
                object-fit: cover;
                display: block;
            }
            
            .video-thumbnail,
            .external-thumbnail {
                position: relative;
                background: #000;
            }
            
            .play-icon,
            .external-icon {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                font-size: 40px;
                text-shadow: 0 0 10px rgba(0,0,0,0.7);
                opacity: 0.9;
                transition: all 0.3s ease;
                z-index: 2;
            }
            
            .external-icon {
                content: "🌐";
                font-size: 30px;
            }
            
            .gallery-item:hover .play-icon,
            .gallery-item:hover .external-icon {
                transform: translate(-50%, -50%) scale(1.1);
                opacity: 1;
            }
            
            .media-badge {
                position: absolute;
                top: 10px;
                right: 10px;
                background: rgba(0,0,0,0.7);
                color: white;
                padding: 3px 8px;
                border-radius: 12px;
                font-size: 12px;
                font-weight: bold;
                z-index: 2;
            }
        </style>
    @endpush

<!-- hero section -->
    @include('partials.site.hero-section', [
         'title' => '',
         'highlight' => 'Gallery',
         'breadcrumb' => 'Gallery'
     ])
     
    <div class="gallery-container" id="lightgallery">
        @foreach($media as $item)
            @if($item->type === 'image')
                <!-- عنصر الصورة -->
                <div class="gallery-item" 
                     data-src="{{ Storage::url($item->media) }}"
                     data-sub-html="<h4>{{ $item->title ?? 'صورة' }}</h4>">
                    <img src="{{ Storage::url($item->media) }}" loading="lazy" alt="{{ $item->title ?? 'صورة' }}">
                </div>
            
            @elseif($item->type === 'video')
                <!-- عنصر الفيديو المحلي -->
                <div class="gallery-item"
                     data-src="{{ Storage::url($item->media) }}"
                     data-poster="{{ $item->poster ? Storage::url($item->poster) : Storage::url($item->media) }}"
                     data-sub-html="<h4>{{ $item->title ?? 'فيديو' }}</h4>"
                     data-video='{"source": [{"src":"{{ Storage::url($item->media) }}", "type":"video/mp4"}], "attributes": {"preload": "metadata", "controls": true}}'
                     data-html="#video-{{ $loop->index }}">
                     
                    <div class="video-thumbnail">
                        <video muted loop playsinline preload="metadata">
                            <source src="{{ Storage::url($item->media) }}" type="video/mp4">
                        </video>
                        <div class="play-icon">▶</div>
                    </div>
                </div>
                
                <!-- هيكل HTML إضافي للفيديو -->
                <div id="video-{{ $loop->index }}" style="display:none;">
                    <video class="lg-video-object" controls>
                        <source src="{{ Storage::url($item->media) }}" type="video/mp4">
                    </video>
                </div>
            
            @elseif($item->type === 'link')
                <!-- عنصر الرابط الخارجي -->
                <div class="gallery-item"
                     data-src="{{ $item->media }}"
                     data-sub-html="<h4>{{ $item->title ?? 'رابط خارجي' }}</h4><p>{{ $item->description ?? '' }}</p>"
                     data-iframe="true"
                     data-download-media="{{ $item->media }}">
                     
                    <div class="external-thumbnail">
                        <img src="{{ $item->thumbnail ?? '/path/to/default-external-thumb.jpg' }}" loading="lazy" alt="رابط خارجي">
                        <div class="external-icon">🌐</div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @push('scripts')
        <!-- LightGallery JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/lightgallery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/zoom/lg-zoom.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.2/plugins/video/lg-video.min.js"></script>
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                lightGallery(document.getElementById('lightgallery'), {
                    plugins: [lgZoom, lgVideo],
                    selector: '.gallery-item',
                    download: false,
                    counter: false,
                    
                    // إعدادات الفيديو
                    videojs: true,
                    videojsOptions: {
                        techOrder: ['html5'],
                        html5: {
                            nativeControlsForTouch: true,
                            nativeAudioTracks: true,
                            nativeVideoTracks: true
                        }
                    },
                    
                    // إعدادات الروابط الخارجية
                    iframe: {
                        markup: [
                            '<div class="lg-iframe-container">',
                                '<div class="lg-video-cont"></div>',
                            '</div>'
                        ],
                        srcPrefix: '',
                        title: 'رابط خارجي'
                    },
                    
                    // إعدادات عامة
                    thumbnail: true,
                    showThumbByDefault: true,
                    animateThumb: true,
                    zoomFromOrigin: true,
                    allowMediaOverlap: true,
                    mode: 'lg-fade',
                    speed: 300,
                    preload: 1,
                    
                    // معالجة الأخطاء
                    onAfterOpen: function() {
                        console.log('Gallery opened');
                    },
                    onSlideItemLoad: function(event) {
                        console.log('Slide loaded:', event.index);
                    }
                });
            });
        </script>
    @endpush
@endsection