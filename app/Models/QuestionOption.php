<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{

    protected $casts = [
        'id' => 'integer',
        'text' => 'array',
        'question_id' => 'integer',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
