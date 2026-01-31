<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payable_type',
        'payable_id',
        'payment_reference',
        'transaction_id',
        'brand',
        'action',
        'status',
        'amount',
        'currency',
        'raw_response',
    ];

    protected $casts = [
        'raw_response' => 'array',
    ];

    public function payable()
    {
        return $this->morphTo();
    }
}
