<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Booking extends Model
{

    protected $casts = [
        'id' => 'integer',
        'reference_number' => 'string',
        'client_id' => 'integer',
        'service_id' => 'integer',
        'package_id' => 'integer',
        'event_date' => 'date',
        'paid_amount' => 'decimal',
        'remaining_amount' => 'decimal',
        'total_price' => 'decimal',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function meeting(): HasOne
    {
        return $this->hasOne(Meeting::class);
    }

    public function features(): MorphToMany
    {
        return $this->morphToMany(Feature::class, 'reservable')
            ->withPivot([
                'name',
                'price',
                'is_default',
            ])
            ->withTimestamps();
    }

    public function answers(): MorphMany
    {
        return $this->morphMany(Answer::class, 'answerable');
    }
}
