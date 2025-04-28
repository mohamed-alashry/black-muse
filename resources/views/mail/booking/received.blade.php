@php
    $isArabic = $locale === 'ar';
@endphp

@component('mail::message')
@if ($isArabic)
<div style="direction: rtl; text-align: right;">
# شكراً لحجزك!

مرحباً {{ $booking->client->name }},

لقد استلمنا طلب الحجز الخاص بك ونحن متحمسون لخدمتك!

@component('mail::panel')
    <strong>الخدمة:</strong> {{ $booking->service->name }}<br>
    <strong>تاريخ الحجز:</strong> {{ $booking->created_at->format('Y/m/d') }}<br>
    <strong>رقم الحجز:</strong> #{{ $booking->reference_number }}
@endcomponent

@if($booking->additional_notes)
    <strong>ملاحظات إضافية:</strong><br>
    {{ $booking->additional_notes }}
@endif

سنتواصل معك قريباً لتأكيد التفاصيل النهائية.

@component('mail::button', ['url' => route('site.profile')])
    زيارة موقعنا
@endcomponent

شكراً لاختيارك {{ config('app.name') }}!

مع أطيب التحيات،
فريق عمل {{ config('app.name') }}
</div>
@else
# Thank You for Your Booking!

Hello {{ $booking->client->name }},

We have received your booking request and we’re excited to work with you!

@component('mail::panel')
    <strong>Service:</strong> {{ $booking->service->name }}<br>
    <strong>Booking Date:</strong> {{ $booking->created_at->format('F j, Y') }}<br>
    <strong>Reference Number:</strong> #{{ $booking->reference_number }}
@endcomponent

@if($booking->additional_notes)
    <strong>Additional Notes:</strong><br>
    {{ $booking->additional_notes }}
@endif

We will contact you shortly to confirm and finalize the details.

@component('mail::button', ['url' => route('site.profile')])
    Visit Our Website
@endcomponent

Thanks again for choosing {{ config('app.name') }}!

Best regards,
{{ config('app.name') }} Team
@endif
@endcomponent
