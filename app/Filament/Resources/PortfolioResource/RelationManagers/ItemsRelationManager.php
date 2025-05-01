<?php

namespace App\Filament\Resources\PortfolioResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ItemsRelationManager extends RelationManager
{
    use Translatable;

    protected static string $relationship = 'items';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle'),
                TinyEditor::make('content')->columnSpan(2),
//                Forms\Components\Section::make()
//                    ->schema([
//                        Forms\Components\Toggle::make('viewable')
//                            ->required(),
//                        Forms\Components\Toggle::make('editable')
//                            ->required(),
//                        Forms\Components\Toggle::make('deletable')
//                            ->required(),
//                    ])->columns(3),
                Forms\Components\TextInput::make('sort')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->default(1),
                Forms\Components\Select::make('status')
                    ->options(['active' => 'active', 'inactive' => 'inactive'])
                    ->default('active')
                    ->required(),
                Forms\Components\FileUpload::make('photos')
                    ->multiple()
                    ->image()
                    ->maxSize(4000) // Size in KB (1MB in this case)
                    ->reorderable()
                    ->maxParallelUploads(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('subtitle')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('photos')
                    ->stacked(),
                Tables\Columns\TextColumn::make('sort')
                    ->searchable(),
//                Tables\Columns\IconColumn::make('viewable')
//                    ->boolean(),
//                Tables\Columns\IconColumn::make('editable')
//                    ->boolean(),
//                Tables\Columns\IconColumn::make('deletable')
//                    ->boolean(),
                Tables\Columns\TextColumn::make('status'),
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
                Tables\Actions\LocaleSwitcher::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
