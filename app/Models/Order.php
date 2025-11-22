<?php

namespace App\Models;

use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @property int $id
 * @property string $reference_number
 * @property int $client_id
 * @property int $service_id
 * @property int $package_id
 * @property float $total_price
 * @property string|null $notes
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\Service $service
 * @property-read \App\Models\Package $package
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Feature[] $features
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Answer[] $answers
 */
#[ObservedBy([OrderObserver::class])]
class Order extends Model
{

    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'service_id' => 'integer',
        'package_id' => 'integer',
        'total_price' => 'float',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($order) {
            $order->reference_number = 'OR-' . strtoupper(uniqid());
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
}
