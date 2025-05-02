<?php

namespace App\Notifications;

use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification as FilamentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingFullyPaid extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->subject('Booking Fully Paid')
            ->markdown('mail.booking.fully_paid', ['booking' => $this->booking]);
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
        $booking = $this->booking->load('client');

        return FilamentNotification::make()
            ->title('Booking Fully Paid')
            ->icon('heroicon-o-calendar-days')
            ->color('primary')
            ->body("Client {$booking->client->name} has paid the full amount for booking (#{$booking->reference_number})")
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead()
                    ->url(fn() => route('filament.admin.resources.bookings.view', $this->booking->id)),
            ])
            ->getDatabaseMessage();
    }
}
