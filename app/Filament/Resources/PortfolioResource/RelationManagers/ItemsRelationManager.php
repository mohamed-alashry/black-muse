<?php

namespace App\Filament\Resources\PortfolioResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                Forms\Components\MarkdownEditor::make('content'),
                Forms\Components\FileUpload::make('photos')
                    ->multiple()
                    ->maxParallelUploads(1),
                Forms\Components\TextInput::make('sort')
                    ->required()
                    ->maxLength(255)
                    ->default(1),
                Forms\Components\Toggle::make('viewable')
                    ->required(),
                Forms\Components\Toggle::make('editable')
                    ->required(),
                Forms\Components\Toggle::make('deletable')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(['active' => 'active', 'inactive' => 'inactive'])
                    ->default('active')
                    ->required(),
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
                Tables\Columns\IconColumn::make('viewable')
                    ->boolean(),
                Tables\Columns\IconColumn::make('editable')
                    ->boolean(),
                Tables\Columns\IconColumn::make('deletable')
                    ->boolean(),
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
