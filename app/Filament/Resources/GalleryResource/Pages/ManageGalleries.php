<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGalleries extends ManageRecords
{
    protected static string $resource = GalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->after(function ($record) {
                    if ($record->type === 'link' && $record->url) {

                        $record->addMediaFromUrl(getYouTubeThumbnail($record->url))
                            ->toMediaCollection();
                    }
                }),
        ];
    }
}
