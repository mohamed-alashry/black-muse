@php
    $isArabic = $locale === 'ar';
@endphp

@component('mail::message')
@if ($isArabic)
<div style="direction: rtl; text-align: right;">
# شكراً لتواصلك!

مرحباً {{ $contact->name }},

لقد استلمنا رسالتك وسوف نعود إليك قريبا.

@component('mail::panel')
    <strong>الموضوع:</strong> {{ $contact->subject }}<br>
    <strong>الرسالة:</strong> {{ $contact->message }}<br>
    <strong>التاريخ:</strong> {{ $contact->created_at->format('Y/m/d') }}<br>
    <strong>الرقم:</strong> #{{ $contact->reference_number }}
@endcomponent

@component('mail::button', ['url' => route('site.home')])
    زيارة موقعنا
@endcomponent

شكراً لاختيارك {{ config('app.name') }}!

مع أطيب التحيات،
فريق عمل {{ config('app.name') }}
</div>
@else
# Thank You for Your Contact!

Hello {{ $contact->name }},

We have received your contact request and will get back to you shortly.

@component('mail::panel')
    <strong>Reference Number:</strong> #{{ $contact->reference_number }} <br>
    <strong>Date:</strong> {{ $contact->created_at->format('F j, Y') }}<br>
    <strong>Subject:</strong> {{ $contact->subject }}<br>
    <strong>Message:</strong> {{ $contact->message }}
@endcomponent

@component('mail::button', ['url' => route('site.home')])
    Visit Our Website
@endcomponent

Thanks again for choosing {{ config('app.name') }}!

Best regards,
{{ config('app.name') }} Team
@endif
@endcomponent
