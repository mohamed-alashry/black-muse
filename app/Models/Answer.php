<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @property int $id
 * @property int $question_id
 * @property string $answerable_type
 * @property int $answerable_id
 * @property string|null $value
 * @property int|null $question_option_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Question $question
 * @property-read \App\Models\QuestionOption|null $option
 * @property-read \Illuminate\Database\Eloquent\Model|\App\Models\Booking|\App\Models\Order $answerable
 */
class Answer extends Model
{

    protected $casts = [
        'id' => 'integer',
        'question_id' => 'integer',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(QuestionOption::class, 'question_option_id');
    }

    public function answerable(): MorphTo
    {
        return $this->morphTo();
    }
}
