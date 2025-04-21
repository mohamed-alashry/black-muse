<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\Translatable\HasTranslations;

class Feature extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name'];

    public function blockedDates(): MorphMany
    {
        return $this->morphMany(BlockedDate::class, 'blockable');
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class)
            ->withPivot('is_default')
            ->withTimestamps();
    }
}
