<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class QuestionResource extends Resource
{
    use Translatable;

    protected static ?string $model = Question::class;

    protected static ?string $navigationGroup = 'Services';
    protected static ?int    $navigationSort  = 4;
    protected static ?string $navigationIcon  = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('text')
                    ->suffix('?')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->options([
                        'text'         => 'Text',
                        'textarea'     => 'Textarea',
                        'select'       => 'Select',
                        'radio'        => 'Radio',
                        'checkbox'     => 'Checkbox',
                        'number'       => 'Number',
                        'date'         => 'Date',
                        'file-upload'  => 'Image Upload',
                        'color-select' => 'Color Select',
                        'image-select' => 'Image Select',
                    ])
                    ->default('text')
                    ->required(),
                Repeater::make('options')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('value')
                            ->required(),

                        Forms\Components\TextInput::make('label')
                            ->required()
                            ->visible(fn($get) => !in_array($get('../../type'), ['color-select', 'image-select'])),

                        Forms\Components\ColorPicker::make('label')
                            ->required()
                            ->visible(fn($get) => $get('../../type') === 'color-select'),

                        Forms\Components\FileUpload::make('label')
                            ->required()
                            ->visible(fn($get) => $get('../../type') === 'image-select'),

                        Forms\Components\Select::make('child_question_ids')
                            ->label('Show Question When Selected')
                            ->multiple()
                            ->relationship('childQuestions', 'text')
                            ->helperText('Which questions appear if this option is chosen?'),
                    ])
                    ->visible(fn($get) => in_array($get('type'), ['select', 'radio', 'checkbox', 'color-select', 'image-select']))
                    ->orderColumn(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('text')
                    ->suffix('?'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            //            'view'   => Pages\ViewQuestion::route('/{record}'),
            'edit'   => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
