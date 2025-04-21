<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Question extends Model
{

    protected $casts = [
        'id' => 'integer',
        'text' => 'array',
        'is_required' => 'boolean',
    ];

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function services(): MorphToMany
    {
        return $this->morphedByMany(Service::class, 'questionable');
    }
}
