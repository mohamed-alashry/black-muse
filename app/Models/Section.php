<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'integer',
        'title' => 'array',
        'page_id' => 'integer',
        'subtitle' => 'array',
        'content' => 'array',
        'viewable' => 'boolean',
        'editable' => 'boolean',
        'deletable' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }
}
