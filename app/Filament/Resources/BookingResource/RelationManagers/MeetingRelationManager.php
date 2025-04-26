<?php

namespace App\Filament\Resources\BookingResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MeetingRelationManager extends RelationManager
{
    protected static string $relationship = 'meeting';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('notes')
                    ->disableToolbarButtons([
                        'attachFiles'
                    ])
                    ->columnSpanFull(),
                Forms\Components\Select::make('status')
                ->options(['pending' => 'pending', 'done' => 'done', 'cancelled' => 'cancelled']),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('start_at')
            ->columns([
                Tables\Columns\TextColumn::make('start_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('end_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('duration')
                    ->suffix(' min'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('link'),
                Tables\Columns\TextColumn::make('notes')
                    ->limit(100)
                    ->html(),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
