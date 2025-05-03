<?php

namespace App\Notifications;

use Filament\Notifications\Actions\Action;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Filament\Notifications\Notification as FilamentNotification;

class ContactCreated extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public object $contact)
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
            ->subject('New Contact Message')
            ->markdown('mail.contact.created', ['contact' => $this->contact]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return $this->contact->toArray();
    }

    public function toDatabase(object $notifiable): array
    {
        $contact = $this->contact;

        return FilamentNotification::make()
            ->title('New Contact Message')
            ->icon('heroicon-o-calendar-days')
            ->color('primary')
            ->body("New contact form submitted by {$contact->name} (#{$contact->reference_number}).")
            ->actions([
                Action::make('view')
                    ->button()
                    ->markAsRead()
                    ->url(fn() => route('filament.admin.resources.contacts.view', $this->contact->id)),
            ])
            ->getDatabaseMessage();
    }
}
