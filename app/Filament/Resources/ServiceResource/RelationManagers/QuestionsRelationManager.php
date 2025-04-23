<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class QuestionsRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'questions';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('text')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'text'     => 'Text',
                        'textarea' => 'Textarea',
                        'select'   => 'Select',
                        'radio'    => 'Radio',
                        'checkbox' => 'Checkbox',
                        'number'   => 'Number',
                        'date'     => 'Date',
                    ])
                    ->default('text')
                    ->required(),
                Forms\Components\Checkbox::make('is_required')
                    ->default(1)
                    ->columnSpan(2),
                Repeater::make('options')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('text')
                            ->required()
                            ->label('Label'),
                    ])
                    ->visible(fn($get) => in_array($get('type'), ['select', 'radio', 'checkbox']))
                    ->orderColumn(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
            ->columns([
                Tables\Columns\TextColumn::make('text'),
                Tables\Columns\CheckboxColumn::make('is_required'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->preloadRecordSelect()
                    ->multiple()
                    ->form(fn(Tables\Actions\AttachAction $action): array => [
                        $action->getRecordSelect(),
                        Forms\Components\Checkbox::make('is_required')
                            ->default(0),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
