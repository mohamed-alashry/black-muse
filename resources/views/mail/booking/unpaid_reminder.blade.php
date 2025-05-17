<x-mail::message>
# Payment Reminder for Booking {{ $booking->reference_number }}

Hi {{ $booking->client->name }},

This is a reminder that your booking scheduled for **{{ $booking->event_date->format('F j, Y') }}** is not fully paid.


**Total Amount:** ${{ number_format($booking->total_price, 2) }} <br>
**Amount Paid:** ${{ number_format($booking->paid_amount, 2) }} <br>
**Remaining Paid:** ${{ number_format($booking->remaining_amount, 2) }} <br>

<x-mail::button :url="route('service.booking.show', $booking->id) . '#details'">
    View Booking
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
