<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookingCustomization extends Model
{

    protected $casts = [
        'id' => 'integer',
        'booking_id' => 'integer',
        'feature_id' => 'integer',
        'included' => 'boolean',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }
}
