@extends('layouts.site')

@section('title', __('site.profile_title'))

@section('content')

    <!-- hero section -->
    @include('partials.site.hero-section', [
        'title' => __('site.hero_title_welcome'),
        'highlight' => $client->name,
        'breadcrumb' => __('site.hero_breadcrumb_profile'),
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
                                <i class="fas fa-th-large"></i> @lang('site.profile_menu')
                            </li>
                            <li class="p-md-3 {{ !request('tab') ? 'active' : '' }}" id="info-tab" data-bs-toggle="tab"
                                data-bs-target="#info-tab-pane" type="button" role="tab" aria-controls="info-tab-pane">
                                <i class="fas fa-user"></i> @lang('site.profile_account_info')
                            </li>
                            <li class="p-md-3" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane"
                                type="button" role="tab" aria-controls="password-tab-pane">
                                <i class="fa-regular fa-pen-to-square"></i> @lang('site.profile_change_password')
                            </li>
                            <li class="p-md-3 {{ request('tab') == 'booking' ? 'active' : '' }}" id="booked-tab"
                                data-bs-toggle="tab" data-bs-target="#booked-tab-pane" type="button" role="tab"
                                aria-controls="booked-tab-pane">
                                <i class="fa-regular fa-file-lines"></i> @lang('site.profile_booked_services')
                            </li>
                            <li class="p-md-3 d-flex align-items-center mb-md-5 {{ request('tab') == 'order' ? 'active' : '' }}"
                                id="order-tab" data-bs-toggle="tab" data-bs-target="#order-tab-pane" type="button"
                                role="tab" aria-controls="order-tab-pane">
                                <i class="fas fa-history"></i> @lang('site.profile_order_history')
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Content Tabs -->
                <div class="col-md-9">
                    <div class="tab-content pe-0 ps-md-2" id="myTabContent">

                        <!-- Info Tab -->
                        <form class="tab-pane fade {{ !request('tab') ? 'show active' : '' }}" id="info-tab-pane"
                            role="tabpanel" aria-labelledby="info-tab">
                            <div class="row">
                                <div class="col-md-12 text-white mt-3" id="InfoMsgs"></div>
                                <div class="col-md-6">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_name_label')</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $client->name }}">
                                        <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_email_label')</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ $client->email }}">
                                        <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_phone_label')</label>
                                        <input type="text" name="phone_number" class="form-control"
                                            value="{{ $client->phone_number }}">
                                        <span class="input-icon"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_address_label')</label>
                                        <textarea name="address" class="form-control" style="background: #000; color: #fff;" rows="3">{{ $client->address }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-light rounded-pill px-5 py-2" id="infoSubmit">
                                    <i class="fa-regular fa-square-check"></i> @lang('site.profile_edit_save')
                                </button>
                            </div>
                        </form>

                        <!-- Password Tab -->
                        <form class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab">
                            <div class="row">
                                <div class="col-md-12 text-white mt-3" id="changePasswordMsgs"></div>
                                <div class="col-md-12">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_old_password_label')</label>
                                        <input type="password" name="old_password" class="form-control">
                                        <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_new_password_label')</label>
                                        <input type="password" name="new_password" class="form-control">
                                        <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="box-input">
                                        <label class="form-label small">@lang('site.profile_repeat_password_label')</label>
                                        <input type="password" name="repeat_password" class="form-control">
                                        <span class="input-icon"><i class="fas fa-edit"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-light rounded-pill px-5 py-2"
                                    id="changePasswordSubmit">
                                    <i class="fa-regular fa-square-check"></i> @lang('site.profile_edit_save')
                                </button>
                            </div>
                        </form>

                        <!-- Booked Services Tab -->
                        <div class="tab-pane fade {{ request('tab') == 'booking' ? 'show active' : '' }}"
                            id="booked-tab-pane" role="tabpanel" aria-labelledby="booked-tab">
                            <div class="table-profile">
                                <div class="table-header">
                                    <h5><i class="fa-regular fa-file-lines"></i> @lang('site.profile_booked_table_title')</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.profile_table_id')</th>
                                                <th>@lang('site.profile_table_reference')</th>
                                                <th>@lang('site.profile_table_service_name')</th>
                                                <th>@lang('site.profile_table_event_date')</th>
                                                <th>@lang('site.profile_table_booking_date')</th>
                                                <th>@lang('site.profile_table_total_amount')</th>
                                                <th>@lang('site.profile_table_paid_amount')</th>
                                                <th>@lang('site.profile_table_status')</th>
                                                <th>@lang('site.profile_table_actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($client->bookings as $b => $booking)
                                                <tr>
                                                    <td>#{{ $booking->id }}</td>
                                                    <td><small>{{ $booking->reference_number }}</small></td>
                                                    <td>{{ $booking->service->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $booking->total_price }} <span
                                                            class="small">{{ __('services.SAR') }}</span></td>
                                                    <td>{{ $booking->paid_amount }} <span
                                                            class="small">{{ __('services.SAR') }}</span></td>
                                                    <td>{{ ucfirst($booking->status) }}</td>
                                                    <td><a href="{{ route('service.booking.show', $booking->id) }}"
                                                            class="btn border rounded"><i
                                                                class="fa-solid fa-arrow-right text-white"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Order History Tab -->
                        <div class="tab-pane fade {{ request('tab') == 'order' ? 'show active' : '' }}"
                            id="order-tab-pane" role="tabpanel" aria-labelledby="order-tab">
                            <div class="table-profile">
                                <div class="table-header">
                                    <h5 class="mb-0"><i class="fa-solid fa-clock-rotate-left"></i> @lang('site.profile_table_order_title')
                                    </h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>@lang('site.profile_table_id')</th>
                                                <th>@lang('site.profile_table_reference')</th>
                                                <th>@lang('site.profile_table_order_name')</th>
                                                <th>@lang('site.profile_table_order_date')</th>
                                                <th>@lang('site.profile_table_total_amount')</th>
                                                <th>@lang('site.profile_table_status')</th>
                                                <th>@lang('site.profile_table_actions')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($client->orders as $o => $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td><small>{{ $order->reference_number }}</small></td>
                                                    <td>{{ $order->service->name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $order->total_price }} <span
                                                            class="small">{{ __('services.SAR') }}</span></td>
                                                    <td>{{ ucfirst($order->status) }}</td>
                                                    <td><a href="{{ route('service.order.show', $order->id) }}"
                                                            class="btn border rounded"><i
                                                                class="fa-solid fa-arrow-right text-white"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
