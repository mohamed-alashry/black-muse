<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name'];

    public function blockedDates(): MorphMany
    {
        return $this->morphMany(BlockedDate::class, 'blockable');
    }

    public function packages(): MorphToMany
    {
        return $this->morphedByMany(Package::class, 'featureable')
            ->withPivot('is_default')
            ->withTimestamps();
    }

    public function bookings(): MorphToMany
    {
        return $this->morphedByMany(Booking::class, 'reservable', 'reserved_features')
            ->withPivot([
                'name',
                'price',
                'is_default',
            ])
            ->withTimestamps();
    }
}
