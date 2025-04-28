<?php

namespace App\Notifications;

use Filament\Notifications\Actions\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class BookingCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public object $booking)
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
        return (new MailMessage)->markdown('mail.booking.created');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->booking->toArray();
    }

    public function toDatabase(object $notifiable): array
    {
        $booking = $this->booking->load('client', 'service');
        $body = "new {$booking->service->category} booking {$booking->reference_number} created for {$booking->client->name}";

        return FilamentNotification::make()
            ->title('New Bookings')
            ->icon('heroicon-o-calendar-days')
            ->color('primary')
            ->body($body)
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead()
                    ->url(fn() => route('filament.admin.resources.bookings.view', $this->booking->id)),
            ])
            ->getDatabaseMessage();
    }
}
