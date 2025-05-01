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
                    ->live()
                    ->required(),
                Repeater::make('options')
                    ->relationship('options')
                    ->schema([
                        Forms\Components\TextInput::make('value')
                            ->required(),

                        Forms\Components\TextInput::make('label')
                            ->dehydrated()
                            ->hidden(),

                        Forms\Components\TextInput::make('label_text')
                            ->label('Label')
                            ->afterStateHydrated(function ($component, $record) {
                                $component->state($record?->label);
                            })
                            ->visible(fn($get) => !in_array($get('../../type'), ['color-select', 'image-select'])),

                        Forms\Components\ColorPicker::make('label_color')
                            ->label('Label')
                            ->afterStateHydrated(function ($component, $record) {
                                $component->state($record?->label);
                            })
                            ->visible(fn($get) => $get('../../type') === 'color-select'),

                        Forms\Components\FileUpload::make('label_file')
                            ->label('Label')
                            ->image()
                            ->afterStateHydrated(function ($component, $record) {
                                if ($record)
                                    $component->state([$record?->label]);
                            })
                            ->visible(fn($get) => $get('../../type') === 'image-select'),


                        Forms\Components\Select::make('child_question_ids')
                            ->label('Show Question When Selected')
                            ->multiple()
                            ->relationship('childQuestions', 'text')
                            ->helperText('Which questions appear if this option is chosen?'),
                    ])
                    ->mutateRelationshipDataBeforeCreateUsing(function (array $data, callable $get) {
                        $data['label'] = self::extractFinalLabel($data, $get('type'));
                        unset($data['label_text'], $data['label_color'], $data['label_file']);
                        return $data;
                    })
                    ->mutateRelationshipDataBeforeSaveUsing(function (array $data, callable $get) {
                        $data['label'] = self::extractFinalLabel($data, $get('type'));
                        unset($data['label_text'], $data['label_color'], $data['label_file']);
                        return $data;
                    })
                    ->visible(fn($get) => in_array($get('type'), ['select', 'radio', 'checkbox', 'color-select', 'image-select']))
                    ->orderColumn(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('text')
            ->columns([
                Tables\Columns\TextColumn::make('text')
                    ->suffix('?'),
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

    private static function extractFinalLabel(array $data, string $type): ?string
    {
        return match ($type) {
            'color-select' => $data['label_color'] ?? null,
            'image-select' => is_array($data['label_file'] ?? null)
                ? $data['label_file'][0] ?? null
                : $data['label_file'] ?? null,
            default => $data['label_text'] ?? null,
        };
    }
}
