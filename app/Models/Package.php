<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Package extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'name' => 'array',
        'service_id' => 'integer',
        'base_price' => 'decimal',
    ];

    public function blockedDates(): MorphMany
    {
        return $this->morphMany(BlockedDate::class, 'blockable');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class)
            ->withPivot('is_default')
            ->withTimestamps();
    }
}
