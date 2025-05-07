<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $media
 * @property string $type Either "image", "video", or "link"
 * @property int $sort
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Gallery extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'sort' => 'integer',
    ];
}
