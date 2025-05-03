<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property string $blockable_type
 * @property int $blockable_id
 * @property \Carbon\Carbon $date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property-read \Illuminate\Database\Eloquent\Model|\App\Models\Feature|\App\Models\Package $blockable
 */
class BlockedDate extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
    ];

    public function blockable(): MorphTo
    {
        return $this->morphTo();
    }
}
