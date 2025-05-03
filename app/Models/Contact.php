<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([ContactObserver::class])]
class Contact extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($contact) {
            $contact->reference_number = 'CT-' . strtoupper(uniqid());
        });
    }
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
