<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property int $portfolio_id
 * @property string $title
 * @property string|null $description
 * @property string|null $subtitle
 * @property string|null $content
 * @property array|null $photos
 * @property int $sort
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Portfolio $portfolio
 */
class Item extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title', 'subtitle', 'content'];

    protected $casts = [
        'id' => 'integer',
        'title' => 'array',
        'portfolio_id' => 'integer',
        'subtitle' => 'array',
        'content' => 'array',
        'photos' => 'array',
        'viewable' => 'boolean',
        'editable' => 'boolean',
        'deletable' => 'boolean',
    ];

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }
}
