<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

class Question extends Model
{
    use HasTranslations;

    public array $translatable = ['text'];

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function services(): MorphToMany
    {
        return $this->morphedByMany(Service::class, 'questionable')
            ->withPivot('is_required')
            ->withTimestamps();
    }
}
