<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

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
}
