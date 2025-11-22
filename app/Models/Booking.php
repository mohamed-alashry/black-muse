<?php

namespace App\Models;

use App\Observers\BookingObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property int $id
 * @property string $reference_number
 * @property int $client_id
 * @property int $service_id
 * @property int $package_id
 * @property \Carbon\Carbon $event_date
 * @property float $paid_amount
 * @property float $remaining_amount
 * @property float $total_price
 * @property string|null $notes
 * @property string $payment_stage
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Service $service
 * @property-read \App\Models\Package $package
 * @property-read \App\Models\Meeting|null $meeting
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feature[] $features
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 */
#[ObservedBy([BookingObserver::class])]
class Booking extends Model
{

    protected $casts = [
        'id'               => 'integer',
        'reference_number' => 'string',
        'client_id'        => 'integer',
        'service_id'       => 'integer',
        'package_id'       => 'integer',
        'event_date'       => 'date',
        'paid_amount'      => 'float',
        'remaining_amount' => 'float',
        'total_price'      => 'float',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($booking) {
            $booking->reference_number = 'BK-' . strtoupper(uniqid());
        });
    }

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
        return $this->morphToMany(Feature::class, 'reservable', 'reserved_features')
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

    public function payments()
    {
        return $this->morphMany(Payment::class, 'payable');
    }

    public function generateGoogleCalendarLink(): string
    {
        // All-day event: start date as YYYYMMDD, end date is next day
        $startDate = $this->event_date->format('Ymd');
        $endDate   = $this->event_date->copy()->addDay()->format('Ymd');

        $title       = "Photography Booking — {$this->reference_number}";
        $description = trim("Service: {$this->service->name}، Package: {$this->package->name}");

        // Base URL (no location parameter)
        $baseUrl = 'https://www.google.com/calendar/render?action=TEMPLATE';

        // Build the query string
        $params = [
            'text'   => $title,
            'dates'  => "{$startDate}/{$endDate}",
            'details' => $description,
        ];

        return $baseUrl . '&' . http_build_query($params);
    }
}
