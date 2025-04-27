<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortfolioResource\Pages;
use App\Filament\Resources\PortfolioResource\RelationManagers;
use App\Filament\Resources\PortfolioResource\RelationManagers\ItemsRelationManager;
use App\Models\Portfolio;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortfolioResource extends Resource
{
    use Translatable;

    protected static ?string $model = Portfolio::class;

    protected static ?string $navigationGroup = 'Website Content';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('photo')
                    ->required()
                    ->maxSize(1024) // Size in KB (1MB in this case)
                    ->image(),
                Forms\Components\TextInput::make('meta_title'),
                Forms\Components\TextInput::make('meta_desc'),
//                Forms\Components\Toggle::make('viewable')
//                    ->required(),
//                Forms\Components\Toggle::make('editable')
//                    ->required(),
//                Forms\Components\Toggle::make('deletable')
//                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(['active' => 'active', 'inactive' => 'inactive'])
                    ->default('active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('photo'),
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
            ItemsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPortfolios::route('/'),
            'create' => Pages\CreatePortfolio::route('/create'),
//            'view'   => Pages\ViewPortfolio::route('/{record}'),
            'edit'   => Pages\EditPortfolio::route('/{record}/edit'),
        ];
    }
}
