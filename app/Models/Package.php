<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Package extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name'];

    public function blockedDates(): MorphMany
    {
        return $this->morphMany(BlockedDate::class, 'blockable');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function features(): MorphToMany
    {
        return $this->morphToMany(Feature::class, 'featureable')
            ->withPivot('is_default')
            ->withTimestamps();
    }
}
