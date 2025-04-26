<?php

namespace App\Filament\Resources\BookingResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class AnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'answers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('value')
            ->columns([
                Tables\Columns\TextColumn::make('question.text')
                ->suffix('?'),
                Tables\Columns\TextColumn::make('question.type')
                ->label('Type'),
                Tables\Columns\TextColumn::make('value')
                    ->formatStateUsing(function ($state, $record) {
                        if ($record->question->type === 'color') {
                            // Return a color circle
                            return '<div style="width: 24px; height: 24px; background-color: ' . $state . '; border-radius: 50%; border: 1px solid #ccc;"></div>';
                        }

                        if ($record->question->type === 'file') {
                            // If it's an image
                            if (Str::endsWith($state, ['.jpg', '.jpeg', '.png', '.gif'])) {
                                return '<img src="' . asset($state) . '" alt="Uploaded Image" class="w-16 h-16 object-cover rounded-md">';
                            }

                            // If it's some other file
                            return '<a href="' . asset($state) . '" target="_blank">View File</a>';
                        }

                        return e($state); // Regular text
                    })
                    ->html(), // Important! To render HTML
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
//                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }
}
