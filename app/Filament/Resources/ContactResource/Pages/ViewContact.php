<?php

namespace App\Filament\Resources\ContactResource\Pages;

use App\Filament\Resources\ContactResource;
use App\Models\Contact;
use App\Notifications\ContactReplied;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Notifications\Notification as FilamentNotification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Notification;

class ViewContact extends ViewRecord
{
    protected static string $resource = ContactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('Reply')
                ->label('Reply')
                ->icon('heroicon-o-chat-bubble-left-right')
                ->button()
                ->modalHeading(fn(Contact $record) => "Reply to #{$record->reference_number}")
                ->visible(fn(Contact $record) => $record->status !== 'closed')
                ->form([
                    RichEditor::make('reply_message')
                        ->label('Your Reply')
                        ->required()
                        ->disableToolbarButtons(['attachFiles']),
                ])
                ->action(function (Contact $record, array $data) {
                    $record->update([
                        'reply_message' => $data['reply_message'],
                        'replied_at' => now(),
                        'replied_by' => auth()->id(),
                    ]);

                    // Show a toast
                    FilamentNotification::make()
                        ->title('Reply sent to ' . $record->name)
                        ->success()
                        ->send();

                    Notification::route('mail', $record->email)
                        ->notify(new ContactReplied($record));
                })
                ->color('success'),
        ];
    }
}
