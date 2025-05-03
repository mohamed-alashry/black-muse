@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

@component('mail::message')
<div style="direction: {{ $isRtl ? 'rtl' : 'ltr' }}; text-align: {{ $isRtl ? 'right' : 'left' }};">

# {{ __('Contact Status Update') }}

{{ __('Hello') }} {{ $contact->name }},

{{ __('Reference Number:') }} <strong>#{{ $contact->reference_number }}</strong>

@switch($contact->status)
    @case('in-progress')
        {{ __('We are currently reviewing your message and will get back to you shortly.') }}
        @break

    @case('closed')
        {{ __('Your request has been marked as resolved. Thank you for getting in touch!') }}
        @break

    @default
        {{ __('The status of your contact request has been updated.') }}
@endswitch

@component('mail::button', ['url' => route('site.home')])
    {{ __('Visit Our Website') }}
@endcomponent

{{ __('Thank you for choosing') }} {{ config('app.name') }}!

</div>
@endcomponent
