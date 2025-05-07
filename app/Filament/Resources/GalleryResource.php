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
                Forms\Components\FileUpload::make('media')
                    ->acceptedFileTypes(['image/*', 'video/*'])
                    ->maxSize(4000)
                    ->reorderable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('media')
                    ->html()
                    ->formatStateUsing(function ($state) {
                        $media = asset($state);
                        $ext   = pathinfo($state, PATHINFO_EXTENSION);

                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
                            return "<img src='{$media}' width='80'/>";
                        }

                        if (in_array($ext, ['mp4', 'webm'])) {
                            return <<<HTML
                                <video width="120">
                                    <source src="{$media}" type="video/{$ext}">
                                </video>
                            HTML;
                        }

                        return $state;
                    }),
                Tables\Columns\TextColumn::make('sort'),
            ])
            ->reorderable('sort')
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGalleries::route('/'),
        ];
    }
}
