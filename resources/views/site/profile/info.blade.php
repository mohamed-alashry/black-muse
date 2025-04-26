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
  <section class=" py-5 bg-main ">
    <div class="container">
      <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-md-3 mb-4 ps-0 pe-md-2">
          <div class="profile-menu p-2 p-md-0 " id="myTab" role="tablist">
            <ul class="list-unstyled d-flex flex-row gap-2 flex-md-column overflow-auto">
              <li class="p-md-3 fs-5 text-white">
                <i class="fas fa-th-large"></i> Profile Menu:
              </li>
              <li class="p-md-3 active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info-tab-pane" type="button"
                role="tab" aria-controls="info-tab-pane">
                <i class="fas fa-user"></i> Account Info
              </li>

               <li class="p-md-3" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button"
                role="tab" aria-controls="password-tab-pane">
                <i class="fa-regular fa-pen-to-square"></i>  Change Password
              </li>


            </ul>
          </div>
        </div>

        <div class="col-md-9">
          <div class="tab-content pe-0 ps-md-2" id="myTabContent">
            <!-- Form Info Tab -->
            <form class="tab-pane fade show active" id="info-tab-pane" role="tabpanel" aria-labelledby="info-tab">
              <div class="row">

                <div class="col-md-12" id="InfoMsgs" class="text-white mt-3"></div>

                <!-- Name -->
                <div class="col-md-6">
                  <div class="box-input">
                    <label class="form-label small ">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$client->name}}">
                    <span class="input-icon">
                      <i class="fas fa-edit"></i>
                    </span>
                  </div>
                </div>

                <!-- Email -->
                <div class="col-md-6">
                  <div class="box-input">
                    <label class="form-label small ">Email</label>
                    <input type="email" name="email" class="form-control" value="{{$client->email}}">
                    <span class="input-icon">
                      <i class="fas fa-edit"></i>
                    </span>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="box-input">
                    <label class="form-label small ">Phone Number</label>
                    <input type="text" name="phone_number"  class="form-control" value="{{$client->phone_number}}">
                    <span class="input-icon">
                      <i class="fas fa-phone"></i>
                    </span>
                  </div>
                </div>

                <!-- Address -->
                <div class="col-md-6">
                  <div class="box-input">
                    <label class="form-label small ">Address</label>
                    <textarea class="form-control" value="{{$client->address}}" name="address" style="background: #000;color: #fff;" rows="3">{{$client->address}}</textarea>
                  </div>
                </div>
              </div>

              <!-- Save Button -->
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-light rounded-pill px-5 py-2" id="infoSubmit">
                  <i class="fa-regular fa-square-check"></i>
                  Edit & Save
                </button>
              </div>
            </form>


            <!-- Form Password Tab -->
            <form class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab">
              <div class="row">
                <div class="col-md-12" id="changePasswordMsgs" class="text-white mt-3"></div>
                <!-- old Password -->
                <div class="col-md-12">
                  <div class="box-input">
                    <label class="form-label small ">Old Password</label>
                    <input type="password" name="old_password" class="form-control" >
                    <span class="input-icon">
                      <i class="fas fa-edit"></i>
                    </span>
                  </div>
                </div>

                <!-- New Password -->
                <div class="col-md-6">
                  <div class="box-input">
                    <label class="form-label small ">New Password</label>
                    <input type="password" name="new_password" class="form-control" >
                    <span class="input-icon">
                      <i class="fas fa-edit"></i>
                    </span>
                  </div>
                </div>

                <!-- Repeat Password -->
                <div class="col-md-6">
                  <div class="box-input">
                    <label class="form-label small ">Repeat Password</label>
                    <input type="password" name="repeat_password"  class="form-control" >
                    <span class="input-icon">
                      <i class="fas fa-edit"></i>
                    </span>
                  </div>
                </div>

              <!-- Save Button -->
              <div class="text-center mt-4">
                <button type="submit" class="btn btn-light rounded-pill px-5 py-2" id="changePasswordSubmit">
                  <i class="fa-regular fa-square-check"></i>
                  Edit & Save
                </button>
              </div>
            </form>



          </div>

        </div>
      </div>
    </div>
  </section>


    @push('scripts')
        <script src="{{ asset('js/pages/profile.js') }}"></script>
    @endpush

@endsection
