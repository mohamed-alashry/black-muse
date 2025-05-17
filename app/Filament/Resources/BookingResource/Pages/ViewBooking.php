<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBooking extends ViewRecord
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\Action::make('Add to Google Calendar')
                ->icon('heroicon-o-calendar-days')
                ->url(fn ($record) => $record->generateGoogleCalendarLink())
                ->openUrlInNewTab()
                ->color('success')

        ];
    }
}
