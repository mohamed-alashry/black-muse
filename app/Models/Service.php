<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['name', 'description'];

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function questions(): MorphToMany
    {
        return $this->morphToMany(Question::class, 'questionable')
            ->withPivot('is_required')
            ->withTimestamps();
    }
}
