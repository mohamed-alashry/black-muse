<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class OutstandingBalances extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Booking::query()
                    ->where('payment_stage', 'down_payment')
                    ->orderBy('event_date')
            )
            ->columns([
                TextColumn::make('client.name')
                    ->label('Client')
                    ->sortable(),
                TextColumn::make('event_date')
                    ->label('Event Date')
                    ->date()
                    ->sortable(),
                TextColumn::make('remaining_amount')
                    ->label('Amount Due')
                    ->money('usd', true)
                    ->sortable(),
            ]);
    }
}
