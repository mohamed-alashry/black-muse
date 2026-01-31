@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

@component('mail::message')

    # {{ __('Booking Status Update') }}

    {{ __('Hello') }} {{ $notifiable->name }},

    @switch($booking->status)
        @case('confirmed')
            {{ __('We are happy to inform you that your booking has been confirmed!') }}
        @break

        @case('canceled')
            {{ __('We are sorry to inform you that your booking has been canceled.') }}
        @break

        @case('completed')
            {{ __('Your booking has been successfully completed. Thank you for trusting us!') }}
        @break

        @default
            {{ __('Your booking status has been updated.') }}
    @endswitch

    @component('mail::button', ['url' => route('service.booking.show', $booking->id)])
        {{ __('View Booking') }}
    @endcomponent

    {{ __('Thank you for choosing') }} {{ config('app.name') }}!

@endcomponent
