<x-mail::message>
# Hi {{ $user->name }},

This is a reminder that you have a meeting scheduled **one hour** from now:

<x-mail::panel>
<strong> Reference Number: </strong> {{ $meeting->booking->reference_number }} <br>
<strong> With: </strong> {{ $otherPartyName }} ({{ $otherPartyEmail }}) <br>
<strong> Category: </strong> {{ ucfirst($meeting->booking->service->category) }} <br>
<strong> Service: </strong> {{ $meeting->booking->service->name }} <br>
<strong> Package: </strong> {{ $meeting->booking->package->name }} <br>
<strong> Booking Date: </strong> {{ $meeting->booking->created_at->format('F j, Y') }} <br>
<strong> Event Date: </strong> {{ $meeting->booking->event_date->format('F j, Y') }} <br>

<strong> Meeting Date: </strong> {{ $meeting->date->format('F j, Y') }} <br>
<strong> Meeting Time: </strong> From: {{ $meeting->start_at->toTimeString() }} To {{ $meeting->end_at->toTimeString() }} <br>
<strong> Meeting Duration: </strong> {{ $meeting->duration }} <br>
<strong> Meeting Link: </strong> {{ $meeting->link }} <br>
</x-mail::panel>

<x-mail::button :url="$url">
    View Booking
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
