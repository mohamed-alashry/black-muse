@php
    $isRtl = app()->getLocale() === 'ar';
@endphp

@component('mail::message')
    <div style="direction: {{ $isRtl ? 'rtl' : 'ltr' }}; text-align: {{ $isRtl ? 'right' : 'left' }};">

        # {{ __('Order Status Update') }}

        {{ __('Hello') }} {{ $notifiable->name }},

        @switch($order->status)
            @case('in-progress')
                {{ __('We are happy to inform you that your order is now in-progress!') }}
            @break

            @case('canceled')
                {{ __('We are sorry to inform you that your order has been canceled.') }}
            @break

            @case('completed')
                {{ __('Your order has been successfully completed. Thank you for trusting us!') }}
            @break

            @default
                {{ __('Your order status has been updated.') }}
        @endswitch

        @component('mail::button', ['url' => route('service.order.show', $order->id)])
            {{ __('View Order') }}
        @endcomponent

        {{ __('Thank you for choosing') }} {{ config('app.name') }}!

    </div>
@endcomponent
