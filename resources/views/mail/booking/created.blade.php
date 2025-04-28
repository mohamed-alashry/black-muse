<x-mail::message>
# New Booking Received

Hello Admin,

A new booking has been placed.

<strong> Reference Number: </strong> {{ $booking->reference_number }} <br>
<strong> Client Name: </strong> {{ $booking->client->name }} <br>
<strong> Client Email: </strong> {{ $booking->client->email }} <br>
<strong> Category: </strong> {{ ucfirst($booking->service->category) }} <br>
<strong> Service: </strong> {{ $booking->service->name }} <br>
<strong> Package: </strong> {{ $booking->package->name }} <br>
<strong> Booking Date: </strong> {{ $booking->created_at->format('F j, Y') }} <br>
<strong> Event Date: </strong> {{ $booking->event_date->format('F j, Y') }} <br>
<strong> Total Price: </strong> {{ $booking->total_price }}$ <br>
<strong> DownPayment Amount: </strong> {{ $booking->paid_amount }}$ <br>


<x-mail::button :url="route('filament.admin.resources.bookings.view', $booking->id)">
    View Booking
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
