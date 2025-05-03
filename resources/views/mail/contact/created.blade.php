<x-mail::message>
# New Contact Message

Hello Admin,

A new contact message has been submitted.

<x-mail::panel>
<strong> Name: </strong> {{ $contact->name }} <br>
<strong> Email: </strong> {{ $contact->email }} <br>
<strong>Reference Number:</strong> #{{ $contact->reference_number }} <br>
<strong> Date: </strong> {{ $contact->created_at->format('F j, Y') }} <br>
<strong> Subject: </strong> {{ $contact->subject }} <br>
<strong> Message: </strong> {{ $contact->message }}
</x-mail::panel>

<x-mail::button :url="route('filament.admin.resources.contacts.view', $contact->id)">
    View Contact
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
