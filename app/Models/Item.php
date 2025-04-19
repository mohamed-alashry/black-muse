<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

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
