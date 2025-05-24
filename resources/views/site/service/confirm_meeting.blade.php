@extends('layouts.site')

@section('title', $confirmMeetingPage->title)
@section('meta_title', $confirmMeetingPage->meta_title)
@section('meta_description', $confirmMeetingPage->meta_desc)


@section('content')
    <!-- hero section -->
     @include('partials.site.hero-section', [
         'title' => "",
         'highlight' => __('services.Confirm Meeting'),
         'breadcrumb' => __('services.Meeting') . ' / '.$booking->reference_number
     ])


  <input type="hidden" id="booking_id" value="{{request('id')}}">
  <section class="py-5 bg-main">
    <div class="container">
      <div class="table-profile">
        <div class="table-header">
          <h5 class="fw-light">{{ __('services.Choose the Meeting Time') }}</h5>
          <div class="">{{ __('services.Online meeting') }}
            <!-- <select class="form-select">
              <option value="1" selected>{{ __('services.Online meeting') }}</option>
              <option value="2">{{ __('services.Offline meeting') }}</option>
            </select> -->
          </div>
        </div>
        <div class="row p-4">
          <!-- First Section -->
          <div class="col-md-6">
            @foreach($confirmMeetingPage->sections as $key => $section)
                <div class="d-flex flex-column pt-5">
                   {!! $section->content !!}
                </div>                
            @endforeach
          </div>
          <div class="col-md-6">
            <div class="rounded-5 meeting_date" style="border: 1px solid rgba(255, 255, 255, 0.1)">
              <div class="table-header">
                <h5>{{ __('services.Meeting Date') }}</h5>
              </div>
              <div class="p-4 d-flex flex-column gap-2 align-items-center">
                <input type="date" class="datepicker" id="meeting_date"/>
                <button id="confirm_date_meeting" 
                  class="btn bg-white mb-1 fw-bold text-black rounded-3">
                  <i class="far fa-calendar-plus"></i>
                  {{ __('services.Confirm This Date Now') }}
                </button>
              </div>
            </div>
            <br>
            <div class="rounded-5 d-flex flex-column gap-2 meeting_time" style="border: 1px solid rgba(255, 255, 255, 0.1);display:none !important;">
              <div class="table-header">
                <h5>{{ __('services.Meeting Time') }}</h5>
              </div>
              <div class="p-4 d-flex flex-column gap-4 align-items-center">
                <div class="d-flex justify-content-between align-items-center w-100">
                  <button class="btn border rounded-4 text-white w-50" type="button" id="change_date">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('services.Choose Another Date') }}
                  </button>
                  <h5 style="margin:auto;" id="date_selected_text"></h5>
                </div>
                <div class="d-flex flex-wrap gap-2 justify-content-center w-100" id="timeSlots">
                 
                </div>
                <button class="btn bg-white mb-1 fw-bold text-black rounded-3" id="confirm_time_meeting">
                  <i class="far fa-calendar-plus"></i>
                  {{ __('services.Confirm This Time Now') }}
                </button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
      <script src="{{ asset('js/pages/meeting.js') }}"></script>
  @endpush

@endsection