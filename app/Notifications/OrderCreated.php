<?php

namespace App\Notifications;

use Filament\Notifications\Actions\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class OrderCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public object $order)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Order Created')
            ->markdown('mail.order.created', ['order' => $this->order]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->order->toArray();
    }

    public function toDatabase(object $notifiable): array
    {
        $order = $this->order->load('client', 'service');

        return FilamentNotification::make()
            ->title('New Order')
            ->icon('heroicon-o-calendar-days')
            ->color('primary')
            ->body("Client {$order->client->name} has made a new {$order->service->category} order (#{$order->reference_number}).")
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead()
                    ->url(fn() => route('filament.admin.resources.orders.view', $this->order->id)),
            ])
            ->getDatabaseMessage();
    }
}
