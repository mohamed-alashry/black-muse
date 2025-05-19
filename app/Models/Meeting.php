<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $booking_id
 * @property int $user_id
 * @property \Carbon\Carbon $date
 * @property \Carbon\Carbon $start_at
 * @property \Carbon\Carbon $end_at
 * @property string $duration
 * @property string $type
 * @property string|null $link
 * @property string|null $notes
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Booking $booking
 * @property-read \App\Models\User $user
 */
class Meeting extends Model
{

    protected $casts = [
        'id'         => 'integer',
        'booking_id' => 'integer',
        'user_id'    => 'integer',
        'date'       => 'datetime',
        'start_at'   => 'datetime',
        'end_at'     => 'datetime',
        'duration'   => 'integer',
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
