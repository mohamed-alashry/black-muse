<?php

namespace App\Notifications;

use App\Models\User;
use Filament\Notifications\Actions\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class MeetingReminder extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public object $meeting,
        public string $otherName,
        public string $otherEmail,
    )
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
        return array_filter([
            'mail',
            $notifiable instanceof User ? 'database' : null,
        ]);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = route('service.booking.show', $this->meeting->booking->id);
        if ($notifiable instanceof User) {
            $url = route('filament.admin.resources.bookings.view', $this->meeting->booking->id);
        }

        return (new MailMessage)
            ->subject('Reminder: Upcoming Meeting in 1 Hour')
            ->markdown('mail.booking.meeting_reminder', [
                'user'            => $notifiable,
                'meeting'         => $this->meeting,
                'otherPartyName'  => $this->otherName,
                'otherPartyEmail' => $this->otherEmail,
                'url'             => $url,
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return FilamentNotification::make()
            ->title('Reminder: Upcoming Meeting in 1 Hour')
            ->icon('heroicon-o-calendar-days')
            ->color('primary')
            ->body("Meeting with {$this->otherName} starts in 1 hour.")
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead()
                    ->url(fn() => route('filament.admin.resources.bookings.view', $this->meeting->booking->id)),
            ])
            ->getDatabaseMessage();
    }
}
