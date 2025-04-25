<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meeting extends Model
{

    protected $casts = [
        'id' => 'integer',
        'booking_id' => 'integer',
        'user_id' => 'integer',
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'duration' => 'integer',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
