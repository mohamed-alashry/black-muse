<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class BlockedDate extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
    ];

    public function blockable(): MorphTo
    {
        return $this->morphTo();
    }
}
