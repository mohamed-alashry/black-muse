<?php

namespace App\Filament\Widgets;

use App\Models\Contact;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class InquiryPipeline extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contact::query()
            )
            ->columns([
                TextColumn::make('name')->label('Client')->sortable(),
                TextColumn::make('status')->sortable(),
                TextColumn::make('created_at')
                    ->label('Inquired On')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime(),
//                TextColumn::make('resolution_time')
//                    ->label('Resolved In')
//                    ->formatStateUsing(fn($record) => $record->updated_at->diffForHumans($record->created_at)),
            ]);
    }
}
