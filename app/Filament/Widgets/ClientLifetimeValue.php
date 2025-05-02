<?php

namespace App\Filament\Widgets;

use App\Models\Client;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ClientLifetimeValue extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Client::query()
                ->select('clients.id', 'clients.name', \DB::raw('SUM(bookings.total_price) as total'))
                ->join('bookings', 'bookings.client_id', '=', 'clients.id')
                ->groupBy('clients.id', 'clients.name')
                ->orderByDesc('total')
                ->limit(10)
            )
            ->columns([
                TextColumn::make('name')->label('Client'),
                TextColumn::make('total')->label('Lifetime Value')->money('usd', true),
            ]);
    }
}
