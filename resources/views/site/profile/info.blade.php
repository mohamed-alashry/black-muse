@extends('layouts.site')

@section('title', 'Profile')

@section('content')

  <!-- hero section -->
   @include('partials.site.hero-section', [
        'title' => 'Welcome',
        'highlight' => $client->name,
        'breadcrumb' => 'Profile'
    ])


<!-- Main Section -->
<section class="py-5 bg-main">
  <div class="container">
    <div class="row">

      <!-- Sidebar Menu -->
      <div class="col-md-3 mb-4 ps-0 pe-md-2">
        <div class="profile-menu p-2 p-md-0" id="myTab" role="tablist">
          <ul class="list-unstyled d-flex flex-row gap-2 flex-md-column overflow-auto">
            <li class="p-md-3 fs-5 text-white">
              <i class="fas fa-th-large"></i> Profile Menu:
            </li>
            <li class="p-md-3 active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-tab-pane" type="button" role="tab" aria-controls="info-tab-pane">
              <i class="fas fa-user"></i> Account Info
            </li>
            <li class="p-md-3" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="password-tab-pane">
              <i class="fa-regular fa-pen-to-square"></i> Change Password
            </li>
            <li class="p-md-3" id="booked-tab" data-bs-toggle="tab" data-bs-target="#booked-tab-pane" type="button" role="tab" aria-controls="booked-tab-pane">
              <i class="fa-regular fa-file-lines"></i> Booked Services
            </li>
          </ul>
        </div>
      </div>

      <!-- Content Tabs -->
      <div class="col-md-9">
        <div class="tab-content pe-0 ps-md-2" id="myTabContent">

          <!-- Info Tab -->
          <form class="tab-pane fade show active" id="info-tab-pane" role="tabpanel" aria-labelledby="info-tab">
            <div class="row">

              <div class="col-md-12 text-white mt-3" id="InfoMsgs"></div>

              <div class="col-md-6">
                <div class="box-input">
                  <label class="form-label small">Name</label>
                  <input type="text" name="name" class="form-control" value="{{$client->name}}">
                  <span class="input-icon"><i class="fas fa-edit"></i></span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="box-input">
                  <label class="form-label small">Email</label>
                  <input type="email" name="email" class="form-control" value="{{$client->email}}">
                  <span class="input-icon"><i class="fas fa-edit"></i></span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="box-input">
                  <label class="form-label small">Phone Number</label>
                  <input type="text" name="phone_number" class="form-control" value="{{$client->phone_number}}">
                  <span class="input-icon"><i class="fas fa-phone"></i></span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="box-input">
                  <label class="form-label small">Address</label>
                  <textarea name="address" class="form-control" style="background: #000; color: #fff;" rows="3">{{$client->address}}</textarea>
                </div>
              </div>

            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-light rounded-pill px-5 py-2" id="infoSubmit">
                <i class="fa-regular fa-square-check"></i> Edit & Save
              </button>
            </div>
          </form>

          <!-- Password Tab -->
          <form class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab">
            <div class="row">

              <div class="col-md-12 text-white mt-3" id="changePasswordMsgs"></div>

              <div class="col-md-12">
                <div class="box-input">
                  <label class="form-label small">Old Password</label>
                  <input type="password" name="old_password" class="form-control">
                  <span class="input-icon"><i class="fas fa-edit"></i></span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="box-input">
                  <label class="form-label small">New Password</label>
                  <input type="password" name="new_password" class="form-control">
                  <span class="input-icon"><i class="fas fa-edit"></i></span>
                </div>
              </div>

              <div class="col-md-6">
                <div class="box-input">
                  <label class="form-label small">Repeat Password</label>
                  <input type="password" name="repeat_password" class="form-control">
                  <span class="input-icon"><i class="fas fa-edit"></i></span>
                </div>
              </div>

            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-light rounded-pill px-5 py-2" id="changePasswordSubmit">
                <i class="fa-regular fa-square-check"></i> Edit & Save
              </button>
            </div>
          </form>

          <!-- Booked Services Tab -->
          <div class="tab-pane fade" id="booked-tab-pane" role="tabpanel" aria-labelledby="booked-tab">

            <!-- Booked List Table -->
            <div class="table-profile">
              <div class="table-header">
                <h5><i class="fa-regular fa-file-lines"></i> Your Booked Services</h5>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Service Name</th>
                      <th>Event Date</th>
                      <th>Booking Date</th>
                      <th>Total Amount</th>
                      <th>Paid Amount</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($client->bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{\Carbon\Carbon::parse($booking->event_date)->format('d-m-Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($booking->created_at)->format('d-m-Y')}}</td>
                            <td>{{ $booking->total_price }} <span class="small">SAR</span></td>
                            <td>{{ $booking->paid_amount }} <span class="small">SAR</span></td>
                            <td> {{ ucfirst($booking->booking_status) }}</td>
                            <td>
                                <a href="{{route('service.booking.show', $booking->id)}}" class="btn border rounded">
                                    <i class="fa-solid fa-arrow-right text-white"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>

            <!-- Additional Views for Meetings & Payments can be added here similarly -->

          </div>

        </div>
      </div>

    </div>
  </div>
</section>



    @push('scripts')
        <script src="{{ asset('js/pages/profile.js') }}"></script>
    @endpush

@endsection
