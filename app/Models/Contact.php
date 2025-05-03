<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $reference_number
 * @property int|null $client_id
 * @property string $email
 * @property string $name
 * @property string|null $subject
 * @property string|null $message
 * @property string|null $notes
 * @property string $status
 * @property string|null $reply_message
 * @property \Carbon\Carbon|null $replied_at
 * @property int|null $replied_by
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\User|null $repliedBy
 * @property-read \App\Models\Client|null $client
 */
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

    public function repliedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'replied_by');
    }
}
