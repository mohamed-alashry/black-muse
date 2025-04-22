<?php

namespace App\Filament\Resources\PackageResource\Pages;

use App\Filament\Resources\PackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPackage extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = PackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
