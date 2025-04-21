<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Feature extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'name' => 'array',
        'price' => 'decimal',
    ];

    public function blockedDates(): MorphMany
    {
        return $this->morphMany(BlockedDate::class, 'blockeddateable');
    }

    public function packages(): BelongsToMany
    {
        return $this->belongsToMany(Package::class);
    }
}
