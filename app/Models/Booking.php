<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Booking extends Model
{

    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'package_id' => 'integer',
        'event_date' => 'date',
        'total_price' => 'decimal',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function meeting(): HasOne
    {
        return $this->hasOne(Meeting::class);
    }

    public function customizations(): HasMany
    {
        return $this->hasMany(BookingCustomization::class);
    }

    public function answers(): MorphMany
    {
        return $this->morphMany(Answer::class, 'answerable');
    }
}
