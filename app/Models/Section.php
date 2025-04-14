<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasFactory, HasTranslations;

    public array $translatable = ['title', 'subtitle', 'content'];

    protected $casts = [
        'id' => 'integer',
        'page_id' => 'integer',
        'viewable' => 'boolean',
        'editable' => 'boolean',
        'deletable' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
