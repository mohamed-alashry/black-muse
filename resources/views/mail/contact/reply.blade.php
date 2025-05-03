<x-mail::message>
# Contact Message Reply for {{ $contact->reference_number }}

**Hello {{ $contact->name }},**

**Subject:** {{ $contact->subject }} <br>
**Message:** {{ $contact->message }} <br>
**Reply:**

<x-mail::panel>
{!! str($contact->reply_message)->markdown() !!}
</x-mail::panel>

<x-mail::button :url="route('site.home')">
    Visit Our Website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
