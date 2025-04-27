<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Filament\Resources\PageResource\RelationManagers\SectionsRelationManager;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PageResource extends Resource
{
    use Translatable;

    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'Website Content';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
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
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }

//    public static function infolist(Infolist $infolist): Infolist
//    {
//        return $infolist->schema([
//            Section::make()->schema([
//                TextEntry::make('title'),
//                TextEntry::make('meta_title'),
//                TextEntry::make('meta_desc'),
//                IconEntry::make('viewable')->boolean(),
//                IconEntry::make('editable')->boolean(),
//                IconEntry::make('deletable')->boolean(),
//                TextEntry::make('status'),
//                TextEntry::make('created_at'),
//                TextEntry::make('updated_at'),
//            ])->columns(2)
//        ]);
//    }

    public static function getRelations(): array
    {
        return [
            SectionsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
//            'view'   => Pages\ViewPage::route('/{record}'),
            'edit'   => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
