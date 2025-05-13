<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationGroup = 'Website Content';
    protected static ?int    $navigationSort  = 3;
    protected static ?string $navigationIcon  = 'heroicon-o-camera';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type')
                    ->options(['image' => 'image', 'video' => 'video', 'link' => 'link'])
                    ->default('image')
                    ->required()
                    ->live(),
                Forms\Components\SpatieMediaLibraryFileUpload::make('image')
                    ->required()
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(12000)
                    ->imageEditor()
                    ->visible(fn($get): bool => $get('type') === 'image'),
                Forms\Components\SpatieMediaLibraryFileUpload::make('video')
                    ->required()
                    ->acceptedFileTypes(['video/mp4'])
                    ->maxSize(12000)
                    ->visible(fn($get): bool => $get('type') === 'video'),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->url()
                    ->rule('regex:/^(https?\:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/i')
                    ->helperText('Only YouTube links are allowed')
                    ->visible(fn($get): bool => $get('type') === 'link'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\SpatieMediaLibraryImageColumn::make('media')
                    ->conversion('thumb'),
                // Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('sort'),
            ])
            ->reorderable('sort')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->after(function ($record) {
                        if ($record->type === 'link' && $record->url) {

                            $record->addMediaFromUrl(getYouTubeThumbnail($record->url))
                                ->toMediaCollection();
                        }
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGalleries::route('/'),
        ];
    }
}
