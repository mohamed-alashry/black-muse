@php
    $isArabic = $locale === 'ar';
@endphp

@component('mail::message')
@if ($isArabic)
<div style="direction: rtl; text-align: right;">
# شكراً لحجزك!

مرحباً {{ $order->client->name }},

لقد استلمنا طلب الحجز الخاص بك ونحن متحمسون لخدمتك!

@component('mail::panel')
    <strong>الخدمة:</strong> {{ $order->service->name }}<br>
    <strong>تاريخ الحجز:</strong> {{ $order->created_at->format('Y/m/d') }}<br>
    <strong>رقم الحجز:</strong> #{{ $order->reference_number }}
@endcomponent

سنتواصل معك قريباً لتأكيد التفاصيل النهائية.

@component('mail::button', ['url' => route('site.profile')])
    زيارة موقعنا
@endcomponent

شكراً لاختيارك {{ config('app.name') }}!

مع أطيب التحيات،
فريق عمل {{ config('app.name') }}
</div>
@else
# Thank You for Your Order!

Hello {{ $order->client->name }},

We have received your order request and we’re excited to work with you!

@component('mail::panel')
    <strong>Service:</strong> {{ $order->service->name }}<br>
    <strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}<br>
    <strong>Reference Number:</strong> #{{ $order->reference_number }}
@endcomponent

We will contact you shortly to confirm and finalize the details.

@component('mail::button', ['url' => route('site.profile')])
    Visit Our Website
@endcomponent

Thanks again for choosing {{ config('app.name') }}!

Best regards,
{{ config('app.name') }} Team
@endif
@endcomponent
