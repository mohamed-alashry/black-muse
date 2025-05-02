<x-mail::message>
# New Order Received

Hello Admin,

A new order has been placed.

<x-mail::panel>
<strong> Reference Number: </strong> {{ $order->reference_number }} <br>
<strong> Client Name: </strong> {{ $order->client->name }} <br>
<strong> Client Email: </strong> {{ $order->client->email }} <br>
<strong> Category: </strong> {{ ucfirst($order->service->category) }} <br>
<strong> Service: </strong> {{ $order->service->name }} <br>
<strong> Package: </strong> {{ $order->package->name }} <br>
<strong> Order Date: </strong> {{ $order->created_at->format('F j, Y') }} <br>
<strong> Total Price: </strong> {{ $order->total_price }}$ <br>
</x-mail::panel>

<x-mail::button :url="route('filament.admin.resources.orders.view', $order->id)">
    View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
