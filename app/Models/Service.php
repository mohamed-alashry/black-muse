<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Service extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'name' => 'array',
    ];

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function questions(): MorphToMany
    {
        return $this->morphToMany(Question::class, 'questionable');
    }
}
